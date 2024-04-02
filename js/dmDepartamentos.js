$('#form-dep-reg').on('submit', function (e) {
    e.preventDefault();
    console.log(new FormData(this));
    if ($('#NoDepartamentos').val != "") {
        $.ajax({
            url: '.././controllers/CtrlDepartamentos.php',
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
            },
            error: function (errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Problemas al ejecutar peticion',
                    text: errorThrown
                });
            }
        })
    } else {
        Swal.fire({
            text: 'Favor llenar los campos.',
            icon: 'warning',
            title: 'Advertencia',
        });
    }
});

function editDepartamento(id) {
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
    $.post('.././controllers/ctrlDepartamentos.php', {
        request: 'getDepartamento',
        id: id
    }).done((response) => {
        Swal.fire({
            title: "<h2>Formulario de Modificacion de Departamento</h2>",
            html: `
            <form id="form-edit-cat">
                    <label for="" class="form-label">Nombre del Departamento: </label>
                    <input type="text" class="form-control" name="editNombre" id="nombre" value=` + response.data[0]['nombre'] + `>
                    <br>
            </form>
    `,
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                var nombre = document.getElementById("nombre").value;
                $.post('.././controllers/ctrlDepartamentos.php', {
                    request: 'updateDep',
                    NoDepartamento: nombre,
                    id: id
                }).done((response) => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Exito al Modificar el Registro'
                    }).then((conf) => {
                        location.reload();
                    })
                })

            }
        })
    })
}

function deleteDepartamento(id) {
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
        title: '¿Desea eliminar este registro?',
        text: 'Si confirma, este registro no estará disponible',
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar'
    }).then((res) => {
        if (res.isConfirmed) {
            $.post('.././controllers/ctrlDepartamentos.php', {
                request: 'deleteDep',
                id: id
            }).done((result) => {
                Toast.fire({
                    icon: 'success',
                    title: 'Exito al Eliminar el Registro'
                }).then((conf) => {
                    location.reload();
                })
            });
        }
    });
}