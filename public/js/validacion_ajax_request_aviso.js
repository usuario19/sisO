$("#form_create").submit(function(event) {
	$('.button_spiner').show();
	$('.btn_aceptar').hide();
	console.log($(this).attr('action'))
		event.preventDefault();
        $.ajax({
            type: 'POST',
            url:$(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
		success: function(data){

        	/* $("#btnCancelar").click();
					for (var i = 1; i < input.length; i++) {
						if(input[i].type != 'radio' && input[i].type != "date" && input[i].type != "submit")
							input[i].value ="";
					}
					textarea.val("");
					$("#buttonClose").click(); */
			/* $('.modal').modal('hide'); */
			/* window.location.reload(); */
			window.location.href = "/avisos";
		},
		error:function(data){
			//console.log(data);
			$('.btn_aceptar').show();
			$('.button_spiner').hide();
			$.each($('#form_create').find(':input'),function(){
				var indice =  $(this).attr('name');

				if(indice != "_token" && indice != undefined){
					if(data.responseJSON.errors[indice])
					{
						$("#form_create").find(':input[name='+indice+']').addClass('is-invalid');
						$("#form_create").find(':input[name='+indice+']').next().addClass('invalid-feedback').text(data.responseJSON.errors[indice]);
					}
					else
					{
						if($(this).attr('type') != 'radio' && indice.indexOf('contenido') == -1)
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
						}
					}
				}
				
			});
			/* console.log(data);
			//console.log(data);
			$.each(data.responseJSON.errors,function(indice,valor){
				if(data.responseJSON.errors+"."+indice)
				{
					
					$("#form_create").find('input[name='+indice+']').addClass('is-invalid');
					$("#form_create").find('input[name='+indice+']').next().addClass('invalid-feedback').text(valor);
					$("#form_create").find('input[name='+indice+']').addClass('is-invalid');
					$("#form_create").find('input[name='+indice+']').next().addClass('invalid-feedback').text(valor);
				}
				else
				{
					$("#form_create").find('input[name='+indice+']').removeClass('is-invalid');
					$("#form_create").find('input[name='+indice+']').addClass('is-valid');
					$("#form_create").find('input[name='+indice+']').next().addClass('invalid-feedback').text(" ");
					$("#form_create").find('textarea[name='+indice+']').removeClass('is-invalid');
					$("#form_create").find('textarea[name='+indice+']').addClass('is-valid');
					$("#form_create").find('textarea[name='+indice+']').next().addClass('invalid-feedback').text(" ");
				}

				//console.log(indice + ' - ' + valor);
			  }); */
		} 

	});
});