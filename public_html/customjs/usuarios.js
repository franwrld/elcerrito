//Variables globales y selectores
const opcionesCont = document.querySelector("#contentListOP");
const tablaCont = document.querySelector("#contentTable");
const pagCont = document.querySelector("#paginacionCont");
const formmain = document.querySelector("#formmain");
// Btn Agregar
const btnNew = document.querySelector("#btnAgregar");
const btnGuardar = document.querySelector("#btnGuardar");
const btnGuardarCambios = document.querySelector("#btnGuardarCambios");
// Form
const panelForm = document.querySelector("#contentForm");
const btnCancelar = document.querySelector("#btnCancelar");
const formUsuario=document.querySelector("#formUsuario");
// Tabla
const tableContent = document.querySelector("#contentTable table tbody");
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
    recordsShow: 5,
    filter: ""
}

//Configuracion de eventos
eventListiners();
function eventListiners() {
    btnNew.addEventListener("click", agregarUsuario);
    btnCancelar.addEventListener("click", cancelarUsuario);
    //console.log("Antes de cargar");
    document.addEventListener("DOMContentLoaded", cargarDatos);
    formUsuario.addEventListener("submit",guardarUsuario);
    formUsuario.addEventListener("submit",guardarUsuarioCambios);
    //console.log("Despues de cargar");
    searchText.addEventListener("input", aplicarFiltro);
}

//Funciones
let api = "usuarios/getAllActivos";

function cambiarApi(nuevaApi) {
    api = nuevaApi;
    cargarDatos();

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
// Crear tabla en base a filtro
function crearTabla() {
    if (objDatos.filter == "") {
        objDatos.recordsFilter = objDatos.records.map(item => item);
    } else {
        objDatos.recordsFilter = objDatos.records.filter(
            item => {
                const { id_usuario,usuario,nombre_usuario,apellido_usuario,tipo_usuario, estado_usuario } = item;
                if (id_usuario.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (usuario.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (nombre_usuario.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (apellido_usuario.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (tipo_usuario.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (estado_usuario.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
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
                    <td>${item.id_usuario}</td>
                    <td>${item.usuario}</td>
                    <td>${item.nombre_usuario}</td>
                    <td>${item.apellido_usuario}</td>
                    <td>${item.tipo_usuario}</td>
                    <td>${item.estado_usuario}</td>
                    <td>
                        <button class="editarbtn" type="button" onclick="editarUsuario(${item.id_usuario})">
                            <img src="public_html/icons/edit.png" alt="x"/>
                            <span class="msjeditar">Editar</span>
                        </button>
                        <button class="eliminarbtn" type="button" onclick="eliminarUsuario(${item.id_usuario})">
                            <img src="public_html/icons/trash.png" alt="x"/>
                            <span class="msjeliminar">Eliminar</span>
                        </button>
                    </td>
                    </tr> `;
            }
        }
    );
    //console.log(html);
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

function agregarUsuario() {
    opcionesCont.style.display = "none";
    tablaCont.style.display = "none";
    pagCont.style.display = "none";
    btnGuardarCambios.style.display = "none";
    btnGuardar.style.display = "";
    formmain.style.display = "block";
    limpiarForm();
}

function limpiarForm(op) {
    formUsuario.reset();
    document.querySelector("#id_usuario").value="0";
    if (op) {
        document.querySelector("#password").removeAttribute("required");
    } else {
        document.querySelector("#password").setAttribute("required");
    }
}

function cancelarUsuario() {
    opcionesCont.style.display = "";
    tablaCont.style.display = "";
    pagCont.style.display = "";
    formmain.style.display = "none";
    cargarDatos();
}

function mostrarDatosForm(record) {
    const { id_usuario, usuario, password, nombre_usuario, apellido_usuario, tipo_usuario, estado_usuario } = record;
    document.querySelector("#id_usuario").value = id_usuario;
    document.querySelector("#usuario").value = usuario;
    document.querySelector("#password").value = password;
    document.querySelector("#nombre_usuario").value = nombre_usuario;
    document.querySelector("#apellido_usuario").value = apellido_usuario;
    document.querySelector("#tipo_usuario").value = tipo_usuario;
    document.querySelector("#estado_usuario").value = estado_usuario;
}

// Guardar Form
function guardarUsuario(event) {
    event.preventDefault();
    const formData=new FormData(formUsuario);
    //console.log(formData);
    API.post(formData,"usuarios/save").then(
        data=>{
            //console.log(data.msg);
            if (data.success) {
                cancelarUsuario();
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
// Guardar Form Cambios
function guardarUsuarioCambios(event) {
    event.preventDefault();
    const formData=new FormData(formUsuario);
    //console.log(formData);
    API.post(formData,"usuarios/update").then(
        data=>{
            //console.log(data.msg);
            if (data.success) {
                cancelarUsuario();
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

// EDITAR
function editarUsuario(id) {
    opcionesCont.style.display = "none";
    tablaCont.style.display = "none";
    pagCont.style.display = "none";
    btnGuardar.style.display = "none";
    btnGuardarCambios.style.display = "";
    formmain.style.display = "block";
    API.get("usuarios/getOneUsuario?id="+id).then(
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
// Eliminar Registro

function eliminarUsuario(id) {
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
                API.get("usuarios/eliminarUsuario?id="+id).then(
                    data=>{
                        if (data.success) {
                            cancelarUsuario();
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