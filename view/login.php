<?php
require 'includes/header.php';
?>
<!-- Start Contact Us -->
<section class="contact-us section">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-4">
                <div class="contact-us-form">
                    <h2>Iniciar Sesión</h2>
                    <p>Si ya estás registrado, inicia sesión.</p>
                    <!-- Form -->
                    <form class="form" id="frmAcceso" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" placeholder="Usuario" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">Entrar</button>
                                </div>
                                <div class="checkbox">
                                    <a href="#">¿Olvidaste tu contraseña?</a>
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

<!--LOGIN-->
<script type="text/javascript" src="scripts/login.js"></script>
