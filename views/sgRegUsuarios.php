<?php
session_start();
if($_SESSION['Oficina']['id']){
  
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">

    <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include('.././components/nav-bar.php'); ?>

    <section class="mt-container container-fluid">
        <h2 class="text-center">Formulario de usuarios</h2>

        <div class="container-fluid row gx-5 px-4">
            <!-- Inicio registro de empleados -->
            <section class="col col-6 col-md-4">
                <form>
                    <h2 class="text-center">Formulario de Usuarios</h2>
                   

                    <label for="inpuser" class="form-label">Ingrese un usuario: </label>
                    <input type="text" class="form-control" id="inpuser" name="inpuser">

                    <label for="inpPass" class="form-label">Ingrese la contraseña: </label>
                    <input type="password" class="form-control" id="inpPass" name="inpPass">

                    <section class="row">
                        <section class="col col-11">
                            <label for="inpPassC" class="form-label">Confirmar contraseña: </label>
                            <input type="password" class="form-control" id="inpPassC" name="inpPassC">
                        </section>
                        <section class="col col-1">
                            <button type="button" onclick="ver();" style="margin-top:31px; margin-left: -25px;" class="btn">👁‍🗨</button>
                        </section>
                    </section>
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
                            <th>Identidad</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Departamento</th>
                        </tr>
                    </thead>
                    <tbody id="contentTable">
                        
                           
                    </tbody>
                </table>
            </section>
            <!-- Fin de la tabla -->
        </div>
    </section>

    <script src=".././js/bootstrap.bundle.min.js"></script>

    <script>
        function ver() {

            var campoContra = document.getElementById("inpPass");
            var campoConfirm = document.getElementById("inpPassC");

            if (campoContra.type === "password") {
                campoContra.type = "text";
                campoConfirm.type = "text";
            } else {
                campoContra.type = "password";
                campoConfirm.type = "password";

            }


        }
    </script>
</body>

</html>
<?php
}else{header('location: ../index.php');}
?>