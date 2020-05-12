$(document).ready(function() {



    $("#actualizarPerfil").click(function() {
        ocultarTodo();
        $("#editarPerfil").show();

    });

    $("#cancelarAct").click(function() {
        ocultarTodo();

    });





});



function ocultarTodo() {
    $("#bienvenida").hide();
    $("#editarPerfil").hide();

}