<?php

use Models\Roles;
use Models\Usuario;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class UserController
{
    //llamar todos los datos para cargar la tabla
    public function index()
    {
        $clientes = new Usuario;

        $data = $clientes->all();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/table.php';
    }

    // Mostrar un registro de la tabla
    public function show($id) // Omar
    {
        $usuario = new Usuario;
        $usuarioPar = $usuario->find($id);

        if ($usuarioPar) {
            $userData = "Nombre: " . $usuarioPar['nombre'] . "<br>";
            $userData = "Direccion: " . $usuarioPar['direccion'] . "<br>";
            $userData = "Telefono: " . $usuarioPar['telefono'] . "<br>";

            echo "Cliente: $userData";
        } else {
            echo "Cliente no encontrado";
        }
    }

    // actializar un registro

    public function updateView() // David
    {
        $roles = new Roles;
        $data = $roles->all();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/update.php';
    }


    public function update() // David
    {
        $id = $_GET['id'];
        $nombre =  $_POST['nombre'];
        $apellido =  $_POST['apellido'];
        $email =  $_POST['email'];
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $direccion =  $_POST['direccion'];
        $nacimiento = $_POST['nacimiento'];
        $rol_id =  $_POST['rol'];
        $asignatura_id = $_POST['asignatura_id'];

        $cliente = new Usuario;
        $cliente->update($id, $nombre, $apellido, $email, $hash, $direccion, $nacimiento, $rol_id, $asignatura_id);

        header('location: ../index.php?controller=UserController&action=index');
    }




    // Eliminar un registro de la tabla
    public function destroy() //Jairo
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario =  $_GET['asignatura'];

            $usuario = new Usuario;
            $usuario->delete($id, $usuario);


            header('location: ../index.php?controller=UserController&action=index');
        }
    }
}
