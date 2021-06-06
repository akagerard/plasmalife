<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class Ciudad
{
    public function __construct()
    {

    }

    public function insertar($ciudad)
    {
        $sql = "INSERT INTO tb_ciudad (ciudad) VALUES('$ciudad')";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $ciudad)
    {
        $sql = "UPDATE tb_ciudad SET ciudad = '$ciudad' WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tb_ciudad WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
        $sql = "SELECT * FROM tb_ciudad WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT *
                FROM tb_ciudad
                ORDER BY ciudad ASC";
        return ejecutarConsulta($sql);
    }
}