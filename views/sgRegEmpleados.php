<?php
session_start();
if($_SESSION['Oficina']['id']){
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">

    <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


</head>

<body>
    <?php include('.././components/nav-bar.php'); ?>

    <section class="mt-container container-fluid">
        <h2 class="text-center">Registro de Empleados</h2>

        <div class="container-fluid row gx-5 px-4">
            <!-- Inicio registro de empleados -->
            <section class="col col-6 col-md-4">
                <form>
                    <h2 class="text-center">Formulario de empleados</h2>
                    <label for="inpnombre" class="form-label">Ingrese su DNI: </label>
                    <input type="text" class="form-control" id="inpnombre" name="inpnombre">

                    <label for="inpnombre" class="form-label">Ingrese su Nombre: </label>
                    <input type="text" class="form-control" id="inpnombre" name="inpnombre">

                    <label for="inpapellidos" class="form-label">Ingrese su Apellido: </label>
                    <input type="text" class="form-control" id="inpapellidos" name="inpapellidos">



                    <label for="list-genero" class="form-label">Ingrese su Genero: </label>
                    <select name="listGenero" id="listGenero" class="form-control">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>

                    <br>
                    <label for="inpfechaN" class="form-label">Ingrese su fecha de nacimiento: </label>
                    <input type="date" class="form-control" id="inpfechaN" name="inpfechaN">
                    <br>
                    <label class="form-label"><strong>*Informacion de contacto</strong></label>
                    <br>
                    <label for="inptelefono" class="form-label">Ingrese su telefono: </label>
                    <input type="text" class="form-control" id="inptelefono" name="inptelefono">

                    <label for="inpcorreo" class="form-label">Ingrese su correo: </label>
                    <input type="text" class="form-control" id="inpcorreo" name="inpcorreo">
                </form>
                <br>
                <section class="btn-group mt-4" id="botnones" style="display: flex; justify-content: center;">
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar">Agregar</button>
                    <button type="button" class="btn btn-outline-primary" id="btnCancelar">Cancelar</button>
                </section>
            </section>
            <!-- Fin registro de empleados -->

            <!-- Inicio de la tabla -->
            <section class="col">
                <table class="table table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Genero</th>
                            <th>Edad</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody id="contentTable">
                        <!-- Contenido de la tabla se agregará aquí -->
                    </tbody>
                </table>
            </section>
            <!-- Fin de la tabla -->
        </div>
    </section>

    <script src=".././js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
}else{header('location: ../index.php');}
?>