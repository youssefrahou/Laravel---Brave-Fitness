$(document).ready(function() {



    $("#actualizarPerfil").click(function() {
        ocultarTodo();
        $("#editarPerfil").show();

    });

    $("#cancelarAct").click(function() {
        ocultarTodo();

    });


    $('#anadirMedicion').click(function() {

        $("#modalAnadirMedicion").modal("show");

    });




});



function ocultarTodo() {
    $("#bienvenida").hide();
    $("#editarPerfil").hide();

}