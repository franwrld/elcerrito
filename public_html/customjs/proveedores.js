//Variables globales y selectores
const opcionesCont = document.querySelector("#contentListOP");
const tablaCont = document.querySelector("#contentTable");
const pagCont = document.querySelector("#paginacionCont");
const formmain = document.querySelector("#formmain")
// Btn Agregar
const btnNew = document.querySelector("#btnAgregar");
const btnGuardar = document.querySelector("#btnGuardar");
const btnGuardarCambios = document.querySelector("#btnGuardarCambios");
// Form
const panelForm = document.querySelector("#contentForm");
const btnCancelar = document.querySelector("#btnCancelar");
const formProveedor=document.querySelector("#formProveedor");
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
    btnNew.addEventListener("click",agregarProveedor);
    btnCancelar.addEventListener("click", cancelarProveedor);
    //console.log("Antes de cargar");
    document.addEventListener("DOMContentLoaded", cargarDatos);
    formProveedor.addEventListener("submit",guardarProveedor);
    formProveedor.addEventListener("submit",guardarProveedorCambios);
    //console.log("Despues de cargar");
    searchText.addEventListener("input", aplicarFiltro);
}
//Guardar proveedor
function guardarProveedor(event) {
    event.preventDefault();
    const formData=new FormData(formProveedor);
    API.post(formData,"proveedores/save").then(
        data=>{
            if (data.success) {
                cancelarProveedor();
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
// Guardar Form Cambios
function guardarProveedorCambios(event) {
    event.preventDefault();
    const formData=new FormData(formProveedor);
    //console.log(formData);
    API.post(formData,"proveedores/update").then(
        data=>{
            //console.log(data.msg);
            if (data.success) {
                cancelarProveedor();
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
    API.get("proveedores/getAll").then(
        data=>{
            //console.log(data.records);
            if (data.success) {
                objDatos.records=data.records;
                objDatos.currentPage=1;
                crearTabla();
            } else {
                console.log("Error al recuperar los registros");
            }
        }
    ).catch(
        error=>{
            console.error("Error en la llamada:",error);
        }
    );

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
function agregarProveedor() {
    opcionesCont.style.display = "none";
    tablaCont.style.display = "none";
    pagCont.style.display = "none";
    btnGuardarCambios.style.display = "none";
    btnGuardar.style.display = "";
    formmain.style.display = "block";
    limpiarForm();
}
function limpiarForm(op) {
    formProveedor.reset();
    document.querySelector("#id_proveedor").value="0";
}

function cancelarProveedor() {
    opcionesCont.style.display = "";
    tablaCont.style.display = "";
    pagCont.style.display = "";
    formmain.style.display = "none";
    cargarDatos();
}
function mostrarDatosForm(record) {
    const { id_proveedor, nombre_proveedor,contacto_proveedor } = record;
    document.querySelector("#id_proveedor").value = id_proveedor;
    document.querySelector("#nombre_proveedor").value = nombre_proveedor;
    document.querySelector("#contacto_proveedor").value = contacto_proveedor;
}

// EDITAR
function editarProveedor(id) {
    opcionesCont.style.display = "none";
    tablaCont.style.display = "none";
    pagCont.style.display = "none";
    btnGuardar.style.display = "none";
    btnGuardarCambios.style.display = "";
    formmain.style.display = "block";
    API.get("proveedores/getOneProveedor?id="+id).then(
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
function eliminarProveedor(id) {
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
                API.get("proveedores/eliminarProveedor?id="+id).then(
                    data=>{
                        if (data.success) {
                            cancelarProveedor();
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
// Aplicacion de filtro en cuadro de busqueda
function aplicarFiltro(element) {
    element.preventDefault();
    objDatos.filter = this.value;
    crearTabla();
}
// Crear tabla en base a filtro
function crearTabla() {
    if (objDatos.filter == "") {
        objDatos.recordsFilter = objDatos.records.map(item => item);
    } else {
        objDatos.recordsFilter = objDatos.records.filter(
            item => {
                const { id_proveedor,nombre_proveedor,contacto_proveedor} = item;
                if (id_proveedor.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (nombre_proveedor.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (contacto_proveedor.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
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
                    <td>${item.id_proveedor}</td>
                    <td>${item.nombre_proveedor}</td>
                    <td>${item.contacto_proveedor}</td>
                    <td>
                        <button class="editarbtn" type="button" onclick="editarProveedor(${item.id_proveedor})">
                            <img src="public_html/icons/edit.png" alt="x"/>
                            <span class="msjeditar">Editar</span>
                        </button>
                        <button class="eliminarbtn" type="button" onclick="eliminarProveedor(${item.id_proveedor})">
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



