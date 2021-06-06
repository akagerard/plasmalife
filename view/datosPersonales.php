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
                    <h2>Datos Personales</h2>

                    <!-- FORM OPEN -->
                    <div class="row" id="frm">
                        <div class="col-lg-12">
                            <form class="form" name="formulario" id="formulario" method="post">
                                <input type="hidden" id="id" name="id">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-group" for="username">Usuario</label>
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" readonly>
                                        </div>
                                        <label class="form-group" for="nombre">Nombre</label>
                                        <div class="form-group">
                                            <input type="text" name="nombre" id="nombre" required>
                                        </div>
                                        <label class="form-group" for="fechaNac">Fecha Nacimiento</label>
                                        <div class="form-group">
                                            <input type="text" class="datepicker" data-date-format="dd/mm/yyyy"
                                                   name="fechaNac" id="fechaNac" required>
                                        </div>
                                        <label class="form-group" for="telefono">Teléfono</label>
                                        <div class="form-group">
                                            <input type="text" name="telefono" id="telefono" required>
                                        </div>
                                        <label class="form-group" for="ciudad">Ciudad</label>
                                        <div class="form-group">
                                            <select class="form-control select2-show-search"
                                                    data-placeholder="Seleccionar" name="ciudad" id="ciudad"
                                                    required></select>
                                        </div>
                                        <label class="form-group" for="peso">Peso(lb)</label>
                                        <div class="form-group">
                                            <input type="number" step="0.01" name="peso" id="peso" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-group" for="password">Contraseña</label>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password">
                                        </div>
                                        <label class="form-group" for="apellido">Apellido</label>
                                        <div class="form-group">
                                            <input type="text" name="apellido" id="apellido" required>
                                        </div>
                                        <label class="form-group" for="dui">DUI</label>
                                        <div class="form-group">
                                            <input type="text" name="dui" id="dui" required>
                                        </div>
                                        <label class="form-group" for="correo">Correo</label>
                                        <div class="form-group">
                                            <input type="email" name="correo" id="correo" required>
                                        </div>
                                        <label class="form-group" for="sexo">Sexo</label>
                                        <div class="form-group">
                                            <select class="form-control select2-show-search"
                                                    data-placeholder="Seleccionar" name="sexo" id="sexo"
                                                    required></select>
                                        </div>
                                        <label class="form-group" for="ciudad">Tipo Sangre</label>
                                        <div class="form-group">
                                            <select class="form-control select2-show-search"
                                                    data-placeholder="Seleccionar" name="tipoSangre" id="tipoSangre"
                                                    required></select>
                                        </div>
                                    </div>
                                </div>
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
<script type="text/javascript" src="scripts/datosPersonales.js"></script>
