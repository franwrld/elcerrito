<?php
class InformesController extends Controller {

    public function __construct($parametro) {
        parent::__construct("informes",$parametro,true);
    }
}