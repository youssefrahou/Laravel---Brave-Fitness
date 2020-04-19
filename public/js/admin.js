$(document).ready(function () {
    
    

    $("#verUsuarios").click(function () {
        ocultarTodo();
        $("#ensenarUsuarios").show();
        
    });

    $("#escribirArticulo").click(function () {
        ocultarTodo();
        $("#crearticulo").show();
    });

    $("#verArticulos").click(function () {
        ocultarTodo();
        $("#ensenarArticulos").show();
    });

    $('li').css('cursor','pointer');

    



});



function ocultarTodo() {
    $("#bienvenida").hide();
    $("#ensenarUsuarios").hide();
    $("#crearticulo").hide();
    $("#ensenarArticulos").hide();
}
