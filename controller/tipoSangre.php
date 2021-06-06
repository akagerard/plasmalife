<?php
session_start();
require_once "../model/TipoSangre.php";

$tiposangre = new TipoSangre();

$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$tipo_sangre = isset($_POST["tipo_sangre"]) ? limpiarCadena($_POST["tipo_sangre"]) : "";



switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($id)) {
            $rspta = $tiposangre->insertar($tipo_sangre);
            echo $rspta;
        } else {
            $rspta = $tiposangre->editar($id, $tipo_sangre);
            echo $rspta;
        }
        break;


    case 'eliminar':
        $rspta = $tiposangre->eliminar($id);
        echo $rspta;
        break;


    case 'mostrar':
        $rspta = $tiposangre->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $tiposangre->listar();
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
                "0" => $reg->tipo,
                "1" => $buttons
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



