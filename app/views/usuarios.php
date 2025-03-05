<?php 
    $title = "Usuarios";
    include_once "app/views/sections/headhtml.php";
?>
<!-- CSS -->
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/usuarios.css">

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
                    <img class="iconmenu" src="<?php echo URL;?>public_html/icons/users32px.png" alt="logo">
                    <!-- Titulo -->
                    <h1>USUARIOS</h1>
                </div>
                <div class="head2">
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
                    <a class="btnheader" href="<?php echo URL;?>inventarios">Inventario</a>
                    <a class="btnheader" href="<?php echo URL;?>ventas">El Cerrito</a>
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
        <div class="opciones" id="contentListOP">
            <div class="opcionescont">
                <!-- Boton Ver Activos -->
                <button class="opcionesbtn" type="button" onclick="cambiarApi('usuarios/getAllActivos')"><span class="opcionestxt">Activos</span></button>
                <!-- Boton Ver Inactivos -->
                <button class="opcionesbtn" type="button" onclick="cambiarApi('usuarios/getAllInactivos')"><span class="opcionestxt">Inactivos</span></button>
                <!-- Boton Ver Todos -->
                <button class="opcionesbtn" type="button" onclick="cambiarApi('usuarios/getAll')"><span class="opcionestxt">Todos</span></button>
                 <!-- Boton Agregar -->
                <button class="addbtn" type="button" id="btnAgregar">
                    <span>
                        <img src="<?php echo URL;?>public_html/icons/add24px.png" alt="x"/>
                        Agregar
                    </span>
                </button>
            </div>
            <div class="searchbox">
                <input class="searchinput" type="search" placeholder="Buscar" name="text" class="input" id="txtSearch">
                <img class="imgsearch" src="<?php echo URL;?>public_html/icons/lupa.png" alt="x"/>
            </div>
        </div>
        <div class="tabla" id="tableConte">
            <div class="tablacont" id="contentTable">
                <table class="table1">
                    <thead>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Editar - Eliminar</th>
                    </thead>
                    <tbody>
                        <td>1111</td>
                        <td>JamesHarden21</td>
                        <td>James</td>
                        <td>Harden</td>
                        <td>Admin</td>
                        <td>Activo</td>
                        <td>
                            <button class="editarbtn" type="button" onclick="editarUsuario()">
                                <img src="<?php echo URL;?>public_html/icons/edit.png" alt="x"/>
                                <span class="msjeditar">Editar</span>
                            </button>
                            <button class="eliminarbtn" type="button" onclick="eliminarUsuario()">
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
        <!-- Inicio Formulario -->
    <div class="formulario" id="formmain">
        <!-- Div el cual cual aparecera al dar clic en agregar FD-Column -->
        <div class="formcont" id="contentForm">
            <!-- Inicio Div con los inputs datos a rellenar FD-Column -->
            <div class="forminputs">
                <form class="form" id="formUsuario" enctype="multipart/form-data">
                    Crear Usuario Nuevo
                    <input type="hidden" name="id_usuario" id="id_usuario" value="0">
                    <input type="text" class="input" id="usuario" name="usuario" placeholder="Usuario">
                    <input type="password" class="input" id="password" name="password" placeholder="Contraseña">
                    <input type="text" class="input" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre">
                    <input type="text" class="input" id="apellido_usuario" name="apellido_usuario" placeholder="Apellido">
                    
                    <label for="tipo_usuario">Tipo de Usuario:</label>
                    <div class="selectform">
                    <select name="tipo_usuario" id="tipo_usuario">
                        <option value=""></option>
                        <option value="Administrador">Administrador</option>
                        <option value="Cajero">Cajero</option>
                    </select>
                    </div>
                    
                    <label for="estado_usuario">Estado:</label>
                    <div class="selectform">
                    <select name="estado_usuario" id="estado_usuario" placeholder="Estado de Usuario">
                        <option value=""></option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                    </div>
                    
                    <button class="savebtn" type="submit" id="btnGuardar">Guardar</button>
                    <button class="savecambiosbtn" type="submit" id="btnGuardarCambios">Guardar Cambios</button>
                    <button class="cancelbtn" type="button" id="btnCancelar">Cancelar</button>
                </form>
            </div>
        </div>
    </div> 
</div>
    <!-- Scripts -->
    <?php include_once "app/views/sections/scripts.php"; ?>
    <script src="<?php echo URL;?>public_html/customjs/usuarios.js"></script>
</body>
</html>