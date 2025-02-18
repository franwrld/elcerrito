<?php
include_once "vendor/autoload.php";
include_once "app/models/inventarios.php";

class ReporteSalidasController extends Controller {
    private $salida;
    public function __construct($parametro) {
        $this->salida= new Inventarios();
        parent::__construct("reportesalidas",$parametro,true);
    }
    public function getReporte() {

        $data = $_GET;

        // Verificar si se proporcionaron fechas de inicio y fin
        if (!empty($data['fecha_inicio']) && !empty($data['fecha_fin'])) {
            $fechaInicio = date("Y-m-d", strtotime($data['fecha_inicio']));
            $fechaFin = date("Y-m-d", strtotime($data['fecha_fin']));
            $data['rango_fechas'] = [$fechaInicio, $fechaFin];
        }

        $registros = $this->salida->getSalidaReporte($data);

        //$registros=$this->salida->getSalidaReporte($_GET);
        //Encabezado informe
        $htmlHeader = '<div style="text-align: center;">
        <h3 style="margin: 5px 0 0; font-size: 25px; font-family: Roboto; display: inline-block; vertical-align: middle;">El Cerrito Bar & Grill</h3>
        <img src="/var/www/html/elcerrito/public_html/images/logo200px.jpeg" style="width:105px; display: inline-block; vertical-align: right;">
        </div>';
        //Cuerpo informe
        $html="<table width='100%' border-collapse: collapse; ><thead><tr>";
        $html.="<th colspan='6' style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff; font-size: 18px;'>Salidas de Stock de Inventario</th></tr><tr>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff; font-size: 14px;'>Id Salida</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff; font-size: 14px;'>Fecha que se realizo la salida</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff; font-size: 14px;'>Cantidad</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff; font-size: 14px;'>Producto</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff; font-size: 14px;'>Categoria</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff; font-size: 14px;'>Proveedor</th>";

        $html.="</tr></thead><tbody>";  
        $totalSum = 0;

        foreach ($registros as $key => $value) {
            $html .= "<tr>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>" . ($key + 1) . "</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["fecha_salida"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["cantidad_salida"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["nombre_producto"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["categoria"]}</td>";
            $html .= "<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["nombre_proveedor"]}</td>";
            $html .= "</tr>";
        }


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