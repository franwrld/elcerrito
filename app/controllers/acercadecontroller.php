<?php
include_once "app/models/acercade.php";
class AcercadeController extends Controller {
    private $acerca;
    public function __construct($parametro) {
        $this->acerca=new Acercade();
        parent::__construct("acercade",$parametro,true);
    }

}