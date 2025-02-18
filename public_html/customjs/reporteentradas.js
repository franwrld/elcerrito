//Variables y selectores
const btnViewReport=document.querySelector("#btnViewReport");
const idProducto=document.querySelector("#id_producto");
const idEntrada=document.querySelector("#id_entrada");
const frameReporte=document.querySelector("#framereporte");
const API=new Api();

//Eventos

eventListener();

function eventListener(){
    document.addEventListener("DOMContentLoaded", cargarDatos);
    btnViewReport.addEventListener("click", verReporte);

}

//Funciones
function cargarDatos() {
    API.get("inventarios/getAll").then(
        data=>{
            if(data.success) {
                idProducto.innerHTML="";
                const optionInventario=document.createElement("option");
                optionInventario.value="0";
                optionInventario.textContent="Todos";
                idProducto.append(optionInventario);
                data.records.forEach(
                    (item,index)=>{
                        const {id_producto,nombre_producto}=item;
                        const optionInventario=document.createElement("option");
                        optionInventario.value=id_producto;
                        optionInventario.textContent=nombre_producto;
                        idProducto.append(optionInventario);
                    }
                );
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}


function verReporte() {
    const fechaInicio = document.querySelector("#fecha_inicio").value;
    const fechaFin = document.querySelector("#fecha_fin").value;

    const url =`${BASE_API}reporteentradas/getReporte?idproducto=${idProducto.value}`;

    // Agregar las fechas al URL si están presentes
    if (fechaInicio && fechaFin) {
        frameReporte.src = `${url}&fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}`;
    } else {
        frameReporte.src = url;
    }
}