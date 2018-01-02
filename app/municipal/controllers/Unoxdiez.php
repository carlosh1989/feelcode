<?php
namespace App\municipal\controllers;

use App\Cne;
use App\Ubch;
use App\UbchUnoxDiez;
use App\Usuario;
use Carbon\Carbon;

class UnoxdiezMunicipal
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        View();
    }

    public function create()
    {
        $id_ubch = Uri(5);
        View(compact('id_ubch'));
    }

    public function busqueda()
    {
        View();
    }

    public function store()
    {
        extract($_POST);
        //Arr($_POST);

        $datos_cne = Cne::where('cedula',$cedula)->first();
        $unoxdiez_existe = UbchUnoxDiez::where('cedula',$cedula)->first();
        $user = User();

        $ubch = Ubch::find($id_ubch);

        //Arr($ubch);

        $usuario_existe = Usuario::where('email',$email)->first();

        if(!$usuario_existe)
        {
            if($datos_cne)
            {
                if($datos_cne->municipio == $ubch->id_municipio AND $datos_cne->parroquia == $ubch->id_parroquia)
                {
                    if($unoxdiez_existe)
                    {
                        Error('centrosMunicipal/'.$id_ubch,'Esta persona ya es patrullero de un 1x10.');
                    }
                    else
                    {
                        $padrino = new UbchUnoxDiez;
                        $padrino->id_municipio = $user['id_municipio'];
                        $padrino->id_parroquia = $user['id_parroquia'];
                        $padrino->id_ubch = $id_ubch;
                        $padrino->nombre = $datos_cne->nombre_1;
                        $padrino->apellido = $datos_cne->apellido_1;
                        $padrino->telefono_1 = $telefono_1;
                        $padrino->telefono_2 = $telefono_2;
                        $padrino->cedula = $cedula;
                        $padrino->direccion = $direccion;

                        if($padrino->save())
                        {
                            $clave = password_hash($password, PASSWORD_DEFAULT);
                            $usuario = new Usuario;
                            $usuario->name = $datos_cne->nombre_1.''.$datos_cne->apellido_1;
                            $usuario->email = $email;
                            $usuario->password = $clave;
                            $usuario->role = 'patrullero';
                            $usuario->id_instituciones = 0;
                            $usuario->id_municipio = $user['id_municipio'];
                            $usuario->id_parroquia = $user['id_parroquia'];
                            $usuario->id_municipal = 0;
                            $usuario->id_clp = 0;
                            $usuario->id_ubch = $user['id_ubch'];
                            $usuario->id_patrullero = $padrino->id_ubch_registro_unoxdiez;
                            $usuario->created_at = Carbon::now();
                            $usuario->updated_at = Carbon::now();
                            $usuario->estatus = 0;

                            if($usuario->save())
                            {
                                Success('centrosMunicipal/'.$id_ubch,'Patrullero de 1x10 creado con exito.!');
                            }
                            else
                            {
                                Error('centrosMunicipal/'.$id_ubch,'Error al crear Patrullero de 1x10.');
                            }
                        }
                        else
                        {
                            Error('centrosMunicipal/'.$id_ubch,'Error al crear Patrullero de 1x10.');
                        }
                    }
                }
                else
                {
                    Error('unoxdiezMunicipal/create/'.$id_ubch,'No Pertenece a la misma zona del centro de votación.');
                }
            }
            else
            {
                Error('unoxdiezMunicipal/create','No se encuentra en el registro CNE.');
            }
        }
        else
        {
            Error('unoxdiezMunicipal/create','Nombre de usuario ya en uso.!');
        }

        //View();
    }

    public function show($id)
    {
        $padrino = UbchUnoxDiez::find($id);
        $id_ubch_registro_unoxdiez = $id;
        //Arr($padrino->unoxdiez_ahijados);
        $ahijados = $padrino->unoxdiez_ahijados;
        View(compact('ahijados','padrino','id_ubch_registro_unoxdiez'));
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