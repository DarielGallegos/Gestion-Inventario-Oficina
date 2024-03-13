<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas y Reporterias</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">

    <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        .contenedor-cuadrado {
            width: 200px;
            height: 100px;
            background-color: #EFF2F5;
            position: absolute;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .posicion-1 {
            top: 25%;
            left: 60px;
        }

        .posicion-2 {
            top: 25%;
            left: 300px;
        }

        .posicion-3 {
            top: 40%;
            left: 60px;
        }

        .posicion-4 {
            top: 40%;
            left: 300px;
        }

        .botonver {

            background-color: white;
            color: #6D6D6D;
            border-color: #83BDF4;
            padding: 10px 20px;
            cursor: pointer;
            text-align: justify;

        }

        .botonver:hover {
            background-color: #83BDF4;
        }

        .posicionAceptados {
            width: 145px;
            height: 80px;
            border: 1px solid #83BDF4;
            position: absolute;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .posicionaceptados {
            top: 60%;
            left: 90px;
        }

        .textoaceptado {

            position: absolute;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .posicionaceptados1 {
            top: 70%;
            left: 90px;
        }

        .posicionaceptados2 {
            top: 60%;
            left: 320px;
        }

        .posicionaceptados3 {
            top: 70%;
            left: 320px;
        }

        #grafico {
            margin-top: -3%;
            margin-left: 850px;
        }

        #tablaE {
            font-family: arial, Helvetica, sans-serif;
            border-collapse: collapse;
            position: absolute;
            top: 15%;
            width: 100%;
            display: none;
            left: 700px;
        }

        #tabla {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 45%;
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

    </style>

</head>

<body onload="dibujarGrafico();">

    <?php include('.././components/nav-bar.php'); ?>

    <section class="mt-container container-fluid">

        <section class="col col-6 col-md-4">
            <p class="text-center paragraph">Consutas Y Reporterias</p>

            <div class="contenedor-cuadrado posicion-1">

                <button class="btn btn-outline-primary" id="botonEmpleado" class="botonver" onclick=" mostrar();">Reporte Empleados</button>
            </div>

            <div id="tablaE">

                <table class="table table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Genero</th>
                            <th>Edad</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody id="contentTable">

                    </tbody>
                </table>

            </div>

            <div class="contenedor-cuadrado posicion-2">

                <button class="btn btn-outline-primary" id="botonInventario" class="botonver">Inventario Actual</button>

            </div>

            <div class="contenedor-cuadrado posicion-3">
                <button class="btn btn-outline-primary" id="botonPedidos" class="botonver">Historial Pedidos</button>
            </div>

            <!--Tabla de historial de pedidos-->



            <!--fin Tabla de historial de pedidos-->


            <div class="contenedor-cuadrado posicion-4">
                <button class="btn btn-outline-primary" id="BotonCatalago" class="botonver">Catalago Productos</button>
            </div>

            <!--Tabla de catalago productos-->

            <!--fin Tabla de catalago productos-->

            <div class="posicionAceptados posicionaceptados">

                <label for="inPaceptados">50</label>
            </div>

            <div class="textoaceptado posicionaceptados1">

                <label for="inPaceptados">Pedidos Aceptados</label>
            </div>

            <div class="posicionAceptados posicionaceptados2">

                <label for="inPaceptados">10</label>
            </div>

            <div class="textoaceptado posicionaceptados3">

                <label for="inPaceptados">Pedidos Pendientes</label>
            </div>

        </section>

    </section>

    <section class="grafico-container">

        <div id="contenedorGrafico">

            <div id="grafico">
                <div>

                </div>
    </section>


</body>
<script src=".././js/bootstrap.bundle.min.js"></script>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(dibujarGrafico);

    function dibujarGrafico() {

        var data = google.visualization.arrayToDataTable([
            ['Inventario', 'Productos'],
            ['resma papel', 11],
            ['Marcadores', 2],
            ['Grapadora', 5]

        ]);

        var options = {
            title: 'Stock de Productos',
            pieHole: 0.4,
            width: 650,
            height: 500
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        chart.draw(data, options);
    }
</script>


<script>
    function mostrar() {

        document.getElementById('tablaE').style.display = 'block';
        document.getElementById('grafico').style.display = 'none';

    }
</script>

</html>