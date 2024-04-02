<?php
session_start();
if($_SESSION['Oficina']['id']){
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Productos</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">
    <link rel="stylesheet" href=".././css/dmCatalogoProducto.css">
</head>

<body>
    <?php include('.././components/nav-bar.php'); ?>
    <section class="mt-container container-fluid">
    <h2 class="text-center">Catalogo Productos - Registro</h2><br>
        <section class="row">
            <section class="col col-4">
                <form >
                    <h3 class="text-center">Formulario de Registro</h3>
                    <label for="">Nombre Categoria: </label>
                    <input type="text" class="form-control">
                    <label for="">Descripcion: </label>
                    <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                    <label for="">Seleccione la Categoria: </label>
                    <select name="" id="" class="form-control">
                        <option value="">----Seleccione-----</option>
                        <option value="">Papeleria</option>
                        <option value="">Limpieza</option>
                    </select>
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar" style="margin-left: 35%">Agregar</button>
                </form>
            </section>
            <section class="col col-8">
                <label for="search">Buscar Producto:</label>
                <input type="text" id="search" onkeyup="searchTable()" placeholder="Search by ID, Nombre, Descripcion, Estante, or ID_Categoria" style="width: 50%; padding: 8px;">
                <br>
                <table class="table table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody id="contentTable">
                        <!-- Table content will be populated dynamically -->
                    </tbody>
                </table>
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
<script src=".././js/bootstrap.bundle.min.js"></script>
<script src=".././js/popper.min.js"></script>

</html>
<?php
}else{header('location: ../index.php');}
?>