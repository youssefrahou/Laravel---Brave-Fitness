$(document).ready(function () {

    $("#comentar").click(function () {
        $("#formComentario").show();
        $("#comentar").hide();
        $("#noComentario").hide();
    });

//activar model de añadir categoria
    $('#selectCate').change(function () {
        if ($(this).val() === 'anadir') {
            $("#modalCategoria").modal("show");
        }
    });


});
