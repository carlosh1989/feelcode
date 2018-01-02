<?php
namespace App\clp\controllers;

use App\Institucion;
use App\Ubch;
use App\Usuario;
use App\admin\controllers\RegistroUbch;
use Carbon\Carbon;
use System\core\BaseController;
use System\tools\session\User;

class CuentasUbch extends BaseController
{
    function __construct()
    {
        Role('clp');
    }

    public function index()
    {
        $usuario = User();


        $usuariosubch = Usuario::orderBy('id', 'DESC')
        ->where('id_municipio',$usuario['id_municipio'])
        ->where('role','!=','admin')
        ->where('role','!=','ubch')
        ->where('role','!=','clp')
        ->where('role','!=','municipal')
        ->get();
        View(compact('usuariosubch'));
    }

    public function create()
    {
        //Arr($usuario);
        $usuario = User();
        $centros = Ubch::where('id_municipio',$usuario['id_municipio'])
        ->where('id_parroquia',$usuario['id_parroquia'])
        ->get();

        //Arr($ubch);
        $organismos = Institucion::all();
        View(compact('centros','organismos'));
    }

    public function store()
    {
        extract($_POST);
        //Arr($_POST);
        $clave = password_hash($password, PASSWORD_DEFAULT);
        $user = User();

        $usuario_existe = Usuario::where('email',$email)->first();

        if(!$usuario_existe)
        {
            $usuario = new Usuario;
            $usuario->name = $name;
            $usuario->email = $email;
            $usuario->password = $clave;
            $usuario->role = 'ubch';
            $usuario->id_instituciones = $id_instituciones;
            $usuario->id_municipio = $user['id_municipio'];
            $usuario->id_parroquia = $user['id_parroquia'];
            $usuario->id_municipal = 0;
            $usuario->id_clp = 0;
            $usuario->id_ubch = $id_ubch;
            $usuario->id_patrullero = 0;
            $usuario->created_at = Carbon::now();
            $usuario->updated_at = Carbon::now();
            $usuario->estatus = 0;
            
            if($usuario->save())
            {
                Success('CuentasUbch','La cuenta fue creada.');
            }
            else
            {
                Error('CuentasUbch/create','Error al crear la cuenta.');
            }
        }
        else
        {
            Error('CuentasUbch/create','Nombre de usuario ya esta en uso.!');
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
}