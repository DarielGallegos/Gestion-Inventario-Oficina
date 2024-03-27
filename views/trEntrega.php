<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrega de Insumos</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">
    <link rel="stylesheet" href=".././css/nerdfont.css">
    <link rel="shortcut icon" href=".././img/UTH-Black-favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('.././components/nav-bar.php'); ?>
    <?php
    include(".././controllers/ctrlEntrega.php");
    $controller = new ctrlEntrega();
    $data = $controller->getAllInsumos();
    $data = $data[2];
    $departamentos = $controller->getDepartamentos();
    $departamentos = $departamentos[2];
    $pedido = $controller->getPedidos(1);
    $pedido = $pedido[2];
    ?>
    <section class="mt-container container-fluid">
        <h2 class="text-center">Formulario de Entrega</h2>
        <section class="container-fluid row gx-5 px-4">

            <!-- Inicio Estructura de Formulario Registro -->
            <section class=" col col-6 col-md-4">
                <form>
                    <h2 class="text-center">Formulario de Entrega</h2>
                    <label for="NomEmpleado" class="form-label">Empleado Envia: Jorge Perez</label>
                    <label for="" class="form-label">Seleccione el Departamento Destino: </label>
                    <select name="" id="cboDepartamento" class="form-control">
                        <option value="0">------------- Seleccione ------------- ↓</option>
                        <?php
                            for ($i = 0; $i < count($departamentos); $i++) {
                        ?>
                            <option value="<?= $departamentos[$i]['ID'] ?>"><?= $departamentos[$i]['Nombre'] ?></option>
                        <?php }  ?>
                    </select>
                    <label for="">Fecha de Registro</label>
                    <input type="date" class="form-control" id="dateEntrega" readonly>
                    <label for="">Seleccione el ID Pedido</label>
                    <select name="" id="cboPedido" class="form-control">
                        <option value="0">------------- Seleccione ------------- ↓</option>
                        <?php
                            for ($i = 0; $i < count($pedido); $i++) {
                        ?>
                            <option value="<?= $pedido[$i]['ID'] . '-' . $pedido[$i]['ID_DEPARTAMENTO'] ?>"><?= "N.Pedido " . $pedido[$i]['ID'] . " - " . $pedido[$i]['Empleado'] ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label for="">Seleccione el archivo de firma:</label>
                    <input type="file" class="form-control" id="fileFirma">
                    <br>
                </form>
                <section class="btn-group mt-4" id="botnones" style="display: flex; justify-content: center;">
                    <button type="button" class="btn btn-outline-primary" id="btnAgregar">Mostrar</button>
                    <button type="button" class="btn btn-outline-primary" id="btnEnviar">Enviar</button>
                    <button type="button" class="btn btn-outline-primary" id="btnFlush">Flush</button>
                </section>
            </section>
            <!-- Fin Estructura de Formulario Registro -->


            <!-- Inicio Estructura de Tabla -->
            <section class="col">
                <table class="table table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>Insumo</th>
                            <th>Cantidad Insumo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="contentTableDetalle">
                    </tbody>
                </table>
            </section>
            <!-- Fin Estructura de Tabla -->
        </section>
    </section>
</body>
<script src=".././js/jquery-3.7.1.min.js"></script>
<script src=".././js/bootstrap.bundle.min.js"></script>
<script src=".././js/swal.min.js"></script>
<script src=".././js/popper.min.js"></script>
<script src=".././js/trEntrega.js"></script>
<script>
    document.getElementById("btnAgregar").addEventListener("click", () => {
        var row = document.createElement('tr');
        row.innerHTML = `
    <td>        
        <select class="form-control" name="" id="cboInsumo">
            <option value="">Seleccione</option>
        <?php 
        if(count($data) > 0){
            for ($i = 0; $i < count($data); $i++) { ?>
            <option value=<?= $data[$i]['Serial Insumo'] ?> ><?= $data[$i]['Serial Insumo'] . "  " . $data[$i]['Insumo'] ?></option>
        <?php } 
        }
        ?>
        </select>
    </td>
    <td>
        <input type="number" class="form-control" name="" id="stock">
    </td>
    <td>
        <button class="btn btn-danger" onclick="deleteInsumo(this)">
            <i class="nf nf-fa-trash_o"></i>
        </button>
    </td>`;
        document.getElementById("contentTableDetalle").prepend(row);
        row.querySelector("#cboInsumo").addEventListener("change", () => {
            if (row.querySelector("#cboInsumo").value != "") {
                var id = parseInt(row.querySelector("#cboInsumo").value);
                $.post(".././controllers/ctrlEntrega.php", {
                    request: "getOneInsumo",
                    id: id
                }).done((response) => {
                    row.querySelector('#stock').setAttribute('max', response.data[0]['Stock']);
                    row.querySelector('#stock').value = parseInt(response.data[0]['Stock']);
                });
            } else {
                row.querySelector('#stock').value = 0;
            }
        });
    });
    document.getElementById("cboPedido").addEventListener("change", () => {
        var id = document.getElementById("cboPedido").value;
        flushData();
        if (id != "0") {
            id = id.split('-');
            document.getElementById("cboDepartamento").value = id[1];
            $.post(".././controllers/ctrlEntrega.php", {
                request: 'detallePedido',
                id: id[1]
            }).done((response) => {
                for(x = 0; x<response.data.length; x++){
                var row = document.createElement('tr');
                row.innerHTML = `
                <td>        
                    <select class="form-control" name="" id="cboInsumo">
                        <option value="`+ response.data[x]['ID_INSUMO'] +`">`+response.data[x]['ID_INSUMO'] + " " + response.data[x]['nombre'] +`</option>
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="" id="stock" value="`+response.data[x]['cantidad']+`">
                </td>
                <td>
                    <button class="btn btn-danger" onclick="deleteInsumo(this)">
                        <i class="nf nf-fa-trash_o"></i>
                    </button>
                </td>`;
                document.getElementById("contentTableDetalle").append(row);
                }
            });
        } else {
            document.getElementById("cboDepartamento").value = "0";
        }
    });
</script>

</html>