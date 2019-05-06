function timeout(){
    setTimeout(function(){
        window.location.reload();
	},2000,"JavaScript");
}
function toTop() {
    window.scrollTo(0, 0)
}
	
$("#form-update-jugador").submit(function(event) {
	event.preventDefault();
		var value = $('#id').val();

		
		//console.log($('input[name="_token"]').attr('value'));
        
        $.ajax({
			type: 'POST',
            url: "/jugador/"+value+"",
			data: new FormData(this),
			//dataType: "json",
            contentType: false,
            cache: false,
			processData:false,
			
		success: function(data){
				toTop();
				window.location.reload();
		},
		error:function(data){
			/* console.log(data); */
			/* console.log(data); */
			$.each($('#form-update-jugador').find(':input'),function(){
				var indice =  $(this).attr('name');

				if(indice != "_token" && indice != undefined){
					console.log(indice);
					if(data.responseJSON.errors[indice])
					{
						console.log('entro');
						$(':input[name='+indice+']').addClass('is-invalid');
						$(':input[name='+indice+']').next().addClass('invalid-feedback').text(data.responseJSON.errors[indice]);
					}
					else
					{
						if($(this).attr('type') != 'radio')
						{	
								console.log('entro');
								$(':input[name='+indice+']').removeClass('is-invalid');
								$(':input[name='+indice+']').addClass('is-valid');
								$(':input[name='+indice+']').next().text(" ");
								if(indice.indexOf('descripcion') > -1)
								{
									if($.trim($(this).val()).length < 1){
										$('#'+indice).removeClass('is-valid');
									}
								}
						}
					}
				}
				
			});
			  
			/* if(data.responseJSON.errors.nombre_jugador )
			{
				
				$('input[name=nombre_jugador]').addClass('is-invalid').next().addClass('invalid-feedback').text(data.responseJSON.errors.nombre_jugador);;
			}
			else
			{
				$('input[name=nombre_jugador]').removeClass('is-invalid').addClass('is-valid').next().addClass('invalid-feedback').text(" ");
				
			}

			if (data.responseJSON.errors.apellidos_jugador ) {
				$('input[name=apellidos_jugador]').addClass('is-invalid').next().addClass('invalid-feedback').text(data.responseJSON.errors.apellidos_jugador);;
			}
			else
			{
				$('input[name=apellidos_jugador]').removeClass('is-invalid').addClass('is-valid').next().addClass('invalid-feedback').text(" ");
				
			}
			if (data.responseJSON.errors.fecha_nac_jugador ) {
				$('input[name=fecha_nac_jugador]').addClass('is-invalid').next().addClass('invalid-feedback').text(data.responseJSON.errors.fecha_nac_jugador);;
			}
			else
			{
				$('input[name=fecha_nac_jugador]').removeClass('is-invalid').addClass('is-valid').next().addClass('invalid-feedback').text(" ");
				
			}

			if (data.responseJSON.errors.ci_jugador ) {
				$('input[name=ci_jugador]').addClass('is-invalid').next().addClass('invalid-feedback').text(data.responseJSON.errors.ci_jugador);;
			}
			else
			{
				$('input[name=ci_jugador]').removeClass('is-invalid').addClass('is-valid').next().addClass('invalid-feedback').text(" ");
				
			}

			if (data.responseJSON.errors.email_jugador ) {
				$('input[name=email_jugador]').addClass('is-invalid').next().addClass('invalid-feedback').text(data.responseJSON.errors.email_jugador);;
			}
			else
			{
				$('input[name=email_jugador]').removeClass('is-invalid').addClass('is-valid').next().addClass('invalid-feedback').text(" ");
				
			}
			if (data.responseJSON.errors.descripcion_jugador ) {
				$('input[name=descripcion_jugador]').addClass('is-invalid').next().addClass('invalid-feedback').text(data.responseJSON.errors.descripcion_jugador);;
			}
			else
			{
				$('input[name=descripcion_jugador]').removeClass('is-invalid').addClass('is-valid').next().addClass('invalid-feedback').text(" ");
				
			} */
		}

	});
});