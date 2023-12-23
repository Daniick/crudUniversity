<?php

session_start();
if (isset($_SESSION['userData'])) {
    $userData = $_SESSION['userData'];

    $cliente  = ['Clases' => 'index.php?'];
    $admin = ['Permisos' => 'index.php?controller=PermisosController&action=index', 'Maestros' => 'index.php?controller=UserController&action=index', 'Clases' => 'index.php?controller=AsigController&action=index'];

    if ($userData['rol_id'] === 1) {
        $menu = $admin;
    } else if ($userData['rol_id'] === 2) {
        $menu = $cliente;
    }
} else {
    header('location: ./Views/login.php');
}


require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/header.php';

if (isset($_GET['action']) && isset($_GET['controller'])) {

    require_once './Controllers/' . $_GET['controller'] . '.php';

    $controller = new $_GET['controller'];

    $controller->{$_GET['action']}();
}
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/footer.php';
