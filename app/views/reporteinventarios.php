<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS fijos -->
    <?php include_once "app/views/sections/css.php"; ?>
    <!-- CSS propios -->
    <!-- CSS del fondo -->
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/fondologin.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/reporteinventarios.css">

    <!-- Icono en el navegador -->
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/logo200px.jpeg" type="image/x-icon">
    <title>Reporte Inventarios</title>
</head>
<body>
 <!-- Contenedor Principal -->
 <div class="contenedor">
        <!-- Header -->
        <div class="header">
            <div class="headercont">
                <div class="head1">
                    <!-- Logo El Cerrito -->
                    <a href="<?php echo URL;?>menuprincipal">
                        <img class="imglogo" src="<?php echo URL;?>public_html/images/logo200px.jpeg" alt="logo">
                    </a>
                    <!-- Icono -->
                    <img class="iconmenu" src="<?php echo URL;?>public_html/icons/informes32px.png" alt="logo">
                    <!-- Titulo -->
                    <h1>Reporte Inventario</h1>
                </div>
                <div class="head2">
                    <!-- Boton volver -->
                    <a href="<?php echo URL;?>informes">
                        <button class="btnback">
                            <div class="btnback-box">
                                <span class="btnback-elem">
                                    <img class="iconbtn" src="<?php echo URL;?>public_html/icons/rightarrow24px.png" alt="logo">
                                </span>
                                <span class="btnback-elem">
                                    <img class="iconbtn" src="<?php echo URL;?>public_html/icons/rightarrow24px.png" alt="logo">
                                </span>
                            </div>
                        </button>
                    </a>
                    <!-- Boton Opciones header -->
                    <a class="btnheader" href="<?php echo URL;?>inventarios">Inventario</a>
                    <a class="btnheader" href="<?php echo URL;?>ventas">Ventas</a>
                    <a href="<?php echo URL;?>login/cerrar" tabindex="-1" aria-disabled="true">
                        <button class="noselect">
                            <span class="text">Cerrar Sesión</span>
                            <span class="icon">
                                <img src="<?php echo URL;?>public_html/icons/logout24px.png" alt="logo">
                            </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    <!-- Inicio Opciones para ver el reporte -->
    <div class="continformes">
        <label class="labelReportes" for="autoSizingInput">Productos:</label>
        <div class="selectform">
            <select name="id_producto" id="id_producto" class="form-select">
            </select>
        </div>
        <label class="labelReportes" for="autoSizingInput">Categorias:</label>
        <div class="selectform">
            <select name="categoria" id="categoria" class="form-select">
            </select>
        </div>
            
        <div class="formbtn">
            <button class="reportebtn" type="button" id="btnViewReport"><img src="<?php echo URL;?>public_html/icons/informes24px.png" alt="logo"> Ver Reporte</button>
        </div>
    </div>
    <!-- Fin Opciones para ver el reporte -->
    <div class="row">
        <iframe src="" frameborder="0" width="100%" height="900" id="framereporte"></iframe>
    </div>  
</div>
<?php include_once "app/views/sections/scripts.php"; ?>
<script src="<?php echo URL;?>public_html/customjs/reporteinventarios.js"></script>
</body>
</html>