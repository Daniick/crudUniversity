<?php

namespace Controller;

use Models\Producto;

use PDO;


require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class ProductoController
{
  
    //llamar todos los datos para cargar la tabla
    public function index()
    {
        $clientes = new Producto;

        $data = $clientes->all();

        return $data;
    }

    // Mostrar un registro de la tabla
    public function show($id) //Mateus
    {
        $producto = new Producto();
        $data = $producto->find($id);

        if($data) {
            return $data;
        } else {
            return 'Producto no encontrado';
        }
    }

    // crear un nuevo registro
    public function store($nombre, $producto) // Raysell
    {
       $producto = new Producto;
       $producto -> create($nombre, $producto);
    }

    // actializar un registro
    public function update() //Derek 
    {
        $id = $_POST['id'];
        $nombre_producto = $_POST['nombre_producto'];
        $precio = $_POST['precio'];

        $producto = new Producto();
        $producto->update($id, $nombre_producto, $precio);

    }

    // Eliminar un registro de la tabla
    public function destroy($id,) //Miguel
    {
        $producto = new Producto;
        $producto->delete($id);
    }
}
