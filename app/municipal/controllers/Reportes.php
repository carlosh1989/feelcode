<?php
namespace App\municipal\controllers;

use App\MesasCne;
use App\ParroquiaCne;

class Reportes
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        extract($_GET);
        View(compact('id_municipio','id_parroquia','id_mesa'));
    }

    public function escrutinio()
    {
        extract($_GET);
        View(compact('id_municipio','id_parroquia','id_mesa'));
    }

    public function reporteTiempoReal()
    {
        extract($_GET);
        View(compact('id_municipio','id_parroquia','id_mesa'));
    }

    public function busqueda()
    {
        Arr($_GET);
    }

    public function create()
    {
        View();
    }

    public function store()
    {

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

    public function centrosBusquedaCodigo()
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
            echo '<option value="'.$parroquia->codigo_cne.'">'.$parroquia->nombre.'</option>';
        } 
    }
}