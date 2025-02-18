<?php
include_once "app/models/db.class.php";
class ListadoVentasuser extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }
    public function getAll() {
        return $this->executeQuery("select id_v,id_producto,numero_de_pedido,nombre_cliente,producto,precio,cantidad,date_format(fecha_venta,'%d-%m-%Y') as fecha_venta 
        from ventas order by fecha_venta DESC");
    }

    // Funcion para eliminar venta
    public function eliminarVenta($id) {
        return $this->executeInsert("delete from ventas where id_producto='$id'");
    }
    // Obtener fechas
    public function getFechas() {
        return $this->executeQuery("select DISTINCT DATE_FORMAT(fecha_venta, '%M-%Y') as fecha_venta FROM ventas");
    }
}

