<?php
include_once "app/models/db.class.php";
class Usuarios extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }
    public function getAll() {
        return $this->executeQuery("Select id_usuario, usuario, nombre_usuario, apellido_usuario, tipo_usuario, estado_usuario 
        from usuarios");
    }

    public function getAllActivos() {
        return $this->executeQuery("Select id_usuario, usuario, nombre_usuario, apellido_usuario, tipo_usuario, estado_usuario 
        from usuarios where estado_usuario='activo'");
    }

    public function getAllInactivos() {
        return $this->executeQuery("Select id_usuario, usuario, nombre_usuario, apellido_usuario, tipo_usuario, estado_usuario 
        from usuarios where estado_usuario='inactivo'");
    }

    public function getOneUsuario($id) {
        return $this->executeQuery("Select id_usuario, usuario, password, nombre_usuario, apellido_usuario, tipo_usuario, estado_usuario 
        from usuarios where id_usuario='{$id}'");
    }

    // Funcion obtener datos por name
    public function getUsuarioByName($user) {
        return $this->executeQuery("Select id_usuario,usuario, nombre_usuario, apellido_usuario, tipo_usuario, estado_usuario from usuarios 
        where usuario='{$user}'");
    }

    // Funcion para guardar registro
    public function save($data) {
        return $this->executeInsert("insert into usuarios set usuario='{$data["usuario"]}'
        , password=sha1('{$data["password"]}'), nombre_usuario='{$data["nombre_usuario"]}',
        apellido_usuario='{$data["apellido_usuario"]}', tipo_usuario='{$data["tipo_usuario"]}', estado_usuario='{$data["estado_usuario"]}'");
    }

    // Funcion para eliminar registro
    public function eliminarUsuario($id) {
        return $this->executeInsert("delete from usuarios where id_usuario='$id'");
    }

    // Funcion para Actualizar
    public function update($data) {
        return $this->executeInsert("update usuarios set 
        usuario='{$data["usuario"]}',
        password=if('{$data["password"]}'='',password,sha1('{$data["password"]}')),
        nombre_usuario='{$data["nombre_usuario"]}',
        apellido_usuario='{$data["apellido_usuario"]}',
        tipo_usuario='{$data["tipo_usuario"]}',
        estado_usuario='{$data["estado_usuario"]}' 
        where id_usuario={$data["id_usuario"]}");
    }
} 