function ventanaFormaPeticion(prm_id) {
    console.log(prm_id)
    let ventana = document.getElementById('ventana_forma_id');
    ventana.classList.remove('oculto');
}

function cerrarVentanaPeticion(e){
    e.preventDefault();
    let ventana = document.getElementById('ventana_forma_id');
    ventana.classList.add('oculto');
}

function funGetBandejaPeticiones(){
    const url = "../controllers/ctrlBandejaPeticiones.php?tipoConsulta=bandejaPedidos";

    fetch(url,{
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);

        const cardsContainer = document.getElementById("cards_container");

        data.data.forEach(peticion => {
            const cardHTML = `
              <div class="card text-bg-success mb-3" style="max-width: 38rem;">
                    <div class="card-header"><span class="float-start">Petición # ${peticion.band_id}</span><button class=" btn btn-light btn-sm float-end" onclick="ventanaFormaPeticion(event)"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="card-body">
                        <div><span class="card-text"><b>Departamento :</b>  &nbsp;</span> ${peticion.band_dep_nombre}</div>
                        <div><span class="card-text"><b>Fecha :</b> &nbsp; </span> ${peticion.band_fec_pedido}</div>
                        <div><span class="card-text"><b>Insumos Totales : </b>&nbsp;  </span> ${peticion.band_tot_insumos}</div>
                        <div><span class="card-text"><b>Empleado :</b>  &nbsp; </span> ${peticion.band_emp_nombre}</div>
                    </div>
                </div>
            `;
            cardsContainer.insertAdjacentHTML("beforeend", cardHTML);
        })
    })
}

function funGetBandejaPeticionesDetalle(){
    const url = "../controllers/ctrlBandejaPeticiones.php?tipoConsulta=bandejaPedidosDetalle";

    fetch(url,{
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);

        const cardsContainer = document.getElementById("cards_container");

        data.data.forEach(peticion => {
            const cardHTML = `
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Insumo</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
              
            </tbody>
        </table>
            `;
            cardsContainer.insertAdjacentHTML("beforeend", cardHTML);
        })
    })
}

funGetBandejaPeticiones();
funGetBandejaPeticionesDetalle();