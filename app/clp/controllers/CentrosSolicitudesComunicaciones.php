<?php
namespace App\clp\controllers;

use App\Cne;
use App\Estructura;
use App\Institucion;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\Partido;
use App\UbchSolicitudComunicacion;

class CentrosSolicitudesComunicaciones
{
    function __construct()
    {
        Role('clp');
    }

    public function busqueda()
    {
        $id_ubch = Uri(5);
        View(compact('id_ubch'));
    }

    public function index()
    {
        //View();
    }

    public function create()
    {
        extract($_POST);
        $datos_cne = Cne::where('cedula',$cedula)->first();

        if($datos_cne)
        {
            $instituciones = Institucion::all();
            $partidos = Partido::all();   
            $estructura = Estructura::all();     
            $municipios = MunicipioCne::all();
            $municipio = MunicipioCne::find($datos_cne->municipio);
            $parroquias = ParroquiaCne::all();
            $municipio = ParroquiaCne::find($datos_cne->parroquia);   
        }
        else
        {
            $instituciones = Institucion::all();
            $partidos = Partido::all();   
            $estructura = Estructura::all();     
            $municipios = MunicipioCne::all();
            $municipio = "";
            $parroquias = ParroquiaCne::all();
            $municipio = "";;
        }

        View(compact('datos_cne','ubch','instituciones','partidos','estructura','id_ubch','municipio','municipios','cedula')); 
    }

    public function store()
    {
        //Arr($_POST);
        extract($_POST);

        $requerimientos = new UbchSolicitudComunicacion;
        $requerimientos->nombre_apellido  = $nombre_apellido;
        $requerimientos->cedula = $cedula;
        $requerimientos->telefono = $telefono;
        $requerimientos->id_ubch =$id_ubch;
        $requerimientos->estatus = 0;
        $requerimientos->eliminar = 0;  

        if($requerimientos->save())
        {
            Success('centros/'.$id_ubch.'','Solicitud ingresada con exito.');
        }
        else
        {
            Success('centros/'.$id_ubch.'','Error al insertar solicitud de comunicación.');
        }
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
        $requerimientos = UbchSolicitudComunicacion::find($id);

        if($requerimientos->delete())
        {
            Success('centros/'.$requerimientos->centro->id_ubch.'','Solicitud borrada con exito.');
        }
        else
        {
            Success('centros/'.$requerimientos->centro->id_ubch.'','Error al borrar la solicitud.');
        }

    }
}