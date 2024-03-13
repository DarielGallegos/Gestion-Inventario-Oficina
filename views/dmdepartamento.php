<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Inventario Oficina</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">

    
</head>

<body>
    <?php include('.././components/nav-bar.php'); ?>

    <section class="mt-container container-fluid"><br><br>
        <h2 class="text-center">Registro de Departamentos</h2><br><br>
        <section class="container-fluid row gx-5 px-4">

            <!-- Inicio Estructura de Formulario Registro -->
            <section class=" col col-6 col-md-4">
                <p class="text-center paragraph">Formulario de Registro</p>
                <form>
                    <label for="idDepartamento" class="form-label" >ID Departamento: </label>
                    <input type="text" class="form-control" id="idDepartamento" name="idDepartamento" readonly>
                    <br>
                    <label for="NoDepartamento" class="form-label">Nombre del Departamento</label>
                    <input type="text" class="form-control" id="NoDepartamento" name="NoDepartamento"  required>
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