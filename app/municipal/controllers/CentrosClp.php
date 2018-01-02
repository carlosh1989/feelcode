<?php
namespace App\municipal\controllers;

use App\CentroClp;
use App\MesasCne;
use App\ParroquiaCne;
use App\municipal\controllers\CentrosClp;

class CentrosClp
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        View();
    }

    public function parroquiasCne()
    {
        extract($_GET);
        $parroquias = ParroquiaCne::where('id_municipio',$idMunicipio)->get();
        //var_dump($parroquias);
        echo "<option value=''>PARROQUIA</option>";
        echo "<option value=''></option>";
        foreach ($parroquias as $key => $parroquia) {
            echo '<option value="'.$parroquia->id_parroquia.'">'.$parroquia->nombre.'</option>';
        } 
    }

    public function centrosBusqueda()
    {
        extract($_GET);
        $user= User();
        $parroquias = MesasCne::orderBy('nombre', 'DESC')->where('id_municipio',$user['id_municipio'])
        ->where('id_parroquia',$idParroquia)
        ->where('mesa',1)
        ->get();

        //var_dump($parroquias);
        echo "<option value=''>CENTROS</option>";
        echo "<option value=''></option>";
        foreach ($parroquias as $key => $parroquia) {
            echo '<option value="'.$parroquia->id_mesas_cne.'">'.$parroquia->nombre.'</option>';
        } 
    }

    public function create()
    {
        extract($_GET);
        $user = User();
        $id_clp = Uri(5);
        $mesas_cne = MesasCne::where('id_municipio',$user['id_municipio'])
        ->where('mesa',1)
        ->get();
        $id_municipio = $user['id_municipio'];
        //$centrosClp = CentroClp::all();
        View(compact('mesas_cne','id_clp','id_municipio'));
    }

    public function store()
    {
        //Arr($_POST);
        extract($_POST);
        $mesa = MesasCne::find($id_mesa);
        //Arr($mesa);
        $centro_existe = CentroClp::where('codigo_cne',$mesa->codigo_cne)->first();

        if(!$centro_existe)
        {
            $centro = new CentroClp;
            $centro->id_clp = $id_clp;
            $centro->codigo_cne = $mesa->codigo_cne;
            $centro->id_municipio = $mesa->id_municipio;
            $centro->id_parroquia = $mesa->id_parroquia;
            $centro->nombre = $mesa->nombre;
            $centro->direccion = $mesa->direccion;

            if($centro->save())
            {
                Success('clps','Centro asignado con exito!');
            }
            else
            {
                Error('centrosClp/create/'.$id_clp,'Error al asignar centro.');
            }
        }
        else
        {
            Error('centrosClp/create/'.$id_clp,'Ya esta asignado ese centro.');
        }
    }

    public function show($id)
    {
        $id_clp = Uri(4);
        $centros = CentroClp::where('id_clp',$id_clp)->get();
        //Arr($centros);
        View(compact('centros'));
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