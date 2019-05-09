$("#reg_fase").submit(function(event) {
<<<<<<< HEAD
    /* Act on the event */
        $('.button_spiner').show();
		$('.btn_aceptar').hide();
		event.preventDefault();
		/* var input = $('#form_create').find('input');
		var imagen = $('#imgOrigen');
		var textarea = $("#form_create").find('textarea');
		var archivo = new FileReader(); */

        $.ajax({
            type: 'POST',
            url: '/fase/store',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
		success: function(data){
            location.reload();
		},
		error:function(data){
            $('.button_spiner').hide();
		    $('.btn_aceptar').show();
            if(data.responseJSON.errors.nombre )
			{
                $('input[name=nombre]').addClass( "is-invalid" );
=======
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
                $('input[name=nombre_fase]').addClass("is-invalid");
>>>>>>> refs/remotes/origin/master
                $("#error_nombre").addClass("invalid-feedback");
                $("#error_nombre").html(error.responseJSON.errors.nombre_fase);
            }
        }
    })
});