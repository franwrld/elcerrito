<?php
include_once "app/models/db.class.php";
class Acercadeuser extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }

} 