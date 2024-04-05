<?php
session_start();
if ($_SESSION['Oficina']['id']) {
    include ($_SERVER['DOCUMENT_ROOT'] . '/Gestion-Inventario-Oficina/controllers/ctrlEntradaInsumos.php');
    $controller = new CtrlEntradaInsumos();
    $insumos = $controller->getInsumos();
    $insumos = $insumos[2];
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion Inventario Oficina</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
        <link rel="stylesheet" href=".././css/nerdfont.css">
        <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
    </head>

    <body>
        <?php include ('.././components/nav-bar.php');
        $arreglo = [];
        ?>

        <section class="mt-container container-fluid">
            <h2 class="text-center">Ingreso de Insumos</h2>
            <section class="container-fluid row gx-5 px-4">

                <!-- Inicio Estructura de Formulario Registro -->
                <section class=" col col-6 col-md-4">
                    <form>
                        <h2 class="text-center">Formulario de Entrada</h2>
                        <label for="NomEmpleado" class="form-label">Empleado:
                            <?= $_SESSION['Oficina']['nombre'] ?>
                        </label>
                        <input type="hidden" id="idEmpleado" value='<?= $_SESSION['Oficina']['id'] ?>'>
                        <label for="">Fecha de Registro</label>
                        <input type="date" class="form-control" id="dateEntrega" readonly>
                        <label for="">Seleccione el archivo de firma:</label>
                        <input type="file" class="form-control" id="fileFirma">
                        <br>
                    </form>
                    <section class="btn-group mt-4" id="botnones" style="display: flex; justify-content: center;">
                        <button type="button" class="btn btn-outline-primary" id="btnAgregar">Agregar<i
                                class="nf nf-cod-add"></i></button>
                        <button type="button" class="btn btn-outline-primary" id="btnEnviar">Enviar<i
                                class="nf nf-fa-send"></i></button>
                        <button type="button" class="btn btn-outline-primary" id="btnFlush">Flush<i
                                class="nf nf-cod-trash"></i></button>
                    </section>
                </section>
                <!-- Fin Estructura de Formulario Registro -->


                <!-- Inicio Estructura de Tabla -->
                <section class="col">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Insumo</th>
                                <th>Cantidad Insumo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="contentTable">
                        </tbody>
                    </table>
                    <?php
                    if (count($arreglo) == 0) {
                        echo "<div id='div_msg_vacio' class='position-relative'>
                        
                            <img class='position-relative start-50 translate-middle-x' src='../img/vacio.jpg' />
                            <p class='text-center'>No hay elementos.</p>
                            </div>";
                    }
                    ?>
                </section>
                <!-- Fin Estructura de Tabla -->
            </section>
        </section>
    </body>
    <script src=".././js/jquery-3.7.1.min.js"></script>
    <script src=".././js/bootstrap.bundle.min.js"></script>
    <script src=".././js/swal.min.js"></script>
    <script src=".././js/popper.min.js"></script>
    <script src=".././js/trEntradaInsumos.js"></script>
    <script>
        document.getElementById("btnAgregar").addEventListener("click", () => {

            let div_msg_vacio = document.getElementById('div_msg_vacio');
            if (div_msg_vacio) {
                div_msg_vacio.classList.add('oculto');
            }

            var row = document.createElement('tr');
            row.setAttribute('class', 'dynamic_row')
            row.innerHTML = `
        <td>        
            <select class="form-control" name="" id="cboInsumo">
                <option value="">Seleccione</option>
            <?php
            if (count($insumos) > 0) {
                for ($i = 0; $i < count($insumos); $i++) { ?>
                        <option value=<?= $insumos[$i]['ID'] ?> ><?= $insumos[$i]['nombre'] . " N°. " . $insumos[$i]['ID'] . '-' . $insumos[$i]['ID_INSUMOS_CATALOGO'] ?></option>
                <?php }
            }
            ?>
            </select>
        </td>
        <td>
            <input type="number" class="form-control" name="" id="stock">
        </td>
        <td>
            <button class="btn btn-danger" onclick="deleteInsumo(this)">
                <i class="nf nf-fa-trash_o"></i>
            </button>
        </td>`;
            document.getElementById("contentTable").prepend(row);
        });
    </script>

    </html>
    <?php
} else {
    header('location: ../index.php');
}
?>