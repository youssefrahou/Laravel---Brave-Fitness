$(document).ready(function () {
    ocultarTodo();

    $("#verUsuarios").click(function () {
        ocultarTodo();
        $("#ensenarUsuarios").toggle();
    });



    $("#anadirCategoria").click(function () {
        alert("pulsado");
        $("#modalCategoria").modal("show");

    });




});



function ocultarTodo() {
    $("#ensenarUsuarios").hide();
}
