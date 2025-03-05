<?php 
    $title = "Nueva Cuenta";
    include_once "app/views/sections/headhtml.php";
?>
<!-- CSS -->
<link rel="stylesheet" href="<?php echo URL;?>public_html/css/nuevacuentas.css">
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
                    <h1>Nueva Cuenta</h1>
                </div>
                <div class="head2">
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
                    <a class="btnheader" href="<?php echo URL;?>inventarios">Inventario</a>
                    <a class="btnheader" href="<?php echo URL;?>listadoventas">Listado Ventas</a>
                    <?php if ($_SESSION["tipo_usuario"] == "Administrador") { ?>
                    <a class="btnheader" href="<?php echo URL;?>informes">Reportes</a>
                    <?php } ?>
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
        <!-- Fin del header -->
        
        <!-- ___________________________________________________________________________________________________________ -->
        <!-- CUENTAS -->
        <div class="cuentas">

            <!-- Platos, Bebidas Agregar a la cuenta -->
            <div class="menuAdd">

                <div class="menuTitle">
                    <h1 class="h1Menu">MENÚ</h1>
                </div>

                <div class="menuCategoria">
                    <button class="cateButtoms" id="entradasShowBTN"><img class="iconmenu" src="<?php echo URL;?>public_html/icons/entradasmenu32px.png" alt="logo"> Entradas</button>
                    <button class="cateButtoms" id="platosfuertesShowBTN"><img class="iconmenu" src="<?php echo URL;?>public_html/icons/platosf32px.png" alt="logo"> Platos Fuertes</button>
                    <button class="cateButtoms" id="bebidasShowBTN"><img class="iconmenu" src="<?php echo URL;?>public_html/icons/bebidasmenu32px.png" alt="logo"> Bebidas</button>
                </div>

                <div class="MenuMensaje" id="MenuMensaje">
                    <h1>Seleccione una categoría para mostrar el Menú</h1>
                </div>
                <!-- ENTRADAS _____________________________________________________________________________________-->
                <div class="menuProductos" id="entradas">

                    <div class="card" onclick="agregarProducto(1001,'Papas Fritas', 3.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/papasfritas.jpg" alt="logo">
                        </div>
                        <span class="title">Papas Fritas</span>
                        <span class="price">$ 3.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1002,'Nachos El Cerrito', 7.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/nachoselcerrito.jpg" alt="logo">
                        </div>
                        <span class="title">Nachos El Cerrito</span>
                        <span class="price">$ 7.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1003,'Carnitas de Res', 3.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/carnitas.jpg" alt="logo">
                        </div>
                        <span class="title">Carnitas de Res</span>
                        <span class="price">$ 3.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1004,'Sopa El Cerrito', 3.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/sopaelcerrito.jpg" alt="logo">
                        </div>
                        <span class="title">Sopa El Cerrito</span>
                        <span class="price">$ 3.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1005,'Costilla Ahumada', 5.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/costillaahumada.jpg" alt="logo">
                        </div>
                        <span class="title">Costilla Ahumada</span>
                        <span class="price">$ 5.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1006,'Chorizo a la Parrilla', 3.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/chorizo.jpg" alt="logo">
                        </div>
                        <span class="title">Chorizo a la Parrilla</span>
                        <span class="price">$ 3.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1007,'Camarones Pequeños', 9.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/camaronespeque.jpg" alt="logo">
                        </div>
                        <span class="title">Camarones Pequeños</span>
                        <span class="price">$ 9.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1008,'Jalapeños Rellenos', 5.95)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/jalapenosrellenos.jpg" alt="logo">
                        </div>
                        <span class="title">Jalapequeños Rellenos</span>
                        <span class="price">$ 5.95</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1009,'Chicharrones', 7.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/chicharrones.jpg" alt="logo">
                        </div>
                        <span class="title">Chicharrones</span>
                        <span class="price">$ 7.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1010,'Alitas 6 Porciones', 4.95)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/alitas6.jpg" alt="logo">
                        </div>
                        <span class="title">Alitas 6 Porciones</span>
                        <span class="price">$ 4.95</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1011,'Alitas 12 Porciones', 7.95)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/entradas/alitas12.jpg" alt="logo">
                        </div>
                        <span class="title">Alitas 12 Porciones</span>
                        <span class="price">$ 7.95</span>
                    </div>

                </div>
                <!-- FIN ENTRADAS _____________________________________________________________________________________-->
                <!-- PLATOS FUERTES _____________________________________________________________________________________-->
                <div class="menuProductos" id="platosfuertes">
                    <!-- PLATOS FUERTES -->

                    <div class="card" onclick="agregarProducto(1020,'Tacos Mexicanos', 6.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/tacos.jpg" alt="logo">
                        </div>
                        <span class="title">TACOS Mexicanos</span>
                        <span class="price">$ 4.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1029,'Burrito', 3.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/burrito.jpg" alt="logo">
                        </div>
                        <span class="title">Burrito</span>
                        <span class="price">$ 3.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1021,'Ceviche', 8.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/ceviche.jpg" alt="logo">
                        </div>
                        <span class="title">Ceviche</span>
                        <span class="price">$ 8.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1022,'Coctel de Conchas', 7.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/coctelconchas.jpg" alt="logo">
                        </div>
                        <span class="title">Coctel de Conchas</span>
                        <span class="price">$ 7.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1024,'Parrillada Argentina', 12.99)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/parrilladaarg.jpg" alt="logo">
                        </div>
                        <span class="title">Parrillada Argentina</span>
                        <span class="price">$ 12.99</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1025,'Hamburguesa', 7.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/burger.jpg" alt="logo">
                        </div>
                        <span class="title">Hamburguesa</span>
                        <span class="price">$ 7.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1026,'Quesadilas Mexicanas', 6.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/quesadillasmexas.jpg" alt="logo">
                        </div>
                        <span class="title">Quesadilas Mexicanas</span>
                        <span class="price">$ 6.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1027,'Pollo Asado', 7.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/polloasado.jpg" alt="logo">
                        </div>
                        <span class="title">Pollo Asado</span>
                        <span class="price">$ 7.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1028,'Sopa de Gallina India', 7.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/platosfuertes/sopadegallina.jpg" alt="logo">
                        </div>
                        <span class="title">Sopa de Gallina</span>
                        <span class="price">$ 7.00</span>
                    </div>

                </div>
                <!-- FIN PLATOS FUERTES _____________________________________________________________________________________-->
                <!-- BEBIDAS _______________________________________________________________________ -->
                <div class="menuProductos" id="bebidas">
                    <!-- BEBIDAS -->
                    <div class="card" onclick="agregarProducto(1041,'Coca Cola LATA', 1.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/cocacolalata.jpg" alt="logo">
                        </div>
                        <span class="title">Coca Cola LATA</span>
                        <span class="price">$ 1.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1063,'Pepsi LATA', 1.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/pepsi.jpg" alt="logo">
                        </div>
                        <span class="title">Pepsi LATA</span>
                        <span class="price">$ 1.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1042,'Sprite LATA', 1.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/sprite.jpg" alt="logo">
                        </div>
                        <span class="title">Sprite LATA</span>
                        <span class="price">$ 1.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1043,'Fanta LATA', 1.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/fanta.jpg" alt="logo">
                        </div>
                        <span class="title">FANTA LATA</span>
                        <span class="price">$ 1.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1044,'Naranjada', 1.75)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/naranjada.jpg" alt="logo">
                        </div>
                        <span class="title">Naranjada</span>
                        <span class="price">$ 1.75</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1045,'Del Valle Naranja', 1.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/delvallenaranja.jpg" alt="logo">
                        </div>
                        <span class="title">Del Valle Naranja</span>
                        <span class="price">$ 1.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1064,'Del Valle Mandarina', 1.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/delvallemandarina.jpg" alt="logo">
                        </div>
                        <span class="title">Del Valle Mandarina</span>
                        <span class="price">$ 1.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1066,'Del Valle Guayaba', 1.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/delvalleguayaba.jpg" alt="logo">
                        </div>
                        <span class="title">Del Valle Guayaba</span>
                        <span class="price">$ 1.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1046,'Frozen', 2.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/frozen.jpg" alt="logo">
                        </div>
                        <span class="title">Frozen</span>
                        <span class="price">$ 2.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1065,'Horchata', 1.75)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/horchata.jpg" alt="logo">
                        </div>
                        <span class="title">Horchata</span>
                        <span class="price">$ 1.75</span>
                    </div>
                    
                    <div class="card" onclick="agregarProducto(1047,'Limonada Rosa', 1.95)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/limorosa.jpg" alt="logo">
                        </div>
                        <span class="title">Limonada Rosa</span>
                        <span class="price">$ 1.95</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1048,'Limonada', 1.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/limonada.jpg" alt="logo">
                        </div>
                        <span class="title">Limonada</span>
                        <span class="price">$ 1.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1049,'Agua de Coco', 1.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/aguacoco.jpg" alt="logo">
                        </div>
                        <span class="title">Agua de Coco</span>
                        <span class="price">$ 1.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1050,'Té Frio Limon', 1.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/icetealemon.jpg" alt="logo">
                        </div>
                        <span class="title">Té Frio Limon</span>
                        <span class="price">$ 1.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1067,'Té Frio Frambuesa', 1.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/liptonfranbuesa.jpg" alt="logo">
                        </div>
                        <span class="title">Té Frio Frambuesa</span>
                        <span class="price">$ 1.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1051,'Agua Botella', 1.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/aguabotella.jpg" alt="logo">
                        </div>
                        <span class="title">Agua Botella</span>
                        <span class="price">$ 1.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1052,'Pilsener', 1.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/pilsener.jpg" alt="logo">
                        </div>
                        <span class="title">Pilsener</span>
                        <span class="price">$ 1.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1053,'Golden', 1.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/golden.jpg" alt="logo">
                        </div>
                        <span class="title">Golden</span>
                        <span class="price">$ 1.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1054,'Suprema', 1.50)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/suprema.jpg" alt="logo">
                        </div>
                        <span class="title">Suprema</span>
                        <span class="price">$ 1.50</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1055,'Corona', 2.25)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/corona.jpg" alt="logo">
                        </div>
                        <span class="title">Corona</span>
                        <span class="price">$ 2.25</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1056,'Heineken', 2.25)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/heineken.jpg" alt="logo">
                        </div>
                        <span class="title">Heineken</span>
                        <span class="price">$ 2.25</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1057,'Ultra', 2.25)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/ultra.jpg" alt="logo">
                        </div>
                        <span class="title">Ultra</span>
                        <span class="price">$ 2.25</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1058,'Cadejo', 3.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/cadejo.jpg" alt="logo">
                        </div>
                        <span class="title">Cadejo</span>
                        <span class="price">$ 3.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1059,'Mix Michelada', 2.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/michelada.jpg" alt="logo">
                        </div>
                        <span class="title">Mix Michelada</span>
                        <span class="price">$ 2.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1060,'Vino Tinto', 20.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/vinotintobotella.jpg" alt="logo">
                        </div>
                        <span class="title">Vino Tinto</span>
                        <span class="price">$ 20.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1061,'Vino Blanco', 20.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/vinoblancobotella.jpg" alt="logo">
                        </div>
                        <span class="title">Vino Blanco</span>
                        <span class="price">$ 20.00</span>
                    </div>

                    <div class="card" onclick="agregarProducto(1062,'Copa de Vino', 4.00)">
                        <div class="image">
                            <img class="IMGMenu" src="<?php echo URL;?>public_html/menufotos/bebidas/copavino.jpg" alt="logo">
                        </div>
                        <span class="title">Copa de Vino</span>
                        <span class="price">$ 4.00</span>
                    </div>

                    

                </div> 
                <!-- FIN BEBIDAS _______________________________________________________________________ -->
            </div>

            <!-- Tabla de productos y Total realizar venta -->
            <div class="tablacuenta">

                <div class="tablamenutitle">
                    <h1 class="h1T">CUENTA</h1>
                </div>
                <!-- Tabla cuenta -->
                <div class="tablaContenido">

                    <h2>Detalle de la Orden</h2>

                    <p>Número de Pedido: <span id="numeroPedido"></span></p>

                    <div class="numycaj">
                        <label class="nameClient" for="nombreCliente">Nombre del Cliente:</label>
                        <input class="inputClient" type="text" id="nombreCliente" placeholder="Cliente" value="Cliente">
                        
                        <h4 class="nuserH">Cajero/a: </h4>
                        <span class="nuser"><?php echo $_SESSION["nameuser"];?></span>
                    </div> 

                    <p id="fechaActual"></p>

                    <table id="detalle">
                        <tr>
                            <th>ID Producto</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="descam">
                        <label class="txtlabel" for="descuento">Descuento (%)</label>
                        <input class="tablaInput" type="text" id="descuento" placeholder="Cantidad">
                        <button class="tablaButtom" onclick="aplicarDescuento()">Aplicar</button>

                        <label class="txtlabelCambio" for="pago">Cantidad Pagada:</label>
                        <input class="tablaInput" type="text" id="pago" placeholder="Cantidad">
                        <button class="tablaButtom" onclick="calcularCambio()">Ver Cambio</button>

                    </div>

                    <div class="totalcambiotxt">

                        <p class="totalP" id="total">Total: $ 0.00</p>
                        <p class="cambioP" id="cambio">Cambio: $ 0.00</p>

                    </div>
                    <div class="tablaBotones">

                        <button class="tablaButtomSave" type="submit" id="btnGuardar" onclick="guardarEnBaseDeDatos()"><img class="iconmenu" src="<?php echo URL;?>public_html/icons/buy32px.png" alt="logo"> Guardar</button>

                        <button class="limpiarbtn" onclick="limpiarTabla()">LIMPIAR
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>

                    </div>

                </div>
                <!-- Fin Tabla cuenta -->
            </div>
            <!-- FIN Tabla de productos y Total realizar venta -->
        </div>
        <!-- FIN CUENTAS -->
    </div>
    <!-- Fin Opciones Crear Cuenta -->      
</div>
    <!-- Scripts -->
    <?php include_once "app/views/sections/scripts.php"; ?>
    
    <script src="<?php echo URL;?>public_html/customjs/nuevacuentas.js"></script>
</body>
</html>