<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Plasmalife</title>

    <!-- Favicon -->
    <link rel="icon" href="../assets/img/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
          rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="../assets/css/nice-select.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="../assets/css/icofont.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="../assets/css/owl-carousel.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="../assets/css/datepicker.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <!-- Medipro CSS -->
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- Alertify -->
    <link rel="stylesheet" href="../assets/plugins/alertify/css/alertify.min.css"/>
    <link rel="stylesheet" href="../assets/plugins/alertify/css/themes/default.min.css"/>
    <!-- SELECT2 CSS -->
    <link href="../assets/plugins/select2/select2.min.css" rel="stylesheet"/>
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/datatable/datatables.min.css"/>
    <style>
        .nice-select {
            float: inherit !important;
            padding-bottom: 48px !important;
        }

        #tbllistado_wrapper .row .col-sm-3{
            flex: 0 0 35%;
            max-width: 35%;
        }

        #tbllistado_wrapper .row .col-sm-6{
            flex: 0 0 30%;
            max-width: 30%;
        }

        .select2-container--default .select2-selection--single {
            background-color: #f1f1f9;
            border: 1px solid #d8dde4;
            width: 100%;
            height: 50px !important;
            border: 1px solid #eee;
            padding: 0px 18px;
            color: #555;
            font-size: 14px;
            font-weight: 400;
            border-radius: 4px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #000;
            line-height: 48px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }

        .select2-container--default .select2-selection--single {
            background-color: transparent;
            border: 1px solid #d8dde4;
        }
    </style>
</head>
<body>

<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>

        <div class="indicator">
            <svg width="16px" height="12px">
                <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
            </svg>
        </div>
    </div>
</div>
<!-- End Preloader -->

<!-- Header Area -->
<header class="header">
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="../index.php"><img src="../assets/img/logo.png" alt="#"></a>
                        </div>
                        <!-- End Logo -->
                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div class="col-lg-7 col-md-9 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li><a href="index.php">Inicio</a></li>
<!--                                    <li><a href="#">Búsqueda </a></li>-->
                                    <li><a href="publicaciones.php">Publicaciones </a></li>
                                    <?php
                                    if (isset($_SESSION["user"])) {
                                        if ($_SESSION["codigoTipo"] == "DONAN") {
                                            ?>
                                            <li><a href="#">Perfil<i class="icofont-rounded-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="datosPersonales.php">Datos Personales</a></li>
                                                    <li><a href="datosClinicos.php">Datos Clínicos COVID</a></li>
                                                    <li><a href="padecimientoUsuario.php">Padecimientos</a></li>
                                                    <li><a href="sintomaUsuario.php">Síntomas</a></li>
                                                    <li><a href="publicacionUsuario.php">Publicaciones</a></li>
                                                </ul>
                                            </li>
                                            <?php
                                        } else if ($_SESSION["codigoTipo"] == "ADMIN") {
                                            ?>
                                            <li><a href="#">Administración<i class="icofont-rounded-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="usuario.php">Usuarios</a></li>
                                                    <li><a href="sintoma.php">Sintomas COVID</a></li>
                                                    <li><a href="tipoPrueba.php">Tipo Pruebas</a></li>
                                                    <li><a href="padecimiento.php">Padecimientos</a></li>
                                                    <li><a href="tipoSangre.php">Tipo Sangre</a></li>
                                                </ul>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    <?php
                    if (!isset($_SESSION["user"])) {
                        ?>
                        <div class="col-lg-2 col-12">
                            <div class="get-quote">
                                <a href="registro.php" class="btn">Registrarse</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-lg-2 col-12">
                            <div class="get-quote">
                                <a href="../controller/usuario.php?op=salir" class="btn">Cerrar Sesión</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!-- End Header Area -->
