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

    $('#contestarComentario2').click(function() {

        $("#modalContestarComentario2").modal("show");

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

    $("#marcarYResponder2").click(function() {
        $("#formMarcarYcontestar2").submit();
        $("#formuMmarcarYResponder2").submit();
    });


    $('#lateralChat').click(function() {

        ocultarTodo();
        $("#chat").show();

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
    $("#chat").hide();
}