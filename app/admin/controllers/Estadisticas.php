<?php
namespace App\admin\controllers;

use App\Solicitud;
use App\admin\models\EstadisticasModel;
use Controller,View,Token,Session,Arr,Message,Redirect;

class Estadisticas extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$abiertas = Solicitud::where('estatus',1)->count();
    	$aprobadas = Solicitud::where('estatus',2)->count();
    	$rechazadas = Solicitud::where('estatus',3)->count();
    	View(compact('abiertas','aprobadas','rechazadas'));
    }
}