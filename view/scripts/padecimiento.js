var tabla;

function init() {
    mostrarform(false);
    tabla = listarButton('padecimiento', 'asc');

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../controller/padecimiento.php?op=guardaryeditar",
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
    $.post("../controller/padecimiento.php?op=mostrar", {id: id}, function (data, status) {
        mostrarform(true, accion);
        data = JSON.parse(data);
        $("#id").val(data.id);
        $("#padecimiento").val(data.padecimiento);
        $("#descripcion").val(data.descripcion);
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
    $('#descripcion').removeAttr('disabled');
    $("#btnGuardar").show();
}

function deshabForm() {
    $('#padecimiento').attr("disabled", "disabled");
    $('#descripcion').attr("disabled", "disabled");
    $("#btnGuardar").hide();
}

function eliminar(id) {
    alertify.confirm('Eliminar Padecimiento', '¿Está seguro que desea eliminar el padecimiento seleccionado?', function () {
            $.post("../controller/padecimiento.php?op=eliminar", {id: id}, function (e) {
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

init();