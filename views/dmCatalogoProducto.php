<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Productos</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <style>
        .nuevaTabla {
            background-color: #E1E1E1;
            padding: 20px;
            border-radius: 20px;
        }

        #btnEliminar {
            background-color: white;
            color: red;
            border-color: red;
        }

        #btnEliminar:hover {
            background-color: red;
            color: white;
        }

        form input[type="text"],
        form select {
            border: 1px solid #6D6D6D;
        }

        form input[type="text"]:focus,
        form select:focus {
            border-color: #6D6D6D;
            box-shadow: 0 0 5px #6D6D6D;
        }

        form label {
            font-weight: bold;
        }

        #tabla {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tabla td,
        #tabla th {
            border: 1px solid #CCC7C5;
            padding: 8px;
        }

        #tabla tr:nth-child(even) {
            background-color: #CCC7C5;
        }

        #tabla tr:hover {
            background-color: #CCC7C5;
        }

        #tabla th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #6D6D6D;
            color: white;
        }

        h1 {
            text-align: center;
        }

        input {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include ('.././components/nav-bar.php');
    $arreglo = [];
    ?>
    <section class="mt-container container-fluid">
        <h2 class="text-center">Catalogo Productos - Registro</h2><br>
        <section class="row">
            <section class="col col-4">
                <form>
                    <h3 class="text-center">Formulario de Registro</h3>
                    <label for="">Nombre Categoria: </label>
                    <input type="text" class="form-control" id="nombre">
                    <label for="">Descripcion: </label>
                    <textarea name="" class="form-control" id="descripcion" cols="30" rows="10"></textarea>
                    <label for="">Seleccione la Categoria: </label>
                    <select name="" id="categoria" class="form-control">
                        <option value="">----Seleccione-----</option>
                        <option value="">Papeleria</option>
                        <option value="">Limpieza</option>
                    </select>
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar" style="margin-left: 35%"
                        onclick="agregarBoton();">Agregar</button>
                </form>
            </section>
            <section class="col col-8">
                <label for="search">Buscar Producto:</label>
                <input type="text" id="search" onkeyup="searchTable()"
                    placeholder="Search by ID, Nombre, Descripcion, Estante, or ID_Categoria"
                    style="width: 50%; padding: 8px;">
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
<script src=".././js/dmCatalogoProducto.js"></script>

</html>