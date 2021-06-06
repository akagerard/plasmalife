<?php
require 'includes/header.php';
?>

<!-- Start Contact Us -->
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-us-form">
                    <h2>Registrarse</h2>
                    <p>Llena el siguiente formulario para registrarte.</p>
                    <!-- Form -->
                    <form class="form" name="formulario" id="formulario" method="post">
                        <div class="row">
                            <div class="col">
                                <label class="form-group" for="username">Usuario</label>
                                <div class="form-group">
                                    <input type="text" name="username" required>
                                </div>
                                <label class="form-group" for="nombre">Nombre</label>
                                <div class="form-group">
                                    <input type="text" name="nombre" required>
                                </div>
                                <label class="form-group" for="fechaNac">Fecha Nacimiento</label>
                                <div class="form-group">
                                    <input type="text" class="datepicker" data-date-format="dd/mm/yyyy" name="fechaNac" required>
                                </div>
                                <label class="form-group" for="telefono">Teléfono</label>
                                <div class="form-group">
                                    <input type="text" name="telefono" required>
                                </div>
                                <label class="form-group" for="ciudad">Ciudad</label>
                                <div class="form-group">
                                    <select class="form-control select2-show-search" data-placeholder="Seleccionar" name="ciudad" id="ciudad" required></select>
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-group" for="password">Contraseña</label>
                                <div class="form-group">
                                    <input type="password" name="password" required>
                                </div>
                                <label class="form-group" for="apellido">Apellido</label>
                                <div class="form-group">
                                    <input type="text" name="apellido" required>
                                </div>
                                <label class="form-group" for="dui">DUI</label>
                                <div class="form-group">
                                    <input type="text" name="dui" required>
                                </div>
                                <label class="form-group" for="correo">Correo</label>
                                <div class="form-group">
                                    <input type="email" name="correo" required>
                                </div>
                                <label class="form-group" for="sexo">Sexo</label>
                                <div class="form-group">
                                    <select class="form-control select2-show-search" data-placeholder="Seleccionar" name="sexo" id="sexo" required></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">Registrarse</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
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
<script type="text/javascript" src="scripts/registro.js"></script>
