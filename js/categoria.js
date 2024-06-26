//============= INICIO FUNCION POST ==========//
$('#form-categoria').on('submit', function (e) {
    e.preventDefault();
    if($('#NoCategoria').val().trim() != "" && $('#DeCategoria').val().trim() != ""){
        $.ajax({
            url: '.././controllers/ctrlCategoria.php',
            method: 'POST',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        text: 'Registro Insertado',
                        icon: 'success',
                        title: 'Exito',
                    });
                    location.reload();
                } else {
                    Swal.fire({
                        text: 'Error al intentar ingresar nuevo registro',
                        icon: 'error',
                        title: 'Error',
                    });
                }
            },
            error: function (errorThrown) {
                console.log("Error: ", errorThrown)
            }
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: "Rellene los Campos",
            text: "Favor rellenar los campos"
        });
    }
});
//============= FIN FUNCION POST ==========//

//============= INICIO FUNCION UPDATE ==========//
function editCategoria(id) {
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
    $.post('.././controllers/ctrlCategoria.php', {
        insert: "getRegister",
        id: id
    }).done(function(response) {
        Swal.fire({
            title: "<h2>Formulario de Modificacion de Registro</h2>",
            html: `
            <form id="form-edit-cat">
                    <label for="" class="form-label">Nombre de la Categoria</label>
                    <input type="text" class="form-control" name="editNombre" id="nombre" value='${response.data[0]['nombre']}'>
                    <br>
                    <label for="" class="form-label">Descripcion de la Categoria</label>
                    <textarea class="form-control" name="editDescripcion" id="descripcion" cols="30" rows="10">` + '' + response.data[0]['descripcion'] + '' + `</textarea>
            </form>
    `,
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                if($('#nombre').val().trim() != "" && $('#descripcion').val().trim() != ""){
                    var nombre = document.getElementById("nombre").value;
                    var descripcion = document.getElementById("descripcion").value;
                    $.post('.././controllers/ctrlCategoria.php', {
                        insert: "editCategoria",
                        nombre: nombre,
                        descripcion: descripcion,
                        id: id
                    }).done((response) => {
                        if (response.status === 'success') {
                            Toast.fire({
                                text: 'Registro Modificado',
                                icon: 'success',
                            });
                            location.reload();
                        } else {
                            Toast.fire({
                                text: 'Error al Intentar Modificar Registro',
                                icon: 'error',
                            });
                        }
                    })
                }else{
                    Toast.fire({
                        icon: 'warning',
                        text: 'No puede enviar campos vacios'
                    })   
                }
            } else {
                Toast.fire({
                    icon: 'info',
                    text: 'Se cancelo operacion'
                })
            }
        });
    });
}
//============= INICIO FUNCION UPDATE ==========//


//============= INICIO FUNCION DE DELETE ==========//
function deleteCategoria(id) {
    Swal.fire({
        icon: 'warning',
        title: '¿Esta seguro?',
        text: "Confirmar para eliminar registro",
        showCancelButton: true,
    }).then((response) => {
        if (response.isConfirmed) {
            $.post('.././controllers/ctrlCategoria.php', {
                insert: "deleteCategoria",
                id: id
            }).done(function (result) {
                Swal.fire({
                    icon: 'success',
                    text: 'Exito al Realizar Operacion'
                })
            });
        }
        location.reload()
    });
}
//============= FIN FUNCION DE DELETE ==========//