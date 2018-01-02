<?php
namespace App\admin\controllers;

use App\Institucion;

class Instituciones
{
    function __construct()
    {
        Role('admin');
    }

    public function index()
    {
        $instituciones = Institucion::where('eliminar',0)->get();
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
            Success('instituciones','Institución ingresada con exito.');
        }
        else
        {
            Error('instituciones','Error al ingresar Institución.');
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
            Success('instituciones','Institución actualizada con exito.');
        }
        else
        {
            Error('instituciones','Error al actualizar institución.');
        }
    }

    public function destroy($id)
    {
        echo $id;
        $partido = Institucion::find($id);
        $partido->eliminar = 1;
        
        if($partido->save())
        {
            Success('instituciones','Partido eliminado.');
        }
        else
        {
            Error('instituciones','Error al borrar partido.');
        }
    }
}