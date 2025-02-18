<?php
include_once "app/models/listadoventasuser.php";
class ListadoVentasuserController extends Controller {
    private $listadouser;
    public function __construct($parametro) {
        $this->listadouser=new ListadoVentasuser();
        parent::__construct("listadoventasuser",$parametro,true);
    }
    public function getAll() {
        $records=$this->listadouser->getAll();
        $info=array('success'=>true,'records');
        echo json_encode($info);
    }
    // ELIMINAR
    public function eliminarVenta() {
        $records=$this->listadouser->eliminarVenta($_GET["id"]);
        $info=array('success'=>true,'msg'=>"Venta eliminada con exito.");
        echo json_encode($info);
    }

    public function getFechas() {
        $records=$this->listadouser->getFechas();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
}