<?php
include_once "app/models/proveedores.php";
class ProveedoresController extends Controller {
    private $proveedor;
    public function __construct($parametro) {
        $this->proveedor=new Proveedores();
        parent::__construct("proveedores",$parametro,true);
    }
    public function getAll() {
        $records=$this->proveedor->getAll();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getOneProveedor() {
        $records=$this->proveedor->getOneProveedor($_GET["id"]);
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
            $datosProveedor=$this->proveedor->getProveedorByName($_POST["nombre_proveedor"]);
            if (count($datosProveedor)>0) {
                $info=array('success'=>false,'msg'=>"El Proveedor ya existe");
            } else {
                $records=$this->proveedor->save($_POST);
                $info=array('success'=>true,'msg'=>"Registro guardado con exito");
            }
        } else {
            $records=$this->proveedor->update($_POST);
            $info=array('success'=>true,'msg'=>"Registro guardado con exito");
        }
        echo json_encode($info);
    }
    // ELIMINAR
    public function eliminarProveedor() {
        $records=$this->proveedor->eliminarProveedor($_GET["id"]);
        $info=array('success'=>true,'msg'=>"Proveedor eliminado con exito.");
        echo json_encode($info);
    }
     // ACTUALIZAR 
     public function update() {
        $records=$this->proveedor->update($_POST);
        $info=array('success'=>true,'msg'=>"Registro actualizado con exito");
        echo json_encode($info);
    }
}



