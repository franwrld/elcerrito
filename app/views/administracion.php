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
    <!-- CSS propio del Menu Principal -->
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/administracion.css">
    <!-- Icono en el navegador -->
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/logo200px.jpeg" type="image/x-icon">
    <title>Administración</title>
</head>
<body>
    <!-- Contendor Principal -->
    <div class="menupp">
        <!-- Titulo Barra -->
        <div class="titulomenu">
            <img class="imglogo" src="<?php echo URL;?>public_html/images/logo200px.jpeg" alt="logo">
            <h1>Administración, Seleccione una opción.</h1>
            <div class="loader"></div>
        </div>
        <!-- Opciones del menu -->
        <div class="opcionesmenu">
            <div class="btn1">
                <img class="iconmenu" src="<?php echo URL;?>public_html/icons/informes32px.png" alt="logo">
                <a class="fancy" href="<?php echo URL;?>informes">
                    <span class="top-key"></span>
                    <span class="text">REPORTES</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
            </div>
            <div class="btn1">
                <img class="iconmenu" src="<?php echo URL;?>public_html/icons/users32px.png" alt="logo">
                <a class="fancy" href="<?php echo URL;?>usuarios">
                    <span class="top-key"></span>
                    <span class="text">USUARIOS</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
            </div>
            <div class="btn1">
                <img class="iconmenu" src="<?php echo URL;?>public_html/icons/proveedores32px.png" alt="logo">
                <a class="fancy" href="<?php echo URL;?>proveedores">
                    <span class="top-key"></span>
                    <span class="text">PROVEEDORES</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
            </div>
            <div class="btn1">
                <img class="iconmenu" src="<?php echo URL;?>public_html/icons/about32px.png" alt="logo">
                <a class="fancy" href="<?php echo URL;?>acercade">
                    <span class="top-key"></span>
                    <span class="text">ACERCA DE</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
            </div>
            <div class="btn1">
                <img class="iconmenu" src="<?php echo URL;?>public_html/icons/manual32px.png" alt="logo">
                <a class="fancy" onclick="abrirManual()">
                    <span class="top-key"></span>
                    <span class="text">MANUAL DE USUARIO</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
            </div>
            <div class="btn1">
                <img class="iconmenu" src="<?php echo URL;?>public_html/icons/back32px.png" alt="logo">
                <a class="fancy" href="<?php echo URL;?>menuprincipal">
                    <span class="top-key"></span>
                    <span class="text">VOLVER AL MENÚ PRINCIPAL</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </a>
            </div>
        </div>
        <!-- Boton Cerrar Sesion -->
        <div class="botoncerrar">
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
    <!-- Scripts -->
    <?php include_once "app/views/sections/scripts.php"; ?>
</body>
</html>