$("#form_update").submit(function(event) {
	$('.button_spiner').show();
	$('.btn_aceptar').hide();
	event.preventDefault();
		$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
			success: function(data){

					/* $('.modal').modal('hide'); */
					window.location.reload();
			},
			error:function(data){
				$('.btn_aceptar').show();
				$('.button_spiner').hide();

				$.each($('#form_update').find(':input'),function(){
					var indice =  $(this).attr('name');
	
					if(indice != "_token" && indice != undefined){
						if(data.responseJSON.errors[indice])
						{
							$("#form_update").find(':input[name='+indice+']').addClass('is-invalid');
							$("#form_update").find(':input[name='+indice+']').next().addClass('invalid-feedback').text(data.responseJSON.errors[indice]);
						}
						else
						{
							if($(this).attr('type') != 'radio')
							{	
								$("#form_update").find(':input[name='+indice+']').removeClass('is-invalid');
								$("#form_update").find(':input[name='+indice+']').addClass('is-valid');
								$("#form_update").find(':input[name='+indice+']').next().text(" ");
									if(indice.indexOf('descripcion') > -1)
									{
										if($.trim($(this).val()).length < 1){
											$("#form_update").find(':input[name='+indice+']').removeClass('is-valid');
										}
									}
							}
						}
					}
				});
			}
		});
});