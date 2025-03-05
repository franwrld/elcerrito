<?php
include_once "vendor/autoload.php";
include_once "app/models/inventarios.php";
class ReporteEntradasController extends Controller {
    private $entrada;
    public function __construct($parametro) {
        $this->entrada= new Inventarios();
        parent::__construct("reporteentradas",$parametro,true, "Administrador");
    }
    
    public function getReporte() {

        $data = $_GET;

        // Verificar si se proporcionaron fechas de inicio y fin
        if (!empty($data['fecha_inicio']) && !empty($data['fecha_fin'])) {
            $fechaInicio = date("Y-m-d", strtotime($data['fecha_inicio']));
            $fechaFin = date("Y-m-d", strtotime($data['fecha_fin']));
            $data['rango_fechas'] = [$fechaInicio, $fechaFin];
        }

        $registros = $this->entrada->getEntradaReporte($data);
       
        //$registros=$this->entrada->getEntradaReporte($_GET);
        //Encabezado informe
        $htmlHeader = '<div style="text-align: center;">
        <h3 style="margin: 5px 0 0; font-size: 25px; font-family: Roboto; display: inline-block; vertical-align: middle;">El Cerrito Bar & Grill</h3>
        <img src="/var/www/html/elcerrito/public_html/images/logo200px.jpeg" style="width:105px; display: inline-block; vertical-align: right;">
        </div>';
        //Cuerpo informe
        $html="<table width='100%' border-collapse: collapse; ><thead><tr>";
        $html.="<th colspan='8' style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;font-size: 18px;'>Entradas a Stock de Inventario</th></tr><tr>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Id Entrada</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Fecha que se realizo la entrada</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Cantidad</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Producto</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Categoria</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Proveedor</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Precio Unitario</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Total por Entrada</th>";
        
        $html.="</tr></thead><tbody>";

        $totalSum = 0;

        foreach ($registros as $key => $value) {
            $html .= "<tr>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>" . ($key + 1) . "</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["fecha_entrada"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["cantidad_entrada"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["nombre_producto"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["categoria"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["nombre_proveedor"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>$" . $value["precio_unitario"] . "</td>";
            $subtotal = $value["cantidad_entrada"] * $value["precio_unitario"];
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>$" . $subtotal . "</td>";
            $html .= "</tr>";

            // Acumula el subtotal al totalSum
            $totalSum += $subtotal;
        }
            $html .= "<tr>";
            $html .= "<td colspan='7' style='padding: 10px; border: 1px solid #999; text-align: center;background-color: #000; color: #fff;font-size: 18px;'>Total</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;background-color: #000; color: #fff;font-size: 18px;'>$" . $totalSum . "</td>";
            $html .= "</tr>";


        $html.="</tbody></table>";
        $mpdfConfig=array(
            'mode'=>'utf-8',
            'format'=>'Letter',
            'default_font_size'=>0,
            'default_font'=>'',
            'margin_left'=>10,
            'margin_right'=>10,
            'margin_top'=>40,
            'margin_header'=>10,
            'margin_footer'=>40,
            'orientation'=>'P'
        );
        $mpdf=new \Mpdf\Mpdf($mpdfConfig);
        $mpdf->SetHTMLHeader($htmlHeader);
        $mpdf->WriteHtml($html);
        $mpdf->Output();
    }

}