<?php
session_start();
if (!isset($_SESSION['Oficina']['id'])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión Inventario Oficina</title>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/globalStyle.css">
        <link rel="stylesheet" href="./css/nerdfont.css">
        <link rel="shortcut icon" href="./img/UTH-Black-favicon.png" type="image/x-icon">
    </head>

    <body >
        <section class="container-fluid margin-top" >
            <section class="row">
                <section class="col">
                </section>
                <section class="col">
                    <section class="card dimension-card" id="login">
                        <section class="row">
                            <section class="col-4">
                                <section class="lock-container">
                                    <i class="nf nf-fa-lock"></i>
                                    <img src="./img/UTH2.png" width="100%" >
                                </section>
                            </section>
                            <section class="card-body col-8 background-login">
                                <h1 class="text-center">Login</h1>
                                <form id="form-login" class="form-login">
                                    <div class="form-floating mb-3">
                                        <input name="alias" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                        <label for="floatingInput">Usuario: </label>
                                    </div>
                                    <div class="form-floating">
                                        <input name="passwd" type="password" class="form-control" id="password" placeholder="Password" required>
                                        <label for="floatingPassword">Contraseña:</label>
                                    </div>
                                    <input type="hidden" name="access" value="getAccess">
                                    <section class="text-center mt-4">
                                        <button type="submit" class="button-login">Ingresar</button>
                                    </section>
                                </form>
                            </section>
                        </section>
                    </section>
                </section>
                <section class="col"></section>
            </section>
        </section>
        <img src="./img/login.jpg" id="imagen">
    </body>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/swal.min.js"></script>
    <script src="./js/login.js"></script>

    </html>
<?php
} else {
    header('location: ./views/main.php');
}
?>