<?php
namespace App\patrullero\controllers;

use App\Cne;
use App\UbchUnoxDiez;
use App\UbchUnoxDiezIntegrantes;

class Patrullados
{
    function __construct()
    {
        Role('patrullero');
    }

    public function index()
    {
        $user = User();
        $patrullados = UbchUnoxDiezIntegrantes::where('id_ubch_registro_unoxdiez',$user['id_patrullero'])
        ->get();
        View(compact('patrullados'));
    }

    public function create()
    {
        View();
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
                if($unoxdiezintegrante_existe)
                {
                    Error('unoxdiezintegrantesUbch/create/','Esta persona ya es un Patrullado de un 1x10.');
                }
                else
                {
                    $padrino = new UbchUnoxDiezIntegrantes;
                    $padrino->id_ubch_registro_unoxdiez = $user['id_patrullero'];
                    $padrino->id_municipio = $user['id_municipio'];
                    $padrino->id_parroquia = $user['id_parroquia'];
                    $padrino->id_ubch = $user['id_ubch'];
                    $padrino->nombre = $datos_cne->nombre_1;
                    $padrino->apellido = $datos_cne->apellido_1;
                    $padrino->telefono_1 = $telefono_1;
                    $padrino->telefono_2 = $telefono_2;
                    $padrino->cedula = $cedula;
                    $padrino->direccion = $direccion;

                    if($padrino->save())
                    {
                        Success('patrullados/','Patrullado de 1x10 creado con exito.!');
                    }
                    else
                    {
                        Error('patrullados/','Error al crear Patrullado de 1x10.');
                    }
                }
            }
            else
            {
                Error('patrullados/create/','No Pertenece a la misma zona del centro de votación.');
            }
        }
        else
        {
            Error('patrullados/create/','No se encuentra en el registro CNE.');
        }
        //View();
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
        extract($_GET);
        $ahijado = UbchUnoxDiezIntegrantes::find($id);

        if($ahijado->delete())
        {
            Success('patrullados/','Ahijado borrado con exito.');
        }
        else
        {
            Success('patrullados/','Erroral borrar ahijado.');
        }
    }
}