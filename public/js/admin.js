$(document).ready(function () {
    
    ocultarTodo();
    $("#bienvenida").show();

    $("#verUsuarios").click(function () {
        ocultarTodo();
        $("#ensenarUsuarios").toggle();
        
    });

    $("#escribirArticulo").click(function () {
        ocultarTodo();
        $("#crearticulo").show();
    });

    




});



function ocultarTodo() {
    $("#ensenarUsuarios").hide();
    $("#crearticulo").hide();
}
