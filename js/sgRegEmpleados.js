
$('#form-empeladoa').on('submit',(e)=>{
    e.preventDefault();
    console.log(new FormData);

        if($('#inpnombre').val != "" && $('#inpapellido1').val != "" &&
         $('#inpapellido2').val != "" && $('#inpdni').val != "" &&
         $('#inptelefono').val !="" && $('#inpdireccion').val != ""&&
         $('#listGenero').val != "" && $('#inpfechaN').val != ""){

            var registro = document.getElementById("registro").value;

            var Nombres = document.getElementById("inpnombre").value;
            var Apellido1 = document.getElementById("inpapellido1").value;
            var Apellido2 = document.getElementById("inpapellido2").value;
            var Dni = document.getElementById("inpdni").value;
            var Telefono = document.getElementById("inptelefono").value;
            var Direccion = document.getElementById("inpdireccion").value;
            var Genero = document.getElementById("listGenero").value;
            var FechaN = document.getElementById("inpfechaN").value;
          
            $.post('.././controllers/CtrlEmpleados.php', {
                registro: registro,
                nombre: Nombres,
                apellido1: Apellido1,
                apellido2: Apellido2,
                dni: Dni,
                telefono: Telefono,
                direccion: Direccion,
                listGenero: Genero,
                fechaN: FechaN

            }).done((response)=>{

                if (response.status === 'success') {
                    Swal.fire({
                        text: 'Registro Insertado',
                        icon: 'success',
                        title: 'Exito',
                    }).then((res) => {
                        if (res.isConfirmed) {
                            location.reload();
                        }
                    });
                } else{
                    Swal.fire({
                        text: 'Error al intentar ingresar el nuevo registro',
                        icon: 'error',
                        title: 'Error',
                    });
                }
            })
         }
});

/*
function editEmpleado(id){
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


    $.post('.././controllers/CtrlEmpleados.php', {
    registro: 'getEmpleados',
    id:id
}).done((response) => {
    Swal.fire({
        title: 'Formulario de actualizacion de Empleados',
        html: `
            <form id="form-edit-emp">
                <label for="" class="form-label">Nombres: </label>
                <input type="text" class="form-control" name="editNombre" id="nombre" value='${response.data[0]['nombres']}'>
                <br>
                <label for="apellido1" class="form-label">Primer apellido: </label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" value="${response.data[0]['apellido-paterno']}">
                <br>
                <label for="inpapellido2" class="form-label">Segundo apellido: </label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2 "value='  ${response.data[0]['apellido-materno']}'>
                    <br>
                    <label for="inpdni" class="form-label">DNI: </label>
                    <input type="text" class="form-control" id="dni" name="dni" value=' ${response.data[0]['n-identidad']}'>
                    <br>
                    <label for="inptelefono" class="form-label">Telefono: </label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value=' ${response.data[0]['n-telefono']}'>
                    <br>
                    <label for="inpdireccion" class="form-label">Direccion: </label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value=' ${response.data[0]['direccion']}'>
                    <br>
                    <select name="listGenero" id="listGenero" class="form-control">
                    <option value="M" ${response.data[0]['genero'] === 'M' ? 'selected' : ''}>Masculino</option>
                    <option value="F" ${response.data[0]['genero'] === 'F' ? 'selected' : ''}>Femenino</option>    
                </select>
                <br>
                <label for="inpfechaN" class="form-label">Ingrese su fecha de nacimiento: </label>
                <input type="date" class="form-control" id="fechaN" name="fechaN" value='${response.data[0]['fecha-nacimiento']}'>
                <br>
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: "Aceptar",

    }).then((res)=>{
        if(res.isConfirmed){

                var nombre = document.getElementById('nombre').value;
                var apellidosP = document.getElementById('apellido1').value;
                var apellidosM = document.getElementById('apellido2').value;
                var dnni = document.getElementById('dni').value;
                var telefonos = document.getElementById('telefono').value;
                var direccione = document.getElementById('direccion').value; 
                var generos = document.getElementById('listGenero').value;
                var f_nac = document.getElementById('fechaN').value;

            $.post('.././controllers/CtrlEmpleados.php', {
                registro : 'updateEmpleados',
                nombre: nombre,
                apellido1: apellidosP,
                apellido2: apellidosM,
                dni: dnni,
                telefono: telefonos,
                direccion: direccione,
                listGenero: generos,
                FechaN: f_nac,
                id:id
            }).done((resolve)=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Exito al modificar el registro',
                    
                }).then((conf)=>{
                location.reload();
                })
            })
        }

    })

}).fail((ERR)=>{
    alert(ERR);
});


    

}*/

function deleteEmpleado(id){
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
    Swal.fire({
        icon: 'warning',
        title: '¿Esta seguro?',
        text: 'Si elimina el registro no lo podra visualizar',
        showCancelButton: true,
        confirmButtonText:'Aceptar'

    }).then((res)=>{
        if(res.isConfirmed){
            $.post('.././controllers/CtrlEmpleados.php',{
                registro: 'deleteEmpleado',
                id:id
            }).done((response)=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Exito al modificar el registro',
                    
                }).then((conf)=>{
                location.reload();
                })
            });
        }
    })

}