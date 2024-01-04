<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Permisos
{

    private $conexion;
    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function select()
    {
        // $query = "SELECT usuarios.id, usuarios.email,  usuarios.estado_id, roles.rol  FROM `usuarios` 
        // LEFT JOIN roles ON roles.id = usuarios.rol_id";
        $query = "SELECT usuarios.id, usuarios.email,  usuarios.estado, roles.rol  FROM `usuarios` 
        LEFT JOIN roles ON roles.id = usuarios.rol_id";
        /*  $query = 'SELECT usuarios.id, usuarios.nombre, usuarios.apellido, usuarios.email, usuarios.direccion, usuarios.nacimiento, asignaturas.asignatura FROM `usuarios` 
        LEFT JOIN asignaturas ON asignaturas.id = usuarios.asignatura_id
        WHERE rol_id =2'; */

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updates($email, $estado, $rol_id,  $id) // David
    {
        $query = "UPDATE usuarios SET `email` = ? , `estado` = ? , `rol_id` = ? WHERE `id` = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email, $estado, $rol_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = 'DELETE FROM usuarios WHERE id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
