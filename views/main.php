<?php
session_start();
if (isset($_SESSION['Oficina']['id'])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion Inventario Oficina</title>
        <link rel="stylesheet" href=".././css/bootstrap.min.css">
        <link rel="stylesheet" href=".././css/globalStyle.css">
        <link rel="stylesheet" href=".././css/index.css">
        <link rel="stylesheet" href=".././css/dashboard.css">
        <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">

    </head>

    <body>
        <?php include('.././components/nav-bar.php'); ?>
        <section class="mt-container container-fluid">
            <section class="container-fluid row gx-5 px-4">
                <section class="row">
                    <section class="col-12">
                        <h2 class="text-center">DASHBOARD</h2>
                    </section>
                </section>

                <section class="container row">
                    <div class="dashboard">
                        <div class="grafico" id="grafico1">
                            <section class="col-6" style="width: 400px; height: 400x;" id="InsumoConMSalidas">
                                <canvas id="chart"></canvas>
                            </section>
                        </div>

                        <div class="grafico" id="grafico2">
                            <section class="col-6" style="width: 500px; height: 400px;" id="InsumoMasSolicitado">
                                <canvas id="chartBar"></canvas>
                            </section>
                        </div>
                        <div class="grafico" id="grafico3">
                            <section class="col-12" style="width: 400px; height: 400px;" id="TotaldePedidosPorDepa">
                                <canvas id="chartPolar"></canvas>
                            </section>
                        </div>
                </section>
            </section>
        </section>
    </body>
    <script src=".././js/bootstrap.bundle.min.js"></script>
    <script src=".././js/popper.min.js"></script>
    <script src=".././js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src=".././js/main.js"></script>

    </html>
<?php
} else {
    header('location: ../index.php');
}
?>