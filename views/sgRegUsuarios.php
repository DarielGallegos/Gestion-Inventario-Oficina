<?php
session_start();
if ($_SESSION['Oficina']['id']) {
    include($_SERVER['DOCUMENT_ROOT'] . '/Gestion-Inventario-Oficina/controllers/ctrlUsuarios.php');
    $controller = new CtrlUsuarios();
    $empleados = $controller->getEmpleadoSinUsuario();
    $empleados = $empleados[2];
    $usuarios = $controller->getUsuarios();
    $usuarios = $usuarios[2];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usuarios</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
        <link rel="stylesheet" href=".././css/dmCatalogoProducto.css">
        <link rel="stylesheet" href=".././css/nerdfont.css">
        <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>

    <body>
        <?php include('.././components/nav-bar.php'); ?>

        <section class="mt-container container-fluid">
            <h2 class="text-center">Formulario de usuarios</h2>

            <div class="container-fluid row gx-5 px-4">
                <!-- Inicio registro de empleados -->
                <section class="col col-6 col-md-4">
                    <form id="form-register-user">
                        <h2 class="text-center">Formulario de Usuarios</h2>
                        <label for="">Seleccione el Empleado: </label>
                        <select name="idUsuario" id="idUsuario" class="form-control" required>
                            <option value="0">Seleccione</option>
                            <?php for ($i = 0; $i < count($empleados); $i++) {
                            ?>
                                <option value="<?= $empleados[$i]['ID'] ?>"><?= $empleados[$i]['Empleado'] . ' - ' . $empleados[$i]['Identidad'] ?></option>
                            <?php } ?>
                        </select>

                        <label for="inpuser" class="form-label">Ingrese un Alias: </label>
                        <input type="text" class="form-control" id="alias" name="alias" required>

                        <label for="inpPass" class="form-label">Ingrese la contraseña: </label>
                        <input type="password" class="form-control" id="inpPass" name="inpPass" required>

                        <section class="row">
                            <section class="col col-11">
                                <label for="inpPassC" class="form-label">Confirmar contraseña: </label>
                                <input type="password" class="form-control" id="inpPassC" name="inpPassC" required>
                            </section>
                            <section class="col col-1">
                                <button type="button" onclick="ver();" style="margin-top:31px; margin-left: -25px;" class="btn">👁‍🗨</button>
                            </section>
                        </section>

                        <label for="inpuser" class="form-label">Ingrese el nivel de Permiso para Datos Maestros: </label>
                        <input type="number" class="form-control" id="pDatosM" name="" min="0" max="4" value="0">

                        <label for="inpuser" class="form-label">Ingrese el nivel de Permiso para Transacciones: </label>
                        <input type="number" class="form-control" id="pTransacciones" name="" min="0" max="4" value="0">

                        <label for="inpuser" class="form-label">Ingrese el nivel de Permiso para Consultas y Reporteria: </label>
                        <input type="number" class="form-control" id="pConsultaRep" name="" min="0" max="1" value="0">

                        <label for="inpuser" class="form-label">Ingrese el nivel de Permiso para Seguridad: </label>
                        <input type="number" class="form-control" id="pSeguridad" name="" min="0" max="4" value="0">

                        <section class="btn-group mt-4" id="botnones" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-outline-primary" id="btnAgregar">Agregar</button>
                        </section>
                    </form>
                    <br>
                </section>
                <!-- Fin registro de empleados -->

                <!-- Inicio de la tabla -->
                <section class="col">
                    <table class="table table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th rowspan="2">ID</th>
                                <th rowspan="2">Alias</th>
                                <th rowspan="2">Empleado</th>
                                <th colspan="4">Niveles de Permiso</th>
                                <th rowspan="2">Acciones</th>
                            </tr>
                            <tr>
                                <th>Datos Maestros</th>
                                <th>Transacciones</th>
                                <th>Consultas y Reporteria</th>
                                <th>Seguridad</th>
                            </tr>
                        </thead>
                        <tbody id="contentTable">
                            <?php for ($x = 0; $x < count($usuarios); $x++) { ?>
                                <tr>
                                    <td><?= $usuarios[$x]['ID_EMPLEADO'] ?></td>
                                    <td><?= $usuarios[$x]['alias'] ?></td>
                                    <td><?= $usuarios[$x]['Empleado'] ?></td>
                                    <td><?= $usuarios[$x]['dMaestros'] ?></td>
                                    <td><?= $usuarios[$x]['transacciones'] ?></td>
                                    <td><?= $usuarios[$x]['consultasReporteria'] ?></td>
                                    <td><?= $usuarios[$x]['seguridad'] ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="editUsuario(<?= $usuarios[$x]['ID_EMPLEADO'] ?>)">
                                            <i class="nf nf-md-pencil_outline"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="deleteUsuario(<?= $usuarios[$x]['ID_EMPLEADO'] ?>)">
                                            <i class="nf nf-fa-trash_o"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </section>
            </div>
        </section>

        <script src=".././js/bootstrap.bundle.min.js"></script>
        <script src=".././js/jquery-3.7.1.min.js"></script>
        <script src=".././js/swal.min.js"></script>
        <script src=".././js/segUsuarios.js"></script>
    </body>

    </html>
<?php
} else {
    header('location: ../index.php');
}
?>