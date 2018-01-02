<?php
namespace App\municipal\controllers;

use App\Candidato;
use App\CandidatoCentro;
use App\MesasCne;
use App\ParroquiaCne;
use App\Voto;
use App\VotoDetalle;
use App\VotoDetalleEscrutinio;

class VotosCentroMesa
{
    function __construct()
    {
        Role('municipal');
    }

    public function index()
    {
        $user = User();
        extract($_GET);
        extract($_POST);

        if(isset($id_parroquia) and $id_parroquia)
        {
            if(isset($id_mesa) and $id_mesa)
            {
                $candidatos = CandidatoCentro::where('id_municipio',$user['id_municipio'])->get();
                $centro = MesasCne::find($id_mesa);

                if($candidatos and $centro)
                {

                }
                else
                {
                    $candidatos = "";
                    $centro = "";
                }

                //Arr($centro);
                //$centro_nombre = $candidatos[0]->centros_clp->nombre;
            }
            else
            {
                if(isset($id_candidatos) and $id_candidatos)
                {
                    $candidatos = Voto::where('id_municipio',$user['id_municipio'])
                    ->where('id_parroquia',$id_parroquia)
                    ->where('id_centros_clp',$id_centros_clp)
                    ->where('id_candidatos',$id_candidatos)
                    ->get();
                }
                else
                {
                    $candidatos = Voto::where('id_municipio',$user['id_municipio'])
                    ->where('id_parroquia',$id_parroquia)
                    ->get();
                }
            }
        }
        else
        {
            $candidatos = "";
            $centro = "";
            $id_parroquia = "";
            $id_mesa="";
        }

        $id_municipio = $user['id_municipio'];


        View(compact('candidatos','id_municipio','id_parroquia','id_mesa','id_candidatos','centro_nombre','centro'));
    }

    public function subida()
    {
        extract($_POST);
        //Arr($_POST);

        $candidatos = CandidatoCentro::where('id_municipio',$id_municipio)->get();

        //Arr($candidatos);

        //conteo
        $num = 0;

        //Arr($candidato_votos);

        foreach ($candidatos as $key => $candidato) 
        {   
            if($candidato->cedula == 0)
            {
                $estatus = 2;
            }
            else
            {
                $estatus = 1;
            }

            $voto_detalle = new VotoDetalleEscrutinio;
            $voto_detalle->id_municipio = $id_municipio;
            $voto_detalle->id_parroquia = $id_parroquia;
            $voto_detalle->id_candidatos = $candidato->id_candidatos;
            $voto_detalle->id_mesa = $id_mesa;
            $voto_detalle->cantidad = $cantidad[$num];
            $voto_detalle->hora = date('H');
            $voto_detalle->minutos = date('i');
            $voto_detalle->hora_completa = date('H:m:s');
            $voto_detalle->mesa_1 = $mesa_1[$num];
            $voto_detalle->mesa_2 = $mesa_2[$num];
            $voto_detalle->mesa_3 = $mesa_3[$num];
            $voto_detalle->mesa_4 = $mesa_4[$num];
            $voto_detalle->mesa_5 = $mesa_5[$num];
            $voto_detalle->mesa_6 = $mesa_6[$num];
            $voto_detalle->mesa_7 = $mesa_7[$num];
            $voto_detalle->mesa_8 = $mesa_8[$num];
            $voto_detalle->mesa_9 = $mesa_9[$num];
            $voto_detalle->mesa_10 =$mesa_10[$num];
            $voto_detalle->save();

            $num = $num + 1;
        }

        Success('votosCentroMesa?id_municipio='.$id_municipio.'&id_parroquia='.$id_parroquia.'&id_mesa='.$id_mesa,'Votos han sido actualizados!');
    }

    public function test()
    {
        extract($_POST);

        $candidatos = CandidatoCentro::where('id_municipio',$id_municipio)->get();

        $num = 0;

        foreach ($candidatos as $key => $candidato) 
        {
            $voto = New VotoDetalleEscrutinio;
            $voto->id_municipio = $id_municipio;
            $voto->id_parroquia = $id_parroquia;
            $voto->id_candidatos = $candidato->id_candidatos;
            $voto->id_mesa = $id_mesa;
            $voto->hora = date('H');
            $voto->minutos = date('i');
            $voto->hora_completa = date('H:m:s');

            if(isset($mesa_1[$num]))
            {
                $voto->mesa_1 = $mesa_1[$num];
            }
            else
            {
                $voto->mesa_1 = 0;  
            }

            if(isset($mesa_2[$num]) and $mesa_2[$num])
            {
                $voto->mesa_2 = $mesa_2[$num];
            }
            else
            {
                $voto->mesa_2 = 0;  
            }

            if(isset($mesa_3[$num]) and $mesa_3[$num])
            {
                $voto->mesa_3 = $mesa_3[$num];
            }
            else
            {
                $voto->mesa_3 = 0;  
            }

            if(isset($mesa_4[$num]) and $mesa_4[$num])
            {
                $voto->mesa_4 = $mesa_4[$num];
            }
            else
            {
                $voto->mesa_4 = 0;  
            }

            if(isset($mesa_5[$num]) and $mesa_5[$num])
            {
                $voto->mesa_5 = $mesa_5[$num];
            }
            else
            {
                $voto->mesa_5 = 0;  
            }

            if(isset($mesa_6[$num]) and $mesa_6[$num])
            {
                $voto->mesa_6 = $mesa_6[$num];
            }
            else
            {
                $voto->mesa_6 = 0;  
            }

            if(isset($mesa_7[$num]) and $mesa_7[$num])
            {
                $voto->mesa_7 = $mesa_7[$num];
            }
            else
            {
                $voto->mesa_7 = 0;  
            }

            
            if(isset($mesa_8[$num]) and $mesa_8[$num])
            {
                $voto->mesa_8 = $mesa_8[$num];
            }
            else
            {
                $voto->mesa_8 = 0;  
            

            if(isset($mesa_9[$num]) and $mesa_9[$num])
            {
                $voto->mesa_9 = $mesa_9[$num];
            }
            else
            {
                $voto->mesa_9 = 0;  
            }

            if(isset($mesa_10[$num]) and $mesa_10[$num])
            {
                $voto->mesa_10 = $mesa_10[$num];
            }
            else
            {
                $voto->mesa_10 = 0;  
            }

            $voto->save();

            $num = $num + 1;
        }}


        //Arr($candidatos);
        Success('votosCentroMesa?id_municipio='.$id_municipio.'&id_parroquia='.$id_parroquia.'&id_mesa='.$id_mesa,'Votos han sido actualizados!');
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
        extract($_POST);

        $voto = Voto::find($id);

        $voto_detalle = new VotoDetalle;
        $voto_detalle->id_votos = $voto->id_votos;
        $voto_detalle->id_municipio = $voto->id_municipio;
        $voto_detalle->id_parroquia = $voto->id_parroquia;
        $voto_detalle->id_mesa = $voto->id_mesa;
        $voto_detalle->cantidad = $cantidad;
        $voto_detalle->hora = date('H:i');

        if($voto_detalle->save())
        {
            Success('votos?id_parroquia='.$voto->id_parroquia.'&id_mesa='.$voto->id_mesa,'Votos de '.$voto->candidato->nombre.' han sido actualizados!');
        }
        else
        {
            Error('votos','Error al actualizar votos.');
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