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
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/proveedores.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/tables.css">
    <link rel="stylesheet" href="<?php echo URL;?>public_html/css/formulario.css">
    <!-- Icono en el navegador -->
    <link rel="shortcut icon" href="<?php echo URL;?>public_html/images/logo200px.jpeg" type="image/x-icon">

    <title>Proveedores</title>
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
                    <a href="<?php echo URL;?>menuprincipaluser">
                        <img class="imglogo" src="<?php echo URL;?>public_html/images/logo200px.jpeg" alt="logo">
                    </a>
                    <!-- Icono -->
                    <img class="iconmenu" src="<?php echo URL;?>public_html/icons/proveedoresinv.png" alt="logo">
                    <!-- Titulo -->
                    <h1>Proveedores</h1>
                    <!-- Boton volver -->
                    <a href="<?php echo URL;?>administracionuser">
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
                    <a class="btnheader" href="<?php echo URL;?>inventariosuser">Inventarios</a>
                    <a class="btnheader" href="<?php echo URL;?>ventasuser">Ventas</a>
                    
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
    <div class="opciones" id="contentListOP">
            <div class="opcionescont">
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
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Editar - Eliminar</th>
                    </thead>
                    <tbody>
                        <td>1111</td>
                        <td>JamesHarden21</td>
                        <td>1234-7845</td>
        
                        <td>
                            <button class="editarbtn" type="button" onclick="editarProveedor(${item.id_proveedor})">
                                <img src="<?php echo URL;?>public_html/icons/edit.png" alt="x"/>
                                <span class="msjeditar">Editar</span>
                            </button>
                            <button class="eliminarbtn" type="button" onclick="eliminarProveedor(${item.id_proveedor})">
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
        <!--Inicio Formulario -->
        <div class="formulario" id="formmain">
        <!-- Div el cual cual aparecera al dar clic en agregar FD-Column -->
        <div class="formcont" id="contentForm">
            <!-- Inicio Div con los inputs datos a rellenar FD-Column -->
            <div class="forminputs">
                <form class="form" id="formProveedor" enctype="multipart/form-data">
                    Crear Proveedor 
                    <input type="hidden" name="id_proveedor" id="id_proveedor" value="0">
                    <input type="text" class="input" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre del Proveedor">
                    <input type="text" class="input" id="contacto_proveedor" name="contacto_proveedor" placeholder="Contacto">          
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
    <script src="<?php echo URL;?>public_html/customjs/proveedores.js"></script>
</body>
</html>
