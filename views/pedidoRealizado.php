<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDOS REALIZADOS</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">

    <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<body>
    <?php include('.././components/nav-bar.php'); ?>

    <section class="mt-container container-fluid">
        <h2 class="text-center">PEDIDOS REALIZADOS</h2>
        <section class="container-fluid row gx-5 px-4">

            <!-- Inicio Estructura de Formulario Registro -->
         <section class=" col col-6 col-md-4">
                <p class="text-center paragraph">Formulario de Peticiones</p>
                <form>
                    <label for="listProducto" class="form-label">Seleccione el producto: </label>
                    <select name="listProducto" id="listProducto" class="form-control">
                        <option value="">------------- Seleccione ------------- ↓</option>
                        <option value="Rema de Papel">Rema de Papel</option>
                        <option value="Marcadores">Marcadores</option>
                        <option value="Caja Lapiz Carbon 12 uds.">Caja Lapiz Carbon 12 uds.</option>
                        <option value="Tinta para Impresora Canon">Tinta para Impresora Canon</option>
                        <option value="Grapadora">Grapadora</option>
                    </select><br>
                    <label for="inpCantidad" class="form-label">Ingrese la cantidad: </label>
                    <input type="text" class="form-control" id="inpCantidad" name="inpCantidad">
                    <br>
                    <label for="NomEmpleado" class="form-label">Ingrese su Nombre</label>
                    <input type="text" class="form-control" id="NomEmpleado" name="NomEmpleado">
                    <br>
                    <label for="IdEmpleado"class="form-label">Ingrese su ID</label>
                    <input type="text" class="form-control" id="IdEmpleado" name="IDdelempleado">

            
                </form>
                <section class="btn-group mt-4" id="botnones"style="display: flex; justify-content: center;" >
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar" >Mostrar</button>
                    <button type="button" class="btn btn-outline-primary" id="btnEliminar">Eliminar </button>
                </section>
            </section>
            <!-- Fin Estructura de Formulario Registro -->


            <!-- Inicio Estructura de Tabla -->
            <section class="col">
                <table class="table table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Nombre Del producto</th>
                            <th>Cantidad Del producto</th>
                            <th>Nombre Del empleado</th>
                            <th>ID del empleado</th>
                        </tr>
                    </thead>
                    <tbody id="contentTable">
                    </tbody>
                </table>
            </section>
            <!-- Fin Estructura de Tabla -->
        </section>
    </section>
    <section class=" col col-6 col-md-4" id="form2">
                 <br>
 <!--   <P class="text-center paragraph"> FormularioNC</p> -->
    <section class="nuevaTabla">
                <table class="table table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            </tr>
                    </thead>
                    <tbody id="contentTable">
                    <tr>
                    <td>Anubis</td>
                    <td>523</td>
                </tr>
                <tr>
                    <td>joan</td>
                    <td>523</td>
                </tr>
                <tr>
                    <td>Allambrito</td>
                    <td>230</td>
                </tr>
                <tr>
                    <td>edwyn</td>
                    <td>230</td>
                </tr>
                <tr>
                    <td>Allan</td>
                    <td>230</td>
                </tr>
                <tr>
                    <td>Akira</td>
                    <td>523</td>
                </tr>
                <tr>
                    <td>Allambrito</td>
                    <td>230</td>
                </tr>
                <tr>
                    <td>Allambrito</td>
                    <td>230</td>
                </tr>
                
                    </tbody>
                </table>
            </section>
           

            </section>

</body>
<script src=".././js/bootstrap.bundle.min.js">
       
      
</script>

</html>
