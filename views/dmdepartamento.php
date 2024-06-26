<?php
session_start();
if ($_SESSION['Oficina']['id']) {
    include('../controllers/ctrlDepartamentos.php');
    $controller = new CtrlDepartamentos();
    $departamentos = $controller->getDepartamentos();
    $departamentos = $departamentos[2];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion Inventario Oficina</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
        <link rel="stylesheet" href=".././css/dmCatalogoProducto.css">
        <link rel="stylesheet" href=".././css/nerdfont.css">
        <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">

    </head>

    <body>
        <?php include("../components/nav-bar.php") ?>
        <section class="mt-container container-fluid">
            <h2 class="text-center">Registro de Departamentos</h2><br><br>
            <section class="container-fluid row gx-5 px-4">

                <!-- Inicio Estructura de Formulario Registro -->
                <section class=" col col-6 col-md-4">
                    <form id="form-dep-reg">
                        <h3 class="text-center">Formulario de Registro</h3>
                        <label for="NoDepartamento" class="form-label">Nombre del Departamento</label>
                        <input type="text" class="form-control" id="NoDepartamento" name="NoDepartamento" required>
                        <input type="hidden" name="request" value="insertDep">
                        <br>
                        <button type="submit" class="btn btn-outline-primary" id="btnAgregar" style="margin-left: 35%">Agregar</button>
                    </form>
                </section>
                <!-- Fin Estructura de Formulario Registro -->
                <!-- Inicio Estructura de Tabla -->
                <section class="col">
                    <label for="search">Buscar Departamento:</label>
                    <input type="text" id="search" onkeyup="searchTable()" placeholder="🔍 Buscar por: ID, Nombre" style="width: 50%; padding: 8px;">
                    <br>
                    <table class="table table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="contentTable">
                            <?php for ($i = 0; $i < count($departamentos); $i++) { ?>
                                <tr>
                                    <td><?= $departamentos[$i]['ID'] ?></td>
                                    <td><?= $departamentos[$i]['nombre'] ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="editDepartamento(<?= $departamentos[$i]['ID'] ?>)">
                                            <i class="nf nf-md-pencil_outline"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="deleteDepartamento(<?= $departamentos[$i]['ID'] ?>)">
                                            <i class="nf nf-fa-trash_o"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if (count($departamentos) == 0) {
                        echo "<div id='div_msg_vacio' class='position-relative'>
                            <img class='position-relative start-50 translate-middle-x' src='../img/vacio.jpg' />
                            <p class='text-center'>No hay elementos.</p>
                            </div>";
                    } ?>
                </section>
                <!-- Fin Estructura de Tabla -->
            </section>

            <!-- Funcion para filtra busqueda -->
            <script>
                function searchTable() {

                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("search");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("tabla");
                    tr = table.getElementsByTagName("tr");


                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td");
                        for (var j = 0; j < td.length; j++) {
                            if (td[j]) {
                                txtValue = td[j].textContent || td[j].innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                    break;
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                }
            </script>
    </body>
    <script src=".././js/jquery-3.7.1.min.js"></script>
    <script src=".././js/dmDepartamentos.js"></script>
    <script src=".././js/bootstrap.bundle.min.js"></script>
    <script src=".././js/swal.min.js"></script>
    <script src=".././js/popper.min.js"></script>

    </html>
<?php
} else {
    header('location: ../index.php');
}
?>