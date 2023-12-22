<?php

use Models\Asig;
// use Models\Roles;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';


class AsigController
{
    public function index()
    {

        // $materia =  $_POST['asignaturas'];



        $auth = new Asig;
        $auth->all();


        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/tablaClases.php';
    }




    // public function create()
    // {

    //     $roles = new Asig;

    //     $data =  $roles->all();

    //     require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/registrar.php';
    // }


    // public function store()
    // {
    //     $nombre =  $_POST['nombre'];
    //     $apellido =  $_POST['apellido'];
    //     $email =  $_POST['email'];
    //     $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //     $direccion =  $_POST['direccion'];
    //     $nacimiento = $_POST['nacimiento'];
    //     $rol_id =  $_POST['rol'];
    //     $asignatura_id = $_POST['asignatura_id'];


    //     $auth = new Auth;
    //     $auth->register($nombre, $apellido, $email, $hash, $direccion, $nacimiento, $rol_id, $asignatura_id);

    //     header('location: ../index.php?controller=UserController&action=index');
    // }
}
