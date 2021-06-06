<?php
session_start();
require_once "../model/SintomaUsuario.php";
require_once "../model/Sintoma.php";

$sintomaUsuario = new SintomaUsuario();

$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$idUsuario = isset($_POST["idUsuario"]) ? limpiarCadena($_POST["idUsuario"]) : "";
$sintoma = isset($_POST["sintoma"]) ? limpiarCadena($_POST["sintoma"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$detalle = isset($_POST["detalle"]) ? limpiarCadena($_POST["detalle"]) : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($id)) {
            $rspta = $sintomaUsuario->insertar($idUsuario, $sintoma, $detalle);
            echo $rspta;
        } else {
            $rspta = $sintomaUsuario->editar($id, $sintoma, $detalle);
            echo $rspta;
        }
        break;


    case 'eliminar':
        $rspta = $sintomaUsuario->eliminar($id);
        echo $rspta;
        break;


    case 'mostrar':
        $rspta = $sintomaUsuario->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $sintomaUsuario->listar($idUsuario);
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
                "0" => $reg->sintoma,
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

    case "selectSintoma":
        $sintoma = new Sintoma();
        $rspta = $sintoma->listar();
        foreach ($rspta as $item) {
            echo '<option></option>';
            echo '<option value=' . $item['id'] . '>' . $item['sintoma'] . '</option>';
        }
        break;
}



