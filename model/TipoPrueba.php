<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class TipoPrueba
{
    public function __construct()
    {

    }

    public function insertar($prueba,$descripcion)
    {
        $sql = "INSERT INTO tb_tipo_prueba (nombre,descripcion) VALUES('$prueba','$descripcion')";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $prueba,$descripcion)
    {
        $sql = "UPDATE tb_tipo_prueba SET nombre = '$prueba' , descripcion = '$descripcion' WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tb_tipo_prueba WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
        $sql = "SELECT * FROM tb_tipo_prueba WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT *
                FROM tb_tipo_prueba
                ORDER BY nombre ASC";
        return ejecutarConsulta($sql);
    }
}