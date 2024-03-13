<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Productos</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">
  


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

        form {
            color: #6D6D6D;
            background-color: #F0F0F0;
            padding: 20px;
            border-radius: 5px;
        }

        form input[type="text"], form select {
            border: 1px solid #6D6D6D;
        }

        form input[type="text"]:focus, form select:focus {
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

        #tabla td, #tabla th {
            border: 1px solid #CCC7C5;
            padding: 8px;
        }

        #tabla tr:nth-child(even){background-color: #CCC7C5;}

        #tabla tr:hover {background-color: #CCC7C5;}

        #tabla th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color:#6D6D6D;
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
<?php include('.././components/nav-bar.php'); ?>
<h1>Catalogo Productos - Registro</h1>
<section class="mt-container container-fluid">

        <label for="search">Buscar Producto:</label>
        <input type="text" id="search"  onkeyup="searchTable()" placeholder="Search by ID, Nombre, Descripcion, Estante, or ID_Categoria" style="width: 50%; padding: 8px;">
<br><br>
        <table class="table table-hover" id="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Estante</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody id="contentTable">
                <!-- Table content will be populated dynamically -->
            </tbody>
        </table>
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
</html>
