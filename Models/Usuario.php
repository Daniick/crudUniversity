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

    // aca se cargan solo los maestros 
    public function all()
    {


        $query = 'SELECT usuarios.id, usuarios.nombre, usuarios.apellido, usuarios.email, usuarios.direccion, usuarios.nacimiento, asignaturas.asignatura FROM `usuarios` 
        LEFT JOIN asignaturas ON asignaturas.id = usuarios.asignatura_id
        WHERE rol_id = 2';

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

    //actualizar un usuario aqui hay que agregar los otros campos para actualizar
    /* public function update($id, $nombre, $apellido, $correo, $password, $direccion, $nacimiento, $rol_id) //David
    {
        $query = "UPDATE usuarios SET nombre = ?  , apellido = ? ,correo = ?,password = ? ,direccion = ?,nacimiento = ?, rol_id = ? WHERE id = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id, $nombre, $apellido, $correo, $password, $direccion, $nacimiento, $rol_id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    } */

    /*  public function update($id, $nombre, $apellido, $correo, $password, $direccion, $nacimiento, $rol_id, $asignatura_id) //David
    {
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, correo = ?, password = ?, direccion = ?, nacimiento = ?, rol_id = ?, asignatura_id = ? WHERE id = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$nombre, $apellido, $correo, $password, $direccion, $nacimiento, $rol_id, $asignatura_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    } */
    public function update($nombre, $apellido, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id, $id) // David
    {
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, password = ?, direccion = ? ,nacimiento = ?, rol_id = ?, asignatura_id = ? WHERE id = ?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$nombre, $apellido, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // YA FUNKA EL ELIMINAR
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


//$query = 'SELECT * FROM usuarios /* left JOIN asignaturas on usuarios.asignatura_id = asignaturas.id */';