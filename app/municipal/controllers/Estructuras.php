<?php
namespace App\municipal\controllers;

use App\Estructura;

class EstructurasMuni
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        $estructuras = Estructura::orderBy('nombre')->where('eliminar',0)->get();
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
            Success('estructurasMuni','Institución ingresada con exito.');
        }
        else
        {
            Error('estructurasMuni','Error al ingresar Institución.');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $estructura = Estructura::find($id);
        View(compact('estructura'));
    }

    public function update($id)
    {
        extract($_POST);

        $Estructura = Estructura::find($id);
        $Estructura->nombre = $nombre;

        if($Estructura->save())
        {
            Success('estructurasMuni','Institución actualizada con exito.');
        }
        else
        {
            Error('estructurasMuni','Error al actualizar institución.');
        }
    }

    public function destroy($id)
    {
        echo $id;
        $partido = Estructura::find($id);
        $partido->eliminar = 1;
        
        if($partido->save())
        {
            Success('estructurasMuni','Partido eliminado.');
        }
        else
        {
            Error('estructurasMuni','Error al borrar partido.');
        }
    }
}