<?php
namespace App\clp\controllers;

use App\Cne;
use App\Estructura;
use App\Institucion;
use App\Mesa;
use App\MesaTestigo;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\Partido;
use App\TipoProblematica;
use App\Ubch;
use Dompdf\Dompdf;

class CentrosTestigos
{
    function __construct()
    {
        Role('clp');
    }

    public function busqueda()
    {
        $id_mesa = Uri(5);
        $tipo = TipoProblematica::all();
        View(compact('id_mesa','tipo')); 
        //Arr($solicitante);
    }

    public function index()
    {
        View();
    }

    public function create()
    {
        //$id_ubch = Uri(6);
        extract($_POST);

        $responsable = MesaTestigo::where('cedula',$cedula)->first();

        if(isset($responsable->cedula))
        {
            Error('centrosMesas/'.$id_mesa,'Esta persona ya es responsable de un centro.');
        }
        else
        {
            $datos_cne = Cne::where('cedula',$cedula)->first();

            if($datos_cne)
            {   
                $id_municipio = $datos_cne->municipio;
                $id_parroquia = $datos_cne->parroquia;
            }
            else
            {
                $id_municipio = "";
                $id_parroquia = "";
            }

            $instituciones = Institucion::orderBy('nombre', 'desc')->get();
            $partidos = Partido::all();   
            $estructura = Estructura::all();     
            $municipios = MunicipioCne::all();
            $municipio = MunicipioCne::find($id_municipio);
            $parroquias = ParroquiaCne::all();
            $municipio = ParroquiaCne::find($id_parroquia);
            View(compact('datos_cne','ubch','instituciones','partidos','estructura','id_mesa','municipio','municipios')); 
            //Arr($datos_cne);
        }
    }

    public function store()
    {
        //$id_ubch = Uri(6);
        extract($_POST);

        $responsable = MesaTestigo::where('cedula',$cedula)->first();

        if(isset($responsable->cedula))
        {
            Error('centrosMesas/'.$id_mesa,'Esta persona ya es responsable de un centro.');
        }
        else
        {
            $datos_cne = Cne::where('cedula',$cedula)->first();
            $mesa = Mesa::find($id_mesa);
            $testigosCount = MesaTestigo::where('id_mesas_ubch',$id_mesa)->count();
            /*
            echo "municipio cne: ". $datos_cne->municipio;
            echo "<hr>";
            echo "municipio mesa: ". $mesa->id_municipio;
            echo "<hr>";
            echo "parroquia cne: ". $datos_cne->parroquia;
            echo "<hr>";
            echo "parroquia mesa: ". $mesa->id_parroquia;
            echo "<hr>";
            echo $testigosCount;
            */
            
            if($datos_cne)
            {
                if($datos_cne->municipio == $mesa->id_municipio AND $datos_cne->parroquia == $mesa->id_parroquia)
                {
                    if($testigosCount < 3)
                    {
                        $testigosCount = $testigosCount + 1;

                        $testigo = new MesaTestigo;
                        $testigo->id_ubch = $mesa->id_ubch;
                        $testigo->codigo_mesa = $mesa->codigo_mesa;
                        $testigo->id_mesas_ubch = $id_mesa;
                        $testigo->cedula = $cedula;
                        $testigo->nombre = $datos_cne->nombre_1;
                        $testigo->apellido = $datos_cne->apellido_1;
                        $testigo->posicion = $testigosCount;

                        if($testigo->save())
                        {
                            Success('centrosMesas/'.$id_mesa,'Testigo de mesa agregado con exito.!');
                        }
                        else
                        {
                            Error('centrosMesas/'.$id_mesa,'Error al agregar testigo.');
                        }
                    }
                    else
                    {
                        Error('centrosMesas/'.$id_mesa,'Ya supero el limite de testigos por mesa.');
                    }
                }
                else
                {
                    Error('centrosMesas/'.$id_mesa,'El testigo de mesa tiene que ser del mismo centro en el cual vota.');
                }
            }
            else
            {
                Error('centrosMesas/'.$id_mesa,'No se encuentra registrado en el CNE.');
            }
            //Arr($datos_cne);
        }
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
        extract($_GET);
        $testigo = MesaTestigo::find($id);

        if($testigo->delete())
        {
            Success('centrosMesas/'.$id_mesa,'Testigo de mesa borrado con exito.!');
        }
        else
        {
            Error('centrosMesas/'.$id_mesa,'No se encuentra registrado en el CNE.');
        }
    }

    public function certificadoPDF()
    {
        $id_testigo = Uri(5);
        $testigo = MesaTestigo::where('id_mesas_ubch_testigos',$id_testigo)->first();
        $ubch = Ubch::find($testigo->id_ubch);

        if($testigo)
        {
            extract($_GET);
            ob_start();
            include('app/clp/views/centrosTestigos/certificadoPDF.php');
            $dompdf = new Dompdf(array('enable_remote' => true));
            $baseUrl = baseUrl;
            $dompdf->setBasePath($baseUrl); // This line resolve
            $dompdf->loadHtml(ob_get_clean());
            $dompdf->setPaper('letter', 'portrait');
            $dompdf->render();
            $dompdf->stream();
        }
        else
        {
            Error('centros/','No se encuentra testigo de mesa.');
        }
    }
}