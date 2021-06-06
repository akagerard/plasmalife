var tabla;

function init() {
    selectTipoPrueba();
    selectResultado();
    mostrar();
    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../controller/datosClinicos.php?op=guardaryeditar",
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
    $("#idUsuario").val(idUsuario);
    $.post("../controller/datosClinicos.php?op=mostrar", {idUsuario: idUsuario}, function (data, status) {
        data = JSON.parse(data);
        $("#id").val(data.id);
        $('#resultado').val(data.prueba_covid).trigger("change");
        $('#tipoPrueba').val(data.id_tipo_prueba).trigger("change");
        $("#fechaPrueba").val(data.fecha_covid_f);
        $("#cuadroCovid").text(data.cuadro_covid);
        $("#tipoContencion").val(data.tipo_contencion);
    });
}

function selectResultado() {
    $.post("../controller/datosClinicos.php?op=selectResultado", function (r) {
        $("#resultado").html(r);
    });
}

function selectTipoPrueba() {
    $.post("../controller/datosClinicos.php?op=selectTipoPrueba", function (r) {
        $("#tipoPrueba").html(r);
    });
}

init();