<?php
require_once "global.php";

$conexion = mysqli_init();
mysqli_ssl_set($conexion,NULL,NULL, "../ssl/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);
mysqli_real_connect($conexion, DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conexion)) {
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$acentos = $conexion->query("SET NAMES 'utf8'");

if (mysqli_connect_errno()) {
    printf("Falló en la conexión a la base de datos: %s\n", mysqli_connect_error());
    exit();
}

if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql)
    {
        global $conexion;
        $query = $conexion->query($sql);
        if ($query) {
            return $query;
        } else {
            return $conexion->error;
        }
    }

    function ejecutarConsultaSimpleFila($sql)
    {
        global $conexion;
        $query = $conexion->query($sql);
        if ($query) {
            $row = $query->fetch_assoc();
            return $row;
        } else {
            return $conexion->error;
        }

    }

    function ejecutarConsulta_retornarID($sql)
    {
        global $conexion;
        $query = $conexion->query($sql);
        if ($query) {
            return $conexion->insert_id;
        } else {
            return $conexion->error;
        }

    }

    function limpiarCadena($str)
    {
        global $conexion;
        $str = mysqli_real_escape_string($conexion, trim($str));
        return htmlspecialchars($str);
    }

    function retornarIDQuery()
    {
        global $conexion;
        return $conexion->insert_id;
    }

    function ejecutarMultipleConsulta($sql){
        global $conexion;
        $query = $conexion->multi_query($sql);
        return $query;
    }
}

?>
