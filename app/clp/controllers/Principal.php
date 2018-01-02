<?php
namespace App\clp\controllers;

use App\clp\models\PrincipalModel;
use Controller,View,Token,Session,Arr,Message,Redirect;

class Principal extends Controller
{
    function __construct()
    {
        parent::__construct();
        Role('clp');
    }


    public function index()
    {
		Redirect::to('clp/centros');
    }
}