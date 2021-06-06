<?php
session_start();
require_once "../model/DatosClinicos.php";
require_once "../model/TipoPrueba.php";

$datosClinicos = new DatosClinicos();

$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$idUsuario = isset($_POST["idUsuario"]) ? limpiarCadena($_POST["idUsuario"]) : "";
$tipoContencion = isset($_POST["tipoContencion"]) ? limpiarCadena($_POST["tipoContencion"]) : "";
$tipoPrueba = isset($_POST["tipoPrueba"]) ? limpiarCadena($_POST["tipoPrueba"]) : "";
$fechaPrueba = isset($_POST["fechaPrueba"]) ? limpiarCadena($_POST["fechaPrueba"]) : "";
$resultado = isset($_POST["resultado"]) ? limpiarCadena($_POST["resultado"]) : "";
$cuadroCovid = isset($_POST["cuadroCovid"]) ? limpiarCadena($_POST["cuadroCovid"]) : "";


switch ($_GET["op"]) {
    case 'guardaryeditar':
        //Formato fecha
        $date_format_explode = explode('/', $fechaPrueba);
        $fechaPruebaF = $date_format_explode[2] . '/' . $date_format_explode[1] . '/' . $date_format_explode[0];
        //Fin formato fecha
        if (empty($id)) {
            $rspta = $datosClinicos->insertar($tipoContencion, $tipoPrueba, $fechaPruebaF, $resultado, $cuadroCovid, $idUsuario);
            echo $rspta;
        } else {
            $rspta = $datosClinicos->editar($id, $tipoContencion, $tipoPrueba, $fechaPruebaF, $resultado, $cuadroCovid);
            echo $rspta;
        }
        break;

    case 'mostrar':
        $rspta = $datosClinicos->mostrar($idUsuario);
        echo json_encode($rspta);
        break;

    case "selectResultado":
        echo '<option></option>';
        echo '<option value="0">Negativo</option>';
        echo '<option value="1">Positivo</option>';
        break;

    case "selectTipoPrueba":
        $tipoPrueba = new TipoPrueba();
        $rspta = $tipoPrueba->listar();
        foreach ($rspta as $item) {
            echo '<option></option>';
            echo '<option value=' . $item['id'] . '>' . $item['nombre'] . '</option>';
        }
        break;
}