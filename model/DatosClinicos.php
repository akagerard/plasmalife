<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class DatosClinicos
{
    public function __construct()
    {

    }

    public function insertar($tipoContencion, $tipoPrueba, $fechaPrueba, $resultado, $cuadroCovid, $idUsuario)
    {
        $sql = "INSERT INTO tb_datos_clinicos (tipo_contencion, id_tipo_prueba, fecha_covid, prueba_covid, cuadro_covid, id_usuario) VALUES('$tipoContencion', $tipoPrueba, '$fechaPrueba', '$resultado', '$cuadroCovid', $idUsuario)";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $tipoContencion, $tipoPrueba, $fechaPrueba, $resultado, $cuadroCovid)
    {
        $sql = "UPDATE tb_datos_clinicos SET 
                             tipo_contencion = '$tipoContencion', 
                             id_tipo_prueba = $tipoPrueba, 
                             fecha_covid = '$fechaPrueba', 
                             prueba_covid = '$resultado', 
                             cuadro_covid = '$cuadroCovid'
                                  WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idUsuario)
    {
        $sql = "SELECT a.*, DATE_FORMAT(a.fecha_covid,'%d/%m/%Y') as fecha_covid_f FROM tb_datos_clinicos a WHERE a.id_usuario = $idUsuario";
        return ejecutarConsultaSimpleFila($sql);
    }
}