$(document).ready(function() {

    $(".alert-success").alert();
    window.setTimeout(function() {
        $(".alert-success").alert('close');
    }, 2500);

});