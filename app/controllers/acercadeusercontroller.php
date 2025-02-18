<?php
include_once "app/models/acercadeuser.php";
class AcercadeuserController extends Controller {
    private $acercauser;
    public function __construct($parametro) {
        $this->acercauser=new Acercadeuser();
        parent::__construct("acercadeuser",$parametro,true);
    }

}