<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class TipoSangre
{
    public function __construct()
    {

    }

    public function insertar($tipo_sangre)
    {
        $sql = "INSERT INTO tb_tipo_sangre (tipo) VALUES('$tipo_sangre')";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $tipo_sangre)
    {
        $sql = "UPDATE tb_tipo_sangre SET tipo = '$tipo_sangre' WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tb_tipo_sangre WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
        $sql = "SELECT * FROM tb_tipo_sangre WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT *
                FROM tb_tipo_sangre
                ORDER BY tipo ASC";
        return ejecutarConsulta($sql);
    }
}