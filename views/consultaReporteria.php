<?php
session_start();
if ($_SESSION['Oficina']['id']) {
    include ($_SERVER['DOCUMENT_ROOT'] . '/Gestion-Inventario-Oficina/controllers/ctrlconsultaReporteria.php');
    $controller = new CtrlConsultaReporteria();
    $empleados = $controller->getEmpleados();
    $empleados = $empleados[2];
    $pedidos = $controller->getPedidosContados();
    $pedidos = $pedidos[2];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consultas y Reporterias</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
        <link rel="stylesheet" href=".././css/consultaReporteria.css">
        <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>

    <body>
        <?php include ('.././components/nav-bar.php'); ?>
        <div class="mt-container container-fluid">
            <div class="row">
                <div class="col-4">
                    <section id="div-card">
                        <div class="row row-cols-1 row-cols-md-2 g-5">
                            <div class="col">
                                <div id="toggle_table_grafico" onclick="funTablaPorDefecto('reportEmpleado')" class="card"
                                    style="width: 8rem; height: 13rem;">
                                    <img src="../img/icons/empleado.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <input type="hidden" id="empleado" value="<?= $_SESSION['Oficina']['nombre'] ?>">
                                        <h6 class="card-title">Reporte Empleados</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div onclick=" funTablaPorDefecto('reportInsumos')" class="card" style="width: 8rem; height: 13rem;">
                                    <img src="../img/icons/inventario.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title">Inventario Actual</h6>
                                    </div>
                                </div>
                            </div>
                            <!--Tabla de historial de pedidos-->
                            <div class="col">
                                <div onclick="funTablaPorDefecto('reportPedidoFecha')" class="card" style="width: 8rem; height: 13rem;">
                                    <img src="../img/icons/historial.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title">Historial Pedidos</h6>
                                    </div>
                                </div>
                            </div>
                            <!--fin Tabla de historial de pedidos-->

                            <!--Tabla de catalago productos-->
                            <div class="col">
                                <div onclick="funTablaPorDefecto('reportCatalogoInsumos')" class="card" style="width: 8rem; height: 13rem;">
                                    <img src="../img/icons/catalogo.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title">Catalago Insumos</h6>
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
                                    <?= $pedidos[0]['Estado'] ?>
                                </div>
                            </div>
                        </div>

                        <div class="col">

                            <div class="card" style="width: 8rem; height: 7rem; text-align: center;">
                                <div class="card-header">
                                    Pedidos Pendientes
                                </div>
                                <div class="card-body">
                                    <?= $pedidos[1]['Estado'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Contenedor de gráfico y tabla -->
                <section class="row row-cols-1 row-cols-md-1 g-5 col">
                    <div>
                        <div id="path_link_container" style="padding: 16px; text-center text-center"></div>
                        <tabla id="tabla_target" class="table table-striped table-hover table table-md"></tabla>
                    </div>


                    <div class="grafico-container">
                        <div id="contenedorGrafico">
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </section>
            </div>
            <script src=".././js/swal.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src=".././js/bootstrap.bundle.min.js"></script>
            <script src=".././js/consultaReporteria.js"></script>
    </body>

    </html>
    <?php
} else {
    header('location: ../index.php');
}
?>