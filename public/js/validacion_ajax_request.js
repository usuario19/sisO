$(document).ready(function(e){
	$('input[name=email]').attr('autocomplete','false');
	$('input[name=password]').attr('autocomplete','false');
});
  $('#button_add').click(function(){
	
	$('input[name=email]').val('');
	
	$('input[name=password]').val('');
	
});
$("#form_create").submit(function(event) {
	/* Act on the event */
		event.preventDefault();
		var input = $('#form_create').find('input');
		var imagen = $('#imgOrigen');
		var textarea = $("#form_create").find('textarea');

        $.ajax({
            type: 'POST',
            url: '/administrador',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
		success: function(data){

			//window.location.reload();
			//document.getElementById("mensaje").style.visibility = 'visible';
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

			if(data.responseJSON.errors.nombre )
			{
				console.log("entro")
				$('#nombre').addClass('is-invalid');
				$('#nombre').next().addClass('invalid-feedback').text(data.responseJSON.errors.nombre);
			}
			else
			{
				$('#nombre').removeClass('is-invalid');
				$('#nombre').addClass('is-valid');
				$('#nombre').next().addClass('invalid-feedback').text(" ");
			}

			if (data.responseJSON.errors.apellidos ) {
				$('#apellidos').addClass('is-invalid');
				$('#apellidos').next().addClass('invalid-feedback').text(data.responseJSON.errors.apellidos);
			}
			else
			{
				$('#apellidos').removeClass('is-invalid');
				$('#apellidos').addClass('is-valid');
				$('#apellidos').next().addClass('invalid-feedback').text(" ");
			}
			if (data.responseJSON.errors.fecha_nac ) {
				$('#fecha_nac').addClass('is-invalid');
				$('#fecha_nac').next().addClass('invalid-feedback').text(data.responseJSON.errors.fecha_nac);
			}
			else
			{
				$('#fecha_nac').removeClass('is-invalid');
				$('#fecha_nac').addClass('is-valid');
				$('#fecha_nac').next().addClass('invalid-feedback').text(" ");
			}

			if (data.responseJSON.errors.ci ) {
				$('#ci').addClass('is-invalid');
				$('#ci').next().addClass('invalid-feedback').text(data.responseJSON.errors.ci);
			}
			else
			{
				$('#ci').removeClass('is-invalid');
				$('#ci').addClass('is-valid');
				$('#ci').next().addClass('invalid-feedback').text(" ");
			}

			if (data.responseJSON.errors.email ) {
				$('#email').addClass('is-invalid');
				$('#email').next().addClass('invalid-feedback').text(data.responseJSON.errors.email);
			}
			else
			{
				$('#email').removeClass('is-invalid');
				$('#email').addClass('is-valid');
				$('#email').next().addClass('invalid-feedback').text(" ");
			}

			if (data.responseJSON.errors.password ) {
				$('#password').addClass('is-invalid');
				$('#password').next().addClass('invalid-feedback').text(data.responseJSON.errors.password);
			}
			else
			{
				$('#password').removeClass('is-invalid');
				$('#password').addClass('is-valid');
				$('#password').next().addClass('invalid-feedback').text(" ");

				if (data.responseJSON.errors.password_confirmation ) {
					$('#password_confirmation').addClass('is-invalid');
					$('#password_confirmation').next().addClass('invalid-feedback').text(data.responseJSON.errors.password_confirmation);
				}
				else
				{
					$('#password_confirmation').removeClass('is-invalid');
					$('#password_confirmation').addClass('is-valid');
					$('#password_confirmation').next().addClass('invalid-feedback').text(" ");
				}
			}
			if (data.responseJSON.errors.descripcion_admin ) {
				$('#descripcion_admin').addClass('is-invalid');
				$('#descripcion_admin').next().addClass('invalid-feedback').text(data.responseJSON.errors.descripcion_admin);
			}
			else
			{
				$('#descripcion_admin').removeClass('is-invalid');
				$('#descripcion_admin').next().addClass('invalid-feedback').text(" ");
			}
		}

	});
});