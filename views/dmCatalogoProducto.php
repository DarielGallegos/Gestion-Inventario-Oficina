<?php
session_start();
if ($_SESSION['Oficina']['id']) {
    include('../controllers/ctrlCatalogoInsumos.php');
    $controller = new CtrlCatalogoInsumos();
    $categorias = $controller->getCategoriasInsumos();
    $categorias = $categorias[2];
    $insumos = $controller->getCatalogoInsumos();
    $insumos = $insumos[2];
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catalogo de Insumos</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
         <link rel="stylesheet" href=".././css/dmCatalogoProducto.css">
        <link rel="stylesheet" href=".././css/nerdfont.css">
    </head>

    <body>
        <?php include('.././components/nav-bar.php'); ?>
        <section class="mt-container container-fluid">
            <h2 class="text-center">Catalogo Insumos - Registro</h2><br>
            <section class="row">
                <section class="col col-4">
                    <form id="form-catalogo-insumo">
                        <h3 class="text-center">Formulario de Registro</h3>
                        <label for="">Nombre Insumo: </label>
                        <input type="text" class="form-control" id="insumo" name="insumo">
                        <label for="">Descripcion: </label>
                        <textarea name="descripcionInsumo" class="form-control" id="descripcionInsumo" cols="30" rows="10"></textarea>
                        <label for="">Seleccione la Categoria: </label>
                        <select name="idCategoria" id="idCategoria" class="form-control">
                            <option value="0">----Seleccione-----</option>
                            <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                                <option value="<?= $categorias[$i]['ID'] ?>"><?= $categorias[$i]['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="peticion" id="peticion" value="insertInsumo">

                        <button type="submit" class="btn btn-outline-primary" id="btnAgregar" style="margin-left: 35%">Agregar</button>
                    </form>
                </section>
                <section class="col col-8">
                    <label for="search">Buscar Producto:</label>
                    <input type="text" id="search" onkeyup="searchTable()" placeholder="🔍Buscar por: ID, Nombre, Descripcion, Categoria" style="width: 50%; padding: 8px;">
                    <br>
                    <table class="table table-hover" id="tabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="contentTable">
                            <!-- Table content will be populated dynamically -->
                            <?php for ($i = 0; $i < count($insumos); $i++) { ?>
                                <tr>
                                    <td><?= $insumos[$i]['ID'] ?></td>
                                    <td><?= $insumos[$i]['nombre'] ?></td>
                                    <td><?= $insumos[$i]['descripcion'] ?></td>
                                    <td><?= $insumos[$i]['categoria'] ?></td>
                                    <td>
                                        <button class="btn btn-warning" onclick="editInsumo(<?= $insumos[$i]['ID'] ?>)">
                                            <i class="nf nf-md-pencil_outline"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="deleteInsumo(<?= $insumos[$i]['ID'] ?>)">
                                            <i class="nf nf-fa-trash_o"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if(count($insumos) == 0) {
                    echo "<div id='div_msg_vacio' class='position-relative'>
                            <img class='position-relative start-50 translate-middle-x' src='../img/vacio.jpg' />
                            <p class='text-center'>No hay elementos.</p>
                            </div>";
                    }?>
                </section>
            </section>


        </section>

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
    <script src=".././js/dmCatalogoInsumos.js"></script>
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

            $.post('.././controllers/CtrlCatalogoInsumos.php', {
                peticion: 'getInsumo',
                id: id
            }).done((response) => {
                Swal.fire({
                    title: 'Formulario de Actualizacion de Insumo',
                    html: `
            <form id="form-edit-cat">
                    <label for="" class="form-label">Nombre del Insumo: </label>
                    <input type="text" class="form-control" name="editNombre" id="nombre" value='${response.data[0]['nombre']}'>
                    <br>
                    <label for="">Descripcion: </label>
                    <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="10">${response.data[0]['descripcion']}</textarea> 
                    <br>
                    <select name="idCategoria" id="categoria" class="form-control">
                    <option value="0">----Seleccione-----</option>
                        <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                            <option value="<?= $categorias[$i]['ID'] ?>"><?= $categorias[$i]['nombre'] ?></option>
                        <?php } ?>
                    </select> 
                </form>
            `,
                    showCancelButton: true,
                    confirmButtonText: "Aceptar",
                    didOpen: () => {
                        document.getElementById('categoria').value = response.data[0]['ID_CATEGORIA'];
                    }
                }).then((res) => {
                    if (res.isConfirmed) {
                        var nombre = document.getElementById('nombre').value;
                        var descripcion = document.getElementById('descripcion').value;
                        var idCat = document.getElementById('categoria').value;
                        idCat = parseInt(idCat);
                        $.post('.././controllers/CtrlCatalogoInsumos.php', {
                            peticion: 'updateInsumo',
                            insumo: nombre,
                            descripcionInsumo: descripcion,
                            idCategoria: idCat,
                            id: id
                        }).done((resolve) => {
                            Toast.fire({
                                icon: 'success',
                                title: 'Exito al Modificar el Registro'
                            }).then((conf) => {
                                location.reload();
                            })
                        })
                    }
                })
            });
        }
    </script>
    </html>
<?php
} else {
    header('location: ../index.php');
}
?>