<?php
session_start();
if ($_SESSION['Oficina']['id']) {
    include('../controllers/ctrlEmpleados.php');
    $controller = new CtrlEmpleados();
    $empleados = $controller->getEmpleados();
    $empleados = $empleados[2];
    $departamentos = $controller->getDepartamentos();
    $departamentos = $departamentos[2];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Empleados</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
        <link rel="stylesheet" href=".././css/dmCatalogoProducto.css">
        <link rel="stylesheet" href=".././css/nerdfont.css">
        <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
    </head>

    <body>
        <?php include('.././components/nav-bar.php'); ?>

        <section class="mt-container container-fluid">
            <h2 class="text-center">Registro de Empleados</h2>

            <div class="container-fluid row gx-5 px-4">
                <!-- Inicio registro de empleados -->
                <section class="col col-6 col-md-4">
                    <form id="form-empeladoa">

                        <input type="hidden" id="registro" name="registro" value="insertEmpleado">
                        <h2 class="text-center">Formulario de empleados</h2>


                        <label for="inpnombre" class="form-label"> Nombres: </label>
                        <input type="text" class="form-control" id="inpnombre" name="nombre">

                        <label for="inpapellido1" class="form-label">Primer apellido: </label>
                        <input type="text" class="form-control" id="inpapellido1" name="apellido1">

                        <label for="inpapellido2" class="form-label">Segundo apellido: </label>
                        <input type="text" class="form-control" id="inpapellido2" name="apellido2">

                        <label for="inpdni" class="form-label">DNI: </label>
                        <input type="text" class="form-control" id="inpdni" name="dni" onkeypress="return soloNumeros(event)">

                        <label for="inptelefono" class="form-label">Telefono: </label>
                        <input type="text" class="form-control" id="inptelefono" name="telefono" onkeypress="return soloNumeros(event)">

                        <label for="inpdireccion" class="form-label">Direccion: </label>
                        <input type="text" class="form-control" id="inpdireccion" name="direccion">

                        <label for="list-genero" class="form-label">Genero: </label>
                        <select name="listGenero" id="listGenero" class="form-control">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>

                        <label for="list-departamentos" class="form-label">Departamentos: </label>
                        <select name="listDepartamentos" id="listDepartamentos" class="form-control">
                            <option value="0">SELECCIONE</option>
                            <?php
                            for ($i = 0; $i < count($departamentos); $i++) {
                            ?>
                                <option value="<?= $departamentos[$i]['ID'] ?>"><?= $departamentos[$i]['nombre'] ?></option>
                            <?php } ?>
                        </select>

                        <br>
                        <label for="inpfechaN" class="form-label">Ingrese su fecha de nacimiento: </label>
                        <input type="date" class="form-control" id="inpfechaN" name="fechaN">
                        <section class="btn-group mt-4" id="botnones" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-outline-primary" id="btnAgregar">Agregar</button>
                        </section>
                    </form>
                    <!--Fin del formulario-->
                    <br>
                </section>
                <!-- Fin registro de empleados -->
                <!-- Inicio de la tabla -->
                <section class="col">
                    <table class="table table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Departamento</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Genero</th>
                                <th>Fecha</th>
                                <!--  <th>Departamento</th>nueva-->
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="contentTable">
                            <?php for ($i = 0; $i < count($empleados); $i++) { ?>
                                <tr>
                                    <td><?= $empleados[$i]['ID'] ?></td>
                                    <td><?= $empleados[$i]['nombres'] ?></td>
                                    <td><?= $empleados[$i]['apellido-paterno'] ?></td>
                                    <td><?= $empleados[$i]['apellido-materno'] ?></td>
                                    <td><?= $empleados[$i]['Departamento'] ?></td>
                                    <td><?= $empleados[$i]['n-identidad'] ?></td>
                                    <td><?= $empleados[$i]['n-telefono'] ?></td>
                                    <td><?= $empleados[$i]['direccion'] ?></td>
                                    <td><?= $empleados[$i]['genero'] ?></td>
                                    <td><?= $empleados[$i]['fecha-nacimiento'] ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="editEmpleado(<?= $empleados[$i]['ID'] ?>)">
                                            <i class="nf nf-md-pencil_outline"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="deleteEmpleado(<?= $empleados[$i]['ID'] ?>)">
                                            <i class="nf nf-fa-trash_o"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if (count($empleados) == 0) {
                        echo "<div id='div_msg_vacio' class='position-relative'>
                            <img class='position-relative start-50 translate-middle-x' src='../img/vacio.jpg' />
                            <p class='text-center'>No hay elementos.</p>
                            </div>";
                    } ?>
                </section>
                <!-- Fin de la tabla -->
            </div>
        </section>
    </body>
    <script src=".././js/bootstrap.bundle.min.js"></script>
    <script src=".././js/popper.min.js"></script>
    <script src=".././js/swal.min.js"></script>
    <script src=".././js/jquery-3.7.1.min.js"></script>
    <script src=".././js/sgRegEmpleados.js"></script>

    <script>
        function editEmpleado(id) {
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
                id: id
            }).done((response) => {
                Swal.fire({
                    title: 'Formulario de actualizacion de Empleados',
                    html: `
                            <form id="form-edit-emp">
                                <label for="" class="form-label">Nombres: </label>
                                <input type="text" class="form-control" name="editNombre" id="nombreUp" value='${response.data[0]['nombres']}'>
                                <label for="apellido1" class="form-label">Primer apellido: </label>
                                <input type="text" class="form-control" id="apellido1Up" name="apellido1" value="${response.data[0]['apellido-paterno']}">
                                <label for="inpapellido2" class="form-label">Segundo apellido: </label>
                                <input type="text" class="form-control" id="apellido2Up" name="apellido2" value='${response.data[0]['apellido-materno']}'>
                                <label for="inpdni" class="form-label">DNI: </label>
                                <input type="text" class="form-control" id="dniUp" name="dni" onkeypress="return soloNumeros(event)" value='${response.data[0]['n-identidad']}'>
                                <label for="inptelefono" class="form-label">Telefono: </label>
                                <input type="text" class="form-control" id="telefonoUp" name="telefono" value='${response.data[0]['n-telefono']}'>
                                <label for="inpdireccion" class="form-label">Direccion: </label>
                                <input type="text" class="form-control" id="direccionUp" name="direccion" value='${response.data[0]['direccion']}'>
                                <label for="list-genero" class="form-label">Genero: </label>
                                <select name="listGenero" id="listGeneroUp" class="form-control">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>    
                                </select>
                                <label for="list-departamentos" class="form-label">Departamentos: </label>
                                <select name="listDepartamentos" id="listDepartamentosUp" class="form-control">
                                    <option value="0">SELECCIONE</option>
                                    <?php
                                    for ($i = 0; $i < count($departamentos); $i++) {
                                    ?>
                                        <option value="<?= $departamentos[$i]['ID'] ?>"><?= $departamentos[$i]['nombre'] ?></option>    
                                    <?php } ?>
                                </select>
                                <label for="inpfechaN" class="form-label">Ingrese su fecha de nacimiento: </label>
                                <input type="date" class="form-control" id="fechaNUp" name="fechaN" value=''>
                            </form>
                        `,
                    didOpen: () => {
                        document.getElementById('listDepartamentosUp').value = response.data[0]['Codigo Departamento'];
                        document.getElementById('listGeneroUp').value = response.data[0]['genero'];
                        document.getElementById('fechaNUp').value = response.data[0]['fecha-nacimiento'];
                    },
                    showCancelButton: true,
                    confirmButtonText: "Aceptar",

                }).then((res) => {
                    if (res.isConfirmed) {
                        if ($('#nombreUp').val().trim() != "" && $('#apellido1Up').val().trim() != "" &&
                            $('#apellido2Up').val().trim() != "" && $('#dniUp').val().trim() != "" &&
                            $('#telefonoUp').val().trim() != "" && $('#direccionUp').val().trim() != "" &&
                            $('#listGeneroUp').val().trim() != "" && $('#fechaNUp').val().trim() != "" &&
                            $('#listDepartamentosUp').val() != "0") {
                            var nombre = document.getElementById('nombreUp').value;
                            var apellidosP = document.getElementById('apellido1Up').value;
                            var apellidosM = document.getElementById('apellido2Up').value;
                            var dnni = document.getElementById('dniUp').value;
                            var telefonos = document.getElementById('telefonoUp').value;
                            var direccione = document.getElementById('direccionUp').value;
                            var generos = document.getElementById('listGeneroUp').value;
                            var f_nac = document.getElementById('fechaNUp').value;
                            var idDep = document.getElementById('listDepartamentosUp').value;
                            $.post('.././controllers/CtrlEmpleados.php', {
                                registro: 'updateEmpleados',
                                nombre: nombre,
                                apellido1: apellidosP,
                                apellido2: apellidosM,
                                dni: dnni,
                                telefono: telefonos,
                                direccion: direccione,
                                listGenero: generos,
                                fechaN: f_nac,
                                idDep: idDep,
                                id: id
                            }).done((resolve) => {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Exito al modificar el registro',
                                }).then(() => {
                                    location.reload();
                                })
                            })
                        }else{
                            Toast.fire({
                                icon: 'warning',
                                text: 'No se permiten datos vacios'
                            })
                        }
                    }else{
                        Toast.fire({
                            icon: 'info',
                            text: 'Se cancelo la operacion'
                        })
                    }
                })

            }).fail((ERR) => {
                alert(ERR);
            });
        }
    </script>

    </html>
<?php
} else {
    header('location: ../index.php');
}
?>