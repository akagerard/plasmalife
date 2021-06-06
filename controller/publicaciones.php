<?php
session_start();
require_once "../model/Publicaciones.php";

$publicaciones = new Publicaciones();

switch ($_GET["op"]) {
    case 'listar':
        $rspta = $publicaciones->listar();
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->nombre,
                "1" => $reg->tipo_sangre,
                "2" => $reg->ciudad,
                "3" => $reg->contacto,
                "4" => $reg->correo,
                "5" => $reg->informacion
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatable
            "iTotalRecords" => count($data), //Se envia el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //Se envia el total de registros a vizualizar
            "aaData" => $data
        );

        echo json_encode($results);
        break;
}



