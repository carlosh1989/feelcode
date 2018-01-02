<?php
namespace App\admin\controllers;

use App\CentroResponsable;
use App\Cne;
use App\Estructura;
use App\Institucion;
use App\MunicipalResponsable;
use App\MunicipioCne;
use App\ParroquiaCne;
use App\Partido;
use App\TipoProblematica;
use App\UbchResponsable;
use App\Usuario;
use Carbon\Carbon;
use Dompdf\Dompdf;

class CuentasMunicipales
{
    function __construct()
    {
        Role('admin');
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
        $usuariosmunicipal = Usuario::where('role','municipal')->get();
        View(compact('usuariosmunicipal'));
    }

    public function create()
    {
        //$id_ubch = Uri(6);
        extract($_POST);

        $responsable = MunicipalResponsable::where('cedula',$cedula)->first();

        if(isset($responsable->cedula))
        {
            Error('cuentasMunicipales/busqueda'.$id_ubch,'Esta persona ya es responsable de un centro.');
        }
        else
        {
            $datos_cne = Cne::where('cedula',$cedula)->first();

            if(!$datos_cne)
            {
                Error('cuentasMunicipales/busqueda','Esta persona no esta registrado en el CNE.');
            }
            else
            {
                $instituciones = Institucion::orderBy('nombre', 'desc')->get();
                $partidos = Partido::all();   
                $estructura = Estructura::all();     
                $municipios = MunicipioCne::all();
                View(compact('datos_cne','ubch','instituciones','partidos','estructura','id_ubch','municipio','municipios')); 
                //Arr($datos_cne);
            }
        }
    }

    public function store()
    {
        extract($_POST);
        extract($_GET);

        $responsable = MunicipalResponsable::where('cedula',$cedula)->first();

        if(!$responsable)
        {
            $carbon = Carbon::now();
            $fecha_hora_registro = $carbon;
            list($fecha_registro,$hora_registro) = explode(' ', $fecha_hora_registro);
            $responsable = new MunicipalResponsable;
            $responsable->id_municipio = $id_municipio;
            $responsable->cedula = $cedula;
            $responsable->nombre_apellido = $nombre_apellido;
            $responsable->email = $email;
            $responsable->telefono_1 = $telefono1;
            $responsable->telefono_2 = $telefono2;
            $responsable->id_instituciones = $id_institucion;
            $responsable->id_partidos = $id_partido;
            $responsable->id_estructura = $id_estructura;
            $responsable->fecha_registro = $fecha_registro;
            $responsable->hora_registro = $hora_registro;

            if($responsable->save())
            {
                $clave = password_hash($password, PASSWORD_DEFAULT);
                $user = User();

                $usuario = new Usuario;
                $usuario->name = $nombre_apellido;
                $usuario->email = $username;
                $usuario->password = $clave;
                $usuario->role = 'municipal';
                $usuario->id_instituciones = $id_institucion;
                $usuario->id_municipio = $id_municipio;
                $usuario->id_parroquia = 0;
                $usuario->id_municipal = $responsable->id_responsable_municipal;
                $usuario->id_patrullero = 0;
                $usuario->id_clp = 0;
                $usuario->id_ubch = 0;
                $usuario->created_at = $carbon;
                $usuario->updated_at = $carbon;
                $usuario->estatus = 0;
                
                if($usuario->save())
                {
                    Success('cuentasMunicipales/busqueda','Responsable municipal creado.');
                }
                else
                {
                    Error('cuentasMunicipales/busqueda','Error al ingresar Responsable de municipio.');
                }
            }
            else
            {
                Error('cuentasMunicipales/busqueda','Error al ingresar Responsable de municipio.');
            }
        }
        else
        {
            Error('cuentasMunicipales/busqueda','Esta persona ya es responsable de un municipio.');
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
        include('app/municipal/views/centrosResponsablesMunicipal/certificadoPDF.php');
        $dompdf = new Dompdf(array('enable_remote' => true));
        $baseUrl = baseUrl;
        $dompdf->setBasePath($baseUrl); // This line resolve
        $dompdf->loadHtml(ob_get_clean());
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }
}