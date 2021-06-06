var tabla;

function init() {
    $("#idUsuario").val(idUsuario);
    selectPadecimiento();
    mostrarform(false);
    tabla = listarId('padecimientoUsuario', idUsuario);

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../controller/padecimientoUsuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            if (datos == 1) {
                alertify.success("Guardado correctamente.");
                mostrarform(false);
                tabla.ajax.reload();
            } else {
                $("#btnGuardar").prop("disabled", false);
                alertify.error(datos);
            }
        }
    });
}

function limpiar() {
    $("#id").val("");
    $('#padecimiento').val(null).trigger("change");
    $('#formulario')[0].reset();
}

function mostrarform(flag, accion) {
    limpiar();
    if (flag) {
        $("#list").hide();
        $("#frm").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnAgregar").hide();
        $("#bcfrm").show();
        $("#bclist").hide();
        //accion = 1 -> Ver | 2 ->Editar
        accion == 1 ? $("#bcfrm").text("Ver") : accion == 2 ? $("#bcfrm").text("Editar") : $("#bcfrm").text("Agregar");
    } else {
        $("#list").show();
        $("#frm").hide();
        $("#btnAgregar").show();
        $("#bcfrm").hide();
        $("#bclist").show();
    }
}

function nuevo(flag) {
    habForm();
    mostrarform(flag);
}

function cancelarform() {
    limpiar();
    mostrarform(false);
}

function mostrar(id, accion) {
    $.post("../controller/padecimientoUsuario.php?op=mostrar", {id: id}, function (data, status) {
        mostrarform(true, accion);
        data = JSON.parse(data);
        $("#id").val(data.id);
        $('#padecimiento').val(data.id_padecimientos).trigger("change");
        $("#detalle").val(data.detalle);
    });
}

function ver(id) {
    mostrar(id, 1);
    deshabForm();
}

function editar(id) {
    mostrar(id, 2);
    habForm();
}

function habForm() {
    $('#padecimiento').removeAttr('disabled');
    $('#detalle').removeAttr('disabled');
    $("#btnGuardar").show();
}

function deshabForm() {
    $('#padecimiento').attr("disabled", "disabled");
    $('#detalle').attr("disabled", "disabled");
    $("#btnGuardar").hide();
}

function eliminar(id) {
    alertify.confirm('Eliminar Padecimiento', '¿Está seguro que desea eliminar el padecimiento seleccionado?', function () {
            $.post("../controller/padecimientoUsuario.php?op=eliminar", {id: id}, function (e) {
                if (e == 1) {
                    alertify.success("padecimiento eliminado correctamente.");
                    tabla.ajax.reload();
                } else {
                    alertify.error("Ha ocurrido un error al eliminar padecimiento.<br> Detalle: " + e);
                }
            });
        }
        , function () {
            alertify.error('Acción cancelada.')
        });
}

function selectPadecimiento() {
    $.post("../controller/padecimientoUsuario.php?op=selectPadecimiento", function (r) {
        $("#padecimiento").html(r);
    });
}

init();