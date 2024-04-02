$('#form-login').on("submit", function(e){
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
    });
    e.preventDefault();
    $.ajax({
        url: './controllers/ctrlLogin.php',
        method: 'POST',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success:function(response){
            if(response.status === 'success'){
                Toast.fire({
                    text: 'Acceso Concedido',
                    icon: 'success',
                    title: 'Exito',
                })
                location.reload();
            }
        },
        error:function(errorThrown){
            Toast.fire({
                text: 'Credenciales Erroneas',
                icon: 'error',
                title: 'Error'
            })
        }
    });
});