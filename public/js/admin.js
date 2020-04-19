$(document).ready(function () {
    
    

    $("#verUsuarios").click(function () {
        ocultarTodo();
        $("#ensenarUsuarios").css("display", "block");
        
    });

    $("#escribirArticulo").click(function () {
        ocultarTodo();
        $("#crearticulo").show();
    });

    




});



function ocultarTodo() {
    $("#bienvenida").css("display", "none");
    $("#ensenarUsuarios").css("display", "none");
    $("#crearticulo").css("display", "none");
}
