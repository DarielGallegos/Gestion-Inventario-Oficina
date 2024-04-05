<?php
session_start();
if ($_SESSION['Oficina']['id']) {
?>
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
            <h2 class="text-center">BANDEJA PETICIONES</h2>
            <div class="card_container">
                <div class="input-group mb-3">
                    <input  type="text" class="form-control" placeholder="🔍 Buscar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>

                <h5>Peticiones Pendientes: <span id="cant_pedidos"></span></h5>
                <div id="cards_container" class="tbl_wrapper">

                </div>
                <div id='div_msg_vacio' class='position-relative oculto'>
                    <img class='position-relative start-50 translate-middle-x' src='../img/vacio.jpg' />
                    <p class='text-center'>No hay elementos.</p>
                </div>
            </div>


            <div id="ventana_forma_id" class="ven_modal shadow-lg p-3 mb-5 bg-body-tertiary rounded oculto">
                <div class="mb-3">
                    <label for="listado" class="form-label">Detalles del Pedido</label>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Insumos</th>
                            <th scope="col">Insumos</th>
                            <!-- <th scope="col">Categoria</th> -->
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_pedidos_detalle" class="table-group-divider">

                    </tbody>
                </table>

                <div class="float-end">
                    <input id="in_det_ped_id" class="oculto" type="text">
                    <button class="btn btn-secondary" onclick="cerrarVentanaPeticion(event)">Cancelar</button>
                    <button class="btn btn-danger" onclick="funActualizarPedido(2)">Rechazar</button>
                    <button class="btn btn-primary" onclick="funActualizarPedido(1)">Aceptar</button>
                </div>
            </div>
        </section>
    </body>
    <script src=".././js/bootstrap.bundle.min.js"></script>
    <script src=".././js/jquery-3.7.1.min.js"></script>
    <script src=".././js/swal.min.js"></script>
    <script src=".././js/trBandejaPeticiones.js"></script>
    </html>
<?php
} else {
    header('location: ../index.php');
}
?>