
$('#form-empeladoa').on('submit', (e) => {
    e.preventDefault();
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
    if ($('#inpnombre').val().trim()!= "" && $('#inpapellido1').val().trim() != "" &&
        $('#inpapellido2').val().trim() != "" && $('#inpdni').val().trim() != "" &&
        $('#inptelefono').val().trim() != "" && $('#inpdireccion').val().trim() != "" &&
        $('#listGenero').val().trim() != "" && $('#inpfechaN').val().trim() != "" &&
        $('#listDepartamentos') != "0") {

        var registro = document.getElementById("registro").value;
        var Nombres = document.getElementById("inpnombre").value;
        var Apellido1 = document.getElementById("inpapellido1").value;
        var Apellido2 = document.getElementById("inpapellido2").value;
        var Dni = document.getElementById("inpdni").value;
        var Telefono = document.getElementById("inptelefono").value;
        var Direccion = document.getElementById("inpdireccion").value;
        var Genero = document.getElementById("listGenero").value;
        var FechaN = document.getElementById("inpfechaN").value;
        var idDep = document.getElementById("listDepartamentos").value;
        $.post('.././controllers/CtrlEmpleados.php', {
            registro: registro,
            nombre: Nombres,
            apellido1: Apellido1,
            apellido2: Apellido2,
            dni: Dni,
            telefono: Telefono,
            direccion: Direccion,
            listGenero: Genero,
            fechaN: FechaN,
            idDep: idDep
        }).done((response) => {
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
            } else {
                Swal.fire({
                    text: 'Error al intentar ingresar el nuevo registro',
                    icon: 'error',
                    title: 'Error',
                });
            }
        }).fail((err) => {
            Swal.fire({
                icon: 'error',
                text: err
            })
        })
    }else{
        Toast.fire({
            icon: 'warning',
            text: 'No se permiten valores vacios'
        })
    }
});


function soloNumeros(e) {
    let key = e.keyCode || e.which;
    let tecla = String.fromCharCode(key).toLocaleLowerCase();
    let numeros = "0123456789";

    if (numeros.indexOf(tecla) == -1)
        return false;
}


function deleteEmpleado(id) {
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
        confirmButtonText: 'Aceptar'

    }).then((res) => {
        if (res.isConfirmed) {
            $.post('.././controllers/CtrlEmpleados.php', {
                registro: 'deleteEmpleado',
                id: id
            }).done((response) => {
                Toast.fire({
                    icon: 'success',
                    title: 'Exito al modificar el registro',

                }).then(() => {
                })
            });
        }
    })

}