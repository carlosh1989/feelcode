<?php
namespace App\admin\controllers;

use App\Estructura;

class Estructuras
{
    function __construct()
    {
        Role('admin');
    }

    public function index()
    {
        $estructuras = Estructura::where('eliminar',0)->get();
        View(compact('estructuras'));
    }

    public function create()
    {
        View();
    }

    public function store()
    {
        extract($_POST);

        $Estructura = new Estructura;
        $Estructura->nombre = $nombre;
        $Estructura->eliminar = 0;

        if($Estructura->save())
        {
            Success('estructuras','Institución ingresada con exito.');
        }
        else
        {
            Error('estructuras','Error al ingresar Institución.');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $Estructura = Estructura::find($id);
        View(compact('Estructura'));
    }

    public function update($id)
    {
        extract($_POST);

        $Estructura = Estructura::find($id);
        $Estructura->nombre = $nombre;

        if($Estructura->save())
        {
            Success('estructuras','Institución actualizada con exito.');
        }
        else
        {
            Error('estructuras','Error al actualizar institución.');
        }
    }

    public function destroy($id)
    {
        echo $id;
        $partido = Estructura::find($id);
        $partido->eliminar = 1;
        
        if($partido->save())
        {
            Success('estructuras','Partido eliminado.');
        }
        else
        {
            Error('estructuras','Error al borrar partido.');
        }
    }
}