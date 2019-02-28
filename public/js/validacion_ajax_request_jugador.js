$("#form-create-jug").submit(function(event) {
	/* Act on the event */
		event.preventDefault();
		var input = $('#form_create').find('input');
		var imagen = $('#imgOrigen');
		var textarea = $("#form_create").find('textarea');

        $.ajax({
            type: 'POST',
            url: '/jugador',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
		success: function(data){

			//window.location.reload();
			//document.getElementById("mensaje").style.visibility = 'visible';
			document.getElementById("mensaje").style.display = 'block';
        	$("#btnCancelar").click();
			for (var i = 1; i < input.length; i++) {
				if(input[i].type != 'radio' && input[i].type != "date" && input[i].type != "submit")
					input[i].value ="";
			}
			textarea.val("");
			$("#buttonClose").click();
			window.location.reload();
			  
			//console.log(imagen);


			
		},
		error:function(data){
			/* console.log(data) */
			/* document.getElementById("mensaje").style.display = 'none'; */

			if(data.responseJSON.errors.nombre_jugador )
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
				
			}
		}

	});
});