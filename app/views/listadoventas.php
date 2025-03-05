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
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/listadoventas.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/tables.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/formulario.css">
    <!-- Icono en el navegador -->
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/logo200px.jpeg" type="image/x-icon">

    <title>ListadoVentas</title>
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
                    <img class="iconmenu" src="<?php echo URL;?>public_html/icons/proveedoresinv.png" alt="logo">
                    <!-- Titulo -->
                    <h1>Listado de ventas</h1>
                    <!-- Boton volver -->
                    <a href="<?php echo URL;?>ventas">
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
                    <a class="btnheader" href="<?php echo URL;?>administracion">Administracion</a>
                    <a class="btnheader" href="<?php echo URL;?>ventas">Ventas</a>
                    <a class="btnheader" href="<?php echo URL;?>nuevacuentas">Nueva Cuenta</a>
                    
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
    <!-- Opciones y Busqueda -->
        <div class="menuventas">
            <div class="tituloventas">
                <h1>Ventas de El Cerrito Bar & Grill </h1>
                <div class="loader"></div>
            </div>
            <?php
            if ($_SESSION["tipo_usuario"]=="Administrador") {
                include_once "app/views/sections/ventasingresos.php";
            } else {
                include_once "app/views/sections/empty.php";
            } 
            ?>
        </div>
        <div class="tabla" id="tableConte">
            <div class="tablacont" id="contentTable">
                <table class="table1" id="TableListVentas">
                    <thead>
                        <th>ID Producto</th>
                        <th>Nombre Prod.</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>No. Pedido</th>
                        <th>Nombre Cliente</th>
                        <th class="thFecha" onclick="ordenarTabla('Fecha de Venta')">Fecha Venta</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        <td>9999</td>
                        <td>Horchata</td>
                        <td>1</td>
                        <td>12424124</td>
                        <td>Admin Prueba</td>
                        <td>2022-02-02</td>
                        <td></td>
        
                        <td>
                            <button class="eliminarbtn" type="button">
                                <img src="<?php echo URL;?>public_html/icons/trash.png" alt="x"/>
                                <span class="msjeliminar">Eliminar</span>
                            </button>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
        <!--Paginacion -->
        <div class="paginacion" id="paginacionCont">
            <nav class="nav">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Anterior </a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente </a></li>
                </ul>
            </nav>
        </div>
        <!-- Fin de paginacion --> 
    <!-- Scripts -->
    <?php include_once "app/views/sections/scripts.php"; ?>
    <script src="<?php echo URL;?>public_html/customjs/listadoventas.js"></script>
</body>
</html>