<?php
include_once "app/models/listadoventas.php";
class ListadoVentasController extends Controller {
    private $listado;
    public function __construct($parametro) {
        $this->listado=new ListadoVentas();
        parent::__construct("listadoventas",$parametro,true);
    }
    public function getAll() {
        $records=$this->listado->getAll();
        $total=$this->listado->getTotalVentasHoy();
        $totals=$this->listado->getTotalVentasSemana();
        $totalm=$this->listado->getTotalVentasMes();
        $info=array('success'=>true,'records'=>$records,'total'=>$total[0]["ventashoy"],'totals'=>$totals[0]["ventassemana"],'totalm'=>$totalm[0]["ventasmes"]);
        echo json_encode($info);
    }
    // ELIMINAR
    public function eliminarVenta() {
        $records=$this->listado->eliminarVenta($_GET["id"]);
        $info=array('success'=>true,'msg'=>"Venta eliminada con exito.");
        echo json_encode($info);
    }

    public function getFechas() {
        $records=$this->listado->getFechas();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
}