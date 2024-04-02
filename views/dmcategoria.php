<?php
session_start();
if($_SESSION['Oficina']['id']){
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Inventario Oficina</title>
    <link rel="stylesheet" href=".././css/bootstrap.min.css">
    <link rel="stylesheet" href=".././css/index.css">
    <link rel="stylesheet" href=".././css/globalStyle.css">
    <link rel="stylesheet" href=".././css/nerdfont.css">
</head>

<body>
    <?php
    include("../controllers/ctrlCategoria.php");
    $controller = new ctrlCategoria();
    $data = $controller->getAllCategorias();
    $data = $data[2];
    ?>
    <?php include("../components/nav-bar.php") ?>
    <section class="mt-container container-fluid">
        <h2 class="text-center">Registro de Categorias</h2><br><br>
        <section class="container-fluid row gx-5 px-4">

            <!-- Inicio Estructura de Formulario Registro -->
            <section class=" col col-6 col-md-4">
                <form id="form-categoria">
                    <input type="hidden" name="insert" value="insertCategoria">
                    <h3 class="text-center">Formulario de Registro</h3>
                    <label for="NoCategoria" class="form-label">Nombre de la Categoria</label>
                    <input type="text" class="form-control" id="NoCategoria" name="nombre" required>
                    <br>
                    <label for="DesCategoria" class="form-label">Descriocion de la Categoria</label>
                    <textarea name="descripcion" class="form-control" id="DeCategoria" cols="30" rows="10"></textarea>
                    <br>
                    <button type="submit" class="btn btn-outline-primary" id="btnAgregar" style="margin-left: 35%">Agregar</button>
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
                        <?php
                        for ($i = 0; $i < count($data); $i++) {
                        ?>
                            <tr>
                                <td><?= $data[$i]['ID'] ?></td>
                                <td><?= $data[$i]['nombre'] ?></td>
                                <td><?= $data[$i]['descripcion'] ?></td>
                                <td>
                                    <button class="btn btn-warning" onclick="editCategoria(<?= $data[$i]['ID'] ?>)">
                                        <i class="nf nf-md-pencil_outline"></i>
                                    </button>
                                    <button class="btn btn-danger" onclick="deleteCategoria(<?= $data[$i]['ID'] ?>)">
                                        <i class="nf nf-fa-trash_o"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </section>
            <!-- Fin Estructura de Tabla -->
        </section>
    </section>
</body>
<script src=".././js/jquery-3.7.1.min.js"></script>
<script src=".././js/categoria.js"></script>
<script src=".././js/bootstrap.bundle.min.js"></script>
<script src=".././js/swal.min.js"></script>
<script src=".././js/popper.min.js"></script>
</html>
<?php
}else{header('location: ../index.php');}
?>