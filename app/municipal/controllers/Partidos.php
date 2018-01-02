<?php
namespace App\municipal\controllers;

use App\Partido;

class PartidosMuni
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        $partidos = Partido::orderBy('nombre')->where('eliminar',0)->get();
        View(compact('partidos'));
    }

    public function create()
    {
        View();
    }

    public function store()
    {
        extract($_POST);

        $institucion = new Partido;
        $institucion->nombre = $nombre;
        $institucion->eliminar = 0;

        if($institucion->save())
        {
            Success('partidosMuni','Institución ingresada con exito.');
        }
        else
        {
            Error('partidosMuni','Error al ingresar Institución.');
        }
    }

    public function show($id)
    {

    } 

    public function edit($id)
    {
        $institucion = Partido::find($id);
        View(compact('institucion'));
    }

    public function update($id)
    {
        extract($_POST);

        $institucion = Partido::find($id);
        $institucion->nombre = $nombre;

        if($institucion->save())
        {
            Success('partidosMuni','Institución actualizada con exito.');
        }
        else
        {
            Error('partidosMuni','Error al actualizar institución.');
        }
    }

    public function destroy($id)
    {
        echo $id;
        $partido = Partido::find($id);
        $partido->eliminar = 1;
        
        if($partido->save())
        {
            Success('partidosMuni','Partido eliminado.');
        }
        else
        {
            Error('partidosMuni','Error al borrar partido.');
        }
    }
}