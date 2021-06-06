<?php
session_start();
require_once "../model/PadecimientoUsuario.php";
require_once "../model/Padecimiento.php";

$padecimientoUsuario = new PadecimientoUsuario();

$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$idUsuario = isset($_POST["idUsuario"]) ? limpiarCadena($_POST["idUsuario"]) : "";
$padecimiento = isset($_POST["padecimiento"]) ? limpiarCadena($_POST["padecimiento"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$detalle = isset($_POST["detalle"]) ? limpiarCadena($_POST["detalle"]) : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($id)) {
            $rspta = $padecimientoUsuario->insertar($idUsuario, $padecimiento, $detalle);
            echo $rspta;
        } else {
            $rspta = $padecimientoUsuario->editar($id,$padecimiento, $detalle);
            echo $rspta;
        }
        break;


    case 'eliminar':
        $rspta = $padecimientoUsuario->eliminar($id);
        echo $rspta;
        break;


    case 'mostrar':
        $rspta = $padecimientoUsuario->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $padecimientoUsuario->listar($idUsuario);
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
                "0" => $reg->padecimiento,
                "1" => $reg->descripcion,
                "2" => $reg->detalle,
                "3" => $buttons
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

    case "selectPadecimiento":
        $padecimiento = new Padecimiento();
        $rspta = $padecimiento->listar();
        foreach ($rspta as $item) {
            echo '<option></option>';
            echo '<option value=' . $item['id'] . '>' . $item['padecimiento'] . '</option>';
        }
        break;
}



