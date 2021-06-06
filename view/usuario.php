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
if ($_SESSION["codigoTipo"] != "ADMIN") {
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
                    <h2>Mantenimiento de Usuarios</h2>
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
                                <div class="row">
                                    <div class="col">
                                        <label class="form-group" for="username">Usuario</label>
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" required>
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
                                        <label class="form-group" for="ciudad">Tipo Usuario</label>
                                        <div class="form-group">
                                            <select class="form-control select2-show-search"
                                                    data-placeholder="Seleccionar" name="tipoUsuario" id="tipoUsuario"
                                                    required></select>
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
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>DUI</th>
                                                <th>Contacto</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
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
<script type="text/javascript" src="scripts/usuario.js"></script>
