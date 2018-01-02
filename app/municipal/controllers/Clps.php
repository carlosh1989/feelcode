<?php
namespace App\municipal\controllers;

use App\Usuario;

class Clps
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        $user = User();
        $clps = Usuario::orderBy('name')->where('id_municipal',$user['id_municipal'])
        ->where('role','clp')
        ->get();
        //Arr($clps);
        View(compact('clps'));
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
        $usuario = Usuario::find($id);
        $centros = $usuario->centros->sortBy("name");;
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