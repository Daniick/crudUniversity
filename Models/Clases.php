<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';


class Clases
{

    private $conexion;
    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }


    function create()
    {
        $query = "INSERT into asignaturas (`asignatura`) VALUE (?)";
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        $stm = $this->conexion->prepare($query);
        // $stm->execute([$asignatura]);
    }
}
