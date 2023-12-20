<?php

namespace Controller;

use Models\Pedido;


require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class PedidoController
{
    //llamar todos los datos para cargar la tabla
    public function index()
    {
        $clientes = new Pedido;

        $data = $clientes->all();

        return $data;
    }

    // Mostrar un registro de la tabla
    public function show()
    {
    }

    // crear un nuevo registro
    public function strore()
    {
    }

    // actializar un registro
    public function update()
    {
    }

    // Eliminar un registro de la tabla
    public function destroy()
    {
    }
}
