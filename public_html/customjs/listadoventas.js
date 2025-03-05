//Variables globales y selectores
const opcionesCont = document.querySelector("#contentListOP");
const tablaCont = document.querySelector("#contentTable");
const pagCont = document.querySelector("#paginacionCont");
const formmain = document.querySelector("#formmain")
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
    recordsShow: 20,
    filter: ""
}
//Configuracion de eventos
eventListiners();
function eventListiners() {
    //console.log("Antes de cargar");
    document.addEventListener("DOMContentLoaded", cargarDatos);
    //console.log("Despues de cargar");
}
let api = "listadoventas/getAll";

function cargarDatos() {
    API.get(api).then(
        data=>{
            //console.log(data.records);
            if (data.success) {
                objDatos.records=data.records;
                objDatos.currentPage=1;
                
                if (document.getElementById("ventashoy")) {
                    document.getElementById("ventashoy").innerHTML = "$ " + data.total;
                }
                if (document.getElementById("ventassemana")) {
                    document.getElementById("ventassemana").innerHTML = "$ " + data.totals;
                }
                if (document.getElementById("ventasmes")) {
                    document.getElementById("ventasmes").innerHTML = "$ " + data.totalm;
                }
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
// Crear tabla en base a filtro
function crearTabla() {
    if (objDatos.filter == "") {
        objDatos.recordsFilter = objDatos.records.map(item => item);
    } else {
        objDatos.recordsFilter = objDatos.records.filter(
            item => {
                const { id_producto,nombre_producto,precio,cantidad,numero_pedido,nombre_cliente,fecha_venta} = item;
                if (id_producto.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (nombre_producto.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (precio.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (cantidad.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (numero_pedido.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (nombre_cliente.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
                    return item;
                }
                if (fecha_venta.toUpperCase().search(objDatos.filter.toLocaleUpperCase()) != -1) {
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
                    <td>$ ${item.precio}</td>
                    <td>${item.cantidad}</td>
                    <td>${item.numero_pedido}</td>
                    <td>${item.nombre_cliente}</td>
                    <td>${item.fecha_venta}</td>
                    <td>
                        <button class="eliminarbtn" type="button" onclick="eliminarVenta(${item.id_producto})">
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
function eliminarVenta(id) {
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
                API.get("listadoventas/eliminarVenta?id="+id).then(
                    data=>{
                        if (data.success) {
                            cargarDatos();
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
function cancelarVenta() {
    opcionesCont.style.display = "";
    tablaCont.style.display = "";
    pagCont.style.display = "";
    formmain.style.display = "none";
    cargarDatos();
}

let ordenAscendenteFecha = true;

    function ordenarTabla(columna) {
        const table = document.getElementById("TableListVentas");
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));

        const indiceColumna = Array.from(table.querySelector('thead').querySelectorAll('th')).findIndex(th => th.innerText.toLowerCase().includes(columna.toLowerCase()));

        rows.sort((a, b) => {
            const aFecha = new Date(parseFecha(a.cells[indiceColumna].innerText));
            const bFecha = new Date(parseFecha(b.cells[indiceColumna].innerText));

            return ordenAscendenteFecha ? bFecha - aFecha : aFecha - bFecha;
        });

        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }

        rows.forEach(row => tbody.appendChild(row));

        ordenAscendenteFecha = !ordenAscendenteFecha;
    }

    function parseFecha(fechaString) {
        const partes = fechaString.split('-');
        return `${partes[1]}-${partes[0]}-${partes[2]}`;
    }
