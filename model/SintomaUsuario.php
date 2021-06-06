<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class SintomaUsuario
{
    public function __construct()
    {

    }

    public function insertar($idUsuario,$sintoma, $detalle)
    {
        $sql = "INSERT INTO tb_datos_clinicos_sintoma (id_usuario, id_sintoma, detalle) VALUES($idUsuario,$sintoma, '$detalle')";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $sintoma, $detalle)
    {
        $sql = "UPDATE tb_datos_clinicos_sintoma SET id_sintoma = '$sintoma' , detalle = '$detalle' WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tb_datos_clinicos_sintoma WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
        $sql = "SELECT * FROM tb_datos_clinicos_sintoma WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($idUsuario)
    {
        $sql = "SELECT a.*, b.sintoma, b.descripcion
                FROM tb_datos_clinicos_sintoma a
                JOIN tb_sintomas_covid b ON a.id_sintoma = b.id
                WHERE a.id_usuario = $idUsuario
                ORDER BY b.sintoma ASC";
        return ejecutarConsulta($sql);
    }
}