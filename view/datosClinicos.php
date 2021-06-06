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
                    <h2>Datos Clínicos</h2>

                    <!-- FORM OPEN -->
                    <div class="row" id="frm">
                        <div class="col-lg-12">
                            <form class="form" name="formulario" id="formulario" method="post">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="idUsuario" name="idUsuario">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-group" for="tipoContencion">Tipo Contención</label>
                                        <div class="form-group">
                                            <input type="text" name="tipoContencion" id="tipoContencion" required>
                                        </div>
                                        <label class="form-group" for="tipoPrueba">Tipo Prueba COVID</label>
                                        <div class="form-group">
                                            <select class="form-control select2-show-search"
                                                    data-placeholder="Seleccionar" name="tipoPrueba" id="tipoPrueba"
                                                    required></select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-group" for="fechaPrueba">Fecha Prueba</label>
                                        <div class="form-group">
                                            <input type="text" class="datepicker" data-date-format="dd/mm/yyyy"
                                                   id="fechaPrueba" name="fechaPrueba" required>
                                        </div>
                                        <label class="form-group" for="resultado">Resultado</label>
                                        <div class="form-group">
                                            <select class="form-control select2-show-search"
                                                    data-placeholder="Seleccionar" name="resultado" id="resultado"
                                                    required></select>
                                        </div>
                                    </div>
                                </div>
                                <row>
                                    <label class="form-group" for="cuadroCovid">Cuadro COVID</label>
                                    <div class="form-group">
                                        <textarea name="cuadroCovid" id="cuadroCovid"></textarea>
                                    </div>
                                </row>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success mb-1" id="btnGuardar">Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- COL END -->
                    </div>
                    <!-- FORM CLOSED -->
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
<script type="text/javascript" src="scripts/datosClinicos.js"></script>
