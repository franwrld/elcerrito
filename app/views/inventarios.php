<?php 
    $title = "Inventarios";
    include_once "app/views/sections/headhtml.php";
?>
<!-- CSS -->
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/inventarios.css">
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/formularioentradas.css">
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/formulariosalidas.css">
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
                    <h1>Inventario</h1>
                    <!-- Boton volver -->
                    <a href="<?php echo URL;?>menuprincipal">
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
                    <?php if ($_SESSION["tipo_usuario"] == "Administrador") { ?>
                    <a class="btnheader" href="<?php echo URL;?>informes">Reportes</a>
                    <?php } ?>
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
                <!-- Boton Ver Bebidas -->
                <button class="opcionesbtn" type="button" onclick="cambiarApi('inventarios/getAllBebidas')"><span class="opcionestxt">Bebidas</span></button>
                <!-- Boton Ver Carnes -->
                <button class="opcionesbtn" type="button" onclick="cambiarApi('inventarios/getAllBebidasDesc')"><span class="opcionestxt">Mayor a Menor</span></button>
                <!-- Boton Ver Aves -->
                <button class="opcionesbtn" type="button" onclick="cambiarApi('inventarios/getAllBebidasAsc')"><span class="opcionestxt">Menor a Mayor</span></button>
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
    <!-- Inicio de la tabla -->
    <div class="tabla" id="tableConte">
            <div class="tablacont" id="contentTable">
                <table class="table1" id="tablaInvent">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio unitario</th>
                        <th>Categoria</th>
                        <th class="thStock" onclick="alternarOrden('stock')">Stock</th>
                        <th>Proveedor</th>
                        <th>Editar - Eliminar</th>
                        <th>Entradas - Salidas de Stock</th>
                    </thead>
                    <tbody>
                        <td>1111</td>
                        <td>Nombre</td>
                        <td>$19</td>
                        <td>Categoria</td>
                        <td>50</td>
                        <td>Proveedor</td>
                        <td>
                            <button class="editarbtn">
                                <img src="<?php echo URL;?>public_html/icons/edit.png" alt="x"/>
                                <span class="msjeditar">Editar</span>
                            </button>
                            <button class="eliminarbtn">
                                <img src="<?php echo URL;?>public_html/icons/trash.png" alt="x"/>
                                <span class="msjeliminar">Eliminar</span>
                            </button>

                            <button class="entradasbtn" type="button" id="btnAgregarEntrada">
                                <img src="public_html/icons/entrada.png" alt="x"/>
                            </button>
                            <button class="salidasbtn" type="button" id="btnAgregarSalida">
                                <img src="public_html/icons/salida.png" alt="x"/>
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
        <!-- Inicio Formulario PRODUCTOS -->
    <div class="formulario" id="formmain">
        <!-- Div el cual cual aparecera al dar clic en agregar FD-Column -->
        <div class="formcont" id="contentForm">
            <!-- Inicio Div con los inputs datos a rellenar FD-Column -->
            <div class="forminputs">
                <form class="form" id="formProducto" enctype="multipart/form-data">
                    <h1 class="tituloform1" id="h1form1">Agregar un nuevo producto</h1>
                    <h1 class="tituloform2" id="h1form2">Modificar Producto</h1>
                    <input type="hidden" name="id_producto" id="id_producto" value="0">
                    <input type="text" class="input" id="nombre_producto" name="nombre_producto" placeholder="Nombre del Producto">
                    <input type="float" class="input" id="precio_unitario" name="precio_unitario" placeholder="Precio Unitario">
                    <input type="float" class="input" id="cantidad_stock" name="cantidad_stock" placeholder="Stock">
                    <label for="categoria">Seleccione una Categoría:</label>
                        <div class="selectform">
                            <select name="categoria" id="categoria" class="form-select">
                                <option value=""></option>  
                                <option value="Bebidas">Bebidas</option>
                                <option value="Carnes">Carnes</option>
                                <option value="Aves">Aves</option>
                                <option value="Mariscos">Mariscos</option>
                                <option value="Panaderia">Panaderia</option>
                                <option value="Otro">Menú</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                    <label for="id_proveedor">Seleccione un Proveedor:</label>
                    <div class="selectform">
                        <select name="id_proveedor" id="id_proveedor" class="form-select">
                        </select>
                    </div>
                    
                    <button class="savebtn" type="submit" id="btnGuardar">Guardar</button>
                    <button class="savecambiosbtn" type="submit" id="btnGuardarCambios">Guardar Cambios</button>
                    <button class="cancelbtn" type="button" id="btnCancelar">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Inicio Formulario ENTRADAS -->
    <div class="formulario2" id="formmain2">
        <!-- Div el cual cual aparecera al dar clic en agregar FD-Column -->
        <div class="formcont2" id="contentForm2">
            <!-- Inicio Div con los inputs datos a rellenar FD-Column -->
            <div class="forminputs2">
                <form class="form2" id="formEntrada" enctype="multipart/form-data">
                    <h1>Entradas Stock</h1>
                    <input type="hidden" name="id_entrada" id="id_entrada" value="0">
                    <label for="fecha_entrada"></label>
                    <input type="date" id="fecha_entrada" name="fecha_entrada">
                    <input type="number" class="input" id="cantidad_entrada" name="cantidad_entrada" placeholder="Cantidad de Entrada">
                    <input type="hidden" class="input" id="id_productoE" name="id_productoE" readonly>
                    <input type="text" class="input" id="nombre_productoE" name="nombre_productoE" readonly>
                    
                    <button class="savebtn2" type="submit" id="btnGuardarEntrada">Guardar</button>
                    <button class="cancelbtn2" type="button" id="btnCancelarEntrada">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Inicio Formulario SALIDAS -->
    <div class="formulario3" id="formmain3">
        <!-- Div el cual cual aparecera al dar clic en agregar FD-Column -->
        <div class="formcont3" id="contentForm3">
            <!-- Inicio Div con los inputs datos a rellenar FD-Column -->
            <div class="forminputs3">
                <form class="form3" id="formSalida" enctype="multipart/form-data">
                    <h1>Salidas Stock</h1>
                    <input type="hidden" name="id_salida" id="id_salida" value="0">
                    <label for="fecha_salida"></label>
                    <input type="date" id="fecha_salida" name="fecha_salida">
                    <input type="number" class="input" id="cantidad_salida" name="cantidad_salida" placeholder="Cantidad de Salida">
                    <input type="hidden" class="input" id="id_productoS" name="id_productoS" readonly>
                    <input type="text" class="input" id="nombre_productoS" name="nombre_productoS" readonly>
                    
                    <button class="savebtn3" type="submit" id="btnGuardarSalida">Guardar</button>
                    <button class="cancelbtn3" type="button" id="btnCancelarSalida">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    
    <!-- Scripts -->
    <?php include_once "app/views/sections/scripts.php"; ?>
    <script src="<?php echo URL;?>public_html/customjs/inventarios.js"></script>
</body>
</html>
