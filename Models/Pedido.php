<?php

namespace Models;

use Models\Database;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Vendor/autoload.php';

class Pedido
{
    private $conexion;
    public function __construct()
    {
        $database = new Database;
        $this->conexion = $database->getConn();
    }

    public function all()
    {

        $query = 'SELECT pedidos.id as pedido_id, clientes.nombre, pedidos.fecha_pedido, pedidos.total From pedidos INNER JOIN clientes ON clientes.id = pedidos.clientes_id';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);

            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
} 