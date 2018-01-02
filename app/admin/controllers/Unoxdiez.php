<?php
namespace App\admin\controllers;

use App\Cne;
use App\UbchUnoxDiez;

class UnoxdiezAdmin
{
    function __construct()
    {
        Role('admin');
    }

    public function index()
    {
        View();
    }

    public function create()
    {
        View();
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

        if($datos_cne)
        {
            if($datos_cne->municipio == $user['id_municipio'] AND $datos_cne->parroquia == $user['id_parroquia'])
            {
                if($unoxdiez_existe)
                {
                    Error('centrosAdmin/'.$user['id_ubch'],'Esta persona ya es padrino de un 1x10.');
                }
                else
                {
                    $padrino = new UbchUnoxDiez;
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
                        Success('centrosAdmin/'.$user['id_ubch'],'Padrino de 1x10 creado con exito.!');
                    }
                    else
                    {
                        Error('centrosAdmin/'.$user['id_ubch'],'Error al crear padrino de 1x10.');
                    }
                }
            }
            else
            {
                Error('unoxdiezAdmin/busqueda','No Pertenece a la misma zona del centro de votación.');
            }
        }
        else
        {
            Error('unoxdiezAdmin/busqueda','No se encuentra en el registro CNE.');
        }
        //View();
    }

    public function show($id)
    {
        $padrino = UbchUnoxDiez::find($id);
        //Arr($padrino->unoxdiez_ahijados);
        $ahijados = $padrino->unoxdiez_ahijados;
        View(compact('ahijados','padrino'));
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