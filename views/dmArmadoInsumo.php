<?php
session_start();
if ($_SESSION['Oficina']['id']) {
    include($_SERVER['DOCUMENT_ROOT'] . '/Gestion-Inventario-Oficina/controllers/ctrlArmadoInsumo.php');
    $controller = new CtrlArmadoInsumo();
    $insumos = $controller->getInsumos();
    $insumos = $insumos[2];
    $insumosArmados = $controller->getInsumosArmados();
    $insumosArmados = $insumosArmados[2];
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Armado de Insumos</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
        <link rel="stylesheet" href=".././css/dmCatalogoProducto.css">
        <link rel="stylesheet" href=".././css/nerdfont.css">
    </head>

    <body>
        <?php include('.././components/nav-bar.php'); ?>
        <section class="mt-container container-fluid">
            <h2 class="text-center">Catalogo Productos - Registro</h2><br>
            <section class="row">
                <section class="col col-4">
                    <form id="form-insumo">
                        <h3 class="text-center">Formulario de Registro</h3>
                        <label for="">Seleccione el Insumo: </label>
                        <select name="idInsumo" id="idInsumo" class="form-control">
                            <option value="0">----Seleccione-----</option>
                            <?php for ($i = 0; $i < count($insumos); $i++) { ?>
                                <option value="<?= $insumos[$i]['ID'] ?>"><?= $insumos[$i]['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-outline-primary" id="btnAgregar" style="margin-left: 35%">Agregar</button>
                    </form>
                </section>
                <section class="col col-8">
                <label for="search">Buscar Producto:</label>
                    <input type="text" id="search" onkeyup="searchTable()" placeholder="🔍Buscar por: ID, Nombre, Categoria" style="width: 50%; padding: 8px;">
                    <br>
                    <table class="table table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="contentTable">
                            <?php for ($i = 0; $i < count($insumosArmados); $i++) { ?>
                                <tr>
                                    <td><?= $insumosArmados[$i]['ID'] . '-' . $insumosArmados[$i]['ID_INSUMOS_CATALOGO'] ?></td>
                                    <td><?= $insumosArmados[$i]['nombre'] ?></td>
                                    <td><?= $insumosArmados[$i]['categoria'] ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="editInsumo(<?= $insumosArmados[$i]['ID'] ?>)">
                                            <i class="nf nf-md-pencil_outline"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="deleteInsumo(<?= $insumosArmados[$i]['ID'] ?>)">
                                            <i class="nf nf-fa-trash_o"></i>
                                        </button>
                                    </td>
                                <?php } ?>
                        </tbody>
                    </table>
                    <?php if(count($insumosArmados) == 0) {
                    echo "<div id='div_msg_vacio' class='position-relative'>
                            <img class='position-relative start-50 translate-middle-x' src='../img/vacio.jpg' />
                            <p class='text-center'>No hay elementos.</p>
                            </div>";
                    }?>
                </section>
            </section>
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
    <script src=".././js/swal.min.js"></script>
    <script src=".././js/bootstrap.bundle.min.js"></script>
    <script src=".././js/popper.min.js"></script>
    <script src=".././js/dmArmadoInsumo.js"></script>
    <script>
        function editInsumo(id) {
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
            $.post('.././controllers/ctrlArmadoInsumo.php', {
                peticion: 'getOneInsumo',
                id: id
            }).done((response) => {
                Swal.fire({
                    title: 'Formulario de Actualizacion de Registro',
                    html: `
                        <form id="form-insumo">
                        <h3 class="text-center">Formulario de Registro</h3>
                        <label for="">Seleccione el Insumo: </label>
                        <select id="idInsumoUp" class="form-control">
                            <option value="0">----Seleccione-----</option>
                            <?php for ($i = 0; $i < count($insumos); $i++) { ?>
                                <option value="<?= $insumos[$i]['ID'] ?>"><?= $insumos[$i]['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </form>
                        `,
                    didOpen: () => {
                        document.getElementById('idInsumoUp').value = response.data[0]['ID_INSUMOS_CATALOGO']
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((flag) => {
                    if (flag.isConfirmed) {
                        var idCatalogo = document.getElementById('idInsumoUp').value;
                        idCatalogo = parseInt(idCatalogo);
                        if (idCatalogo != 0) {
                            $.post('.././controllers/ctrlArmadoInsumo.php', {
                                peticion: 'updateInsumo',
                                idCatalogo: idCatalogo,
                                id: id
                            }).done((resolve) => {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Exito al Modificar el Registro'
                                }).then((conf) => {
                                    location.reload();
                                })
                            }).fail((err) => {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Error al Modificar el Registro'
                                })
                            })
                        }else{
                            Toast.fire({
                                    icon: 'info',
                                    title: 'No se permiten valores vacios'
                                })
                        }
                    }
                })
            })
        }
    </script>

    </html>
<?php
} else {
    header('location: ../index.php');
}
?>