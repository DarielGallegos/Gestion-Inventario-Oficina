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
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
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

        /* #tablaE {
            font-family: arial, Helvetica, sans-serif;
            border-collapse: collapse;
            position: absolute;
            top: 120px;
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
        } */

        #div-card {
            width: 400px;
            background-color: rgba(128, 128, 128, 0.181);
            padding: 45px;
            margin: 15px 10px 25px 50px;
        }

        #div-pedidos {
            width: 400px;
            background-color: rgba(128, 128, 128, 0.181);
            padding: 30px;
            margin: 0 45px 45px 50px;

        }

        #tabla {
            display: none;
        }

        .grafico-container {
            margin-left: 150px;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        } 

    </style>


</head>

<body onload="dibujarGrafico();">

    <?php include ('.././components/nav-bar.php'); ?>

    <div class="mt-container container-fluid">
        <div class="row">
            <div class="col-4">
                <section id="div-card">
                    <div class="row row-cols-1 row-cols-md-2 g-5">
                        <div class="col">
                            <div id="toggle_table_grafico" onclick="mostrar();" class="card"
                                style="width: 8rem; height: 13rem; ">
                                <img src="../img/empleado.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">Reporte Empleados</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div onclick=" mostrar(event);" class="card" style="width: 8rem; height: 13rem;">
                                <img src="../img/inventario.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">Inventario Actual</h6>
                                </div>
                            </div>
                        </div>

                        <!--Tabla de historial de pedidos-->
                        <div class="col">
                            <div onclick=" mostrar();" class="card" style="width: 8rem; height: 13rem;">
                                <img src="../img/historial.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">Historial Pedidos</h6>
                                </div>
                            </div>
                        </div>
                        <!--fin Tabla de historial de pedidos-->

                        <!--Tabla de catalago productos-->
                        <div class="col">
                            <div onclick=" mostrar();" class="card" style="width: 8rem; height: 13rem;">
                                <img src="../img/catalogo.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">Catalago Productos</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div id="div-pedidos" class="row row-cols-1 row-cols-md-2 g-3">
                    <div class="col">
                        <div class="card" style="width: 8rem; height: 7rem; text-align: center;">
                            <div class="card-header">
                                Pedidos Aceptados
                            </div>
                            <div class="card-body">
                                <p>50</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">

                        <div class="card" style="width: 8rem; height: 7rem; text-align: center;">
                            <div class="card-header">
                                Pedidos Pendientes
                            </div>
                            <div class="card-body">
                                <p>10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Contenedor de gráfico y tabla -->
            <section class="row row-cols-1 row-cols-md-1 g-5 col">
                <div id="tabla">
                    <table class="table table-striped table-hover">
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
                            <tr>
                                <td>3443</td>
                                <td>Pablito</td>
                                <td>nose</td>
                                <td>no binario</td>
                                <td>87</td>
                                <td>000000001</td>
                                <td>algo</td>
                            </tr>
                            <tr>
                                <td>333434</td>
                                <td>Lupita</td>
                                <td>Lopex</td>
                                <td>hombre</td>
                                <td>35</td>
                                <td>11111111</td>
                                <td>tuprincesita@gmail.com</td>
                            </tr>
                            <tr>
                                <td>325545</td>
                                <td>Maria</td>
                                <td>Gomez</td>
                                <td>femenino</td>
                                <td>27</td>
                                <td>01001010010</td>
                                <td>jijijiji</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="grafico-container">
                    <div id="contenedorGrafico">
                        <div id="grafico">
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


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
            let toggle_table_grafico = false;
            function mostrar(e) {
                if (!toggle_table_grafico) {
                    document.getElementById('tabla').style.display = 'block';
                    document.getElementById('grafico').style.display = 'none';
                    toggle_table_grafico = true;
                    return;
                }

                document.getElementById('tabla').style.display = 'none';
                document.getElementById('grafico').style.display = 'block';
                toggle_table_grafico = false;

            }
        </script>

</body>


</html>