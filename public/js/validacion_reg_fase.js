$("#reg_fase").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '/fase/store',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(error) {
            location.reload();
        },
        error: function(error) {
            //console.log(data);
            if (error.responseJSON.errors.nombre_fase) {
                $('input[name=nombre]').addClass("is-invalid");
                $("#error_nombre").addClass("invalid-feedback");
                $("#error_nombre").html(error.responseJSON.errors.nombre_fase);
            }
        }
    })
});