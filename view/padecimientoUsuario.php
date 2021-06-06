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
if ($_SESSION["codigoTipo"] == "ADMIN") {
    ?>
    <script>
        window.location.href = "login.php";
    </script>
    <?php
}
echo '<script>';
echo 'var idUsuario = "' . $_SESSION["id"] . '";';
echo '</script>';
?>

<!-- Start Contact Us -->
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-us-form">
                    <?php include('includes/welcome.php'); ?>
                    <h2>Padecimientos Presentados</h2>
                    <div class="ml-auto pageheader-btn">
                        <a href="#" class="btn btn-success btn-icon text-white mr-2 mb-3" id="btnAgregar"
                           onclick="nuevo(true)">
                            <span><i class="fe fe-plus"></i></span> Agregar
                        </a>
                    </div>

                    <!-- FORM OPEN -->
                    <div class="row" id="frm">
                        <div class="col-lg-12">
                            <form class="form" name="formulario" id="formulario" method="post">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="idUsuario" name="idUsuario">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-group" for="resultado">Padecimiento</label>
                                        <div class="form-group">
                                            <select class="form-control select2-show-search"
                                                    data-placeholder="Seleccionar" name="padecimiento" id="padecimiento"
                                                    required></select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-group" for="detalle">Detalle</label>
                                        <div class="form-group">
                                            <input type="text" name="detalle" id="detalle">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success mb-1" id="btnGuardar">Guardar
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-warning mb-1" id="btnCancelar"
                                                onclick="cancelarform()">Cancelar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- COL END -->
                    </div>
                    <!-- FORM CLOSED -->

                    <!-- LISTADO OPEN -->
                    <div class="row" id="list">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tbllistado" class="table table-striped table-bordered w-100">
                                            <thead>
                                            <tr>
                                                <th>Padecimiento</th>
                                                <th>Descripción</th>
                                                <th>Detalle</th>
                                                <th>Acciones</th>
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
<script type="text/javascript" src="scripts/padecimientoUsuario.js"></script>
