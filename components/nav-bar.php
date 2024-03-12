<nav class="row navbar navbar-dark bg-dark fixed-top">
    <section class="row container-fluid">
        <section class="col-2 align-self-start">
            <div class="row">
                <div class="col-4">
                    <img class="photo-radius" src=".././img/persona.png" alt="">
                </div>
                <div class="col-4">
                    <p class="text-white">El Erick</p>
                </div>
                <div class="col-4">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Salir</a></li>
                        </ul>
                    </div>
                
                </div>
            </div>
        </section>
        <section class="col-8 align-self-center">
            <section class="row">
                <h1 class="text-center" style="color: white;">Gestión Inventario Oficina</h1>
            </section>
        </section>
        <section class="col-2 align-self-end">
            <section class="row">
                <div class="col-10 container-fluid">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menú</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <div class="container-fluid">
                                        <a class="navbar-brand" aria-current="page" href=".././views/main.php">
                                            <img src=".././img/icons/casa.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                            Home
                                        </a>
                                    </div>
                                </li>
                                <li class="container-fluid nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src=".././img/icons/factura.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                        Transacciones
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/regProdEntrada.php">
                                                    <img src=".././img/icons/matricula.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Registro Productos
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/pedido.php">
                                                    <img src=".././img/icons/matricula.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Peticiones
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/regProdEntrada.php">
                                                    <img src=".././img/icons/matricula.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Entregas
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href="pedidoRealizado.php">
                                                    <img src=".././img/icons/mensualidad.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Pedidos Realizados
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
</nav>