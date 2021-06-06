<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

class Usuario
{

    //Implementamos nuestro constructor
    public function __construct()
    {

    }

    //Implementamos un método para insertar registros
    public function insertar($username, $password, $nombre, $apellido, $fechaNac, $sexo, $telefono, $correo, $dui,
                             $id_ciudad, $id_tipo_usuario, $id_estado)
    {
        $sql = "INSERT INTO tb_usuario(user, password, nombre, apellido, fecha_nacimiento, sexo, contacto, correo, 
                dui, id_ciudad, id_tipo_usuario, id_estado) 
                VALUES ('$username', '$password', '$nombre', '$apellido', '$fechaNac', '$sexo', '$telefono', '$correo',
                '$dui', '$id_ciudad', '$id_tipo_usuario', '$id_estado')";
        return ejecutarConsulta($sql);
    }

    //Implementamos método para editar
    public function editarWPass($id, $username, $clavehash, $nombre, $apellido, $fechaNac, $sexo, $telefono, $correo, $dui, $ciudad, $tipo_usuario, $peso, $tipoSangre)
    {
        if($tipoSangre == ""){
            $tipoSangre = 'null';
        }
        $sql = "UPDATE tb_usuario SET user =  '$username'
                                        ,password = '$clavehash'
                                        ,nombre = '$nombre'
                                        ,apellido = '$apellido'
                                        ,fecha_nacimiento = '$fechaNac'
                                        ,sexo = '$sexo'
                                        ,contacto = '$telefono'
                                        ,correo = '$correo'
                                        ,dui = '$dui'
                                        ,id_ciudad = '$ciudad'
                                        ,id_tipo_usuario = '$tipo_usuario'
                                        ,peso = '$peso'
                                        ,id_tipo_sangre = $tipoSangre
                                WHERE id = $id";

        return ejecutarConsulta($sql);

    }

    public function editar($id, $username, $nombre, $apellido, $fechaNac, $sexo, $telefono, $correo, $dui, $ciudad, $tipo_usuario, $peso, $tipoSangre)
    {
        if($tipoSangre == ""){
            $tipoSangre = 'null';
        }
        $sql = "UPDATE tb_usuario SET user =  '$username'
                                        ,nombre = '$nombre'
                                        ,apellido = '$apellido'
                                        ,fecha_nacimiento = '$fechaNac'
                                        ,sexo = '$sexo'
                                        ,contacto = '$telefono'
                                        ,correo = '$correo'
                                        ,dui = '$dui'
                                        ,id_ciudad = '$ciudad'
                                        ,id_tipo_usuario = '$tipo_usuario'
                                        ,peso = '$peso'
                                        ,id_tipo_sangre = $tipoSangre
                                WHERE id = $id";

        return ejecutarConsulta($sql);
    }

    //Implementamos el método para desactivar criterios
    public function eliminar($id)
    {
        $sql = "UPDATE tb_usuario SET id_estado= 3 WHERE id = $id";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para descativar usuario
    public function desactivar($id)
    {
        $sql = "UPDATE tb_usuario SET id_estado= 2 WHERE id= $id";
        return ejecutarConsulta($sql);
    }

    //Implementamos un método para activar usuario
    public function activar($id)
    {
        $sql = "UPDATE tb_usuario SET id_estado= 1 WHERE id= $id";
        return ejecutarConsulta($sql);
    }

    //Implimentar método para mostrar los datos de un registro a modificar
    public function mostrar($id)
    {
        $sql = "SELECT a.*, a.user as usuario, DATE_FORMAT(a.fecha_nacimiento,'%d/%m/%Y') as fecha_nacimiento_f FROM tb_usuario a WHERE id = $id";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar método para listar registros
    public function listar()
    {
        $sql = "SELECT a.*, b.estado, b.codigo, c.tipo FROM tb_usuario a
                JOIN tb_estado b ON a.id_estado = b.id
                JOIN tb_tipo_usuario c ON a.id_tipo_usuario = c.id
                WHERE b.codigo = 'ACT' or b.codigo = 'INAC'";
        return ejecutarConsulta($sql);
    }

    public function verificar($username, $clavehash)
    {
        $sql = "SELECT a.id, a.user, a.correo, a.nombre, a.apellido, b.codigo,  b.tipo
                FROM tb_usuario a 
                JOIN tb_tipo_usuario b on a.id_tipo_usuario = b.id
                JOIN tb_estado c on a.id_estado = c.id 
                WHERE a.user = '$username' AND a.password = '$clavehash' AND c.codigo = 'ACT'";
        return ejecutarConsulta($sql);
    }

    public function listarTipoUsuario()
    {
        $sql = "SELECT *
                FROM tb_tipo_usuario
                ORDER BY tipo ASC";
        return ejecutarConsulta($sql);
    }
}