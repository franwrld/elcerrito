<?php
include_once "app/models/db.class.php";
class Proveedoresuser extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }
    public function getAll() {
        return $this->executeQuery("Select id_proveedor,nombre_proveedor,contacto_proveedor 
        from proveedores");
    }
    public function getOneProveedor($id) {
        return $this->executeQuery("Select id_proveedor,nombre_proveedor,contacto_proveedor
        from proveedores where id_proveedor='{$id}'");
    }
    // Funcion obtener datos por name
    public function getProveedorByName($name) {
        return $this->executeQuery("Select id_proveedor,nombre_proveedor,contacto_proveedor from proveedores 
        where nombre_proveedor='{$name}'");
    }
     // Funcion para guardar registro
     public function save($data) {
        return $this->executeInsert("insert into proveedores set nombre_proveedor='{$data["nombre_proveedor"]}',contacto_proveedor='{$data["contacto_proveedor"]}'");
    }
      // Funcion para eliminar registro
      public function eliminarProveedor($id) {
        return $this->executeInsert("delete from proveedores where id_proveedor='$id'");
    }
    // Funcion para Actualizar
    public function update($data) {
        return $this->executeInsert("update proveedores set 
        nombre_proveedor='{$data["nombre_proveedor"]}',
        contacto_proveedor='{$data["contacto_proveedor"]}'
        where id_proveedor={$data["id_proveedor"]}");
    }
    // Funcion Reportes Entradas
    public function getProveedorReporte($data){
        $condicion="";
        if ($data["idproveedor"]!="0"){
            $condicion.=" and a.id_proveedor='{$data["idproveedor"]}'";
        } 
        return $this->executeQuery("select a.id_proveedor,a.nombre_proveedor,a.contacto_proveedor,b.nombre_producto,b.categoria 
        from productos b inner join proveedores a using(id_proveedor) WHERE categoria <> 'Menu' and 1=1 $condicion");
    }

}