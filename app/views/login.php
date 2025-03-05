<?php 
    $title = "Login";
    include_once "app/views/sections/headhtml.php";
?>
<!-- CSS -->
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/login.css">
<body>
    <div class="formlogintodo" id="formlogin-ui">
        <form action="login.php" method="post" id="formlogin">
            <div id="formlogin-body">
                <div id="welcome-lines">
                    <img src="<?php echo URL;?>public_html/images/logo200px.jpeg" alt="logo">
                    <div id="welcome-line-2">Ingresar Credenciales</div>
                </div>
                <div id="input-area">
                    <div class="formlogin-inp">
                        <input name="usuario" placeholder="Usuario" type="text" required="required">
                    </div>
                    <div class="formlogin-inp">
                        <input name="password" placeholder="Contraseña" type="password" required="required">
                    </div>
                </div>
                <div id="submit-button-cvr">
                    <button id="submit-button" type="submit">Iniciar Sesión</button>
                </div>
            </div>
            <!-- Mensaje de alerta si el usuario y password son incorrectos -->
            <div class="loginmensaje" role="alert" id="mensaje">
        </form>
    </div>
    <!-- Scripts -->
    <script src="<?php echo URL; ?>public_html/customjs/api.js"></script>
    <script src="<?php echo URL; ?>public_html/customjs/login.js"></script>
</body>
</html>