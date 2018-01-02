<?php
namespace App\clp\controllers;

use App\Cne;
use App\UbchUnoxDiez;
use App\UbchUnoxDiezIntegrantes;

class Unoxdiezintegrantes
{
    function __construct()
    {
        Role('clp');
    }

    public function index()
    {
        View();
    }

    public function create()
    {
        $id_ubch_registro_unoxdiez = Uri(5);
        View(compact('id_ubch_registro_unoxdiez'));
    }

    public function store()
    {
        extract($_POST);
        //Arr($_POST);

        $datos_cne = Cne::where('cedula',$cedula)->first();
        $unoxdiezintegrante_existe = UbchUnoxDiezIntegrantes::where('cedula',$cedula)->first();
        $unoxdiez_existe = UbchUnoxDiez::where('cedula',$cedula)->first();

        $conteoUnoxdiez = UbchUnoxDiezIntegrantes::all();
        $user = User();

        if($datos_cne)
        {
            if($datos_cne->municipio == $user['id_municipio'] AND $datos_cne->parroquia == $user['id_parroquia'])
            {
                if($unoxdiez_existe)
                {
                    Error('centros/'.$user['id_ubch'],'Esta persona ya es padrino de un 1x10.');
                }
                else
                {
                    if($unoxdiezintegrante_existe)
                    {
                        Error('unoxdiezintegrantes/create/'.$id_ubch_registro_unoxdiez,'Esta persona ya es ahijado de un 1x10.');
                    }
                    else
                    {
                        if($conteoUnoxdiez->count() > 1)
                        {
                            Error('unoxdiez/'.$id_ubch_registro_unoxdiez,'Error al crear ahijado de 1x10.');
                        }
                        else
                        {
                            $padrino = new UbchUnoxDiezIntegrantes;
                            $padrino->id_ubch_registro_unoxdiez = $id_ubch_registro_unoxdiez;
                            $padrino->id_municipio = $user['id_municipio'];
                            $padrino->id_parroquia = $user['id_parroquia'];
                            $padrino->id_ubch = $user['id_ubch'];
                            $padrino->nombre = $datos_cne->nombre_1;
                            $padrino->apellido = $datos_cne->apellido_1;
                            $padrino->telefono_1 = $telefono_1;
                            $padrino->telefono_2 = $telefono_2;
                            $padrino->cedula = $cedula;

                            if($padrino->save())
                            {
                                Success('unoxdiez/'.$id_ubch_registro_unoxdiez,'Ahijado de 1x10 creado con exito.!');
                            }
                            else
                            {
                                Error('unoxdiez/'.$id_ubch_registro_unoxdiez,'Error al crear ahijado de 1x10.');
                            }
                        }
                    }
                }
            }
            else
            {
                Error('unoxdiezintegrantes/create/'.$id_ubch_registro_unoxdiez,'No Pertenece a la misma zona del centro de votación.');
            }
        }
        else
        {
            Error('unoxdiezintegrantes/create/'.$id_ubch_registro_unoxdiez,'No se encuentra en el registro CNE.');
        }
        //View();
    }

    public function show($id)
    {
        echo $id;
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
        extract($_GET);
        $ahijado = UbchUnoxDiezIntegrantes::find($id);

        if($ahijado->delete())
        {
            Success('unoxdiez/'.$id_ubch_registro_unoxdiez,'Ahijado borrado con exito.');
        }
        else
        {
            Success('unoxdiez/'.$id_ubch_registro_unoxdiez,'Erroral borrar ahijado.');
        }
    }
}