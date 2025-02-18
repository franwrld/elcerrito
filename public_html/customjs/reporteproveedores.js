//Variables y selectores
const btnViewReport=document.querySelector("#btnViewReport");
const idProveedor=document.querySelector("#id_proveedor");
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
    API.get("proveedores/getAll").then(
        data=>{
            if(data.success) {
                idProveedor.innerHTML="";
                const optionProveedor=document.createElement("option");
                optionProveedor.value="0";
                optionProveedor.textContent="Todos";
                idProveedor.append(optionProveedor);
                data.records.forEach(
                    (item,index)=>{
                        const {id_proveedor,nombre_proveedor}=item;
                        const optionProveedor=document.createElement("option");
                        optionProveedor.value=id_proveedor;
                        optionProveedor.textContent=nombre_proveedor;
                        idProveedor.append(optionProveedor);
                    }
                );
            }
            cargarCategoria();
            
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}


function verReporte(){
    frameReporte.src=`${BASE_API}reporteproveedores/getReporte?idproveedor=${idProveedor.value}`;
}