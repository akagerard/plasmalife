var tabla;

function init() {
    selectCiudad();
    selectSexo();
    selectTipoUsuario();
    mostrarform(false);
    tabla = listarButton('usuario', 'asc');

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
}

function guardaryeditar(e) {
    e.preventDefault(); //No se activará la acción predeterminada del evento
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../controller/usuario.php?op=guardaryeditarAdmin",
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
    $('#ciudad').val(null).trigger("change");
    $('#sexo').val(null).trigger("change");
    $('#tipoUsuario').val(null).trigger("change");
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
    $.post("../controller/usuario.php?op=mostrar", {id: id}, function (data, status) {
        mostrarform(true, accion);
        data = JSON.parse(data);
        $("#id").val(data.id);
        $('#ciudad').val(data.id_ciudad).trigger("change");
        $('#sexo').val(data.sexo).trigger("change");
        $('#tipoUsuario').val(data.id_tipo_usuario).trigger("change");
        $("#username").val(data.usuario);
        $("#nombre").val(data.nombre);
        $("#apellido").val(data.apellido);
        $("#fechaNac").val(data.fecha_nacimiento_f);
        $("#telefono").val(data.contacto);
        $("#dui").val(data.dui);
        $("#correo").val(data.correo);
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
    $('#ciudad').removeAttr('disabled');
    $('#sexo').removeAttr('disabled');
    $('#tipoUsuario').removeAttr('disabled');
    $("#username").removeAttr('disabled');
    $("#nombre").removeAttr('disabled');
    $("#apellido").removeAttr('disabled');
    $("#fechaNac").removeAttr('disabled');
    $("#telefono").removeAttr('disabled');
    $("#dui").removeAttr('disabled');
    $("#correo").removeAttr('disabled');
    $("#password").removeAttr('disabled');
    $("#btnGuardar").show();
}

function deshabForm() {
    $('#ciudad').attr("disabled", "disabled");
    $('#sexo').attr("disabled", "disabled");
    $('#tipoUsuario').attr("disabled", "disabled");
    $("#username").attr("disabled", "disabled");
    $("#nombre").attr("disabled", "disabled");
    $("#apellido").attr("disabled", "disabled");
    $("#fechaNac").attr("disabled", "disabled");
    $("#telefono").attr("disabled", "disabled");
    $("#dui").attr("disabled", "disabled");
    $("#correo").attr("disabled", "disabled");
    $("#password").attr("disabled", "disabled");
    $("#btnGuardar").hide();
}

function eliminar(id) {
    alertify.confirm('Eliminar Usuario', '¿Está seguro que desea eliminar el usuario seleccionado?', function () {
            $.post("../controller/usuario.php?op=eliminar", {id: id}, function (e) {
                if (e == 1) {
                    alertify.success("Usuario eliminado correctamente.");
                    tabla.ajax.reload();
                } else {
                    alertify.error("Ha ocurrido un error al eliminar usuario.<br> Detalle: " + e);
                }
            });
        }
        , function () {
            alertify.error('Acción cancelada.')
        });
}

function activar(id) {
    alertify.confirm('Activar Usuario', '¿Está seguro que desea activar el usuario seleccionado?', function () {
            $.post("../controller/usuario.php?op=activar", {id: id}, function (e) {
                if (e == 1) {
                    alertify.success("Usuario activado correctamente.");
                    tabla.ajax.reload();
                } else {
                    alertify.error("Ha ocurrido un error al activar usuario.<br> Detalle: " + e);
                }
            });
        }
        , function () {
            alertify.error('Acción cancelada.')
        });
}

function desactivar(id) {
    alertify.confirm('Desactivar Usuario', '¿Está seguro que desea desactivar el usuario seleccionado?', function () {
            $.post("../controller/usuario.php?op=desactivar", {id: id}, function (e) {
                if (e == 1) {
                    alertify.success("Usuario desactivado correctamente.");
                    tabla.ajax.reload();
                } else {
                    alertify.error("Ha ocurrido un error al desactivar usuario.<br> Detalle: " + e);
                }
            });
        }
        , function () {
            alertify.error('Acción cancelada.')
        });
}

init();