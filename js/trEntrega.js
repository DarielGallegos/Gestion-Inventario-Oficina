var today = new Date();
window.onload = () => {
    document.getElementById("dateEntrega").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ today.getDate();
}
document.getElementById("btnEnviar").addEventListener('click', () => {
    //EXTRACCION INFORMACION FACTURA
    //Inicio Extraccion de Informacion Detalle PreEnvio
    detalle = Array();
    var reg = {
        'idInsumo': null,
        'cantidad': null,
    }
    var totalInsumos = 0;
    var nodes = document.getElementById("contentTableDetalle").childNodes;
    for (var i = 0; i < nodes.length; i++) {
        var list = nodes[i].childNodes;
        var idInsumo;
        var cantidad;
        for (var e = 0; e < list.length - 2; e++) {
            if (list[e].localName === 'td') {
                if (list[e].childNodes[1].localName === 'select') {
                    var index = list[e].childNodes[1].selectedIndex;
                    idInsumo = list[e].childNodes[1].options;
                    idInsumo = idInsumo[index].value;
                    if (idInsumo != "") {
                        idInsumo = parseInt(idInsumo);
                    }
                }
                if (list[e].childNodes[1].localName === 'input') {
                    cantidad = list[e].childNodes[1].value;
                }
            }
        }
        if (idInsumo != "") {
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
    var index = document.getElementById("cboDepartamento").selectedIndex;
    var idDepartamento = document.getElementById("cboDepartamento").options;
    idDepartamento = parseInt(idDepartamento[index].value);
    index = document.getElementById("cboPedido").selectedIndex;
    var filePath = document.getElementById("fileFirma").value;
    filePath = filePath.split('\\');
    file = `firmas/` + filePath[2];
    var idPedido = document.getElementById("cboPedido").options;
    idPedido = parseInt(idPedido[index].value);
    cabecera = {
        'idEmpleado': 2,
        'idDepartamento': idDepartamento,
        'totalproductos': totalInsumos,
        'firma': file,
        'idPedido': idPedido
    }
    //Fin extraccion de Informacion Cabecera PreEnvio
    //FIN EXTRACCION INFORMACION ENTREGA
    if (totalInsumos > 0 && idDepartamento != 0 && filePath[2] != undefined) {
        Swal.fire({
            icon: 'question',
            title: '¿Desea procesar la entrega?',
            text: 'Confirme Peticion',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('.././controllers/ctrlEntrega.php', {
                    request: "insertEntrega",
                    cabecera:cabecera,
                    detalle: detalle
                }).done((response) => {
                    if(response.status = 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Exito',
                            text: 'Insercion hecha correctamente'
                        });
                        location.reload();
                        flushData();
                    }
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Favor Agregar Insumos Y LLenar la Cabecera de la Entrega'
        });
    }
});
function deleteInsumo(button) {
    var row = button.closest("tr");
    row.parentNode.removeChild(row);
}

document.getElementById("btnFlush").addEventListener("click", () => {
    flushData();
});

function flushData(){
    var list = document.getElementById("contentTableDetalle");
    while(list.firstChild){
        list.removeChild(list.firstChild);
    }
}