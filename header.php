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
    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
  

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <!-- iconos de google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body class="sb-nav-fixed">



    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Proyecto Final-Beta
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>

    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <ul class="navbar-nav ms-auto ms-md-0 me-0 me-lg-5 ">
            <div class="navbar-brand">
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

    </form>
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
                            Inicio
                        </a>

                        <div class="sb-sidenav-menu-heading">Módulos</div>

                        <a class="nav-link" href="<?= $host; ?>/view/usuarios" id="usuario">
                            <div class="sb-nav-link-icon">
                                <i class="material-icons">person_add</i>
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