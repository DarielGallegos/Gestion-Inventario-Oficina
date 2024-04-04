var today = new Date();
window.onload = () => {
    if(today.getDate > 10){
        document.getElementById("dateEntrega").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ (today.getDate());
    }else{
    document.getElementById("dateEntrega").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ ('0'+today.getDate());
    }
}

document.getElementById('btnEnviar').addEventListener('click', () => {
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
    //EXTRACCION INFORMACION ENTRADA
    //Inicio Extraccion de Informacion Detalle PreEnvio
    detalle = Array();
    var reg = {
        'idInsumo': null,
        'cantidad': null,
    }
    var totalInsumos = 0;
    var nodes = document.getElementById("contentTable").childNodes;
    for(var i=0; i<nodes.length; i++){
        var list = nodes[i].childNodes;
        var idInsumo;
        var cantidad;
        for(var e=0; e<list.length - 2; e++){
            if(list[e].localName === 'td'){
                if(list[e].childNodes[1].localName === 'select'){
                    var index = list[e].childNodes[1].selectedIndex;
                    idInsumo = list[e].childNodes[1].options;
                    idInsumo = idInsumo[index].value;
                    if(idInsumo != ""){
                        idInsumo = parseInt(idInsumo);
                    }
                }
                if (list[e].childNodes[1].localName === 'input') {
                    if(list[e].childNodes[1].value>0){
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
    var filePath = document.getElementById("fileFirma").value;
    filePath = filePath.split('\\');
    file = `firmas/` + filePath[2];
    cabecera = {
        'idEmpleado': id,
        'totalproductos': totalInsumos,
        'firma': file,
    }
    //Fin extraccion de Informacion Cabecera PreEnvio
    //FIN EXTRACCION INFORMACION ENTREGA
    if(totalInsumos > 0 && filePath[2] != undefined){
        Swal.fire({
            icon: 'question',
            title: '¿Desea procesar la entrega?',
            text: 'Confirme Peticion',
            showCancelButton: true
        }).then((result) => {
            if(result.isConfirmed){
                $.post('.././controllers/ctrlEntradaInsumos.php', {
                    peticion: 'insertEntrada',
                    cabecera: cabecera,
                    detalle: detalle
                }).done((result) => {
                        Toast.fire({
                            icon: 'success',
                            text: 'Transaccion Procesada Correctamente'
                        }).then(() => {
                            location.reload();
                        })    
                }).fail((err) => {
                    Toast.fire({
                        icon: 'error',
                        text: 'Error al procesar Transaccion'
                    })
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Favor Agregar Insumos Y Llenar la Cabecera de Entrada de Insumos (Si ingresa valores negativos, no se insertaran)'
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
    var list = document.getElementById("contentTable");
    while(list.firstChild){
        list.removeChild(list.firstChild);
    }
}