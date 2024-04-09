window.onload = () =>{
    
}

/* function funReporteEmpleados(){
    let generateReport = "reportEmpleado";

    $.post('.././controllers/CtrlConsultaReporteria.php', {
        generateReport: generateReport,
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

        funRenderizarTabla(response.data);

    }).fail((err) => {
        Toast.fire({
            icon: 'error',
            text: 'Error al generar reporte'
        });
    });
} */

function funRenderizarTabla(data) {
    const tabla = document.getElementById('tabla_target')
    tabla.innerHTML = "";

    if(!data[0]) {
        tabla.innerHTML = "No Hay resultados.";
        return;
    }

    var columnas = Object.keys(data[0]);

    const thead = document.createElement('thead');
    const tr_header = document.createElement('tr');

    const tbody = document.createElement('tbody');

    columnas.forEach(col => {
        const th = document.createElement('th');
        th.innerText = col;
        tr_header.appendChild(th);
    })

    thead.append(tr_header)
    tabla.appendChild(thead);

    data.forEach( fila => {
        const tr_new = document.createElement('tr');

        for(let i = 0; i < columnas.length; i++){
            const td_new = document.createElement('td');
            td_new.innerText = fila[columnas[i]]; 
            tr_new.append(td_new);
        }

        tbody.append(tr_new);
    })
    
    tabla.appendChild(tbody);
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
            
            if(dateFilter === undefined || dateFilter === null || dateFilter === ""){
                dateFilter = date;
            }

            console.log(dateFilter);

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
                                <a href="${response.path}" target="_blank">Abrir Reporte</a>
                            `,
                    });

                    funRenderizarTabla(response.data);
                    
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

function formatDate(date) {
    // Obtiene los componentes de la fecha
    var day = date.getDate();
    var month = date.getMonth() + 1; // Los meses en JavaScript se indexan desde 0
    var year = date.getFullYear();

    // Agrega ceros a la izquierda si es necesario
    if (day < 10) {
        day = '0' + day;
    }
    if (month < 10) {
        month = '0' + month;
    }

    // Retorna la fecha formateada
    return year + '-' + month + '-' + day;
}

function funTablaPorDefecto(reporte){
    var date = formatDate(new Date());
    var dateFilter = date;
    var empleado = document.getElementById('empleado').value;
    console.log('funTablaPorDefecto:', date);
    if(dateFilter === undefined || dateFilter === null || dateFilter === ""){
        dateFilter = date;
    }
    /* if(fileName != "" && description != "" && encabezado != ""){ */
        $.post('.././controllers/CtrlConsultaReporteria.php', {
            generateReport: reporte,
            fileName: "reporte_empleados",
            header: "Reporte Empleados",
            description: "Rep",
            date : date,
            dateFilter:"1999-01-01",
            empleado: empleado
        }).done((response) => {
            const export_button_container = document.getElementById("path_link_container");
            export_button_container.innerHTML = "";
            const export_button = document.createElement('button');
            export_button.setAttribute('class','btn btn-secondary')
            export_button.innerHTML = "Exportar a pdf ";
            export_button.addEventListener('click',()=> generarReporte(reporte));

            const export_image = document.createElement('img');
            export_image.setAttribute('src', '../img/pdf.png');
            export_image.setAttribute('width', '20px'); 
            export_image.style.marginRight = '5px'; 
            
          
            export_button.appendChild(export_image);
            export_button_container.append(export_button);
            export_button.style = "float: right;";

            funRenderizarTabla(response.data);
            
        }).fail((err) => {
            console.log(err)
        });

    /* } */
}

funTablaPorDefecto( "reportInsumos");