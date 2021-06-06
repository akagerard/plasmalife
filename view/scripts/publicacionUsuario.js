var tabla;

function init() {
    mostrarform(false);
    tabla = listarId('publicacionUsuario', idUsuario);

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../controller/publicacionUsuario.php?op=guardaryeditar",
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
    $.post("../controller/publicacionUsuario.php?op=mostrar", {id: id}, function (data, status) {
        mostrarform(true, accion);
        data = JSON.parse(data);
        $("#id").val(data.id);
        $("#informacion").val(data.informacion);
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
    $('#informacion').removeAttr('disabled');
    $("#btnGuardar").show();
}

function deshabForm() {
    $('#informacion').attr("disabled", "disabled");
    $("#btnGuardar").hide();
}

function eliminar(id) {
    alertify.confirm('Eliminar Resgitro', '¿Está seguro que desea eliminar el registro seleccionado?', function () {
            $.post("../controller/publicacionUsuario.php?op=eliminar", {id: id}, function (e) {
                if (e == 1) {
                    alertify.success("Registro eliminado correctamente.");
                    tabla.ajax.reload();
                } else {
                    alertify.error("Ha ocurrido un error al eliminar el registro.<br> Detalle: " + e);
                }
            });
        }
        , function () {
            alertify.error('Acción cancelada.')
        });
}

init();