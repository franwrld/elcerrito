<?php
include_once "app/models/nuevacuentas.php";
class NuevaCuentasController extends Controller {
    
    private $nuevacuenta;

    public function __construct($parametro) {
        $this->nuevacuenta = new NuevaCuentas();
        parent::__construct("nuevacuentas", $parametro, true);
    }

    public function guardarVenta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $numero_pedido = $data['numero_pedido'];
            $nombre_cliente = $data['nombre_cliente'];
            $fecha_venta = $data['fecha_venta']; // Recibir la fecha desde el frontend
    
            foreach ($data['productos'] as $producto) {
                $this->nuevacuenta->guardarVenta(
                    $producto['id_producto'],
                    $producto['nombre_producto'],
                    $producto['precio'],
                    $producto['cantidad'],
                    $numero_pedido,
                    $nombre_cliente,
                    $fecha_venta // Pasar la fecha al modelo
                );
            }
    
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Método no permitido']);
        }
    }
}