<?php
session_start();
if ($_SESSION['Oficina']['id']) {
    include($_SERVER['DOCUMENT_ROOT'].'/Gestion-Inventario-Oficina/controllers/ctrlPedido.php');
    $controller = new ctrlPedido();
    $insumos = $controller->getAllInsumos();
    $insumos = $insumos[2];
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Peticiones</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
        <link rel="stylesheet" href=".././css/nerdfont.css">
        <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    </head>

    <body>
        <?php include('.././components/nav-bar.php'); ?>

        <section class="mt-container container-fluid">
            <h2 class="text-center">PETICIONES</h2>
            <section class="container-fluid row gx-5 px-4">

                <!-- Inicio Estructura de Formulario Registro -->
                <section class=" col col-6 col-md-4">
                    <form>
                        <h2 class="text-center">Formulario de Peticiones</h2>
                        <label for="NomEmpleado" class="form-label">Empleado Envia: <?= $_SESSION['Oficina']['nombre'] ?></label>
                        <input type="hidden" id="idEmpleado" value='<?= $_SESSION['Oficina']['id'] ?>'>
                        <input type="hidden" id="idDepartamento" value='<?= $_SESSION['Oficina']['idDepartamento'] ?>'>
                        <br>
                        <label for="" class="form-label">Departamento: <?= $_SESSION['Oficina']['departamento'] ?></label>
                        <br>
                        <label for="">Fecha de Registro</label>
                        <input type="date" class="form-control" id="dateEntrega" readonly>
                        <label for="">Seleccione el archivo de firma:</label>
                        <input type="file" id="fileFirma" class="form-control">
                    </form>
                    <section class="btn-group mt-4" id="botnones" style="display: flex; justify-content: center;">
                        <button type="button" class="btn btn-outline-primary" id="btnAgregar">Agregar<i class="nf nf-cod-add"></i></button>
                        <button type="button" class="btn btn-outline-primary" id="btnEnviar">Enviar<i class="nf nf-fa-send"></i></button>
                        <button type="button" class="btn btn-outline-primary" id="btnFlush">Flush<i class="nf nf-cod-trash"></i></button>
                    </section>
                </section>
                <!-- Fin Estructura de Formulario Registro -->


                <!-- Inicio Estructura de Tabla -->
                <section class="col">
                    <table class="table table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th>Nombre Del producto</th>
                                <th>Cantidad Del producto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="contentTable">
                        </tbody>
                    </table>
                </section>
                <!-- Fin Estructura de Tabla -->
            </section>
        </section>
    </body>
    <script src=".././js/jquery-3.7.1.min.js"></script>
    <script src=".././js/bootstrap.bundle.min.js"></script>
    <script src=".././js/swal.min.js"></script>
    <script src=".././js/popper.min.js"></script>
    <script src=".././js/trPedido.js"></script>
    <script>
        document.getElementById("btnAgregar").addEventListener("click", () => {
            var row = document.createElement('tr');
            row.innerHTML = `
        <td>        
            <select class="form-control" name="" id="cboInsumo">
                <option value="">Seleccione</option>
                <?php
                if (count($insumos) > 0) {
                    for ($i = 0; $i < count($insumos); $i++) { ?>
                <option value=<?= $insumos[$i]['Serial Insumo'] ?> ><?= $insumos[$i]['Insumo'] . " N°. " . $insumos[$i]['Serial Insumo'] . '-' . $insumos[$i]['INSUMO CATALOGO'] ?></option>
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
            row.querySelector("#cboInsumo").addEventListener("change", () => {
                if (row.querySelector("#cboInsumo").value != "") {
                    var id = parseInt(row.querySelector("#cboInsumo").value);
                    $.post(".././controllers/ctrlEntrega.php", {
                        request: "getOneInsumo",
                        id: id
                    }).done((response) => {
                        row.querySelector('#stock').setAttribute('max', response.data[0]['Stock']);
                        row.querySelector('#stock').value = parseInt(response.data[0]['Stock']);
                    });
                } else {
                    row.querySelector('#stock').value = 0;
                }
            });
        });
    </script>

    </html>
<?php
} else {
    header('location: ../index.php');
}
?>