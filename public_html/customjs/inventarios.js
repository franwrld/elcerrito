//Variables globales y selectores
const opcionesCont = document.querySelector("#contentListOP");
const tablaCont = document.querySelector("#contentTable");
const pagCont = document.querySelector("#paginacionCont");
const formmain = document.querySelector("#formmain");
const formmain2 = document.querySelector("#formmain2");
const formmain3 = document.querySelector("#formmain3");
// Btn Agregar
const btnNew = document.querySelector("#btnAgregar");
const btnNewEntrada = document.querySelector("#btnAgregarEntrada");
const btnNewSalida = document.querySelector("#btnAgregarSalida");
// Form main
const panelForm = document.querySelector("#contentForm");
const panelForm2 = document.querySelector("#contentForm2");
const panelForm3 = document.querySelector("#contentForm3");

const btnCancelar = document.querySelector("#btnCancelar");
const btnCancelarEntrada = document.querySelector("#btnCancelarEntrada");
const btnCancelarSalida = document.querySelector("#btnCancelarSalida");
const btnGuardarEntrada = document.querySelector("#btnGuardarEntrada");
const btnGuardarSalida = document.querySelector("#btnGuardarSalida");
const btnGuardar = document.querySelector("#btnGuardar");
// Editar guardar cambios
const btnGuardarCambios = document.querySelector("#btnGuardarCambios");
// Titulo Nuevo Producto
const h1form1 = document.querySelector("#h1form1");
// Titulo Editar
const h1form2 = document.querySelector("#h1form2");

// Tabla
const tableContent = document.querySelector("#contentTable table tbody");
//Formulario productos, entradas y salidas
const formProducto=document.querySelector("#formProducto");
const formEntrada=document.querySelector("#formEntrada");
const formSalida=document.querySelector("#formSalida");
// Cuadro de busqueda
const searchText = document.querySelector("#txtSearch");
// Paginacion
const pagination = document.querySelector(".pagination");
const API = new Api();
const objDatos = {
    records: [],
    recordsFilter: [],
    currentPage: 1,
    // Cantidad de celdas a mostrar por pagina
    recordsShow: 20,
    filter: ""
}
//Configuracion de eventos
eventListiners();
function eventListiners() {
    btnNew.addEventListener("click", agregarProducto);
    btnCancelar.addEventListener("click", cancelarProducto);
    btnCancelarEntrada.addEventListener("click", cancelarEntrada);
    btnCancelarSalida.addEventListener("click", cancelarSalida);
    //console.log("Antes de cargar");
    document.addEventListener("DOMContentLoaded", cargarDatos);
    //Guardar producto
    formProducto.addEventListener("submit",guardarProducto);
    formProducto.addEventListener("submit",guardarProductoCambios);
    // Guardar Entrada y Salidas
    formEntrada.addEventListener("submit",guardarEntrada);
    formSalida.addEventListener("submit",guardarSalida);
    //console.log("Despues de cargar");
    searchText.addEventListener("input", aplicarFiltro);
    
}
//Funciones
function guardarProducto(event) {
    event.preventDefault();
    const formData=new FormData(formProducto);
    API.post(formData,"inventarios/save").then(
        data=>{
            if (data.success) {
                cancelarProducto();
                Swal.fire({
                    icon:"info",
                    text:data.msg
                });
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=> {
            console.log("Error:",error);
        }
    );
}

// Guardar ENTRADA
function guardarEntrada(event) {
    event.preventDefault();
    const formData=new FormData(formEntrada);
    API.post(formData,"inventarios/saveEntrada").then(
        data=>{
            if (data.success) {
                cancelarEntrada();
                limpiarFormEntrada();
                Swal.fire({
                    icon:"info",
                    text:data.msg
                });
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=> {
            console.log("Error:",error);
        }
    );
}
// Guardar SALIDA
function guardarSalida(event) {
    event.preventDefault();
    const formData=new FormData(formSalida);
    API.post(formData,"inventarios/saveSalida").then(
        data=>{
            if (data.success) {
                cancelarSalida();
                limpiarFormSalida();
                Swal.fire({
                    icon:"info",
                    text:data.msg
                });
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=> {
            console.log("Error:",error);
        }
    );
}
function aplicarFiltro(element) {
    element.preventDefault();
    objDatos.filter=this.value;
    crearTabla();
}
let api = "inventarios/getAllBebidas";

function cambiarApi(nuevaApi) {
    api = nuevaApi;
    cargarDatos();
    
}

// Guardar Form Cambios
function guardarProductoCambios(event) {
    event.preventDefault();
    const formData=new FormData(formProducto);
    //console.log(formData);
    API.post(formData,"inventarios/update").then(
        data=>{
            //console.log(data.msg);
            if (data.success) {
                cancelarProducto();
                Swal.fire({
                    icon:"info",
                    text:data.msg
                });
            } else {
                Swal.fire({
                    icon:"error",
                    background: "#ff7f00",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=> {
            console.log("Error:",error);
        }
    );

}

function cargarDatos() {
    //console.log("Cargando datos");
    API.get(api).then(
        data => {
            //console.log(data.records);
            if (data.success) {
                objDatos.records = data.records;
                objDatos.currentPage = 1;
                crearTabla();
                cargarProveedor();
                
            } else {
                console.log("Error al recuperar los registros");
            }
        }
    ).catch(
        error => {
            console.error("Error en la llamada:", error);
        }
    );
}
function cargarProveedor() {
    API.get("inventarios/getProveedor")
    .then((data) => {
        if (data.success) {
        const txtProveedor = document.querySelector("#id_proveedor");
        txtProveedor.innerHTML = "";
        data.records.forEach((item, index) => {
            const { id_proveedor, nombre_proveedor } = item;
            const optionProveedor = document.createElement("option");
            optionProveedor.value = id_proveedor;
            optionProveedor.textContent = nombre_proveedor;
            txtProveedor.append(optionProveedor);
        });
        }
    })
    .catch((error) => {
        console.error("Error:", error);
    });
}
// Crear tabla en base a filtro
function crearTabla() {
    if (objDatos.filter == "") {
        objDatos.recordsFilter = objDatos.records.map(item => item);
    } else {
        objDatos.recordsFilter = objDatos.records.filter(
            item => {
                const { id_producto,nombre_producto,precio_unitario,categoria, cantidad_stock,nombre_proveedor } = item;
                if (id_producto.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (nombre_producto.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (precio_unitario.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (categoria.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (cantidad_stock.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (nombre_proveedor.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
            }
        );
    }
    const recordIni = (objDatos.currentPage * objDatos.recordsShow) - objDatos.recordsShow;
    const recordFin = (recordIni + objDatos.recordsShow) - 1;
    let html = "";
    objDatos.recordsFilter.forEach(
        (item, index) => {
            if ((index >= recordIni) && (index <= recordFin)) {
                html += `<tr>
                    <td>${item.id_producto}</td>
                    <td>${item.nombre_producto}</td>
                    <td>$ ${item.precio_unitario}</td>
                    <td>${item.categoria}</td>
                    <td>${item.cantidad_stock}</td>
                    <td>${item.nombre_proveedor}</td>
                    <td>
                        <button class="editarbtn" type="button" onclick="editarInventario(${item.id_producto})">
                            <img src="public_html/icons/edit.png" alt="x"/>
                            <span class="msjeditar">Editar</span>
                        </button>
                        <button class="eliminarbtn" type="button" onclick="eliminarInventario(${item.id_producto})">
                            <img src="public_html/icons/trash.png" alt="x"/>
                            <span class="msjeliminar">Eliminar</span>
                        </button>   
                    </td>
                    <td>
                        <button class="entradasbtn" type="button" id="btnAgregarEntrada" onclick="entradasInventario(${item.id_producto})">
                            <img src="public_html/icons/entrada.png" alt="x"/>
                        </button>
                        <button class="salidasbtn" type="button" id="btnAgregarSalida" onclick="salidasInventario(${item.id_producto})">
                            <img src="public_html/icons/salida.png" alt="x"/>
                            <span class="msjeliminar">Eliminar</span>
                        </button>   
                    </td>
                    
                    </tr> `;
            }
        }
    );
    tableContent.innerHTML = html;
    crearPaginacion();
}
// Crear Paginacion
function crearPaginacion() {
    //Borrar elementos
    pagination.innerHTML = "";
    //Boton Anterior
    const elAnterior = document.createElement("li")
    elAnterior.classList.add("page-item");
    elAnterior.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
    elAnterior.onclick = () => {
        objDatos.currentPage = (objDatos.currentPage == 1 ? 1 : --objDatos.currentPage);
        crearTabla();
    }
    pagination.append(elAnterior);
    //Agregando los numeors de pagina
    const totalPage = Math.ceil(objDatos.recordsFilter.length / objDatos.recordsShow);
    for (let i = 1; i <= totalPage; i++) {
        const el = document.createElement("li");
        el.classList.add("page=item");
        el.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        el.onclick = () => {
            objDatos.currentPage = i;
            crearTabla();
        }
        pagination.append(el);
    }
    //Bonton siguiente
    const elSiguiente = document.createElement("li");
    elSiguiente.classList.add("page-item");
    elSiguiente.innerHTML = `<a class="page-link" href="#">Siguiente</a>`;
    elSiguiente.onclick = () => {
        objDatos.currentPage = (objDatos.currentPage == totalPage ? totalPage : ++objDatos.currentPage);
        crearTabla();
    }
    pagination.append(elSiguiente);
}
// Aplicacion de filtro en cuadro de busqueda
function aplicarFiltro(element) {
    element.preventDefault();
    objDatos.filter = this.value;
    crearTabla();
}


function agregarProducto() {
    opcionesCont.style.display = "none";
    tablaCont.style.display = "none";
    pagCont.style.display = "none";
    btnGuardar.style.display = "";
    btnGuardarCambios.style.display = "none";
    h1form1.style.display = "";
    h1form2.style.display = "none";
    formmain.style.display = "block";
    limpiarForm();
}


function limpiarForm(op) {
    formProducto.reset();
    document.querySelector("#id_producto").value="0";
}

function limpiarFormEntrada() {
    // Obtener el campo de fecha
    var fecha_entrada = document.getElementById('fecha_entrada');

    // Resetear el formulario
    formEntrada.reset();

    // Obtener la fecha actual en el formato YYYY-MM-DD
    var fechaActual = new Date().toISOString().split('T')[0];

    // Establecer la fecha actual en el campo de fecha después del reset
    fecha_entrada.value = fechaActual;
}

function limpiarFormSalida() {
    // Obtener el campo de fecha
    var fecha_salida = document.getElementById('fecha_salida');

    // Resetear el formulario
    formSalida.reset();

    // Obtener la fecha actual en el formato YYYY-MM-DD
    var fechaActual = new Date().toISOString().split('T')[0];

    // Establecer la fecha actual en el campo de fecha después del reset
    fecha_salida.value = fechaActual;
}

function cancelarProducto() {
    opcionesCont.style.display = "";
    tablaCont.style.display = "";
    pagCont.style.display = "";
    formmain.style.display = "none";
    cargarDatos();
    limpiarForm();
}

function cancelarEntrada() {
    opcionesCont.style.display = "";
    tablaCont.style.display = "";
    pagCont.style.display = "";
    formmain2.style.display = "none";
    cargarDatos();
    limpiarFormEntrada();
}

function cancelarSalida() {
    opcionesCont.style.display = "";
    tablaCont.style.display = "";
    pagCont.style.display = "";
    formmain3.style.display = "none";
    cargarDatos();
    limpiarFormSalida();
}

function mostrarDatosForm(record) {
    const { id_producto,nombre_producto, precio_unitario, categoria, cantidad_stock,nombre_proveedor } = record;
    document.querySelector("#id_producto").value = id_producto;
    document.querySelector("#nombre_producto").value = nombre_producto;
    document.querySelector("#precio_unitario").value = precio_unitario;
    document.querySelector("#categoria").value = categoria;
    document.querySelector("#cantidad_stock").value = cantidad_stock;
    document.querySelector("#nombre_proveedor").value = nombre_proveedor;
}


function editarInventario(id) {
    opcionesCont.style.display = "none";
    tablaCont.style.display = "none";
    pagCont.style.display = "none";
    btnGuardar.style.display = "none";
    btnGuardarCambios.style.display = "";
    h1form1.style.display = "none";
    h1form2.style.display = "";
    formmain.style.display = "block";
    API.get("inventarios/getOneInventario?id="+id).then(
        data=>{
            if (data.success) {
                mostrarDatosForm(data.records[0]);
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}
function entradasInventario(id) {
    opcionesCont.style.display = "none";
    tablaCont.style.display = "none";
    pagCont.style.display = "none";
    formmain2.style.display = "block";
    API.get("inventarios/getOneInventarioEntrada?id="+id).then(
        data=>{
            if (data.success) {
                mostrarDatosFormEntrada(data.records[0]);
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}

function mostrarDatosFormEntrada(record) {
    const { id_producto,nombre_producto } = record;
    document.querySelector("#id_productoE").value = id_producto;
    document.querySelector("#nombre_productoE").value = nombre_producto;
}
function salidasInventario(id) {
    opcionesCont.style.display = "none";
    tablaCont.style.display = "none";
    pagCont.style.display = "none";
    formmain3.style.display = "block";
    API.get("inventarios/getOneInventarioSalida?id="+id).then(
        data=>{
            if (data.success) {
                mostrarDatosFormSalida(data.records[0]);
            } else {
                Swal.fire({
                    icon:"error",
                    title:"Error",
                    text:data.msg
                });
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}
function mostrarDatosFormSalida(record) {
    const { id_producto,nombre_producto } = record;
    document.querySelector("#id_productoS").value = id_producto;
    document.querySelector("#nombre_productoS").value = nombre_producto;
}

function eliminarInventario(id) {
    Swal.fire({
        title:"¿Esta seguro de eliminar el registro?",
        showDenyButton:true,
        color: "#ffffff",
        background: "#ff7f00",
        confirmButtonColor:"#000000",
        confirmButtonText:"Si",
        denyButtonText:"No"
    }).then(
        resultado=>{
            console.log(resultado.isConfirmed);
            if (resultado.isConfirmed) {
                API.get("inventarios/eliminarProducto?id="+id).then(
                    data=>{
                        if (data.success) {
                            cancelarProducto();
                        } else {
                            Swal.fire({
                                icon:"error",
                                title:"Error",
                                text:data.msg
                            });
                        }
                    }
                ).catch(
                    error=>{
                        console.log("Error:",error);
                    }
                );
            }
        }       
    );
    console.log("Mensaje de texto");
}

var ordenStockAscendente = true;

function alternarOrden(columna) {
    ordenStockAscendente = !ordenStockAscendente;
    ordenarStock(columna);
}
function ordenarStock() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("tablaInvent");
    switching = true;
    
    while (switching) {
        switching = false;
        rows = table.rows;
        
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[4];
            y = rows[i + 1].getElementsByTagName("td")[4];
            
            var valorX = parseFloat(x.innerHTML);
            var valorY = parseFloat(y.innerHTML);

            if (ordenStockAscendente) {
                if (valorX > valorY) {
                    shouldSwitch = true;
                    break;
                }
            } else {
                if (valorX < valorY) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}
