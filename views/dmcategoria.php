<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Inventario Oficina</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">


</head>

<body>
    <?php include("../components/nav-bar.php") ?>
    <section class="mt-container container-fluid">
        <h2 class="text-center">Registro de Categorias</h2><br><br>
        <section class="container-fluid row gx-5 px-4">

            <!-- Inicio Estructura de Formulario Registro -->
            <section class=" col col-6 col-md-4">
                <form>
                    <h3 class="text-center">Formulario de Registro</h3>
                    <label for="NoCategoria" class="form-label">Nombre de la Categoria</label>
                    <input type="text" class="form-control" id="NoCategoria" name="NoCategoria" required>
                    <br>
                    <label for="DesCategoria" class="form-label">Descriocion de la Categoria</label>
                    <input type="text" class="form-control" id="DesCategoria" name="DesCategoria" required>
                    <br>
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar" style="margin-left: 35%">Agregar</button>
                </form>
            </section>
            <!-- Fin Estructura de Formulario Registro -->


            <!-- Inicio Estructura de Tabla -->
            <section class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>

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
<script src=".././js/popper.min.js"></script>

</html>