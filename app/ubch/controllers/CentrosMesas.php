<?php
namespace App\ubch\controllers;

use App\Mesa;

class CentrosMesasUbch
{
    function __construct()
    {
        Role('ubch');
    }

    public function index()
    {
        //View();
        echo mt_rand();
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
        $mesa = Mesa::find($id);
        $testigos = $mesa->testigos;
        View(compact('mesa','testigos'));
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