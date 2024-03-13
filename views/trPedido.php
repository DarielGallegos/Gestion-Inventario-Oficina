<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peticiones</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">
    <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
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
    </style>
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
                    <label for="NomEmpleado" class="form-label">Empleado: Jorge Perez</label>
                    <br>
                    <label for="" class="form-label">Departamento: Administracion</label>
                    <br>
                    <label for="">Fecha de Registro</label>
                    <input type="date" class="form-control" id="dateEntrega" readonly>
                    <label for="">Seleccione el archivo de firma:</label>
                    <input type="file" class="form-control">
                    <label for="" class="form-label">Total de Productos: </label>

                </form>
                <section class="btn-group mt-4" id="botnones" style="display: flex; justify-content: center;">
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar" onclick="agregarBoton();">Agregar</button>
                    <button type="button" class="btn btn-outline-primary" id="btnEliminar">Eliminar </button>
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
<script src=".././js/bootstrap.bundle.min.js"></script>
<script src=".././js/trPedido.js"></script>

</html>