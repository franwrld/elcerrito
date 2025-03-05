<?php
include_once "vendor/autoload.php";
include_once "app/models/inventarios.php";
class ReporteInventariosController extends Controller {
    private $inventario;
    public function __construct($parametro) {
        $this->inventario= new Inventarios();
        parent::__construct("reporteinventarios",$parametro,true,"Administrador");
    }
    public function getReporte(){
       
        $registros=$this->inventario->getInventarioReporte($_GET);
        //Encabezado informe
        $fechaActual = date('d/m/Y'); 

        $htmlHeader = '<div style="text-align: center;">
        <h3 style="margin: 5px 0 0; font-size: 25px; font-family: Roboto; display: inline-block; vertical-align: middle;">El Cerrito Bar & Grill</h3>
        <img src="/var/www/html/elcerrito/public_html/images/logo200px.jpeg" style="width:105px; display: inline-block; vertical-align: right;">
        </div>';
        //Cuerpo informe
        $html="<table width='100%' border-collapse: collapse; ><thead><tr>";
        $html.="<th colspan='5' style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;font-size: 18px'>Inventario</th>";
        $html.="<th colspan='2' style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;font-size: 16px'>Fecha: " . $fechaActual . "</th></tr><tr>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Id Producto</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Producto</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Precio Unitario</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Categoria</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Stock</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Proveedor</th>";
        $html.="<th style='padding: 10px; border: 1px solid #999; text-align: center; background-color: #000; color: #fff;'>Contacto Proveedor</th>";
        $html.="</tr></thead><tbody>";
        $total=0;
        foreach($registros as $key => $value){
            $html.="<tr>";
            $html.="<td style='padding: 10px; border: 1px solid #999; text-align: center;'>".($key+1)."</td>";
            $html.="<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["nombre_producto"]}</td>";
            $html.="<td style='padding: 10px; border: 1px solid #999; text-align: center;'>$" . $value["precio_unitario"] . "</td>";
            $html.="<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["categoria"]}</td>";
            $html.="<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["cantidad_stock"]}</td>";
            $html.="<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["nombre_proveedor"]}</td>";
            $html.="<td style='padding: 10px; border: 1px solid #999; text-align: center;'>{$value["contacto_proveedor"]}</td>";
            $html.="</tr>";
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