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
                    <section class="row gx-5" style="align-items:center;">
                        <section class="col-6" style="width: 600px; height: 600x;">
                            <canvas id="chart"></canvas>
                        </section>
                        <section class="col-6" style="width: 800px; height: 800px;">
                            <canvas id="chartBar"></canvas>
                        </section>
                    </section>
                    <section class="row" style="align-items: center;">
                        <section class="col-12" style="width: 800px; height: 800px;">
                            <canvas id="chartPolar"></canvas>
                        </section>
                    </section>
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