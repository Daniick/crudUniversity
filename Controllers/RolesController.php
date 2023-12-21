<?php

namespace Controller;

use Models\Roles;


require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class RolesController
{
    //llamar todos los datos para cargar la tabla
    public function index()
    {
        $clientes = new Roles;

        $data = $clientes->all();

        return $data;
    }
}

$p = new RolesController;
print_r($p->index());
