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
} else {
    ?>    <script>
        window.location.href = "publicaciones.php";
    </script>
    <?php
}
?>

<?php
require 'includes/footer.php';
?>