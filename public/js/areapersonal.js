$(document).ready(function() {



    $("#actualizarPerfil").click(function() {
        ocultarTodo();
        $("#editarPerfil").show();

    });




});



function ocultarTodo() {
    $("#editarPerfil").hide();
}