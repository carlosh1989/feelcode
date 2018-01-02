<?php
namespace App\clp\controllers;

use App\CentroClp;
use App\Cne;
use App\Estructura;
use App\Institucion;
use App\Mesa;
use App\MesasCne;
use App\Partido;
use App\Ubch;
use App\UbchResponsable;
use App\Usuario;
use Carbon\Carbon;

class Centros
{
    function __construct()
    {
        Role('clp');
    }

    public function index()
    {
        $user = User();
        $centros = Ubch::where('id_clp',$user['id_clp'])
        ->orderBy('id_ubch', 'DESC')
        ->get();

        View(compact('centros'));
    }

    public function busqueda()
    {
        View();
    }

    public function create()
    {
        extract($_POST);
        $user = User();
        $datos_cne = Cne::where('cedula',$cedula)->first();
        $instituciones = Institucion::all();
        $partidos = Partido::all();
        $estructura = Estructura::all();
        $responsable = UbchResponsable::where('cedula',$cedula)->first();

        if(!$responsable)
        {
            if($datos_cne)
            {
                /*$mesas_cne = MesasCne::where('id_municipio',$datos_cne->municipio)
                ->where('id_parroquia',$datos_cne->parroquia)
                ->where('mesa',1)
                ->where('estatus',0)
                ->get(); */

                $mesas_cne = CentroClp::where('id_clp',$user['id_clp'])
                ->get();
                //Arr($mesas_cne);
                View(compact('mesas_cne','cedula','instituciones','partidos','estructura'));
            }
            else
            {
                Error('centros/busqueda','No se encuentra registrado en el cne.');
            }
        }
        else
        {
            Error('centros/busqueda','Esta persona ya es responsable de un centro.');
        }
    }

    public function store()
    {
        extract($_POST);
        extract($_GET);

        $user = User();

        $mesa = MesasCne::where('codigo_cne',$codigo_cne)->first();
        $centro = MesasCne::where('codigo_cne',$codigo_cne)->get();
        $datos_cne = Cne::where('cedula',$cedula)->first();


        $existeUbch = Ubch::where('nombre_ubch',$mesa->nombre)
        ->where('id_municipio',$mesa->id_municipio)
        ->where('id_parroquia',$mesa->id_parroquia)
        ->first();

        //Arr($existeUbch);
        $nombre_usuario = Usuario::where('email',$email)->first();

        if($nombre_usuario)
        {
            Error('centros/busqueda','Nombre de usuario ya esta siendo usado.');
        }
        else
        {
            if(!$existeUbch)
            {
                    $nombre_ubch = $mesa->nombre;
                    $direccion_ubch = $mesa->direccion;
                    $fecha_hora_registro = Carbon::now();
                    list($fecha_registro,$hora_registro) = explode(' ', $fecha_hora_registro);
                    $ubch = new Ubch;
                    $ubch->codigo_cne = $mesa->codigo_cne;
                    $ubch->numero_mesas = $centro->count();
                    $ubch->cantidad_electores = $centro->sum('cant_electores');
                    $ubch->nombre_ubch = $nombre_ubch;
                    $ubch->id_municipio = $mesa->id_municipio;
                    $ubch->id_parroquia = $mesa->id_parroquia;
                    $ubch->direccion_ubch = $direccion_ubch;
                    $ubch->estatus = 0;
                    $ubch->id_clp = $user['id_clp'];
                    $ubch->fecha_registro = $fecha_registro;
                    $ubch->hora_registro = $hora_registro;  
                    $ubch->eliminar = 0;

                    if($ubch->save())
                    {
                        foreach ($centro as $key => $c) 
                        {
                            $nuevaMesa = new Mesa;
                            $nuevaMesa->codigo_mesa = mt_rand(); 
                            $nuevaMesa->id_ubch = $ubch->id_ubch;
                            $nuevaMesa->id_municipio = $ubch->id_municipio;
                            $nuevaMesa->id_parroquia = $ubch->id_parroquia;
                            $nuevaMesa->cod_cne = $mesa->codigo_cne;
                            $nuevaMesa->mesa = $c->mesa;
                            $nuevaMesa->tomo = $c->tomo;
                            $nuevaMesa->desde = $c->desde;
                            $nuevaMesa->hasta = $c->hasta;
                            $nuevaMesa->cant_electores = $c->cant_electores;
                            $nuevaMesa->tecnologia = $c->tecnologia;
                            $nuevaMesa->estatus = $c->estatus;
                            $nuevaMesa->save();
                        }

                        $mesas_cne_conteo = $centro->count();
                        $mesas_ubch_conteo = Mesa::where('cod_cne',$mesa->codigo_cne)->count();

                        if($mesas_cne_conteo == $mesas_ubch_conteo)
                        {
                            $mesa->estatus = 1;
                            if($mesa->save())
                            {
                                $responsable = UbchResponsable::where('cedula',$cedula)->first();

                                if(!$responsable)
                                {
                                    $carbon = Carbon::now();
                                    $fecha_hora_registro = $carbon;
                                    list($fecha_registro,$hora_registro) = explode(' ', $fecha_hora_registro);
                                    $responsable = new UbchResponsable;
                                    $responsable->id_municipio = $datos_cne->municipio;
                                    $responsable->id_parroquia = $datos_cne->parroquia;
                                    $responsable->direccion = '';
                                    $responsable->id_ubch = $nuevaMesa->id_ubch;
                                    $responsable->nacionalidad = $datos_cne->tipo;
                                    $responsable->cedula = $cedula;
                                    $responsable->nombre_apellido = $datos_cne->nombre_1.' '.$datos_cne->apellido_1;
                                    $responsable->email = '';
                                    $responsable->telefono_1 = '';
                                    $responsable->telefono_2 = '';
                                    $responsable->vehiculo = 0;
                                    $responsable->id_instituciones = $id_institucion;
                                    $responsable->id_partidos = $id_partido;
                                    $responsable->id_estructura = $id_estructura;
                                    $responsable->fecha_registro = $fecha_registro;
                                    $responsable->hora_registro = $hora_registro;
                                    $responsable->eliminar = 0;

                                    if($responsable->save())
                                    {
                                        $clave = password_hash($password, PASSWORD_DEFAULT);
                                        $user = User();

                                        $usuario = new Usuario;
                                        $usuario->name = $datos_cne->nombre_1.' '.$datos_cne->apellido_1;
                                        $usuario->email = $email;
                                        $usuario->password = $clave;
                                        $usuario->role = 'ubch';
                                        $usuario->id_instituciones = $id_institucion;
                                        $usuario->id_municipio = $datos_cne->municipio;
                                        $usuario->id_parroquia = $datos_cne->parroquia;
                                        $usuario->id_municipal = 0;
                                        $usuario->id_clp = $user['id_clp'];
                                        $usuario->id_ubch = $ubch->id_ubch;
                                        $usuario->id_patrullero = 0;
                                        $usuario->created_at = $carbon;
                                        $usuario->updated_at = $carbon;
                                        $usuario->estatus = 0;
                                        
                                        if($usuario->save())
                                        {
                                            Success('centros/','UBCH registrado.');
                                        }
                                        else
                                        {
                                            Error('centros/','Error al ingresar usuario de centro.');
                                        }
                                    }
                                    else
                                    {
                                        Error('centros/','Error al ingresar Responsable de centro.');
                                    }
                                }
                                else
                                {
                                    Error('centros/','Esta persona ya es responsable de un centro.');
                                }
                            }
                            else
                            {
                                $ubch = Ubch::where('codigo_cne',$mesa->codigo_cne)->first();
                                $ubch->delete();

                                $mesasCreadas = Mesa::where('cod_cne',$mesa->codigo_cne)->get();

                                foreach ($mesasCreadas as $key => $c) 
                                {
                                    $c->delete();
                                }

                                Error('centros/busqueda','Error al ingresar ubch, los cambios se va a desahcer.');
                            }
                        }
                        else
                        {
                            $ubch = Ubch::where('codigo_cne',$mesa->codigo_cne)->first();
                            $ubch->delete();

                            $mesasCreadas = Mesa::where('cod_cne',$mesa->codigo_cne)->get();

                            foreach ($mesasCreadas as $key => $c) 
                            {
                                $c->delete();
                            }

                            Error('centros/busqueda','Error al ingresar ubch.');
                        }
                    }
                    else
                    {
                        Error('centros/busqueda','Error al ingresar ubch.');
                    }
            }
            else
            {
                Error('centros','Centro ya esta asignado.');
            }
        }
    }

    public function show($id)
    {
        $ubch = Ubch::find($id);
        $responsable = $ubch->responsable;
        $solicitudes_comunicaciones = $ubch->solicitudes_comunicaciones;
        $problematicas = $ubch->problematicas;
        $solicitudes = $ubch->solicitudes;
        $mesas = $ubch->centro_mesas;
        $unoxdiezpadrinos = $ubch->unoxdiez_padrinos;
        //Arr($unoxdiezpadrinos);
        View(compact('ubch','responsable','solicitudes_comunicaciones','problematicas','solicitudes','mesas','unoxdiezpadrinos'));
    }

    public function edit($id)
    {
        View(compact('id'));
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}