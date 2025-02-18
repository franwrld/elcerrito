<?php
include_once "app/models/db.class.php";
class Acercade extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }

} 