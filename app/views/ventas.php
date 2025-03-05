<?php 
    $title = "Ventas";
    
    include_once "app/views/sections/headhtml.php";

?>
<!-- CSS -->
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/ventas.css">
<body>
    <div class="menuventas">
        <div class="tituloventas">
            <h1>Bienvenidos a ventas, Seleccione una opción.</h1>
            <div class="loader"></div>
        </div>
        <div class="opcionesventas">
            <a href="<?php echo URL;?>nuevacuentas">
                <div class="card1">NUEVA CUENTA <img class="iconmenu" src="<?php echo URL;?>public_html/icons/box128px.png" alt="logo"></div>
            </a>
            <a href="<?php echo URL;?>listadoventas">
                <div class="card2">VENTAS <img class="iconmenu" src="<?php echo URL;?>public_html/icons/box128px.png" alt="logo"></div>
            </a>
        </div>
        <div class="botoncerrar">
            <a href="<?php echo URL;?>menuprincipal">
                <button class="volverBTN">
                    Volver <img class="iconbtn" src="<?php echo URL;?>public_html/icons/backbtn24px.png" alt="logo">
                </button>
            </a>

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