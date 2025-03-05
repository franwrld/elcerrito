<?php
require_once "app/views/view.php";
class Controller {
    protected $view;
    public function __construct($view,$parametro,$validar=false, $tipoRequerido = null) {
        $this->view=new View();
        if ($validar) {
            if (!isset($_SESSION)) {
                session_start();
            }
            if (!isset($_SESSION["id_usuario"])) {
                $this->view->render("login");
                return;
            }
            // Validar el tipo de usuario si se especifica
            if ($tipoRequerido && $_SESSION["tipo_usuario"] !== $tipoRequerido) {
                // Redirigir a una vista de error o a la vista correspondiente al tipo de usuario
                if ($_SESSION["tipo_usuario"] == "Administrador") {
                    header("Location: " . URL . "menuprincipal");
                } else {
                    header("Location: " . URL . "menuprincipaluser");
                }
                return;
            }
        }
        if (empty($parametro)) {
            
            $this->view->render($view);
            return;
        }
        if (method_exists($this,$parametro)) {
            $this->$parametro();
        } else {
            echo "<h1>Metodo no existe</h1>";
        }
    }
}