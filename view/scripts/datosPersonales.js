var tabla;

function init() {
    selectCiudad();
    selectSexo();
    selectTipoSangre();
    mostrar();
    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            if (datos == 1) {
                alertify.success("Guardado correctamente.");
            } else {
                $("#btnGuardar").prop("disabled", false);
                alertify.error(datos);
            }
        }
    });
}

function mostrar() {
    $.post("../controller/usuario.php?op=mostrar", {id: idUsuario}, function (data, status) {
        data = JSON.parse(data);
        $("#id").val(data.id);
        $('#ciudad').val(data.id_ciudad).trigger("change");
        $('#sexo').val(data.sexo).trigger("change");
        $('#tipoSangre').val(data.id_tipo_sangre).trigger("change");
        $("#username").val(data.usuario);
        $("#nombre").val(data.nombre);
        $("#apellido").val(data.apellido);
        $("#fechaNac").val(data.fecha_nacimiento_f);
        $("#telefono").val(data.contacto);
        $("#dui").val(data.dui);
        $("#correo").val(data.correo);
        $("#peso").val(data.peso);
    });
}

init();