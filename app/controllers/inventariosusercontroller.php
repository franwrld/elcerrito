<?php
include_once "app/models/inventariosuser.php";
class InventariosuserController extends Controller {
    private $inventariouser;
    public function __construct($parametro) {
        $this->inventariouser=new Inventariosuser();
        parent::__construct("inventariosuser",$parametro,true);
    }
    public function getAll() {
        $records=$this->inventariouser->getAll();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }

    public function getAllCarnes() {
        $records=$this->inventariouser->getAllCarnes();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }

    public function getAllBebidas() {
        $records=$this->inventariouser->getAllBebidas();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getAllAves() {
        $records=$this->inventariouser->getAllAves();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getAllMariscos() {
        $records=$this->inventariouser->getAllMariscos();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    // GUARDAR INVENTARIO
    public function save() {
        if ($_POST["id_producto"]=="0") {
            $datosProducto=$this->inventariouser->getProductoByName($_POST["nombre_producto"]);
            if (count($datosProducto)>0) {
                $info=array('success'=>false,'msg'=>"El producto ya existe");
            } else {
                $records=$this->inventariouser->save($_POST);
                $info=array('success'=>true,'msg'=>"Producto guardado con exito");
            }
        }
        echo json_encode($info);
    }
    // GUARDAR ENTRADA
    public function saveEntrada() {
        if ($_POST["id_entrada"]=="0") {
            $records=$this->inventariouser->saveEntrada($_POST);
            $info=array('success'=>true,'msg'=>"Entrada guardada con exito");
        }
        echo json_encode($info);
    }
    // GUARDAR SALIDA
    public function saveSalida() {
        if ($_POST["id_salida"]=="0") {
            $records=$this->inventariouser->saveSalida($_POST);
            $info=array('success'=>true,'msg'=>"Salida guardada con exito");
        }
        echo json_encode($info);
    }
    // INVENTARIOS
    public function getOneInventario() {
        $records=$this->inventariouser->getOneInventario($_GET["id"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El Producto no existe');
        }
        echo json_encode($info);
    }
    // ENTRADA
    public function getOneInventarioEntrada() {
        $records=$this->inventariouser->getOneInventarioEntrada($_GET["id"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El Producto no existe');
        }
        echo json_encode($info);
    }
    // SALIDA
    public function getOneInventarioSalida() {
        $records=$this->inventariouser->getOneInventarioSalida($_GET["id"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El Producto no existe');
        }
        echo json_encode($info);
    }
    public function getProveedor() {
        $records=$this->inventariouser->getProveedor();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    // ELIMINAR
    public function eliminarProducto() {
        $records=$this->inventariouser->eliminarProducto($_GET["id"]);
        $info=array('success'=>true,'msg'=>"Producto eliminado con exito.");
        echo json_encode($info);
    }
    // ACTUALIZAR INVENTARIO
    public function update() {
        $records=$this->inventariouser->update($_POST);
        $info=array('success'=>true,'msg'=>"Registro actualizado con exito");
        echo json_encode($info);
    }
    //Fechas reporte salidas
    public function getFechasS() {
        $records=$this->inventariouser->getFechasS();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    //Fechas reporte entradas
    public function getFechasE() {
        $records=$this->inventariouser->getFechasE();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    //Categoria reporte inventario
    public function getCategoria() {
        $records=$this->inventariouser->getCategoria();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }



}