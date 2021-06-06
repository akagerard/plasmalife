<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class Publicaciones
{
    public function __construct()
    {

    }
    public function listar()
    {
        $sql = "SELECT CONCAT(a.nombre, ' ', a.apellido) as nombre, b.tipo as tipo_sangre,
                c.ciudad, a.contacto, a.correo, d.informacion
                FROM tb_usuario a
                JOIN tb_tipo_sangre b ON a.id_tipo_sangre = b.id
                JOIN tb_ciudad c ON a.id_ciudad = c.id
                JOIN tb_publicacion d ON d.id_usuario = a.id";
        return ejecutarConsulta($sql);
    }
}