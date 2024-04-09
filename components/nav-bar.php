<link rel="stylesheet" href=".././css/navbar.css">

<nav class="row navbar navbar-dark bg-green fixed-top" style= "">
    <section class="row container-fluid">
        <section class="col-2 align-self-start">
            <div class="row">
                <div class="col-4">
                    <img class="photo-radius" src=".././img/persona.png" alt="">
                </div>
                <div class="col-4">
                    <p class="text-white"><?= $_SESSION['Oficina']['usuario']?></p>
                </div>
                <div class="col-4">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="./logout.php">Salir</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
        <section class="col-8 align-self-center">
            <section class="row">
                <h1 class="text-center" style="color: white;"><img src="../img/logo.png" width="5%" style="border-radius: 4px"> Gestión Inventario Oficina </h1>
            </section> 
        </section>
        <section class="col-2 align-self-end">
            <section class="row">
                <div class="col-10 container-fluid">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-green" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header" id="menu-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel" >Menú</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <div class="container-fluid">
                                        <a class="navbar-brand" aria-current="page" href=".././views/main.php">
                                            <img src=".././img/icons/hogar.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                            Home
                                        </a>
                                    </div>
                                </li>
                                <!-- Creacion Menu Datos Maestros --->
                                <?php
                                    if($_SESSION['Oficina']['pdm'] > 0){
                                ?>
                                <li class="container-fluid nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src=".././img/icons/logistica.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                        Datos Maestros
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <?php if($_SESSION['Oficina']['pdm'] >= 1){?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/dmCatalogoProducto.php">
                                                    <img src=".././img/icons/catalogo-de-producto.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Catalogo Insumos
                                                </a>
                                            </div>
                                        </li>
                                        <?php } ?>
                                        <?php if($_SESSION['Oficina']['pdm'] >= 2){?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/dmCategoria.php">
                                                    <img src=".././img/icons/aplicacion.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Categoria
                                                </a>
                                            </div>
                                        </li>
                                        <?php } ?>
                                        <?php if($_SESSION['Oficina']['pdm'] >= 3){?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/dmDepartamento.php">
                                                    <img src=".././img/icons/personas.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Departamentos
                                                </a>
                                            </div>
                                        </li>
                                        <?php } ?>
                                        <?php if($_SESSION['Oficina']['pdm'] >= 4){?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/dmArmadoInsumo.php">
                                                    <img src=".././img/icons/armado-insumo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Armado de Insumos
                                                </a>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php
                                    }
                                ?>
                                <!-- Fin Creacion Menu Datos Maestros --->

                                <!-- Creacion Menu Transacciones --->
                                <?php
                                    if($_SESSION['Oficina']['ptr']>0){
                                ?>
                                <li class="container-fluid nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src=".././img/icons/transaccion.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                        Transacciones
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">

                                        <?php
                                            if($_SESSION['Oficina']['ptr'] >= 1){
                                        ?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/trPedido.php">
                                                    <img src=".././img/icons/cuestionario.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Peticiones
                                                </a>
                                            </div>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                            if($_SESSION['Oficina']['ptr'] >= 2){
                                        ?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/trBandejaPeticiones.php">
                                                    <img src=".././img/icons/bandeja-de-entrada.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Pedidos Realizados
                                                </a>
                                            </div>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            if($_SESSION['Oficina']['ptr'] >= 3){
                                        ?>
                                       <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/trRegEntradaProducto.php">
                                                    <img src=".././img/icons/caja.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Entrada de Insumos
                                                </a>
                                            </div>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            if($_SESSION['Oficina']['ptr'] == 4){
                                        ?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/trEntrega.php">
                                                    <img src=".././img/icons/caja-de-entrega.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Entregas
                                                </a>
                                            </div>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                                    }
                                ?>
                                <!-- Fin Menu Transacciones --->

                                <!-- Creacion Menu Consultas y Reporteria -->
                                <?php
                                    if($_SESSION['Oficina']['pcr']>0){
                                ?>
                                <li class="nav-item">
                                    <div class="container-fluid">
                                        <a class="navbar-brand" aria-current="page" href=".././views/consultaReporteria.php">
                                            <img src=".././img/icons/analitica.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                            Consultas y Reporteria
                                        </a>
                                    </div>
                                </li>
                                <?php } ?>
                                <!-- Fin Creacion Menu Consultas y Reporteria -->

                                <!-- Creacion Menu Seguridad -->
                                <?php if($_SESSION['Oficina']['pseg']>0){ ?>
                                <li class="container-fluid nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src=".././img/icons/proteger.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                        Seguridad
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <?php if($_SESSION['Oficina']['pseg']>=1){?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/sgRegEmpleados.php">
                                                    <img src=".././img/icons/curriculum.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Empleados
                                                </a>
                                            </div>
                                        </li>
                                        <?php } ?>
                                        <?php if($_SESSION['Oficina']['pseg']>=2){?>
                                        <li>
                                            <div class="container-fluid ml-4 dropdown-item">
                                                <a class="navbar-brand" href=".././views/sgRegUsuarios.php">
                                                    <img src=".././img/icons/datos-del-usuario.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                                                    Usuarios
                                                </a>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php } ?>
                                <!-- Fin Creacion Menu Seguridad -->
                            </ul>
                            </ul>
                            
                        </div>
                        <div id="fondo">
                            <img src="../img/UTH.jpg" >
                            </div>
                           
                    </div>
                </div>
            </section>
        </section>
    </section>
</nav>

