<?php
session_start();
require_once "../model/PublicacionUsuario.php";

$publicacion = new PublicacionUsuario();

$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$informacion = isset($_POST["informacion"]) ? limpiarCadena($_POST["informacion"]) : "";
$id_usuario = $_SESSION['id'];

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($id)) {
            $rspta = $publicacion->insertar($informacion, $id_usuario);
            echo $rspta;
        } else {
            $rspta = $publicacion->editar($id, $informacion);
            echo $rspta;
        }
        break;


    case 'eliminar':
        $rspta = $publicacion->eliminar($id);
        echo $rspta;
        break;


    case 'mostrar':
        $rspta = $publicacion->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $publicacion->listar($id_usuario);
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            //Buttons
            $buttons = '<div class="btn-list text-center">
                            <div class="btn-group align-top">
                                <button onclick="ver(' . $reg->id . ')" class="btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i></button>
                                <button onclick="editar(' . $reg->id . ')" class="btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button>

                        <button onclick="eliminar(' . $reg->id . ')" class="btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times"></i></button>
                            </div>
                        </div>';

            $data[] = array(
                "0" => $reg->informacion,
                "1" => $reg->fecha_publicacion,
                "2" => $buttons
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



