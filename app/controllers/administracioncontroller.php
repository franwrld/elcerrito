<?php
class AdministracionController extends Controller {

    public function __construct($parametro) {
        parent::__construct("administracion",$parametro,true);
    }
}