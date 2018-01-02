<?php
namespace App\patrullero\controllers;

use App\clp\models\PrincipalModel;
use Controller,View,Token,Session,Arr,Message,Redirect;

class Principal extends Controller
{
    function __construct()
    {
        parent::__construct();
        Role('patrullero');
    }


    public function index()
    {
        Redirect::to('patrullero/patrullados');
    }
}