<?php
class VentasController extends Controller {

    public function __construct($parametro) {
        parent::__construct("ventas",$parametro,true);
    }
}