<?php
namespace App\ubch\controllers;

use App\CentroResponsable;
use App\Cne;
use App\Estructura;
use App\Institucion;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\Partido;
use App\TipoProblematica;
use App\UbchResponsable;
use App\Usuario;
use Carbon\Carbon;
use Dompdf\Dompdf;

class CentrosResponsablesUbch
{
    function __construct()
    {
        Role('ubch');
    }

    public function busqueda()
    {
        $id_ubch = Uri(5);
        $tipo = TipoProblematica::all();
        View(compact('id_ubch','tipo')); 
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

        $responsable = CentroResponsable::where('cedula',$cedula)->first();

        if(isset($responsable->cedula))
        {
            Error('centrosUbch/'.$id_ubch,'Esta persona ya es responsable de un centro.');
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
            View(compact('datos_cne','ubch','instituciones','partidos','estructura','id_ubch','municipio','municipios')); 
            //Arr($datos_cne);
        }
    }

    public function store()
    {
        extract($_POST);
        extract($_GET);

        $responsable = UbchResponsable::where('cedula',$cedula)->first();

        if(!$responsable)
        {
            $carbon = Carbon::now();
            $fecha_hora_registro = $carbon;
            list($fecha_registro,$hora_registro) = explode(' ', $fecha_hora_registro);
            $ubch = new UbchResponsable;
            $ubch->id_municipio = $id_municipio;
            $ubch->id_parroquia = $id_parroquia;
            $ubch->direccion = $direccion;
            $ubch->id_ubch = $id_ubch;
            $ubch->nacionalidad = $nacionalidad;
            $ubch->cedula = $cedula;
            $ubch->nombre_apellido = $nombre_apellido;
            $ubch->email = $email;
            $ubch->telefono_1 = $telefono1;
            $ubch->telefono_2 = $telefono2;
            $ubch->vehiculo = $vehiculo;
            $ubch->id_instituciones = $id_institucion;
            $ubch->id_partidos = $id_partido;
            $ubch->id_estructura = $id_estructura;
            $ubch->fecha_registro = $fecha_registro;
            $ubch->hora_registro = $hora_registro;
            $ubch->eliminar = 0;

            if($ubch->save())
            {
                $clave = password_hash($password, PASSWORD_DEFAULT);
                $user = User();

                $usuario = new Usuario;
                $usuario->name = $nombre_apellido;
                $usuario->email = $username;
                $usuario->password = $clave;
                $usuario->role = 'ubch';
                $usuario->id_instituciones = $id_institucion;
                $usuario->id_municipio = $user['id_municipio'];
                $usuario->id_parroquia = $user['id_parroquia'];
                $usuario->id_municipal = 0;
                $usuario->id_clp = 0;
                $usuario->id_ubch = $id_ubch;
                $usuario->created_at = $carbon;
                $usuario->updated_at = $carbon;
                $usuario->estatus = 0;
                
                if($usuario->save())
                {
                    Success('centrosUbch/'.$id_ubch,'UBCH registrado, porceda a ingresar responsable.');
                }
                else
                {
                    Error('centrosUbch/'.$id_ubch,'Error al ingresar Responsable de centro.');
                }
            }
            else
            {
                Error('centrosUbch/'.$id_ubch,'Error al ingresar Responsable de centro.');
            }
        }
        else
        {
            Error('centrosUbch/'.$id_ubch,'Esta persona ya es responsable de un centro.');
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
        extract($_POST);
        $responsable = UbchResponsable::find($id);
        $responsable->telefono_1 = $telefono_1;
        $responsable->telefono_2 = $telefono_2;
        $responsable->direccion = $direccion;
        $responsable->email = $email;
        $responsable->vehiculo = $vehiculo;

        if($responsable->save())
        {
            Success('centrosUbch','Datos Actualizados.');
        }
        else
        {
            Error('centrosUbch','Error al actualizar los datos.');
        }
    }

    public function destroy($id)
    {

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

    public function certificadoPDF()
    {
        extract($_GET);
        ob_start();
        include('app/ubch/views/centrosResponsablesUbch/certificadoPDF.php');
        $dompdf = new Dompdf(array('enable_remote' => true));
        $baseUrl = baseUrl;
        $dompdf->setBasePath($baseUrl); // This line resolve
        $dompdf->loadHtml(ob_get_clean());
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }
}