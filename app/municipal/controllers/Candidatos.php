<?php
namespace App\municipal\controllers;

class Candidatos
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        View();
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
}