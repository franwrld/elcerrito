<?php
include_once "app/models/db.class.php";
class ListadoVentas extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }
    public function getAll() {
        return $this->executeQuery("select id_venta ,id_producto,nombre_producto,precio,cantidad,numero_pedido,nombre_cliente,date_format(fecha_venta,'%d-%m-%Y %H:%i:%s') as fecha_venta 
        from ventas order by fecha_venta DESC");
    }
    // Funcion contar total de ventas hoy
    public function getTotalVentasHoy() {
        return $this->executeQuery("select COALESCE(ROUND(SUM(precio), 2), 0) AS ventashoy FROM ventas WHERE DATE(fecha_venta) = CURDATE()");
    }
    // Funcion contar total de ventas semana
    public function getTotalVentasSemana() {
        return $this->executeQuery("select COALESCE(ROUND(SUM(precio), 2), 0) as ventassemana from ventas
        where week(fecha_venta) = week(curdate())");
    }
    // Funcion contar total de ventas semana
    public function getTotalVentasMes() {
        return $this->executeQuery("select COALESCE(ROUND(SUM(precio), 2), 0) as ventasmes from ventas
        where month(fecha_venta) = month(curdate())");
    }

    // Funcion para eliminar venta
    public function eliminarVenta($id) {
        return $this->executeInsert("delete from ventas where id_producto='$id'");
    }
    // Obtener fechas
    public function getFechas() {
        return $this->executeQuery("select DISTINCT DATE_FORMAT(fecha_venta, '%M-%Y') as fecha_venta FROM ventas");
    }

    // Funcion Reportes Entradas

    public function getVentasReporte($data) {
        $condicion = "";
    
        // Filtrar por Producto ID
        if (!empty($data["idventa"]) && $data["idventa"] != "0") {
            $condicion .= " and id_producto = '{$data["idventa"]}'";
        }
    
        // Filtrar por Rango de Fechas
        if (!empty($data["rango_fechas"])) {
            list($fechaInicio, $fechaFin) = $data["rango_fechas"];
            $condicion .= " AND fecha_venta BETWEEN '$fechaInicio' AND '$fechaFin'";
        }
    
        return $this->executeQuery("select id_producto, nombre_producto, precio, cantidad, numero_pedido, nombre_cliente, DATE_FORMAT(fecha_venta, '%d-%m-%Y') as fecha_venta 
                                    FROM ventas 
                                    WHERE 1=1 $condicion 
                                    ORDER BY fecha_venta ASC");
    }
}

