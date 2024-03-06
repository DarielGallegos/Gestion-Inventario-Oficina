<nav class="row justify-content-between navbar navbar-dark bg-dark fixed-top">
        <div class="col-md-4  container-fluid">
            <div class="row justify-content-start">
                <div class="col-4">
                    <img class="photo-radius" src="./img/icons/casa.png" alt="">
                </div>
                <div class="col-6">
                    <p class="text-white">El Erick</p>
                </div>
                <div class="col-2">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="container-fluid nav-item dropdown">
                            <a class="nav-link dropdown-toggle rotate-text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
                                <li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 offset-md-4 ms-auto container-fluid">
            <a class="navbar-brand" href="#">Gestión Inventario Oficina</a>
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
                                <a class="navbar-brand" aria-current="page" href="./index.php">
                                    <img src=".././img/icons/casa.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                    Home
                                </a>
                            </div>
                        </li>
                        <li class="container-fluid nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src=".././img/icons/factura.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                Facturación
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <div class="container-fluid ml-4 dropdown-item">
                                        <a class="navbar-brand" href="#">
                                            <img src=".././img/icons/matricula.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                            Matricula
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="container-fluid ml-4 dropdown-item">
                                        <a class="navbar-brand" href="#">
                                            <img src=".././img/icons/mensualidad.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                            Mensualidad
                                        </a>

                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    </ul>
                </div>
            </div>
        </div>
</nav>