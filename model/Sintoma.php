<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class Sintoma
{
    public function __construct()
    {

    }

    public function insertar($nombre_sintoma,$descripcion)
    {
        $sql = "INSERT INTO tb_sintomas_covid (sintoma,descripcion) VALUES('$nombre_sintoma','$descripcion')";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $nombre_sintoma,$descripcion)
    {
        $sql = "UPDATE tb_sintomas_covid SET sintoma = '$nombre_sintoma' , descripcion = '$descripcion' WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tb_sintomas_covid WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
        $sql = "SELECT * FROM tb_sintomas_covid WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar()
    {
        $sql = "SELECT *
                FROM tb_sintomas_covid
                ORDER BY sintoma ASC";
        return ejecutarConsulta($sql);
    }
}