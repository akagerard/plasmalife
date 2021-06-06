function init() {
    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
    selectCiudad();
    selectSexo();
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
                alertify.alert()
                    .setting({
                        'title': '¡Registro Completado!',
                        'label': 'Aceptar',
                        'message': 'Usuario registrado con éxito. Puedes iniciar sesión.',
                        'onok': function () {
                            $(location).attr("href", "login.php");
                        }
                    }).show();
            } else {
                alertify.alert()
                    .setting({
                        'title': '¡Error!',
                        'label': 'Aceptar',
                        'message': datos
                    }).show();
            }
        }
    });
}

init();