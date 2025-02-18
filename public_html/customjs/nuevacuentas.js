//Variables globales y selectores
// Btns
const entradasShowBTN = document.querySelector("#entradasShowBTN");
const platosfuertesShowBTN = document.querySelector("#platosfuertesShowBTN");
const bebidasShowBTN = document.querySelector("#bebidasShowBTN");

const btnGuardar = document.querySelector("#btnGuardar");

// Divs
const MenuMensaje = document.querySelector("#MenuMensaje");

const entradas = document.querySelector("#entradas");
const platosfuertes = document.querySelector("#platosfuertes");
const bebidas = document.querySelector("#bebidas");

//Configuracion de eventos
eventListiners();
function eventListiners() {
    entradasShowBTN.addEventListener("click", mostrarEntradas);
    platosfuertesShowBTN.addEventListener("click", mostrarPlatosFuertes);
    bebidasShowBTN.addEventListener("click", mostrarBebidas);
    //console.log("Antes de cargar");
    
}

function mostrarEntradas() {
    // Ocultar
    bebidas.style.display = "none";
    platosfuertes.style.display = "none";
    MenuMensaje.style.display = "none";
    //Mostrar
    entradas.style.display = "flex"
    
}

function mostrarPlatosFuertes() {
    // Ocultar
    bebidas.style.display = "none";
    entradas.style.display = "none";
    MenuMensaje.style.display = "none";
    //Mostrar
    platosfuertes.style.display = "flex";
}

function mostrarBebidas() {
    // Ocultar
    entradas.style.display = "none"
    platosfuertes.style.display = "none";
    MenuMensaje.style.display = "none";
    //Mostrar
    bebidas.style.display = "flex";
}

// ________ TABLA DE CUENTAS _______________________________________
var total = 0;
// Llama a esta función al inicio para generar el primer número de pedido
generarNumeroPedido();

// Función para generar un número aleatorio único
function generarNumeroPedido() {
    var numeroPedido = Math.floor(Math.random() * 1000000) + 1; // Puedes ajustar según sea necesario
    document.getElementById("numeroPedido").textContent = numeroPedido;
}



function agregarProducto(id, producto, precio) {
    if (producto !== "" && precio !== null) {
        var detalleTabla = document.getElementById("detalle");

        // Buscar si el producto ya está en la tabla
        var encontrado = false;
        for (var i = 1; i < detalleTabla.rows.length; i++) {
            if (detalleTabla.rows[i].cells[1].innerHTML === producto) {
                encontrado = true;
                // Incrementar la cantidad si el producto ya está en la tabla
                var cantidad = parseInt(detalleTabla.rows[i].cells[3].innerHTML) + 1;
                detalleTabla.rows[i].cells[3].innerHTML = cantidad;
                break;
            }
        }

        // Si el producto no está en la tabla, agregar una nueva fila
        if (!encontrado) {
            var row = detalleTabla.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            cell1.innerHTML = id;
            cell2.innerHTML = producto;
            cell3.innerHTML = precio.toFixed(2);
            cell4.innerHTML = 1; // Iniciar la cantidad en 1
            cell5.innerHTML = '<button class="quitar-btn" onclick="quitarProducto(this)">Quitar</button>';
        }

        total += precio;
        actualizarTotal();
    }
}


function quitarProducto(btn) {
    var row = btn.parentNode.parentNode;
    var id = parseInt(row.cells[0].innerHTML);
    var precio = parseFloat(row.cells[2].innerHTML);
    var cantidad = parseInt(row.cells[3].innerHTML);
    
    // Reducir la cantidad o eliminar la fila si la cantidad es 1
    if (cantidad > 1) {
        row.cells[3].innerHTML = cantidad - 1;
    } else {
        row.parentNode.removeChild(row);
    }

    // Actualizar el total restando el precio del producto eliminado
    total -= precio;
    actualizarTotal();

    // Actualizar el array de productos
    productos = productos.filter(function (item) {
        return item.id !== id;
    });
}

function limpiarInputs() {
    // Limpiar el contenido de los inputs
    document.getElementById('nombreCliente').value = "Cliente";
    document.getElementById('descuento').value = "";
    document.getElementById('pago').value = "";
}

function limpiarTabla() {
    var detalleTabla = document.getElementById("detalle");
    detalleTabla.innerHTML = "<tr><th>ID Producto</th><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Acciones</th></tr>";
    total = 0;
    actualizarTotal();
    limpiarCambio();
    limpiarInputs();
}

function limpiarCambio() {
    var cambioElement = document.getElementById("cambio");
    cambioElement.innerHTML = "Cambio: $0.00";
}

function aplicarDescuento() {
    var descuentoInput = document.getElementById("descuento");
    var descuento = parseFloat(descuentoInput.value);

    if (!isNaN(descuento) && descuento >= 0 && descuento <= 100) {
        var descuentoTotal = (descuento / 100) * total;
        total -= descuentoTotal;
        actualizarTotal();
    } else {
        alert("Ingrese un descuento válido entre 0 y 100.");
    }
}

function calcularCambio() {
    var pagoInput = document.getElementById("pago");
    var pago = parseFloat(pagoInput.value);

    if (!isNaN(pago) && pago >= total) {
        var cambio = pago - total;
        var cambioElement = document.getElementById("cambio");
        cambioElement.innerHTML = "Cambio: $" + cambio.toFixed(2);
    } else {
        alert("Ingrese una cantidad válida de pago que sea igual o mayor al total.");
    }
}

function actualizarTotal() {
    var totalElement = document.getElementById("total");
    totalElement.innerHTML = "Total: $" + total.toFixed(2);
}

function mostrarFechaActual() {
    var fechaActual = new Date();
    var dia = fechaActual.getDate();
    var mes = fechaActual.getMonth() + 1;
    var anio = fechaActual.getFullYear();
    var horas = fechaActual.getHours();
    var minutos = fechaActual.getMinutes();
    var segundos = fechaActual.getSeconds();

    // Formatear para que siempre tenga dos dígitos
    mes = mes < 10 ? '0' + mes : mes;
    dia = dia < 10 ? '0' + dia : dia;
    horas = horas < 10 ? '0' + horas : horas;
    minutos = minutos < 10 ? '0' + minutos : minutos;
    segundos = segundos < 10 ? '0' + segundos : segundos;

    // Formato DD/MM/YYYY HH:MM:SS para mostrar al usuario
    var formatoFechaHoraActual = `${dia}/${mes}/${anio} ${horas}:${minutos}:${segundos}`;
    document.getElementById('fechaActual').innerHTML = 'Fecha y hora del pedido: ' + formatoFechaHoraActual;
}

// Llamar a la función al cargar la página para mostrar la fecha y hora inicial
window.onload = function () {
    mostrarFechaActual();
};

function guardarEnBaseDeDatos() {
    var detalleTabla = document.getElementById("detalle");
    var productos = [];
    var numeroPedido = document.getElementById("numeroPedido").textContent;
    var nombreCliente = document.getElementById("nombreCliente").value;

    // Obtener la fecha y hora actual
    var fechaActual = new Date();
    var dia = fechaActual.getDate();
    var mes = fechaActual.getMonth() + 1;
    var anio = fechaActual.getFullYear();
    var horas = fechaActual.getHours();
    var minutos = fechaActual.getMinutes();
    var segundos = fechaActual.getSeconds();

    // Formatear para que siempre tenga dos dígitos
    mes = mes < 10 ? '0' + mes : mes;
    dia = dia < 10 ? '0' + dia : dia;
    horas = horas < 10 ? '0' + horas : horas;
    minutos = minutos < 10 ? '0' + minutos : minutos;
    segundos = segundos < 10 ? '0' + segundos : segundos;

    // Formato YYYY-MM-DD HH:MM:SS para la base de datos
    var fechaHoraFormateada = `${anio}-${mes}-${dia} ${horas}:${minutos}:${segundos}`;

    for (var i = 1; i < detalleTabla.rows.length; i++) {
        var row = detalleTabla.rows[i];
        var producto = {
            id_producto: row.cells[0].innerHTML,
            nombre_producto: row.cells[1].innerHTML,
            precio: parseFloat(row.cells[2].innerHTML),
            cantidad: parseInt(row.cells[3].innerHTML)
        };
        productos.push(producto);
    }

    var data = {
        numero_pedido: numeroPedido,
        nombre_cliente: nombreCliente,
        fecha_venta: fechaHoraFormateada, // Enviar la fecha y hora formateada
        productos: productos
    };

    fetch('nuevacuentas/guardarVenta', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire("Venta Guardada!", "Venta realizada con exito.", "success");
            //alert("Venta guardada correctamente");
            limpiarTabla();
            generarNumeroPedido(); // Generar un nuevo número de pedido
        } else {
            alert("Error al guardar la venta");
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}