<?php
namespace App\municipal\controllers;

use App\ClpResponsable;
use App\Cne;
use App\Institucion;
use App\Ubch;
use App\Usuario;
use App\admin\controllers\RegistroUbch;
use Carbon\Carbon;
use System\core\BaseController;
use System\tools\rounting\Redirect;
use System\tools\session\User;

class CuentasUbchMunicipal extends BaseController
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        Redirect::to('municipal/clps');
    }

    public function create()
    {
        //Arr($usuario);
        $usuario = User();
        $centros = Ubch::where('id_municipio',$usuario['id_municipio'])
        ->where('id_parroquia',$usuario['id_parroquia'])
        ->get();

        //Arr($ubch);
        $organismos = Institucion::orderBy('nombre', 'desc')->get();
        View(compact('centros','organismos'));
    }

    public function store()
    {
        extract($_POST);
        //Arr($_POST);
        $clave = password_hash($password, PASSWORD_DEFAULT);
        $user = User();

        $usuario_existe = Usuario::where('email',$email)->first();
        $datos_cne = Cne::where('cedula',$cedula)->first();

        $carbon = Carbon::now();
        $fecha_hora_registro = $carbon;
        list($fecha_registro,$hora_registro) = explode(' ', $fecha_hora_registro);

        if($datos_cne)
        {
            if(!$usuario_existe)
            {
                $usuario = new Usuario;
                $usuario->name = $datos_cne->nombre_1.' '.$datos_cne->apellido_1.'';
                $usuario->email = $email;
                $usuario->password = $clave;
                $usuario->role = 'clp';
                $usuario->id_instituciones = $id_instituciones;
                $usuario->id_municipio = $datos_cne->municipio;
                $usuario->id_parroquia = $datos_cne->parroquia;
                $usuario->id_municipal = $user['id_municipal'];
                $usuario->id_clp = 0;
                $usuario->id_ubch = 0;
                $usuario->id_patrullero = 0;
                $usuario->created_at = Carbon::now();
                $usuario->updated_at = Carbon::now();
                $usuario->estatus = 0;
                
                if($usuario->save())
                {
                    $clp = Usuario::find($usuario->id);
                    $clp->id_clp = $clp->id;

                    if($clp->save())
                    {
                        $responsable = new ClpResponsable;
                        $responsable->id_clp = $clp->id_clp;
                        $responsable->id_usuario = $clp->id;
                        $responsable->id_municipal = $user['id_municipal'];
                        $responsable->id_municipio = $datos_cne->municipio;
                        $responsable->id_parroquia = $datos_cne->parroquia;
                        $responsable->nombre_apellido = $datos_cne->nombre_1.' '.$datos_cne->apellido_1;
                        $responsable->cedula = $cedula;
                        $responsable->telefono_1 = $telefono_1;
                        $responsable->telefono_2 = $telefono_2;
                        $responsable->fecha_registro = $fecha_registro;
                        $responsable->hora_registro = $hora_registro;
                        $responsable->id_instituciones = $id_instituciones;

                        if($responsable->save())
                        {
                            Success('clps','Agregado Clp con exito!');
                        }
                        else
                        {
                            Error('CuentasUbchMunicipal/create','Error al crear la cuenta.');
                        }
                    }
                    else
                    {
                        Error('CuentasUbchMunicipal/create','Error al crear la cuenta.');
                    }
                    //Success('clps','La cuenta fue creada.');
                }
                else
                {
                    Error('CuentasUbchMunicipal/create','Error al crear la cuenta.');
                }
            }
            else
            {
                Error('CuentasUbchMunicipal/create','Nombre de usuario ya esta en uso.!');
            }
        }
        else
        {
            Error('CuentasUbchMunicipal/create','Esta persona no esta registrada en el CNE.');
        }
    }

    public function show($id)
    {

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