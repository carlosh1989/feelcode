<?php
namespace App\municipal\controllers;

use App\Cne;
use App\Ubch;
use App\UbchUnoxDiez;
use App\UbchUnoxDiezIntegrantes;

class UnoxdiezintegrantesMunicipal
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
        $unoxdiez_datos = UbchUnoxDiez::find($id_ubch_registro_unoxdiez);

        $conteoUnoxdiez = UbchUnoxDiezIntegrantes::all();
        $ubch = Ubch::find($unoxdiez_datos->id_ubch);

        $user = User();

        if($datos_cne)
        {
            if($datos_cne->municipio == $ubch->id_municipio AND $datos_cne->parroquia == $ubch->id_parroquia)
            {
                if($unoxdiezintegrante_existe)
                {
                    Error('unoxdiezintegrantesMunicipal/create/'.$id_ubch_registro_unoxdiez,'Esta persona ya es un Patrullado de un 1x10.');
                }
                else
                {
                    $padrino = new UbchUnoxDiezIntegrantes;
                    $padrino->id_ubch_registro_unoxdiez = $id_ubch_registro_unoxdiez;
                    $padrino->id_municipio = $datos_cne->municipio;
                    $padrino->id_parroquia = $datos_cne->parroquia;
                    $padrino->id_ubch = $unoxdiez_datos->id_ubch;
                    $padrino->nombre = $datos_cne->nombre_1;
                    $padrino->apellido = $datos_cne->apellido_1;
                    $padrino->telefono_1 = $telefono_1;
                    $padrino->telefono_2 = $telefono_2;
                    $padrino->cedula = $cedula;
                    $padrino->direccion = $direccion;

                    if($padrino->save())
                    {
                        Success('unoxdiezMunicipal/'.$id_ubch_registro_unoxdiez,'Patrullado de 1x10 creado con exito.!');

                    }
                    else
                    {
                        Error('unoxdiezMunicipal/'.$id_ubch_registro_unoxdiez,'Error al crear Patrullado de 1x10.');
                    }
                }
            }
            else
            {
                Error('unoxdiezintegrantesMunicipal/create/'.$id_ubch_registro_unoxdiez,'No Pertenece a la misma zona del centro de votación.');
            }
        }
        else
        {
            Error('unoxdiezintegrantesMunicipal/create/'.$id_ubch_registro_unoxdiez,'No se encuentra en el registro CNE.');
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
            Success('unoxdiezUbch/'.$id_ubch_registro_unoxdiez,'Ahijado borrado con exito.');
        }
        else
        {
            Success('unoxdiezUbch/'.$id_ubch_registro_unoxdiez,'Erroral borrar ahijado.');
        }
    }
}