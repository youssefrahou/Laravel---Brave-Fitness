$(document).ready(function () {
    ocultarTodo();

    $("#verUsuarios").click(function () {
        ocultarTodo();
        $("#ensenarUsuarios").toggle();
    });



    




});



function ocultarTodo() {
    $("#ensenarUsuarios").hide();
}
