$(document).ready(function () {

    $("#comentar").click(function () {
        $("#formComentario").show();
        $("#comentar").hide();
        $("#noComentario").hide();

        //activar model para comentar
        $("#modalComentar").modal("show");
    });







    //activar model de añadir categoria
    $('#selectCate').change(function () {
        if ($(this).val() === 'anadir') {
            $("#modalCategoria").modal("show");
        }
    });


    //activar model para inciar sesion
    $('#iniciarSesion').click(function () {

        $("#modalIniciarSesion").modal("show");

    });







});
