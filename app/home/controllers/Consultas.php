<?php
namespace App\home\controllers;

use App\Cne;
use App\FirmaContraMaduro;
use App\HogaresAsignados;
use App\HogaresPorAsignar;
use App\MunicipalResponsable;
use App\PorPensionar;
use App\Profesionales;
use App\YaPensionados;

class Consultas
{
    function __construct()
    {

    }

    public function index()
    {
        extract($_POST);

        if(isset($cedula))
        {
            $datos_cne = Cne::where('cedula',$cedula)->first();

            if($datos_cne)
            {
                $firmo_contra = FirmaContraMaduro::where('cedula',$cedula)->first();
                $hogares_asignados = HogaresAsignados::where('cedula',$cedula)->first();
                $hogares_por_asignar = HogaresPorAsignar::where('cedula',$cedula)->first();
                $por_pensionar = PorPensionar::where('cedula',$cedula)->first();
                $ya_pensionados = YaPensionados::where('cedula',$cedula)->first();
                $profesionales = Profesionales::where('cedula',$cedula)->first();
                $responsable_municipal = MunicipalResponsable::where('cedula',$cedula)->first();

                //Arr($responsable_municipal);
                View(compact('firmo_contra','hogares_asignados','hogares_por_asignar','por_pensionar','ya_pensionados','profesionales','cedula','responsable_municipal'));
            }
            else
            {
                Error('consultas/index','No se encuentra en el Registrado en el CNE');
            }
        }
        else
        {
            $firmo_contra = FirmaContraMaduro::where('cedula',0)->first();
            $hogares_asignados = HogaresAsignados::where('cedula',0)->first();
            $hogares_por_asignar = HogaresPorAsignar::where('cedula',0)->first();
            $por_pensionar = PorPensionar::where('cedula',0)->first();
            $ya_pensionados = YaPensionados::where('cedula',0)->first();
            $profesionales = Profesionales::where('cedula',0)->first();
            $responsable_municipal = MunicipalResponsable::where('cedula',0)->first();

            View(compact('firmo_contra','hogares_asignados','hogares_por_asignar','por_pensionar','ya_pensionados','profesionales','cedula','responsable_municipal'));
        }
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