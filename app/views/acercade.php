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
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/acercade.css">
    <!-- Icono en el navegador -->
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/logo200px.jpeg" type="image/x-icon">
    <title>Acerca de</title>
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
                    <img class="iconmenu" src="<?php echo URL;?>public_html/icons/about32px.png" alt="logo">
                    <!-- Titulo -->
                    <h1>Acerca de</h1>
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
                    <a class="btnheader" href="<?php echo URL;?>Inventarios">Inventarios</a>
                    <a class="btnheader" href="<?php echo URL;?>ventas">El Cerrito</a>
                    <a class="btnheader" href="<?php echo URL;?>informes">Informes</a>
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
    </div>
    <div class="AcercadeHead">

        <h2>Sistema de Información de El Cerrito "Bar & Grill"</h2>
        <h3>Implantación de un sistema de información de control de inventario e ingresos a fin de optimizar los procesos de El Cerrito "Bar & Grill". </h3>

        <div class="logosabout">
            <img src="public_html/images/logo200px.jpeg">

            <img class="logounicaes" src="public_html/images/unicaeslogo.png">
        </div>

        <div class="aboutText">
            <p class="descriptxt">
            La implementación de este sistema de información fue realizada en conjunto con estudiantes de la Universidad Católica de El Salvador.
            Como parte del proceso académico de la carrera Licenciatura en Sistemas Informáticos Administrativos.<br>

                <br>Contactos de soporte.
            </p>
        </div>

        <div class="aboutcards">
            <div class="card">
                <center>
                <div class="profileimage">
                    <img class="pfp" src="public_html/images/programmer128px.png">
                </div>
                <div class="Name">
                    <p>Carlos Francisco Ruiz Cortez</p>
                </div>
                <div class="socialbar">
                    <img class="iconemail" src="public_html/images/email24px.png"> 
                    carlos.ruiz4@catolica.edu.sv
                </div>
                </center>
            </div>

            <div class="card">
                <center>
                <div class="profileimage">
                    <img class="pfp" src="public_html/images/programmer128px.png">
                </div>
                <div class="Name">
                    <p>Diego Ernesto Ramirez Rivera</p>
                </div>
                <div class="socialbar">
                    <img class="iconemail" src="public_html/images/email24px.png"> 
                    diego.ramirez@catolica.edu.sv
                </div>
                </center>
            </div>
        </div>

        <div class="aboutText">
            <h1>Versión del Sistema: v.2.0</h1>
        </div>
        <p style="color: white;">&copy; 2025 El Cerrito</p>
    </div>
    <!-- Scripts -->
    <?php include_once "app/views/sections/scripts.php"; ?>
</body>
</html>