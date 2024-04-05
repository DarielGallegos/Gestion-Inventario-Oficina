var today = new Date();
window.onload = () => {
    if (today.getDate > 10) {
        document.getElementById("dateEntrega").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)) + '-' + (today.getDate());
    } else {
        document.getElementById("dateEntrega").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)) + '-' + ('0' + today.getDate());
    }
}
document.getElementById("btnEnviar").addEventListener('click', () => {
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
    //EXTRACCION INFORMACION FACTURA
    //Inicio Extraccion de Informacion Detalle PreEnvio
    detalle = Array();
    var reg = {
        'idInsumo': null,
        'cantidad': null,
    }
    var totalInsumos = 0;
    var nodes = document.getElementById("contentTable").childNodes;
    for (var i = 0; i < nodes.length; i++) {
        var list = nodes[i].childNodes;
        var idInsumo;
        var cantidad;
        for (var e = 0; e < list.length - 1; e++) {
            if (list[e].localName === 'td') {
                if (list[e].childNodes[1].localName === 'select') {
                    var index = list[e].childNodes[1].selectedIndex;
                    idInsumo = list[e].childNodes[1].options;
                    idInsumo = idInsumo[index].value;
                    if (idInsumo != "") {
                        idInsumo = parseInt(idInsumo);
                    }
                }
                if (list[e].childNodes[1].localName === 'input' && (list[e].childNodes[1].value <= parseInt(list[e].childNodes[1].max))) {
                    if (list[e].childNodes[1].value > 0) {
                        cantidad = list[e].childNodes[1].value;
                    }
                }
            }
        }
        if (idInsumo != "" && cantidad != null) {
            reg['idInsumo'] = idInsumo;
            reg['cantidad'] = cantidad;
            detalle.push(reg);
            totalInsumos++;
        }
        reg = {
            'idInsumo': null,
            'cantidad': null,
        }
        idInsumo = "";
        cantidad = null;
    }
    //Fin Extraccion de Informacion Detalle PreEnvio
    //Inicio extraccion de Informacion Cabecera PreEnvio
    var id = parseInt(document.getElementById('idEmpleado').value);
    var idDepartamento = document.getElementById("idDepartamento").value;
    var filePath = document.getElementById("fileFirma").value;
    filePath = filePath.split('\\');
    file = `firmas/` + filePath[2];
    cabecera = {
        'idEmpleado': id,
        'idDepartamento': idDepartamento,
        'totalproductos': totalInsumos,
        'firma': file,
    }
    //Fin extraccion de Informacion Cabecera PreEnvio
    //FIN EXTRACCION INFORMACION ENTREGA
    var detalleFiltrado = [];
    for (var x = 0; x < detalle.length; x++) {
        if (detalleFiltrado.length === 0) {
            detalleFiltrado.push(detalle[x]);
        } else {
            if (x >= 1) {
                var flag = 1;
                for (var y = 0; y < detalleFiltrado.length; y++) {
                    if (detalleFiltrado[y]['idInsumo'] === detalle[x]['idInsumo']) {
                        flag = false;
                    } else {
                        if (y === detalleFiltrado.length - 1 && flag) {
                            detalleFiltrado.push(detalle[x]);
                            y++;
                        }
                    }
                }
                flag = true;
            }
        }
    }
    cabecera['totalproductos'] = detalleFiltrado.length;
    if (cabecera['totalproductos'] > 0 && filePath[2] != undefined) {
        Swal.fire({
            icon: 'question',
            title: '¿Desea procesar el Pedido?',
            text: 'Confirme Peticion',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('.././controllers/ctrlPedido.php', {
                    peticion: "insertPedido",
                    cabecera: cabecera,
                    detalle: detalleFiltrado
                }).done((response) => {
                    if (response.status = 'success') {
                        Toast.fire({
                            icon: 'success',
                            text: 'Transaccion Procesada Correctamente'
                        }).then(() => {
                            location.reload();
                        })
                    }
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Favor Agregar Insumos Y Llenar la Cabecera de la Entrega de Insumos (Si ingresa valores negativos, no se insertaran)'
        });
    }
});


function deleteInsumo(button) {
    var row = button.closest("tr");
    row.parentNode.removeChild(row);
   
    let numrows = document.querySelectorAll('.dynamic_row');

    if(numrows.length <= 0) {
        let div_msg_vacio = document.getElementById('div_msg_vacio');
        if(div_msg_vacio) {
            div_msg_vacio.classList.remove('oculto');
        }
    }
}

document.getElementById("btnFlush").addEventListener("click", () => {
    flushData();
});

function flushData() {
    var list = document.getElementById("contentTable");
    while (list.firstChild) {
        list.removeChild(list.firstChild);
    }
    let div_msg_vacio = document.getElementById('div_msg_vacio');
    if(div_msg_vacio) {
        div_msg_vacio.classList.remove('oculto');
    }
}