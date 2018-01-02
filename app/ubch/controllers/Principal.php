<?php
namespace App\ubch\controllers;

use System\tools\rounting\Redirect;

class Principal
{
    function __construct()
    {
        Role('ubch');
    }

    public function index()
    {
        $user = User();
        Redirect::to('ubch/centrosUbch');
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