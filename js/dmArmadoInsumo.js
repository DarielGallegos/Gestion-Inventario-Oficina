$('#form-insumo').on('submit', (e) => {
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
    var idCatalogo = document.getElementById('idInsumo').value;
    idCatalogo = parseInt(idCatalogo);
    if(idCatalogo != 0){
        $.post('.././controllers/ctrlArmadoInsumo.php', {
            peticion: 'insertInsumo',
            idCatalogo: idCatalogo
        }).done((response) => {
            if(response.status === 'success'){
                Toast.fire({
                    icon: 'success',
                    text: 'Exito al registrar insumo'
                }).then((e) => {
                    location.reload();
                })
            }
        });
    }else{
        Swal.fire({
            icon: 'warning',
            title: 'Formulario Vacio',
            text: 'Favor llenar el formulario.',
            confirmButtonText: 'Aceptar'
        });
    }
});

function deleteInsumo(id){
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Swal.fire({
        icon: 'warning',
        title: 'Advertencia',
        text: 'Si elimina este registro, no lo podra visualizar',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((e) => {
        if(e.isConfirmed){
            $.post('.././controllers/ctrlArmadoInsumo.php', {
                peticion: 'deleteInsumo',
                id: id  
            }).done((response) => {
                if(response.status === 'success'){
                    Toast.fire({
                        icon: 'success',
                        text: 'Exito al eliminar registro'
                    }).then(() => {
                        location.reload();
                    })
                }else{
                    Toast.fire({
                        icon: 'error',
                        text: 'Error al eliminar registro'
                    })
                }
            })
        }else{
            Toast.fire({
                icon: 'info',
                text: 'Operacion Cancelada'
            })
        }
    })
}