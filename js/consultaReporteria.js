window.onload = () =>{
    
}

function mostrar(e) {
    if (!toggle_table_grafico) {
        document.getElementById('tabla').style.display = 'block';
        document.getElementById('grafico').style.display = 'none';
        toggle_table_grafico = true;
        return;
    }

    document.getElementById('tabla').style.display = 'none';
    document.getElementById('grafico').style.display = 'block';
    toggle_table_grafico = false;

}
function mostrar() {
    document.getElementById('tablaE').style.display = 'block';
    document.getElementById('grafico').style.display = 'none';
}
let toggle_table_grafico = false;
function mostrar(e) {
    if (!toggle_table_grafico) {
        document.getElementById('tabla').style.display = 'block';
        document.getElementById('grafico').style.display = 'none';
        toggle_table_grafico = true;
        return;
    }

    document.getElementById('tabla').style.display = 'none';
    document.getElementById('grafico').style.display = 'block';
    toggle_table_grafico = false;

}

function generarReporte(pet){
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Swal.fire({
        title: 'Formulario Creacion de Reporte',
        html: ` <form>
                    <label for="fileName">Encabezado del Reporte:  
                    <input type="text" class="form-control" id="encabezadoReporte">
                    <label for="fileName">Nombre del Archivo de Reporte 
                    <input type="text" class="form-control" id="nameFile">
                    <label form="descripcionReport">Descripcion del Reporte
                    <textarea id="descripcionReport" class="form-control" cols="30" rows="5"></textarea>
                    <label for="fechaGeneracion">Fecha de Generacion de Reporte:
                    <input type="date" id="dateCreate" class="form-control" disabled> 
                    <label for="fechaGeneracion">Fecha de Filtro Para Reporte de Pedido (Solamente):
                    <input type="date" id="dateFilter" class="form-control"> 
                </form>
                `,
        showCancelButton: true,
        confirmButtonText: 'Generar',
        cancelButtonText: 'Cancelar',
        didOpen: () => {
            var today = new Date();
            if(today.getDate > 10){
                document.getElementById("dateCreate").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ (today.getDate());
                document.getElementById("dateFilter").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ (today.getDate());
            }else{
            document.getElementById("dateCreate").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ ('0'+today.getDate());
            document.getElementById("dateFilter").value = today.getFullYear() +'-'+('0'+(today.getMonth()+1))+'-'+ ('0'+today.getDate());
            }
        }
    }).then((status) => {
        if(status.isConfirmed){
            var encabezado = document.getElementById("encabezadoReporte").value;
            var fileName = document.getElementById("nameFile").value;
            var description = document.getElementById("descripcionReport").value;
            var date = document.getElementById("dateCreate").value;
            var dateFilter = document.getElementById("dateFilter").value;
            var empleado = document.getElementById('empleado').value;
            console.log(empleado);
            if(dateFilter === undefined || dateFilter === null || dateFilter === ""){
                dateFilter = date;
            }
            if(fileName != "" && description != "" && encabezado != ""){
                $.post('.././controllers/CtrlConsultaReporteria.php', {
                    generateReport: pet,
                    fileName: fileName,
                    header: encabezado,
                    description: description,
                    date : date,
                    dateFilter: dateFilter,
                    empleado: empleado
                }).done((response) => {
                    Toast.fire({
                        icon: 'success',
                        html: `
                                <p>Reporte Generado Exitosamente</p>
                                <a href="${response}" target="_blank">Abrir Reporte</a>
                            `,
                    });
                }).fail((err) => {
                    Toast.fire({
                        icon: 'error',
                        text: 'Error al generar reporte'
                    });
                });
    
            }
        }        
    });

}