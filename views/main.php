<?php
session_start();
if(isset($_SESSION['Oficina']['id'])){
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
</body>
<script src=".././js/bootstrap.bundle.min.js"></script>
<script src=".././js/popper.min.js"></script>

</html>
<?php
}else{header('location: ../index.php');}
?>