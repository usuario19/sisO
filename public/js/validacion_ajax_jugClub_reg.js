$(".form_reg_jugClub").submit(function(event) {
	/* Act on the event */
		event.preventDefault();
		var form_rc = event.target;
        $.ajax({
            type: 'POST',
            url: '/inscripcion_jugador',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
		success: function(data){

			$('.modal').modal('hide');
			window.location.reload();
		},
		error:function(data){
			$.each(data.responseJSON.errors,function(indice,valor){
				$("div."+form_rc.id).addClass('errorLogin');
				$("div."+form_rc.id).text(valor);
			  });
		} 

	});
});