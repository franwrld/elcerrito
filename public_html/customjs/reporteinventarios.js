//Variables y selectores
const btnViewReport=document.querySelector("#btnViewReport");
const idProducto=document.querySelector("#id_producto");
const Categoria=document.querySelector("#categoria");
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
            cargarCategoria();
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}
function cargarCategoria() {
    API.get("inventarios/getCategoria").then(
        data=>{
            if(data.success) {
                Categoria.innerHTML="";
                const optionCategoria=document.createElement("option");
                optionCategoria.value="0";
                optionCategoria.textContent="Todos";
                Categoria.append(optionCategoria);
                data.records.forEach(
                    (item,index)=>{
                        const {categoria}=item;
                        const optionCategoria=document.createElement("option");
                        optionCategoria.value=categoria;
                        optionCategoria.textContent=categoria;
                        Categoria.append(optionCategoria);
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


function verReporte(){
    frameReporte.src=`${BASE_API}reporteinventarios/getReporte?idproducto=${idProducto.value}&categoria=${Categoria.value}`;
}