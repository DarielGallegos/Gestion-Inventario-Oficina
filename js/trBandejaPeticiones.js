function ventanaFormaPeticion(prm_ped_id) {
    console.log(prm_ped_id)
    funGetBandejaPeticionesDetalle(prm_ped_id);

    let ventana = document.getElementById('ventana_forma_id');
    ventana.classList.remove('oculto');
}

function cerrarVentanaPeticion(e) {
    e.preventDefault();
    let ventana = document.getElementById('ventana_forma_id');
    ventana.classList.add('oculto');
}

function funGetBandejaPeticiones() {
    const url = "../controllers/ctrlBandejaPeticiones.php?tipoConsulta=bandejaPedidos";

    fetch(url, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            let div_msg_vacio = document.getElementById('div_msg_vacio');

            if (div_msg_vacio) {
                div_msg_vacio.classList.add('oculto');
            }
            
            if (data.data.length == 0) {
                if (div_msg_vacio) {
                    div_msg_vacio.classList.remove('oculto');
                }
            }

            const spa_cant_pedidos = document.getElementById("cant_pedidos");
            spa_cant_pedidos.innerText = data.data.length;

            const cardsContainer = document.getElementById("cards_container");
            cardsContainer.innerHTML = "";
            const colores = ["success", "warning", "primary", "secondary", "danger", "info", "light"];
            let i = 0;

            data.data.forEach(peticion => {
                const cardHTML = `
              <div class="card text-bg-${colores[i]} mb-3" style="max-width: 38rem;">
                    <div class="card-header"><span class="float-start">Petición # ${peticion.band_id}</span><button class=" btn btn-light btn-sm float-end" onclick="ventanaFormaPeticion('${peticion.band_id}')"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
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
                i++;
                if (i >= colores.length) {
                    i = 0;
                }
            })
        })
}

function funGetBandejaPeticionesDetalle(prm_ped_id) {
    const url = "../controllers/ctrlBandejaPeticiones.php?tipoConsulta=bandejaPedidosDetalle&ped_id=" + prm_ped_id;

    fetch(url, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);

            if(data.status = 'success') {
                let in_det_ped_id = document.getElementById("in_det_ped_id");
                in_det_ped_id.value = prm_ped_id;
            }

            const tbody_pedidos_detalle = document.getElementById("tbody_pedidos_detalle");
            tbody_pedidos_detalle.innerHTML = "";


            data.data.forEach(peticion => {
                const fila = document.createElement('tr');

                const col1 = document.createElement('td');
                col1.innerText = peticion.det_ins_id;

                const col2 = document.createElement('td');
                col2.innerText = peticion.det_ins_nombre;

                /* const col3 = document.createElement('td');
                col3.innerText = peticion.categoria; */

                const col4 = document.createElement('td');
                col4.innerText = peticion.det_cantidad;

                /* fila.addEventListener('click', ()=> {
                    agregarAlPlan(integrante.mem_id, integrante.plan_nombre);
                }) */

                fila.append(col1);
                fila.append(col2);
                /* fila.append(col3); */
                fila.append(col4);
                tbody_pedidos_detalle.append(fila);
            })
        })
}

function funGetBandejaPeticionesBusca(e) {
    let nombre_busca = e.target.value

    const url = "../controllers/ctrlBandejaPeticiones.php?tipoConsulta=banPedBusca&nombre_busca=" + nombre_busca;

    fetch(url, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            let div_msg_vacio = document.getElementById('div_msg_vacio');

            if (div_msg_vacio) {
                div_msg_vacio.classList.add('oculto');
            }

            if (data.data.length == 0) {
                if (div_msg_vacio) {
                    div_msg_vacio.classList.remove('oculto');
                }
            }
                
            

            const spa_cant_pedidos = document.getElementById("cant_pedidos");
            spa_cant_pedidos.innerText = data.data.length;

            const cardsContainer = document.getElementById("cards_container");
            cardsContainer.innerHTML = "";
            const colores = ["success", "warning", "primary", "secondary", "danger", "info", "light"];
            let i = 0;

            data.data.forEach(peticion => {
                const cardHTML = `
              <div class="card text-bg-${colores[i]} mb-3" style="max-width: 38rem;">
                    <div class="card-header"><span class="float-start">Petición # ${peticion.band_id}</span><button class=" btn btn-light btn-sm float-end" onclick="ventanaFormaPeticion('${peticion.band_id}')"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
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
                i++;
                if (i >= colores.length) {
                    i = 0;
                }
            })
        })
}

function funActualizarPedido(estado) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    const ped_id = document.getElementById("in_det_ped_id").value;
    let tipoRegistro = 'pedidoAceptar'
    if(estado == 2) {
        tipoRegistro = 'pedidoRechazar'
    }
    $.post('../controllers/ctrlBandejaPeticiones.php', {
        tipoRegistro: tipoRegistro,
        ped_id: parseInt(ped_id)
    }).done((response) => {
        Toast.fire({
            icon: 'success',
            text: 'Actualizacion de Pedido Realizada'
        }).then((solve) => {
            location.reload();
        })
    })
}

funGetBandejaPeticiones();
/* funGetBandejaPeticionesDetalle(); */
