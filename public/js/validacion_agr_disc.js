$(document).ready(function() {
    $('#form_reg_disc').submit(function(event) {
        event.preventDefault();
        var error = 0;
        if (!($('#id_disc').is(':checked'))) {
            error = 1
                //$('#id_disc').addClass("is-invalid");
                //$("#error_disc").addClass("invalid-feedback");
            $("#error_disc").html("Debe seleccionar una opcion minimamente");
            $("#error_disc").css("color", "red");
        } else {
            event.currentTarget.submit();
        }

    });
});