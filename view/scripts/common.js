//Select2
$('.select2-show-search').select2({
    minimumResultsForSearch: '',
    width: '100%'
});

$('.datepicker').datepicker();

function selectCiudad() {
    $.post("../controller/usuario.php?op=selectCiudad", function (r) {
        $("#ciudad").html(r);
    });
}

function selectSexo() {
    $.post("../controller/usuario.php?op=selectSexo", function (r) {
        $("#sexo").html(r);
    });
}

function selectTipoUsuario() {
    $.post("../controller/usuario.php?op=selectTipoUsuario", function (r) {
        $("#tipoUsuario").html(r);
    });
}

function selectTipoSangre() {
    $.post("../controller/usuario.php?op=selectTipoSangre", function (r) {
        $("#tipoSangre").html(r);
    });
}

function listarButton(controller, order) {
    return tabla = $('#tbllistado').DataTable(
        {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            "ajax":
                {
                    url: '../controller/' + controller + '.php?op=listar' /*ods.php?op=listar*/,
                    type: "get",
                    dataType: "json",
                    error: function (e) {
                        console.log(e.responseText);
                    }
                },
            "lengthChange": false,
            "dom": "<'row'<'col-sm-3'B><'col-sm-6 text-center'><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "buttons": [
                'copy', 'excel', 'pdf', 'print'
            ],
            "bDestroy": true,
            "iDisplayLength": 10,
            "order": [[0, order]]
        });
}

function listarId(controller, id) {
    return tabla = $('#tbllistado').DataTable(
        {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            "ajax":
                {
                    url: '../controller/' + controller + '.php?op=listar',
                    type: "post",
                    data: {idUsuario: id},
                    dataType: "json",
                    error: function (e) {
                        console.log(e.responseText);
                        alert(e.responseText);
                    }
                },
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false,
        });
}