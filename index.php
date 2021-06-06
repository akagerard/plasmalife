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
        <title>PlasmaLife</title>
		
		<!-- Favicon -->
        <link rel="icon" href="assets/img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="assets/css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="assets/css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="assets/css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="assets/css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="assets/css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="assets/css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
		
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
		<header class="header" >
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.php"><img src="assets/img/logo.png" alt="#"></a>
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
											<li class="active"><a href="index.php">Inicio </a></li>
<!--											<li><a href="#">Búsqueda </a></li>-->
											<li><a href="view/publicaciones.php">Publicaciones </a></li>
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
                                        <a href="view/login.php" class="btn">Iniciar Sesión</a>
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
		
		<!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('assets/img/slider2.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Base de donantes <span>Plasma Convaleciente</span></h1>
									<div class="button">
										<a href="#" class="btn">Buscar Donantes</a>
										<a href="#" class="btn primary">Leer Más</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('assets/img/slider.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Regístrate como <span>Donador de Plasma Convaleciente</span></span></h1>
									<div class="button">
										<a href="view/registro.php" class="btn">Registrarse</a>
										<a href="#" class="btn primary">Leer Más</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->
		
		<!-- Start Schedule Area -->
		<section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first">
								<div class="inner">
									<div class="icon">
										<i class="fa fa-ambulance"></i>
									</div>
									<div class="single-content">
										<h4>¿Qué es plasma convaleciente?</h4>
										<p>Cuando una persona contrae un virus como el COVID-19, su sistema inmune crea anticuerpos para
											combatir el virus. Estos anticuerpos se encuentran en el plasma.
										</p>
										<a href="#">MÁS INFORMACIÓN<i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- single-schedule -->
							<div class="single-schedule middle">
								<div class="inner">
									<div class="icon">
										<i class="icofont-prescription"></i>
									</div>
									<div class="single-content">
										<h4>Yo no tuve COVID-19. ¿Qué puedo hacer para ayudar?</h4>
										<p>¡Puede considerar donar sangre! Una donación de sangre puede salvar hasta 3 vidas. La sangre es
											necesaria cada día para proveer tratamientos que salvan vidas a una variedad de pacientes.</p>
										<a href="#">MÁS INFORMACIÓN<i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<!-- single-schedule -->
							<div class="single-schedule last">
								<div class="inner">
									<div class="icon">
										<i class="icofont-ui-clock"></i>
									</div>
									<div class="single-content">
										<h4>Proceso</h4>
										<p>
										1- El paciente recuperado de COVID-19 dona plasma.<br>
										2- Al plasma se le hacen pruebas.<br>
										3- El plasma es almacenado y transportado al hospital.<br>
										4- El paciente enfermo de COVID-19 es tratado con plasma.<br>
										</p>
										<a href="#">MÁS INFORMACIÓN<i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/End Start schedule Area -->

		<!-- Start Feautes -->
		<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>La estrategia del plasma de convaleciente está funcionando al 100 %</h2>
							<img src="assets/img/section-img.png" alt="#">
							<p>Pero no puede completarse si no existe un salvadoreño que contribuya y que done su plasma</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Feautes -->
		
		<!-- Start Fun-facts -->
		<div id="fun-facts" class="fun-facts section overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-home"></i>
							<div class="content">
								<span class="counter">3468</span>
								<p>Usuarios Registrados</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-user-alt-3"></i>
							<div class="content">
								<span class="counter">557</span>
								<p>Donantes</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont-simple-smile"></i>
							<div class="content">
								<span class="counter">4379</span>
								<p>Solicitantes</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-table"></i>
							<div class="content">
								<span class="counter">32</span>
								<p>Pacientes Recuperados</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
				</div>
			</div>
		</div>
		<!--/ End Fun-facts -->

		<!-- Start Newsletter Area -->
		<section class="newsletter section">
			<div class="container">
				<div class="row ">
					<div class="col-lg-6  col-12">
						<!-- Start Newsletter Form -->
						<div class="subscribe-text ">
							<h6>Suscríbase Para Mayor Información</h6>
							<p class="">Obtener información sobre donantes de plasma convaleciente COVID 19</p>
						</div>
						<!-- End Newsletter Form -->
					</div>
					<div class="col-lg-6  col-12">
						<!-- Start Newsletter Form -->
						<div class="subscribe-form ">
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Ingresa tu Correo Electrónico" class="common-input" onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Your email address'" required="" type="email">
								<button class="btn">Suscribirse</button>
							</form>
						</div>
						<!-- End Newsletter Form -->
					</div>
				</div>
			</div>
		</section>
		<!-- /End Newsletter Area -->

		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2021  |  All Rights Reserved</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->
		
		<!-- jquery Min JS -->
        <script src="assets/js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="assets/js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="assets/js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="assets/js/easing.js"></script>
		<!-- Color JS -->
		<script src="assets/js/colors.js"></script>
		<!-- Popper JS -->
		<script src="assets/js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="assets/js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="assets/js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="assets/js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="assets/js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="assets/js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="assets/js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="assets/js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="assets/js/steller.js"></script>
		<!-- Wow JS -->
		<script src="assets/js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="assets/js/main.js"></script>
    </body>
</html>