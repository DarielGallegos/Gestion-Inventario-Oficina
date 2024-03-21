$('#form-login').on("submit", function(e){
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
                Swal.fire({
                    text: 'Acceso Concedido',
                    icon: 'success',
                    title: 'Exito',
                }).then((result) => {
                    window.location.href = './views/main.php';
                });
            }else{
                Swal.fire({
                    text: 'Credenciales Erroneas',
                    icon: 'error',
                    title: 'Error'
                })
            }
        },
        error:function(errorThrown){
            console.log("Error:", errorThrown);
        }
    });
});