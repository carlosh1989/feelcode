<?php
namespace App\admin\controllers;

use App\Mesa;
use App\MesasCne;
use App\Ubch;
use Carbon\Carbon;

class CentrosAdmin
{
    function __construct()
    {
        Role('admin');
    }

    public function index()
    {
        $user = User();
        $centros = Ubch::where('id_municipio',$user['id_municipio'])
        ->where('id_parroquia',$user['id_parroquia'])
        ->orderBy('id_ubch', 'DESC')
        ->get();

        View(compact('centros'));
    }

    public function create()
    {
        $user = User();
        $mesas_cne = MesasCne::where('id_municipio',$user['id_municipio'])
        ->where('id_parroquia',$user['id_parroquia'])
        ->where('mesa',1)
        ->where('estatus',0)
        ->get();
        //Arr($mesas_cne);
        View(compact('mesas_cne'));
    }

    public function store()
    {
        extract($_POST);
        extract($_GET);

        $user = User();

        $mesa = MesasCne::where('id_mesas_cne',$id_mesa)->first();
        $centro = MesasCne::where('codigo_cne',$mesa->codigo_cne)->get();


        $existeUbch = Ubch::where('nombre_ubch',$mesa->nombre)
        ->where('id_municipio',$mesa->id_municipio)
        ->where('id_parroquia',$mesa->id_parroquia)
        ->first();

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
            $ubch->id_municipio = $user['id_municipio'];
            $ubch->id_parroquia = $user['id_parroquia'];
            $ubch->direccion_ubch = $direccion_ubch;
            $ubch->estatus = 0;
            $ubch->id_clp = 0;
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
                        Success('centrosResponsablesAdmin/busqueda/'.$ubch->id,'UBCH registrado, porceda a ingresar responsable.');
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

                        Error('centrosAdmin/create','Error al ingresar ubch.');
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

                    Error('centrosAdmin/create','Error al ingresar ubch.');
                }
            }
            else
            {
                Error('centrosAdmin/create','Error al ingresar ubch.');
            }
        }
        else
        {
            Error('centrosAdmin/create','El Centro ya existe.');
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