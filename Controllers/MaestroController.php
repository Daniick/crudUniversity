<?php

use Models\Maestro;
// use Models\Roles;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';


class MaestroController
{
    public function index()
    {
        // $materia =  $_POST['asignaturas'];

        // $auth = new Asig;
        // $auth->all();
        // $clases = new Asig;
        // $clases->clases();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/tablaMaestro.php';
    }
}
