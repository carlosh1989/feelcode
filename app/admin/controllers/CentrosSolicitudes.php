<?php
namespace App\admin\controllers;

use App\Problematica;
use App\Solicitud;
use App\TipoProblematica;
use App\TipoSolicitud;
use App\Ubch;

class CentrosSolicitudesAdmin
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
        $id_ubch = Uri(5);
        $tipo = TipoSolicitud::all();
        View(compact('id_ubch','tipo')); 
        //Arr($solicitante);
    }


    public function store()
    {
        extract($_GET);
        extract($_POST);
        $ubch = Ubch::find($id_ubch);
       //Arr($_POST); //Array para ver que envia el formulario
        $problematica = new Solicitud;
        $problematica->id_ubch = $id_ubch;
        $problematica->id_municipio = $ubch->id_municipio;
        $problematica->id_parroquia = $ubch->id_parroquia;
        $problematica->direccion = $ubch->direccion_ubch;
        $problematica->id_tipo_solicitud = $tipo;
        $problematica->observaciones = $observacion; 
        $problematica->estatus = 0;

        if($problematica->save())
        {
            Success('centrosAdmin/'.$id_ubch.'','Guardada existosamente...');
        }
        else
        {
             Error('centrosAdmin/'.$id_ubch.'','Vuelva a intentarlo...');
        }
    }

    public function show($id)
    {
        $problema = Solicitud::find($id);
        View(compact('problema'));
       // Arr($problema); 
    }


    public function edit($id)
    {
        $problema = Solicitud::find($id);
        View(compact('problema'));
    }

    public function update($id)
    {
        extract($_POST);
       //Arr($_POST); //Array para ver que envia el formulario
        $solicitud = Solicitud::find($id);
        $solicitud->id_tipo_solicitud = $tipo;
        $solicitud->observaciones = $observacion; 
        $solicitud->estatus = $estatus;

        if($solicitud->save())
        {
            Success('centrosSolicitudesAdmin/'.$solicitud->id_solicitud_ubch.'','Actulizada exitosamente la problematica.');
        }
        else
        {
            Error('centrosSolicitudesAdmin/'.$solicitud->id_solicitud_ubch.'','Error al editar problematica.');
        }
    }

    public function destroy($id)
    {

    }
}