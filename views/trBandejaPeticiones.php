<?php
session_start();
if($_SESSION['Oficina']['id']){
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

        <div class="card_container">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                <button class="btn btn-outline-secondary"><i class="fa fa-filter" aria-hidden="true"></i></button>

            </div>

            <h5>Peticiones Pendientes: 2</h5>
            <div id="cards_container" class="tbl_wrapper">
                
            </div>
        </div>


        <div id="ventana_forma_id" class="ven_modal shadow-lg p-3 mb-5 bg-body-tertiary rounded oculto">
            <div class="mb-3">
                <label for="listado" class="form-label">Detalles del Pedido</label>
            </div>
            
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
<?php
}else{header('location: ../index.php');}
?>