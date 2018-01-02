<?php
namespace App\municipal\controllers;

use App\Institucion;

class InstitucionesMuni
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        $instituciones = Institucion::orderBy('nombre')->where('eliminar',0)->get();
        View(compact('instituciones'));
    }

    public function create()
    {
        View();
    }

    public function store()
    {
        extract($_POST);

        $institucion = new Institucion;
        $institucion->nombre = $nombre;
        $institucion->eliminar = 0;

        if($institucion->save())
        {
            Success('institucionesMuni','Institución ingresada con exito.');
        }
        else
        {
            Error('institucionesMuni','Error al ingresar Institución.');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $institucion = Institucion::find($id);
        View(compact('institucion'));
    }

    public function update($id)
    {
        extract($_POST);

        $institucion = Institucion::find($id);
        $institucion->nombre = $nombre;

        if($institucion->save())
        {
            Success('institucionesMuni','Institución actualizada con exito.');
        }
        else
        {
            Error('institucionesMuni','Error al actualizar institución.');
        }
    }

    public function destroy($id)
    {
        echo $id;
        $partido = Institucion::find($id);
        $partido->eliminar = 1;
        
        if($partido->save())
        {
            Success('institucionesMuni','Partido eliminado.');
        }
        else
        {
            Error('institucionesMuni','Error al borrar partido.');
        }
    }
}