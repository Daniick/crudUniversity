<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Auth
{

    private $conexion;
    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function select($email)
    {
        $query = "SELECT * FROM usuarios WHERE email = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email]);

            $rs = $stm->fetch(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function register($nombre, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id)
    {
        $query = "INSERT INTO usuarios(`nombre`, `email`, `password`,`direccion`, `nacimiento`, `rol_id`,`asignatura_id`) VALUES (?,?,?,?,?,?,?)";
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$nombre, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id]);

            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
$pas = new Auth();
$pas->register("", "admin@admin", "admin", "", "", 1, 1);
