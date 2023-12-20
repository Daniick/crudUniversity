<?php

namespace Controller;

use Models\Cliente;


require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class ClienteController
{
    //llamar todos los datos para cargar la tabla
    public function index()
    {
        $clientes = new Cliente;

        $data = $clientes->all();

        return $data;
    }

    // Mostrar un registro de la tabla


    public function show($id) //Victor
    {

        $cliente = new Cliente;
        $clienteData = $cliente->find($id);

        if ($clienteData) {

            $informacionCliente = "ID: " . $clienteData['id'] . "<br>";
            $informacionCliente .= "Nombre: " . $clienteData['nombre'] . "<br>";
            $informacionCliente .= "Direccion: " . $clienteData['direccion'] . "<br>";
            $informacionCliente .= "Telefono: " . $clienteData['telefono'] . "<br>";

            echo " Detalles del cliente ID $id: \n$informacionCliente";
        } else {
        }
        echo " Cliente con ID $id no encontrado";
    }






    // crear un nuevo registro
    public function store() // Arturo
    {
        $user = new Cliente();
        $user->create($_POST['nombre'], $_POST['direccion'], $_POST['telefono']);
        return $user;

        exit;
    }

    // actializar un registro
    public function update() // Aaron
    {
        $user = new Cliente();
        $user->update($_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['id']);
        return $user;
    }

    // Eliminar un registro de la tabla
    public function destroy() //michael
    {
        $id =  $_GET['id'];
        $del = new Cliente();
        $del->delete($id);
    }
}

// instanciia para probar cliente id

$clienteController = new ClienteController();
$idExistente = 1;
echo " Prabando ID)";
$clienteController->show($idExistente);
