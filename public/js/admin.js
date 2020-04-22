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

    $('#contestarComentario').click(function() {

        $("#modalContestarComentario").modal("show");

    });



    $("#verComentarios").click(function() {
        ocultarTodo();
        $("#ensenarComentarios").show();
    });

    $("#verComentariosSinLeer").click(function() {
        ocultarTodo();
        $("#ensenarComentariosSinLeer").show();
    });


    $("#enviarYmarcar").click(function() {
        $("#formLeidoMarc").submit();
        $("#formRespuestaLeid").submit();
    });




});



function ocultarTodo() {
    $("#bienvenida").hide();
    $("#ensenarUsuarios").hide();
    $("#crearticulo").hide();
    $("#ensenarArticulos").hide();
    $("#ensenarConsejos").hide();
    $("#ensenarComentarios").hide();
    $("#ensenarComentariosSinLeer").hide();
}