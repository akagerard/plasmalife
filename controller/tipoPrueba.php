<?php
session_start();
require_once "../model/TipoPrueba.php";

$tipoprueba = new TipoPrueba();

$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$prueba = isset($_POST["prueba"]) ? limpiarCadena($_POST["prueba"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($id)) {
            $rspta = $tipoprueba->insertar($prueba,$descripcion);
            echo $rspta;
        } else {
            $rspta = $tipoprueba->editar($id, $prueba,$descripcion);
            echo $rspta;
        }
        break;


    case 'eliminar':
        $rspta = $tipoprueba->eliminar($id);
        echo $rspta;
        break;


    case 'mostrar':
        $rspta = $tipoprueba->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $tipoprueba->listar();
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
                "0" => $reg->nombre,
                "1" => $reg->descripcion,
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



