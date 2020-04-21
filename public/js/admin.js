$(document).ready(function() {



    $("#verUsuarios").click(function() {
        ocultarTodo();
        $("#ensenarUsuarios").show();

    });

    $("#escribirArticulo").click(function() {
        ocultarTodo();
        $("#crearticulo").show();
    });

    $("#verArticulos").click(function() {
        ocultarTodo();
        $("#ensenarArticulos").show();
    });

    $('li').css('cursor', 'pointer');

    $("#verConsejos").click(function() {
        ocultarTodo();
        $("#ensenarConsejos").show();
    });


    $('#anadirConsejo').click(function() {

        $("#modalConsejo").modal("show");

    });

    $("#verComentarios").click(function() {
        ocultarTodo();
        $("#ensenarComentarios").show();
    });

    $("#verComentariosSinLeer").click(function() {
        ocultarTodo();
        $("#ensenarComentariosSinLeer").show();
    });





});



function ocultarTodo() {
    $("#bienvenida").hide();
    $("#ensenarUsuarios").hide();
    $("#crearticulo").hide();
    $("#ensenarArticulos").hide();
    $("#ensenarConsejos").hide();
}