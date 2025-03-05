<?php
include_once "app/models/login.php";
class LoginController extends Controller {
    private $user;
    public function __construct($parametro) {
        $this->user=new Login();
        parent::__construct("login",$parametro);
    }

    public function validar() {
        $user=$_POST["usuario"];
        $pass=$_POST["password"];
        $record=$this->user->validarLogin($user,$pass);
        if ($record) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["id_usuario"]=$record["id_usuario"];
            $_SESSION["tipo_usuario"]=$record["tipo_usuario"];
            $_SESSION["usuario"]=$record["usuario"];
            $_SESSION["nameuser"]=$record["nombre_usuario"];
            if ($record["tipo_usuario"]=="Administrador") {
                $info=array("success"=>true,"msg"=>"Usuario correcto","url"=>URL."menuprincipal");
            } else {
                $info=array("success"=>true,"msg"=>"Usuario correcto","url"=>URL."menuprincipal");
            }
        } else {
            $info=array("success"=>false,"msg"=>"Usuario o contraseña incorrecto");
        }
        echo json_encode($info);
    }

    public function cerrar() {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        $this->view->render("login");
    }
}



