<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

require 'includes/header.php';

if (!isset($_SESSION["user"])) {
    ?>
    <script>
        window.location.href = "login.php";
    </script>
    <?php
}
?>

<!-- Start Contact Us -->
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-us-form">
                    <?php include('includes/welcome.php'); ?>
                    <h2>Publicaciones</h2>

                    <!-- LISTADO OPEN -->
                    <div class="row" id="list">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tbllistado" class="table table-striped table-bordered w-100">
                                            <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Tipo Sangre</th>
                                                <th>Ciudad</th>
                                                <th>Contacto</th>
                                                <th>Correo</th>
                                                <th>Información</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- TABLE WRAPPER -->
                            </div>
                            <!-- SECTION WRAPPER -->
                        </div>
                    </div>
                    <!-- LISTADO CLOSED -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact Us -->

<?php
require 'includes/footer.php';
?>

<script type="text/javascript" src="scripts/common.js"></script>
<script type="text/javascript" src="scripts/publicaciones.js"></script>
