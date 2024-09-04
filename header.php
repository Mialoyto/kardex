<?=
    session_start();

if (!isset($_SESSION['login']) || (isset($_SESSION['login']) && !$_SESSION['login']['permitido'])) {
    header('Location:index.php');
}


$host = "http://localhost/kardex";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>KARDEX</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= $host ?>/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<<<<<<< HEAD
    <!-- iconos de google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


=======
    <!-- material icons- google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

>>>>>>> 358a4ee44198eacccf7abc8bd9756f316303c06e
</head>

<body class="sb-nav-fixed">



    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">KARDEX - Area de developer</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- Navbar-->
<<<<<<< HEAD
        <ul class="navbar-nav ms-auto ms-md-0 me-0  me-lg-5">
            <div class="navbar-brand">

                <p>
                    <b>|</b>
                    <i class="material-icons">developer_mode</i>
                    Area developer
                    <b>|</b>
=======
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <div class="nav-link">
                <p>
                    <b>|</b>
                    <i class="material-icons">star</i>
                    Area principal
                    <b>|</b>

>>>>>>> 358a4ee44198eacccf7abc8bd9756f316303c06e
                </p>
            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <?= $_SESSION['login']['nombres'] ?>
                    <?= $_SESSION['login']['apepaterno'] ?>
                    <?= $_SESSION['login']['apematerno'] ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Configuracion</a></li>
                    <li><a class="dropdown-item" href="#!">Cambiar Contraseña</a></li>
                    <li><a class="dropdown-item" href="#!">Historial</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item"
                            href="<?= $host ?>/controllers/colaborador.controller.php?operation=destroy">Cerrar
                            Sesión</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">INICIO</div>
                        <a class="nav-link" href="<?= $host; ?>/dashboard.php">
                            <div class="sb-nav-link-icon">
                                <i class="material-icons">home</i>
                            </div>
                            Dashboard
                        </a>


                        <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-columns"></i>
                            </div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div> -->

                        <div class="sb-sidenav-menu-heading">Módulos</div>

                        <a class="nav-link" href="<?= $host; ?>/view/usuarios">
                            <div class="sb-nav-link-icon">
                                <!-- <i class="fas fa-chart-area"></i> -->
<<<<<<< HEAD
                                <i class="material-icons">person_add</i>


=======
                                <i>
                                    <link rel="stylesheet"
                                        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                                </i>
>>>>>>> 358a4ee44198eacccf7abc8bd9756f316303c06e
                            </div>
                            Usuarios
                        </a>

                        <a class="nav-link" href="<?= $host; ?>/view/kardex">
                            <div class="sb-nav-link-icon">
                                <i class="material-icons">assignment_add</i>
                            </div>
                            Kardex
                        </a>

                        <a class="nav-link" href="<?= $host; ?>/view/reportes">
                            <div class="sb-nav-link-icon">
                                <i class="material-icons">picture_as_pdf</i>
                            </div>
                            Reportes
                        </a>



                        <a class="nav-link" href="<?= $host; ?>/view/marcas">
                            <div class="sb-nav-link-icon">
                                <i class="material-icons">storefront</i>
                            </div>
                            Marcas
                        </a>
                        <a class="nav-link" href="<?= $host; ?>/view/productos">
                            <div class="sb-nav-link-icon">
                                <i class="material-icons">inventory</i>
                            </div>
                            Productos
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Inició sesión como:</div>
                    <?= $_SESSION['login']['rol'] ?>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>