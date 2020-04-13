$(document).ready(function () {
    ocultarTodo();

    $("#verUsuarios").click(function () {
        $("#ensenarUsuarios").toggle();
    });



});



function ocultarTodo(){
    $("#ensenarUsuarios").hide();
}