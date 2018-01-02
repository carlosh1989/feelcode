<?php
namespace App\admin\controllers;

use App\Partido;

class Partidos
{
    function __construct()
    {
        Role('admin');
    }

    public function index()
    {
        $partidos = Partido::where('eliminar',0)->get();
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
            Success('partidos','Institución ingresada con exito.');
        }
        else
        {
            Error('partidos','Error al ingresar Institución.');
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
            Success('partidos','Institución actualizada con exito.');
        }
        else
        {
            Error('partidos','Error al actualizar institución.');
        }
    }

    public function destroy($id)
    {
        echo $id;
        $partido = Partido::find($id);
        $partido->eliminar = 1;
        
        if($partido->save())
        {
            Success('partidos','Partido eliminado.');
        }
        else
        {
            Error('partidos','Error al borrar partido.');
        }
    }
}