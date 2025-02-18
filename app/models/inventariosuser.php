<?php
include_once "app/models/db.class.php";
class Inventariosuser extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }
    public function getAll() {
        return $this->executeQuery("select id_producto,nombre_producto,precio_unitario,categoria,cantidad_stock,nombre_proveedor 
        from productos inner join proveedores USING(id_proveedor) WHERE categoria <> 'Menu' ORDER BY `productos`.`cantidad_stock` ASC");
    }

    public function getAllCarnes() {
        return $this->executeQuery("select id_producto,nombre_producto,precio_unitario,categoria,cantidad_stock,nombre_proveedor 
        from productos inner join proveedores USING(id_proveedor) where categoria='carnes'");
    }

    public function getAllBebidas() {
        return $this->executeQuery("select id_producto,nombre_producto,precio_unitario,categoria,cantidad_stock,nombre_proveedor 
        from productos inner join proveedores USING(id_proveedor) where categoria='bebidas' order by cantidad_stock ASC");
    }
    public function getAllAves() {
        return $this->executeQuery("select id_producto,nombre_producto,precio_unitario,categoria,cantidad_stock,nombre_proveedor 
        from productos inner join proveedores USING(id_proveedor) where categoria='aves'");
    }
    public function getAllMariscos() {
        return $this->executeQuery("select id_producto,nombre_producto,precio_unitario,categoria,cantidad_stock,nombre_proveedor 
        from productos inner join proveedores USING(id_proveedor) where categoria='mariscos'");
    }
    //Funcion para obtener datos por inventario
    public function getOneInventario($id) {
        return $this->executeQuery("select id_producto,nombre_producto,precio_unitario,categoria,cantidad_stock,nombre_proveedor 
        from productos inner join proveedores USING(id_proveedor)
        where id_producto='{$id}'");
    }
    //Funcion para obtener datos por inventario por entrada
    public function getOneInventarioEntrada($id) {
        return $this->executeQuery("select id_producto, nombre_producto 
        from productos where id_producto='{$id}'");
    }
    //Funcion para obtener datos por inventario por salida
    public function getOneInventarioSalida($id) {
        return $this->executeQuery("select id_producto, nombre_producto 
        from productos where id_producto='{$id}'");
    }
    // Funcion obtener datos por name
    public function getProductoByName($producto) {
    return $this->executeQuery("select id_producto,nombre_producto,precio_unitario,categoria,cantidad_stock,nombre_proveedor 
    from productos inner join proveedores USING(id_proveedor) WHERE nombre_producto='{$producto}'");
    }
    //Funcion para guardar un producto nuevo
    public function save($data) {
        return $this->executeInsert("insert into productos set nombre_producto='{$data["nombre_producto"]}', 
        precio_unitario='{$data["precio_unitario"]}',cantidad_stock='{$data["cantidad_stock"]}',categoria='{$data["categoria"]}', 
        id_proveedor='{$data["id_proveedor"]}'");
    }
    // Guardar entrada
    public function saveEntrada($data) {
        return $this->executeInsert("insert into entradas set fecha_entrada='{$data["fecha_entrada"]}', 
        cantidad_entrada='{$data["cantidad_entrada"]}',id_producto='{$data["id_productoE"]}'");
    }
    // Guardar entrada
    public function saveSalida($data) {
        return $this->executeInsert("insert into salidas set fecha_salida='{$data["fecha_salida"]}', 
        cantidad_salida='{$data["cantidad_salida"]}',id_producto='{$data["id_productoS"]}'");
    }
    //Funcion para obtener proveedor
    public function getProveedor() {
        return $this->executeQuery("select id_proveedor, nombre_proveedor from proveedores");
    }
    //Funcion para obtener entradas
    public function getEntradas() {
        return $this->executeQuery("select distinct date_format(fecha_entrada,'%d-%m-%Y') as fecha_entrada from productos INNER JOIN entradas USING(id_producto)");
    }
     //Funcion para obtener entradas
     public function getSalidas() {
        return $this->executeQuery("select distinct date_format(fecha_salida,'%d-%m-%Y') as fecha_salida from salidas");
    }

    // Funcion para eliminar producto
    public function eliminarProducto($id) {
        return $this->executeInsert("delete from productos where id_producto='$id'");
    }

    // Funcion para Actualizar
    public function update($data) {
        return $this->executeInsert("update productos set 
        nombre_producto='{$data["nombre_producto"]}',
        precio_unitario='{$data["precio_unitario"]}',
        categoria='{$data["categoria"]}',
        cantidad_stock='{$data["cantidad_stock"]}',
        id_proveedor='{$data["id_proveedor"]}'
        where id_producto={$data["id_producto"]}");
    }
    // Obtener categorias
    public function getCategoria() {
        return $this->executeQuery("select distinct categoria from productos");
    }


} 