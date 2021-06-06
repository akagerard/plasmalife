<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class PadecimientoUsuario
{
    public function __construct()
    {

    }

    public function insertar($idUsuario,$padecimiento, $detalle)
    {
        $sql = "INSERT INTO tb_datos_clinicos_padecimiento (id_usuario, id_padecimientos, detalle) VALUES($idUsuario,$padecimiento, '$detalle')";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $padecimiento, $detalle)
    {
        $sql = "UPDATE tb_datos_clinicos_padecimiento SET id_padecimientos = '$padecimiento' , detalle = '$detalle' WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tb_datos_clinicos_padecimiento WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
        $sql = "SELECT * FROM tb_datos_clinicos_padecimiento WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($idUsuario)
    {
        $sql = "SELECT a.*, b.padecimiento, b.descripcion
                FROM tb_datos_clinicos_padecimiento a
                JOIN tb_padecimiento b ON a.id_padecimientos = b.id
                WHERE a.id_usuario = $idUsuario
                ORDER BY b.padecimiento ASC";
        return ejecutarConsulta($sql);
    }
}