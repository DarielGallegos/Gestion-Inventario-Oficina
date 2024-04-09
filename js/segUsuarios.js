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

function ver() {
    var campoContra = document.getElementById("inpPass");
    var campoConfirm = document.getElementById("inpPassC");
    if (campoContra.type === "password") {
        campoContra.type = "text";
        campoConfirm.type = "text";
    } else {
        campoContra.type = "password";
        campoConfirm.type = "password";
    }
}

$('#form-register-user').on('submit', (e) => {
    e.preventDefault();
    id = $('#idUsuario').val();
    id = parseInt(id);
    alias = $('#alias').val().trim();
    passwd = $('#inpPass').val().trim();
    passwdC = $('#inpPassC').val().trim();
    pDM = $('#pDatosM').val();
    pTr = $('#pTransacciones').val();
    pCR = $('#pConsultaRep').val();
    pSeg = $('#pSeguridad').val();
    if (id != 0 && alias != "" && passwd != "" && passwdC != "" && pDM != "" && pTr != "" && pCR != "" && pSeg != "" && (passwd === passwdC)) {
        $.post('.././controllers/ctrlUsuarios.php', {
            peticion: 'insertUsuarios',
            alias: alias,
            passwd: passwdC,
            pDM: pDM,
            pTr: pTr,
            pCR: pCR,
            pSeg: pSeg,
            id: id
        }).done((response) => {
            if (response.status === 'success') {
                Toast.fire({
                    icon: 'success',
                    text: 'Empleado registrado correctamente'
                }).then(() => {
                    location.reload();
                })
            }
        })
    } else {
        Toast.fire({
            icon: 'info',
            text: 'Asegurese de llenar campos y que las contraseñas sean iguales'
        });
    }
});

function editUsuario(id) {
    $.post('.././controllers/ctrlUsuarios.php', {
        peticion: 'getOneUser',
        id: id
    }).done((response) => {
        Swal.fire({
            title: 'Actualizacion de Usuario',
            html: `
                <form>
                    <input type="hidden" id="idUser" value="${id}">
                    <label for="inpuser" class="form-label">Ingrese un Alias: </label>
                    <input type="text" class="form-control" id="aliasUp" name="alias" value="${response.data[0]['alias']}" required>
        
                    <label for="inpPass" class="form-label">Ingrese la contraseña: </label>
                    <input type="password" class="form-control" id="inpPassUp" name="inpPass" required>
    
                    <section class="row">
                        <section class="col col-11">
                        <label for="inpPassC" class="form-label">Confirmar contraseña: </label>
                        <input type="password" class="form-control" id="inpPassCUp" name="inpPassC" required>
                        </section>
                        <section class="col col-1">
                            <button type="button" onclick="ver();" style="margin-top:31px; margin-left: -25px;" class="btn">👁‍🗨</button>
                        </section>
                    </section>
    
                    <label for="inpuser" class="form-label">Ingrese el nivel de Permiso para Datos Maestros: </label>
                    <input type="number" class="form-control" id="pDatosMUp" name="" min="0" max="4" value="${response.data[0]['dMaestros']}">
    
                    <label for="inpuser" class="form-label">Ingrese el nivel de Permiso para Transacciones: </label>
                    <input type="number" class="form-control" id="pTransaccionesUp" name="" min="0" max="4" value="${response.data[0]['transacciones']}">
    
                    <label for="inpuser" class="form-label">Ingrese el nivel de Permiso para Consultas y Reporteria: </label>
                    <input type="number" class="form-control" id="pConsultaRepUp" name="" min="0" max="1" value="${response.data[0]['consultasReporteria']}">
    
                    <label for="inpuser" class="form-label">Ingrese el nivel de Permiso para Seguridad: </label>
                    <input type="number" class="form-control" id="pSeguridadUp" name="" min="0" max="4" value="${response.data[0]['seguridad']}">    
                </form>
                `,
            showCancelButton: true,
            confirmButtonText: 'Modificar',
            cancelButtonText: 'Cancelar'
        }).then((e) => {
            if (e.isConfirmed) {
                id = $('#idUser').val();
                id = parseInt(id);
                alias = $('#aliasUp').val().trim();
                passwd = $('#inpPassUp').val().trim();
                passwdC = $('#inpPassCUp').val().trim();
                pDM = $('#pDatosMUp').val();
                pTr = $('#pTransaccionesUp').val();
                pCR = $('#pConsultaRepUp').val();
                pSeg = $('#pSeguridadUp').val();
                if (id != 0 && alias != "" && pDM != "" && pTr != "" && pCR != "" && pSeg != "") {
                    if(passwd != "" && passwdC != "" && (passwd === passwdC)){
                        passwdC = passwd;
                    }else{
                        passwdC = "";
                    }
                    $.post('.././controllers/ctrlUsuarios.php', {
                        peticion: 'updateUsuario',
                        alias: alias,
                        passwd: passwdC,
                        pDM: pDM,
                        pTr: pTr,
                        pCR: pCR,
                        pSeg: pSeg,
                        id: id
                    }).done((response) => {
                        if(response.status === 'success'){
                            Toast.fire({
                                icon: 'success',
                                text: 'Exito al modificar empleado'
                            }).then(() => {
                                location.reload();
                            });
                        }
                    });
                }else{
                    Toast.fire({
                        icon: 'info',
                        text: 'Se rellene campos'
                    });
                }
            } else {
                Toast.fire({
                    icon: 'info',
                    text: 'Se cancelo operacion'
                });
            }
        });
    })
}

function deleteUsuario(id) {
    Swal.fire({
        icon: 'warning',
        title: 'Advertencia',
        text: '¿Esta seguro de eliminar este empleado? (Si lo hace se eliminara por completo)',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((e) => {
        if (e.isConfirmed) {
            $.post('.././controllers/ctrlUsuarios.php', {
                peticion: 'deleteUsuario',
                id: id
            }).done((response) => {
                if (response.status = 'success') {
                    Toast.fire({
                        icon: 'success',
                        text: 'Usuario eliminado por completo'
                    }).then(() => {
                        location.reload();
                    })
                }
            })
        } else {
            Toast.fire({
                icon: 'info',
                text: 'Se cancelo operacion'
            })
        }
    })
}