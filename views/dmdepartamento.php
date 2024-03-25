<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Inventario Oficina</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include ("../components/nav-bar.php");
    $arreglo = [];
    ?>
    <section class="mt-container container-fluid">
        <h2 class="text-center">Registro de Departamentos</h2><br><br>
        <section class="container-fluid row gx-5 px-4">

            <!-- Inicio Estructura de Formulario Registro -->
            <section class=" col col-6 col-md-4">
                <form>
                    <h3 class="text-center">Formulario de Registro</h3>
                    <label for="NoDepartamento" class="form-label">Nombre del Departamento</label>
                    <input type="text" class="form-control" id="NoDepartamento" name="NoDepartamento" required>
                    <br>
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar"
                        style="margin-left: 35%" onclick="agregarBoton();" >Agregar</button>
                </form>
            </section>
            <!-- Fin Estructura de Formulario Registro -->
            <!-- Inicio Estructura de Tabla -->
            <section class="col">
                <table class="table table-hover"  id="tabla">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody id="contentTable">
                    </tbody>
                </table>

                <?php
                if (count($arreglo) == 0) {
                    echo "<div id='div_msg_vacio' class='position-relative'>
                        
                            <img class='position-relative start-50 translate-middle-x' src='../img/vacio.jpg' />
                            <p class='text-center'>No hay elementos.</p>
                            </div>";
                }
                ?>

            </section>
            <!-- Fin Estructura de Tabla -->
        </section>

        <script src=".././js/dmdepartamento.js"></script>

</body>
<script src=".././js/bootstrap.bundle.min.js"></script>
<script src=".././js/popper.min.js"></script>