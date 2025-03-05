<?php 
    $title = "Menu Principal";
    include_once "app/views/sections/headhtml.php";
?>
<!-- CSS -->
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/menuprincipal.css">
<body>
    <!-- Contenedor Principal -->
    <div class="menupp">
        <!-- Titulo Barra -->
        <div class="titulomenu">
            <h1>Bienvenidos, Seleccione una opción.</h1>
            <div class="loader"></div>
        </div>
        <!-- Opciones del menu -->
        <div class="opcionesmenu">
            <a href="<?php echo URL;?>inventarios">
                <div class="card1">INVENTARIO <img class="iconmenu" src="<?php echo URL;?>public_html/icons/box128px.png" alt="logo"></div>
            </a>
            <a href="<?php echo URL;?>ventas">
                <div class="card2">VENTAS <img class="iconmenu" src="<?php echo URL;?>public_html/icons/bar128px.png" alt="logo"></div>
            </a>
            <a href="<?php echo URL;?>administracion">
                <div class="card2">ADMINISTRACIÓN <img class="iconmenu" src="<?php echo URL;?>public_html/icons/admin128px.png" alt="logo"></div>
            </a>
        </div>
        <!-- Boton Cerrar Sesion -->
        <div class="botoncerrar">

            <h4 class="nuserH">Usuario: </h4>
            <span class="nuser"><?php echo $_SESSION["nameuser"];?></span>
            
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