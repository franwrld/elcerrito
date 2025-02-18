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
    <!-- CSS propio -->
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/informes.css">
    <!-- Icono en el navegador -->
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/logo200px.jpeg" type="image/x-icon">

    <title>Reportes</title>
</head>
<body>
    <!-- Inicio Divicion Segunda Pantalla donde estan el menu y sus opciones -->
    <!-- Contenido de la segunda mitad de la pantalla -->
    <!-- Inicio del Div del titulo, boton nueva cita y cuadro de busqueda -->
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
                    <img class="iconmenu" src="<?php echo URL;?>public_html/icons/inventory-management.png" alt="logo">
                    <!-- Titulo -->
                    <h1>Reportes</h1>
                    <!-- Boton volver -->
                    <a href="<?php echo URL;?>administracion">
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
                    <a class="btnheader" href="<?php echo URL;?>inventarios">Inventarios</a>
                    <a class="btnheader" href="<?php echo URL;?>ventas">Ventas</a>
                    
                </div>
                <div class="head2">
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
         <!-- Contenedor Principal -->
    <div class="menupp">
        <!-- Titulo Barra -->
        <div class="titulomenu">
            <h1>Bienvenidos a informes, Seleccione el informe que desea ver.</h1>
            <div class="loader"></div>
        </div>
        <!-- Opciones del menu -->
        <div class="opcionesmenu">
            <a href="<?php echo URL;?>reporteinventarios">
                <div class="card1">Inventario<img class="iconcard" src="<?php echo URL;?>public_html/icons/box128px.png" alt="logo"></div>
            </a>
            <a href="<?php echo URL;?>reporteventas">
                <div class="card2">Ventas<img class="iconcard" src="<?php echo URL;?>public_html/icons/bar128px.png" alt="logo"></div>
            </a>
            <a href="<?php echo URL;?>reporteproveedores">
                <div class="card2">Proveedores <img class="iconcard" src="<?php echo URL;?>public_html/icons/admin128px.png" alt="logo"></div>
            </a>
        </div>
        <div class="opcionesmenu">
            <a href="<?php echo URL;?>reporteentradas">
                <div class="card1">Entradas Stock<img class="iconcard" src="<?php echo URL;?>public_html/icons/entrada128px.png" alt="logo"></div>
            </a>
            <a href="<?php echo URL;?>reportesalidas">
                <div class="card2">Salidas Stock<img class="iconcard" src="<?php echo URL;?>public_html/icons/salida128px.png" alt="logo"></div>
            </a>
        </div>
    
    
    <!-- Scripts -->
    <?php include_once "app/views/sections/scripts.php"; ?>
    <script src="<?php echo URL;?>public_html/customjs/informes.js"></script>
</body>
</html>
