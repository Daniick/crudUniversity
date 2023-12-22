<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Asig
{
    private $conexion;
    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    // mostrar todos los clientes
    public function all()
    {

        $query = 'SELECT * FROM asignaturas';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function register($asignaturas)
    {
        $query = "INSERT INTO asignaturas(`asignatura`) VALUES (?)";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$asignaturas]);

            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
