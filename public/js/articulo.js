$(document).ready(function() {

    $("#comentar").click(function() {
        $("#formComentario").show();
        $("#comentar").hide();
        $("#noComentario").hide();

        //activar model para comentar
        $("#modalComentar").modal("show");
    });

    $('#mostrarComments').click(function() {

        $("#comments").toggle();
        icon = $("#bajarSubir");
        //fas fa-arrow-down fa-2x

        if (icon.hasClass("fa-arrow-up")) {
            icon.addClass("fa-arrow-down").removeClass("fa-arrow-up");
        } else {
            icon.addClass("fa-arrow-up").removeClass("fa-arrow-down");
        };

        //$("#bajarSubir").toggleClass("fas fa-arrow-up fa-2x");


    });



    //activar model de añadir categoria
    $('#selectCate').change(function() {
        if ($(this).val() === 'anadir') {
            $("#modalCategoria").modal("show");
        }
    });


});