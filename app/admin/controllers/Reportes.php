<?php
namespace App\admin\controllers;

use App\CentroClp;
use App\MesasCne;
use App\ParroquiaCne;
use App\Tipo;
use App\Ubch;
use App\UbchUnoxDiez;
use Dompdf\Dompdf;

class Reportes
{
    function __construct()
    {
        Role('admin');
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

    public function clp()
    {
        extract($_GET);
        
        if(isset($id_municipio) and $id_municipio)
        {
            if(isset($id_parroquia) and $id_parroquia)
            {
                if(isset($id_mesa) and $id_mesa)
                {
                    $clps = CentroClp::orderBy('nombre', 'DESC')
                    ->where('id_municipio',$id_municipio)
                    ->where('id_parroquia',$id_parroquia)
                    ->where('id_mesa',$id_mesa)
                    ->get();
                }
                else
                {
                    $clps = CentroClp::orderBy('nombre', 'DESC')
                    ->where('id_municipio',$id_municipio)
                    ->where('id_parroquia',$id_parroquia)
                    ->get();
                }
            }
            else
            {

                $clps = CentroClp::orderBy('nombre', 'DESC')
                ->where('id_municipio',$id_municipio)
                ->get();
            }
        }
        else
        {
            $clps = CentroClp::orderBy('nombre', 'DESC')->get();
        }


        View(compact('clps'));
        //Arr($clps);
    }

    public function ubch()
    {
        extract($_GET);
        
        if(isset($id_municipio) and $id_municipio)
        {
            if(isset($id_parroquia) and $id_parroquia)
            {
                if(isset($id_mesa) and $id_mesa)
                {
                    $ubchs = Ubch::orderBy('nombre_ubch', 'DESC')
                    ->where('id_municipio',$id_municipio)
                    ->where('id_parroquia',$id_parroquia)
                    ->where('id_mesa',$id_mesa)
                    ->get();
                }
                else
                {
                    $ubchs = Ubch::orderBy('nombre_ubch', 'DESC')
                    ->where('id_municipio',$id_municipio)
                    ->where('id_parroquia',$id_parroquia)
                    ->get();
                }
            }
            else
            {

                $ubchs = Ubch::orderBy('nombre_ubch', 'DESC')
                ->where('id_municipio',$id_municipio)
                ->get();
            }
        }
        else
        {
            $ubchs = Ubch::orderBy('nombre_ubch', 'DESC')->get();
        }

        View(compact('ubchs'));
        //Arr($ubchs);
    }

     public function patrullero()
    {
        $unox10 = UbchUnoxDiez::orderBy('id_ubch', 'DESC')->get();
        View(compact('unox10'));
        //Arr($unox10);
    }

    public function abiertasPDF2()
    {
        // reference the Dompdf namespace
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
       // $solicitudes = Solicitud::orderBy('id', 'DESC')->where('estatus',1)->get();
        ob_start();
        include('app/admin/views/reportes/abiertas.php');

        $dompdf->loadHtml(ob_get_clean());
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function abiertasPDF()
    {
        extract($_GET);

        if(isset($tipo))
        {
            $solicitudes = Solicitud::orderBy('id', 'DESC')
            ->where('tipo_solicitud_id',$tipo)
            ->where('estatus',2)
            ->get();
            $tipo_seleccion = Tipo::find($tipo);
        }
        else
        {
            $solicitudes = Solicitud::orderBy('id', 'DESC')
            ->where('estatus',2)
            ->get();
            $tipo_seleccion = "";
        }
        
        $tipos = Tipo::all();
        ob_start();
        include('app/admin/views/reportes/abiertas.php');
        $dompdf = new Dompdf();
        $baseUrl = baseUrl;
        $dompdf->setBasePath($baseUrl); // This line resolve
        $dompdf->loadHtml(ob_get_clean());
        $dompdf->setPaper('letter', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function lista_pensionados()
    {
        $pensionados = Pensionado::all();
        $mpdf = new \mPDF('','Letter',11,'arial');
        ob_start();
        include('app/admin/views/reportes/encabezado.php');
        $mpdf->SetHTMLHeader(ob_get_clean());
        $mpdf->SetHTMLFooter('
        <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>
        <td width="80%"><span style="font-weight: bold; font-style: italic;">Nota: De uso Exclusivo para la Distribución de PDVAL.</span></td>
        <td width="20%" style="text-align: right; ">{PAGENO}/{nbpg}</td>
        </tr></table>

        ');
        $mpdf->AddPage('', // L - landscape, P - portrait 
        '', '', '', '',
        5, // margen izquierdo
        5, // margen derecho
        40, // margin arriba
        5, // margin abajo
        0, // margin encabezado
        0); // margin pie de pagina

        ob_start();
        include("app/admin/views/reportes/pensionados.php");
        $mpdf->WriteHTML(ob_get_clean(),2);
        $nombre = "Pensionados.pdf";
        $mpdf->Output($nombre,'D');
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
}