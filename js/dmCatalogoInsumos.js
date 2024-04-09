$('#form-catalogo-insumo').on('submit', (e) => {
    e.preventDefault();
    var nombre = $('#insumo').val().trim();
    var descripcion =$('#descripcionInsumo').val().trim();
    console.log(nombre);
    console.log(descripcion);
    if(nombre != "" &&  descripcion != "" && $('#idCategoria').val != "0"){
        var peticion = document.getElementById("peticion").value;
        var idCat = parseInt(document.getElementById('idCategoria').value);
         $.post('.././controllers/CtrlCatalogoInsumos.php', {
            peticion: peticion,
            insumo: nombre,
            descripcionInsumo: descripcion,
            idCategoria: idCat
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
                    text: 'Error al intentar ingresar nuevo registro',
                    icon: 'error',
                    title: 'Error',
                });
            }
        })
    }else{
        Swal.fire({
            icon: 'warning',
            text: 'Llene todos los campos'
        });
    }
});

function deleteInsumo(id){
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
        title: '¿Esta Seguro?',
        text: "Si elimina este registro no lo podra visualizar.",
        showCancelButton: true,
        confirmButtonText: 'Aceptar'
    }).then((res) => {
        if(res.isConfirmed){
            $.post('.././controllers/CtrlCatalogoInsumos.php', {
                peticion: 'deleteInsumo',
                id: id
            }).done((response) => {
                Toast.fire({
                    icon: 'success',
                    title: 'Exito al Eliminar el Registro'
                }).then((conf) => {
                    location.reload();
                })
            });
        }
    })
}