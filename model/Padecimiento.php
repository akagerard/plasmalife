<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class Padecimiento
{
    public function __construct()
    {

    }

    public function insertar($nombre,$descripcion)
    {
        $sql = "INSERT INTO tb_padecimiento (padecimiento,descripcion) VALUES('$nombre','$descripcion')";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $nombre,$descripcion)
    {
        $sql = "UPDATE tb_padecimiento SET padecimiento = '$nombre' , descripcion = '$descripcion' WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tb_padecimiento WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
        $sql = "SELECT * FROM tb_padecimiento WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT *
                FROM tb_padecimiento
                ORDER BY padecimiento ASC";
        return ejecutarConsulta($sql);
    }
}