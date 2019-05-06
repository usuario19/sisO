$("#reg_fase").submit(function(event) {
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
                $("#error_nombre").addClass("invalid-feedback");
                $("#error_nombre").html(data.responseJSON.errors.nombre); 
            }
        }
        
    })
});