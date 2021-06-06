$("#frmAcceso").on('submit', function (e) {
    e.preventDefault();
    username = $('#username').val();
    password = $('#password').val();
    $.post("../controller/usuario.php?op=verificar",
        {"username": username, "password": password},
        function (data) {
            if (data !== "null") {
                $(location).attr("href", "home.php");

            } else {
                alertify.alert()
                    .setting({
                        'title': '¡Error!',
                        'label': 'Aceptar',
                        'message': 'Usuario o Contraseña incorrectos.'
                    }).show();
            }
        });
});