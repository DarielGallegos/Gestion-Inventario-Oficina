<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandeja de Peticiones</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
</head>

<body>
    <?php include('.././components/nav-bar.php'); ?>

    <section class="mt-container container-fluid">

        <div class="card_container">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                <button class="btn btn-outline-secondary"><i class="fa fa-filter" aria-hidden="true"></i></button>

            </div>

            <h5>Peticiones Pendientes: 2</h5>
            <div class="tbl_wrapper">
                <div class="card text-bg-success mb-3" style="max-width: 38rem;">
                    <div class="card-header"><span class="float-start">Petición # 1</span><button class="float-end" onclick="ventanaFormaPeticion(event)"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="card-body">
                        <h6 class="card-text">Departamento: </h6>
                        <h6 class="card-text">Fecha:</h6>
                        <h6 class="card-text">Productos Totales:</h6>
                        <h6 class="card-text">Empleado ID: </h6>
                    </div>
                </div>

                <div class="card text-bg-primary mb-3" style="max-width: 38rem;">
                    <div class="card-header"><span class="float-start">Petición # 2</span><button class="float-end" onclick="ventanaFormaPeticion(event)"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="card-body">
                        <h6 class="card-text">Departamento: </h6>
                        <h6 class="card-text">Fecha: </h6>
                        <h6 class="card-text">Productos Totales:</h6>
                        <h6 class="card-text">Empleado ID: </h6>
                    </div>
                </div>
            </div>
        </div>


        <div id="ventana_forma_id" class="ven_modal shadow-lg p-3 mb-5 bg-body-tertiary rounded oculto">
            <div class="mb-3">
                <label for="listado" class="form-label">Detalles del Pedido</label>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Producto</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td>Rema de Papel</td>
                        <td>Papelería</td>
                        <td>4</td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Marcadores</td>
                        <td>Lapicería</td>
                        <td>6</td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>Grapadora</td>
                        <td>Oficina</td>
                        <td>1</td>
                    </tr>

                </tbody>
            </table>
            <form class="float-end">
                <input class="oculto" type="text" value="2">
                <button class="btn btn-secondary" onclick="cerrarVentanaPeticion(event)">Cancelar</button>
                <button class="btn btn-danger">Rechazar</button>
                <button class="btn btn-primary">Aceptar</button>
            </form>
        </div>
    </section>
</body>
<script src=".././js/bootstrap.bundle.min.js"></script>
<script src=".././js/trBandejaPeticiones.js"></script>
</html>