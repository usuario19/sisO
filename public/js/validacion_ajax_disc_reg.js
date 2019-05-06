$(".form_disc_reg").submit(function(event) {
	/* Act on the event */
		event.preventDefault();
		$('.button_spiner').show();
		$('.btn_aceptar').hide();
		var form = event.target;
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
		success: function(data){

			$('.modal').modal('hide');
			window.location.reload();
		},
		error:function(data){
			console.log(data);
			$('.button_spiner').hide();
			$('.btn_aceptar').show();
			$.each(data.responseJSON.errors,function(indice,valor){

				console.log('div.'+form.id);
				$('div.'+form.id).addClass('errorLogin');
				$('div.'+form.id).text(valor);
			  });
		} 

	});
});