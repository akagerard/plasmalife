<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class PublicacionUsuario
{
    public function __construct()
    {

    }

    public function insertar($informacion,$id_usuario)
    {
        $sql = "INSERT INTO tb_publicacion (informacion,id_usuario) VALUES('$informacion','$id_usuario')";
        return ejecutarConsulta($sql);
    }

    public function editar($id, $informacion)
    {
        $sql = "UPDATE tb_publicacion SET informacion = '$informacion' WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM tb_publicacion WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
        $sql = "SELECT * FROM tb_publicacion WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($idUsuario)
    {
        $sql = "SELECT *
                FROM tb_publicacion
                WHERE id_usuario = $idUsuario
                ORDER BY informacion ASC";
        return ejecutarConsulta($sql);
    }
}