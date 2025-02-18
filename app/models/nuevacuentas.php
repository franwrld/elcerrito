<?php
//include_once "db.class.php";
include_once "app/models/db.class.php";
class NuevaCuentas extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }

    public function guardarVenta($id_producto, $nombre_producto, $precio, $cantidad, $numero_pedido, $nombre_cliente, $fecha_venta) {
        $query = "INSERT INTO ventas (id_producto, nombre_producto, precio, cantidad, numero_pedido, nombre_cliente, fecha_venta) 
                  VALUES ($id_producto, '$nombre_producto', $precio, $cantidad, $numero_pedido, '$nombre_cliente', '$fecha_venta')";
        return $this->executeInsert($query);
    }

} 