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
        $clases = new Asig;
        $clases->clases();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/tablaClases.php';
    }


    public function create()
    {

        $roles = new Asig;

        $data =  $roles->all();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/registrar.php';
    }


    public function store()
    {

        $asignatura = $_POST['asignatura'];
        $profesor = $_POST['nombre'];


        $auth = new Asig;
        $auth->register($asignatura, $profesor);

        header('location: ../index.php?controller=AsigController&action=index');
        // print_r($_POST);
    }

    public function update()
    {
        $id = $_GET['id'];
        $asignatura = $_POST['asignatura'];
        $profesor = $_POST['profesor_id'];

        $cliente = new Asig;
        $cliente->encontrar($asignatura, $profesor);
        header('location: ../index.php?controller=AsigController&action=index');
    }

    public function destroy()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Asig;
            $usuario->delete($id);


            header('location: ../index.php?controller=AsigController&action=index');
        }
    }
}

//  $ho= new AsigController;
// $ho->update(); 
