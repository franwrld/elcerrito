<?php
include_once "app/models/inventarios.php";
class InventariosController extends Controller {
    
    private $inventario;

    public function __construct($parametro) {
        $this->inventario=new Inventarios();
        parent::__construct("inventarios",$parametro,true);
    }

    public function getAll() {
        $records=$this->inventario->getAll();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }

    public function getAllCarnes() {
        $records=$this->inventario->getAllCarnes();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }

    public function getAllBebidas() {
        $records=$this->inventario->getAllBebidas();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }public function getAllBebidasDesc() {
        $records=$this->inventario->getAllBebidasDesc();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getAllBebidasAsc() {
        $records=$this->inventario->getAllBebidasAsc();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getAllAves() {
        $records=$this->inventario->getAllAves();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getAllMariscos() {
        $records=$this->inventario->getAllMariscos();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    // GUARDAR INVENTARIO
    public function save() {
        if ($_POST["id_producto"]=="0") {
            $datosProducto=$this->inventario->getProductoByName($_POST["nombre_producto"]);
            if (count($datosProducto)>0) {
                $info=array('success'=>false,'msg'=>"El producto ya existe");
            } else {
                $records=$this->inventario->save($_POST);
                $info=array('success'=>true,'msg'=>"Producto guardado con exito");
            }
        }
        echo json_encode($info);
    }
    // GUARDAR ENTRADA
    public function saveEntrada() {
        if ($_POST["id_entrada"]=="0") {
            $records=$this->inventario->saveEntrada($_POST);
            $info=array('success'=>true,'msg'=>"Entrada guardada con exito");
        }
        echo json_encode($info);
    }
    // GUARDAR SALIDA
    public function saveSalida() {
        if ($_POST["id_salida"]=="0") {
            $records=$this->inventario->saveSalida($_POST);
            $info=array('success'=>true,'msg'=>"Salida guardada con exito");
        }
        echo json_encode($info);
    }
    // INVENTARIOS
    public function getOneInventario() {
        $records=$this->inventario->getOneInventario($_GET["id"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El Producto no existe');
        }
        echo json_encode($info);
    }
    // ENTRADA
    public function getOneInventarioEntrada() {
        $records=$this->inventario->getOneInventarioEntrada($_GET["id"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El Producto no existe');
        }
        echo json_encode($info);
    }
    // SALIDA
    public function getOneInventarioSalida() {
        $records=$this->inventario->getOneInventarioSalida($_GET["id"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El Producto no existe');
        }
        echo json_encode($info);
    }
    public function getProveedor() {
        $records=$this->inventario->getProveedor();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    // ELIMINAR
    public function eliminarProducto() {
        $records=$this->inventario->eliminarProducto($_GET["id"]);
        $info=array('success'=>true,'msg'=>"Producto eliminado con exito.");
        echo json_encode($info);
    }
    // ACTUALIZAR INVENTARIO
    public function update() {
        $records=$this->inventario->update($_POST);
        $info=array('success'=>true,'msg'=>"Registro actualizado con exito");
        echo json_encode($info);
    }
    //Fechas reporte salidas
    public function getFechasS() {
        $records=$this->inventario->getFechasS();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    //Fechas reporte entradas
    public function getFechasE() {
        $records=$this->inventario->getFechasE();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    //Categoria reporte inventario
    public function getCategoria() {
        $records=$this->inventario->getCategoria();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }



}