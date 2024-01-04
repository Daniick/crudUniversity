<?php

use Models\Auth;
use Models\Roles;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class AuthController
{
    public function login()
    {

        $email =  $_POST['email'];

        $password =  $_POST['password'];

        $auth = new Auth;
        $user = $auth->select($email);

        $asignatura = $auth->bring($email);

        if (password_verify($password, $user['password']) && $user['estado'] === 1) {

            session_start();
            $_SESSION['userData'] =  $user;
            $_SESSION['traerAsignatura'] =  $asignatura;

            header('location: ../index.php');
        } else {
            header('location: ../index.php');
        }
    }

    public function logout()
    {
        // session_start();
        session_destroy();
        header('location: ../index.php');
    }


    public function create()
    {

        $roles = new Roles;

        $data =  $roles->all();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/registrar.php';
    }


    public function store()
    {
        $nombre =  $_POST['nombre'];
        $apellido =  $_POST['apellido'];
        $email =  $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $direccion =  $_POST['direccion'];
        $nacimiento = $_POST['nacimiento'];
        $rol_id =  $_POST['rol'];
        $asignatura_id = $_POST['asignatura_id'];


        $auth = new Auth;
        $auth->register($nombre, $apellido, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id);

        header('location: ../index.php?controller=UserController&action=index');
    }

    /* public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'] ?? '';
            $apellido = $_POST['apellido'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);
            $direccion = $_POST['direccion'] ?? '';
            $nacimiento = $_POST['nacimiento'] ?? '';
            $rol_id = $_POST['rol'] ?? '';
            $asignatura_id = $_POST['asignatura_id'] ?? '';

            // Validación básica: verifica que todos los campos estén completos
            if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($password) && !empty($direccion) && !empty($nacimiento) && !empty($rol_id) && !empty($asignatura_id)) {
                $auth = new Auth;
                $success = $auth->register($nombre, $apellido, $email, $password, $direccion, $nacimiento, $rol_id, $asignatura_id);

                if ($success) {
                    // Redirige a la página de inicio después del registro exitoso
                    header('location: ../index.php?controller=UserController&action=index');
                    exit();
                } else {
                    // Muestra un mensaje en caso de falla en el registro
                    echo "Falló el registro del usuario. Por favor, inténtalo de nuevo.";
                }
            } else {
                // Muestra un mensaje si algún campo está vacío
                echo "Todos los campos son obligatorios.";
            }
        }
    } */
}
