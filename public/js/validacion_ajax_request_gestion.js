$("#form_create").submit(function(event) {
		event.preventDefault();
		$('.button_spiner').show();
		$('.btn_aceptar').hide();

        $.ajax({
            type: 'POST',
            url: '/gestion/store',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
		success: function(data){
			/* $('.modal').modal('hide'); */
			window.location.reload();
		},
		error:function(data){
			console.log(data)
			$('.btn_aceptar').show();
			$('.button_spiner').hide();
			$.each($('#form_create').find(':input'),function(){
				var indice =  $(this).attr('name');
				if(indice == "disciplinas[]")
					indice = 'disciplinas';

				if(indice != "_token" && indice != undefined){
					if(data.responseJSON.errors[indice])
					{
						
						if(indice.indexOf('disciplinas') > -1)
						{
								$("div.check_info").addClass('errorLogin').text(data.responseJSON.errors[indice]);
								/* $("div.check_info").addClass('is-invalid'); */
						}else{
							$("#form_create").find(':input[name='+indice+']').addClass('is-invalid');
							$("#form_create").find(':input[name='+indice+']').next().addClass('invalid-feedback').text(data.responseJSON.errors[indice]);
						}
					}
					else
					{
						if($(this).attr('type') != 'ckeckbox')
						{	
							$("#form_create").find(':input[name='+indice+']').removeClass('is-invalid');
							$("#form_create").find(':input[name='+indice+']').addClass('is-valid');
							$("#form_create").find(':input[name='+indice+']').next().text(" ");

								if(indice.indexOf('descripcion') > -1)
								{
									if($.trim($(this).val()).length < 1){
										$("#form_create").find(':input[name='+indice+']').removeClass('is-valid');
									}
								}
								if(indice.indexOf('id_disciplinas') > -1)
								{
										$("div.check_info").addClass('invalid-feedback').text("");
										/* $("div.check_info").addClass('is-invalid'); */
								}
						}
					}
				}
				
			});
		} 

	});
});