$(document).ready(function() {


    var form_count = 1,
        previous_form, next_form, total_forms;
    total_forms = $("fieldset").length;

    $(".next-form").click(function() {
        previous_form = $(this).parent();
        next_form = $(this).parent().next();
        next_form.show();
        previous_form.hide();
        setProgressBarValue(++form_count);
    });

    $(".previous-form").click(function() {
        previous_form = $(this).parent();
        next_form = $(this).parent().prev();
        next_form.show();
        previous_form.hide();
        setProgressBarValue(--form_count);
    });
    setProgressBarValue(form_count);

    function setProgressBarValue(value) {
        var percent = parseFloat(100 / total_forms) * value;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
            .html(percent + "%");
    }
    // Handle form submit and validation
    $("#register_form").submit(function(event) {

        var error_message = '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p class="text-dark">Hay los siguientes errores:</p>';

        if (!$("#email").val()) {
            error_message += "Please Fill Email Address<br>";
        }
        if (!$("#password").val()) {
            error_message += "Please Fill Password<br>";
        }
        if (!$("#mobile").val()) {
            error_message += "Please Fill Mobile Number<br>";
        }

        // Display error if any else submit form
        if (error_message) {
            $('#DivErrores').show().html(error_message);

            form_count = 1;
            previous_form = $("fieldset:not(:first)");
            next_form = $("fieldset").first();
            next_form.show();
            previous_form.hide();
            setProgressBarValue(form_count);


            return false;
        } else {
            return true;
        }
    });




    $("#lesionado").click(function() {
        if (this.checked) {
            $("#mostrarLesionado").show();
        }
        if (!this.checked) {
            $("#mostrarLesionado").hide();
        }
    });

});