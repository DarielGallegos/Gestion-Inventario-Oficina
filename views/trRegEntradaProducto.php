<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Inventario Oficina</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">

    <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">

</head>

<body>
    <?php include('.././components/nav-bar.php'); ?>

    <section class="mt-container container-fluid">
        <h2 class="text-center">Registro de Productos</h2>
        <section class="container-fluid row gx-5 px-4">

            <!-- Inicio Estructura de Formulario Registro -->
            <section class=" col col-6 col-md-4">
                <p class="text-center paragraph">Formulario de Registro</p>
                <form>
                    <label for="listProducto" class="form-label">Seleccione el producto: </label>
                    <select name="listProducto" id="listProducto" class="form-control">
                        <option value="">---------- Seleccione ----------</option>
                        <option value="1">Rema de Papel</option>
                        <option value="2">Marcadores</option>
                        <option value="3">Caja Lapiz Carbon 12 uds.</option>
                        <option value="4">Tinta para Impresora Canon</option>
                        <option value="5">Grapadora</option>
                    </select><br>
                    <label for="inpCantidad" class="form-label">Ingrese la cantidad: </label>
                    <input type="text" class="form-control" id="inpCantidad" name="inpCantidad">
                    <br>
                </form>
                <section class="btn-group mt-4">
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar">Agregar</button>
                </section>
            </section>
            <!-- Fin Estructura de Formulario Registro -->


            <!-- Inicio Estructura de Tabla -->
            <section class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID PRODUCTO</th>
                            <th>Nombre Producto</th>
                            <th>Cantidad</th>
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

</html>