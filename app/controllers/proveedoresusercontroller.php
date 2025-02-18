<?php
include_once "app/models/proveedoresuser.php";
class ProveedoresuserController extends Controller {
    private $proveedoruser;
    public function __construct($parametro) {
        $this->proveedoruser=new Proveedoresuser();
        parent::__construct("proveedoresuser",$parametro,true);
    }
    public function getAll() {
        $records=$this->proveedoruser->getAll();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getOneProveedor() {
        $records=$this->proveedoruser->getOneProveedor($_GET["id"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El proveedor no existe');
        }
        echo json_encode($info);
    }
    // GUARDAR
    public function save() {
        if ($_POST["id_proveedor"]=="0") {
            $datosProveedor=$this->proveedoruser->getProveedorByName($_POST["nombre_proveedor"]);
            if (count($datosProveedor)>0) {
                $info=array('success'=>false,'msg'=>"El Proveedor ya existe");
            } else {
                $records=$this->proveedoruser->save($_POST);
                $info=array('success'=>true,'msg'=>"Registro guardado con exito");
            }
        } else {
            $records=$this->proveedoruser->update($_POST);
            $info=array('success'=>true,'msg'=>"Registro guardado con exito");
        }
        echo json_encode($info);
    }
    // ELIMINAR
    public function eliminarProveedor() {
        $records=$this->proveedoruser->eliminarProveedor($_GET["id"]);
        $info=array('success'=>true,'msg'=>"Proveedor eliminado con exito.");
        echo json_encode($info);
    }
     // ACTUALIZAR 
     public function update() {
        $records=$this->proveedoruser->update($_POST);
        $info=array('success'=>true,'msg'=>"Registro actualizado con exito");
        echo json_encode($info);
    }
}



