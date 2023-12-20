<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    // cargar todo los usuarios
    public function all()
    {

        $query = 'SELECT * FROM usuarios';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // encontrar el usuario donde el id se igual a ?
    public function find($id) //Omar
    {

        $query = 'SELECT * FROM usuarios Where id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    //actualizar un usuario
    public function update($id, $correo, $password, $rol_id) //David
    {
        $query = "UPDATE usuarios SET correo = ?, password = ?, rol_id = ? WHERE id = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$correo, $password, $rol_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    //eliminar un usuario
    public function delete($id) // Jairo
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
