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
    <script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <style>
          #btnCancelar {
        background-color: white;
        color: red;
        border-color: red;
    }

    #btnCancelar:hover {
        background-color: darkred;
    }


    #tabla {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tabla td, #tabla th {
            border: 1px solid #CCC7C5;
            padding: 8px;
        }
        #tabla tr:nth-child(even){background-color: #CCC7C5;}

    #tabla tr:hover {background-color: #CCC7C5;}

    #tabla th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color:#6D6D6D;
            color: white;
        }

    </style>

</head>

<body>
<?php include('.././components/nav-bar.php'); ?>

    <section class="mt-container container-fluid">
        <h2 class="text-center">Formulario de usuarios</h2>

        <div class="container-fluid row gx-5 px-4">
            <!-- Inicio registro de empleados -->
            <section class="col col-6 col-md-4">
                <p  class="text-center paragraph">Formulario de usuarios</p>
                <form>
                   <label for="inpID" class="form-label">ID</label>
                    <input type="text" class="form-control" id="inpID" name="inpID">

                    <label for="inpuser" class="form-label">Ingrese un usuario: </label>
                    <input type="text" class="form-control" id="inpuser" name="inpuser">

                    <label for="inpPass" class="form-label">Ingrese la contraseña: </label>
                    <input type="password" class="form-control" id="inpPass" name="inpPass">

                    <label for="inpPassC" class="form-label">Confirmar contraseña: </label>
                    <input type="password" class="form-control" id="inpPassC" name="inpPassC">

                </form>
                <button onclick="ver();" class="btn btn-outline-primary">Ver contraseña</button>
                <br>
                <section class="btn-group mt-4" id="botnones" style="display: flex; justify-content: center;">
                    <button  type="button" class="btn btn-outline-primary" id="btnAgregar">Agregar</button>
                    <button  type="button" class="btn btn-outline-primary" id="btnCancelar">Cancelar</button>
                </section>
            </section>
            <!-- Fin registro de empleados -->

            <!-- Inicio de la tabla -->
            <section class="col">
                <table class="table table-hover" id="tabla">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Departamento</th>
                            
                          
                         
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

    <script>

        function ver(){

            var campoContra = document.getElementById("inpPass");
            var campoConfirm = document.getElementById("inpPassC");

            if(campoContra.type === "password"){
                campoContra.type = "text";
                campoConfirm.type = "text";
            }else{
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