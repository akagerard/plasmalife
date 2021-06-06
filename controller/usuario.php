<?php
session_start();
require_once "../model/Usuario.php";
require_once "../model/Ciudad.php";
require_once "../model/TipoSangre.php";

$usuario = new Usuario();

$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$username = isset($_POST["username"]) ? limpiarCadena($_POST["username"]) : "";
$password = isset($_POST["password"]) ? limpiarCadena($_POST["password"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$apellido = isset($_POST["apellido"]) ? limpiarCadena($_POST["apellido"]) : "";
$fechaNac = isset($_POST["fechaNac"]) ? limpiarCadena($_POST["fechaNac"]) : "";
$ciudad = isset($_POST["ciudad"]) ? limpiarCadena($_POST["ciudad"]) : "";
$telefono = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
$dui = isset($_POST["dui"]) ? limpiarCadena($_POST["dui"]) : "";
$fotoDui = isset($_POST["fotoDui"]) ? limpiarCadena($_POST["fotoDui"]) : "";
$sexo = isset($_POST["sexo"]) ? limpiarCadena($_POST["sexo"]) : "";
$correo = isset($_POST["correo"]) ? limpiarCadena($_POST["correo"]) : "";
$tipo_usuario = isset($_POST["tipoUsuario"]) ? limpiarCadena($_POST["tipoUsuario"]) : "";
$estado = isset($_POST["estado"]) ? limpiarCadena($_POST["estado"]) : "";
$peso = isset($_POST["peso"]) ? limpiarCadena($_POST["peso"]) : "";
$tipoSangre = isset($_POST["tipoSangre"]) ? limpiarCadena($_POST["tipoSangre"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':

        //Hash SHA256 en la contraseña
        $clavehash = hash("SHA256", $password);
        //Formato fecha
        $date_format_explode = explode('/', $fechaNac);
        $fechaNacFormatted = $date_format_explode[2] . '/' . $date_format_explode[1] . '/' . $date_format_explode[0];
        //Fin formato fecha
        if (empty($id)) {
            $rspta = $usuario->insertar($username, $clavehash, $nombre, $apellido, $fechaNacFormatted, $sexo, $telefono, $correo, $dui, $ciudad, 2, 1);
            echo $rspta;
        } else if (empty($password)) {
            $rspta = $usuario->editar($id, $username, $nombre, $apellido, $fechaNacFormatted, $sexo, $telefono, $correo, $dui, $ciudad, 2, $peso, $tipoSangre);
            echo $rspta;
        } else {
            $rspta = $usuario->editarWPass($id, $username, $clavehash, $nombre, $apellido, $fechaNacFormatted, $sexo, $telefono, $correo, $dui, $ciudad, 2, $peso, $tipoSangre);
            echo $rspta;
        }
        break;

    case 'guardaryeditarAdmin':

        //Hash SHA256 en la contraseña
        $clavehash = hash("SHA256", $password);
        //Formato fecha
        $date_format_explode = explode('/', $fechaNac);
        $fechaNacFormatted = $date_format_explode[2] . '/' . $date_format_explode[1] . '/' . $date_format_explode[0];
        if (empty($id)) {
            $rspta = $usuario->insertar($username, $clavehash, $nombre, $apellido, $fechaNacFormatted, $sexo, $telefono, $correo, $dui, $ciudad, $tipo_usuario, 1);
            echo $rspta;
        } else if (empty($password)) {
            $rspta = $usuario->editar($id, $username, $nombre, $apellido, $fechaNacFormatted, $sexo, $telefono, $correo, $dui, $ciudad, $tipo_usuario, $peso, $tipoSangre);
            echo $rspta;
        } else {
            $rspta = $usuario->editarWPass($id, $username, $clavehash, $nombre, $apellido, $fechaNacFormatted, $sexo, $telefono, $correo, $dui, $ciudad, $tipo_usuario, $peso, $tipoSangre);
            echo $rspta;
        }
        break;

    case 'eliminar':
        $rspta = $usuario->eliminar($id);
        echo $rspta;
        break;

    case 'desactivar':
        $rspta = $usuario->desactivar($id);
        echo $rspta;
        break;

    case 'activar':
        $rspta = $usuario->activar($id);
        echo $rspta;
        break;

    case 'mostrar':
        $rspta = $usuario->mostrar($id);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $usuario->listar();

        $data = array();

        while ($reg = $rspta->fetch_object()) {
            //Buttons
            $btnEstado = $reg->codigo == 'ACT' ? '<button onclick="desactivar(' . $reg->id . ')" class="btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Desactivar"><i class="fa fa-ban"></i></button>' : '<button onclick="activar(' . $reg->id . ')" class="btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Activar"><i class="fa fa-check-circle"></i></button>';
            $buttons = '<div class="btn-list text-center">
                            <div class="btn-group align-top">
                                <button onclick="ver(' . $reg->id . ')" class="btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i></button>
                                <button onclick="editar(' . $reg->id . ')" class="btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button>'
                . $btnEstado .
                '<button onclick="eliminar(' . $reg->id . ')" class="btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times"></i></button>
                            </div>
                        </div>';

            $data[] = array(
                "0" => $reg->user,
                "1" => $reg->nombre.' '.$reg->apellido,
                "2" => $reg->dui,
                "3" => $reg->contacto,
                "4" => $reg->tipo,
                "5" => $reg->estado,
                "6" => $buttons
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

    case 'verificar':

        $username = $_POST['username'];
        $password = $_POST['password'];

        //Hash SHA256 en la contraseña
        $clavehash = hash("SHA256", $password);

        $rspta = $usuario->verificar($username, $clavehash);
        $fetch = $rspta->fetch_object();

        if (isset($fetch)) {

            //Declaramos variables de sesión
            $_SESSION['id'] = $fetch->id;
            $_SESSION['nombre'] = $fetch->nombre . ' ' . $fetch->apellido;
            $_SESSION['user'] = $fetch->user;
            $_SESSION['mail'] = $fetch->correo;
            $_SESSION['codigoTipo'] = $fetch->codigo;
            $_SESSION['showTipo'] = $fetch->tipo;
        }
        echo json_encode($fetch);
        break;

    case 'salir':
        //Limpiar variables de sesión
        session_unset();
        //Desctruimos las sesión
        session_destroy();
        //Redirección al login
        header("Location: ../index.php");
        break;

    case "selectCiudad":
        $ciudad = new Ciudad();
        $rspta = $ciudad->listar();
        foreach ($rspta as $item) {
            echo '<option></option>';
            echo '<option value=' . $item['id'] . '>' . $item['ciudad'] . '</option>';
        }
        break;

    case "selectSexo":
        echo '<option></option>';
        echo '<option value="F">Femenino</option>';
        echo '<option value="M">Masculino</option>';
        break;

    case "selectTipoUsuario":
        $rspta = $usuario->listarTipoUsuario();
        foreach ($rspta as $item) {
            echo '<option></option>';
            echo '<option value=' . $item['id'] . '>' . $item['tipo'] . '</option>';
        }
        break;

    case "selectTipoSangre":
        $tipoSangre = new TipoSangre();
        $rspta = $tipoSangre->listar();
        foreach ($rspta as $item) {
            echo '<option></option>';
            echo '<option value=' . $item['id'] . '>' . $item['tipo'] . '</option>';
        }
        break;
}


