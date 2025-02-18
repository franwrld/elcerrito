//Variables y selectores
const btnViewReport=document.querySelector("#btnViewReport");
const idVenta=document.querySelector("#id_venta");
const idV=document.querySelector("#id_v");
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
    API.get("listadoventas/getAll").then(
        data=>{
            if(data.success) {
                idVenta.innerHTML="";
                const optionVenta=document.createElement("option");
                optionVenta.value="0";
                optionVenta.textContent="Todos";
                idVenta.append(optionVenta);
                data.records.forEach(
                    (item,index)=>{
                        const {id_venta,producto}=item;
                        const optionVenta=document.createElement("option");
                        optionVenta.value=id_venta;
                        optionVenta.textContent=producto;
                        idVenta.append(optionVenta);
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

    const url = `${BASE_API}reporteventas/getReporte?idventa=${idVenta.value}&idfecha=${fechaInicio.value}`;

    // Agregar las fechas al URL si están presentes
    if (fechaInicio && fechaFin) {
        frameReporte.src = `${url}&fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}`;
    } else {
        frameReporte.src = url;
    }
}