$(document).ready(function() {

    $(".alert-success").alert();
    window.setTimeout(function() {
        $(".alert-success").alert('close');
    }, 2500);

    $(window).keydown(function(event) { //Al pulsar enter NO ENVIAR FORMULARIO
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".botonEnviarMensaje").click(function() {

        $.ajax({
            url: 'mensaje',
            method: 'post',
            data: $("#formMensaje").serialize(),
            type: 'post',
            success: function(response) {

            },
            statusCode: {
                404: function() {
                    alert('web not found');
                }
            },
            error: function(x, xs, xt) {

                //window.open(JSON.stringify(x));
                alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
            }
        });


        $("#textoEnviar").val("");



    });














});