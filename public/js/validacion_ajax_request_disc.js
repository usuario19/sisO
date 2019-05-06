$("#form_create").submit(function(event) {
		event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/disciplina/store',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
		success: function(data){
			$('.modal').modal('hide');
			window.location.reload();
		},
		error:function(data){
			console.log(data)
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
						if($(this).attr('type') != 'radio')
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
								if(indice.indexOf('reglamento') > -1)
								{
									if($.trim($(this).val()).length < 1){
										$("#form_create").find(':input[name='+indice+']').removeClass('is-valid');
									}
								}
						}
					}
				}
				
			});
		} 

	});
});