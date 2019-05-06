function timeout(){
    setTimeout(function(){
        window.location.reload();
	},2000,"JavaScript");
}
function toTop() {
    window.scrollTo(0, 0)
}
	
$("#form_update").submit(function(event) {
	event.preventDefault();
		$('.button_spiner').show();
		$('.btn_aceptar').hide();

		var input = $('#form_update').find('input');

		var textarea = $("#form_update").find('textarea');

		var value = $('#id').val();

		
		//console.log($('input[name="_token"]').attr('value'));
        
        $.ajax({
			type: 'POST',
            url: "/administrador/"+value+"",
			data: new FormData(this),
			//dataType: "json",
            contentType: false,
            cache: false,
			processData:false,
			
		success: function(data){
			/* toTop(); */
			/* document.getElementById("mensaje").style.display = 'block';
			timeout(); */
			window.location.reload();
		},
		error:function(data){
			console.log(data);
			$('.btn_aceptar').show();
			$('.button_spiner').hide();
			$.each($('#form_update').find(':input'),function(){
				var indice =  $(this).attr('name');
				console.log(indice);
				if(indice != "_token" && indice != undefined){
					if(data.responseJSON.errors[indice] )
				{
					$('#'+indice).addClass('is-invalid');
					$('#'+indice).next('div').addClass('invalid-feedback').text(data.responseJSON.errors[indice]);
				}
				else
				{
					$('#'+indice).removeClass('is-invalid');
					$('#'+indice).addClass('is-valid');
					$('#'+indice).next('div').addClass('invalid-feedback').text(" ");
					if(indice.indexOf('descripcion') > -1){
						if($.trim($(this).val()).length < 1){
							$('#'+indice).removeClass('is-valid');
						}
					}
					if(indice.indexOf('editar') > -1){
						$('#'+indice).removeClass('is-valid');
					}

					if(indice.indexOf('newpassword') > -1 || indice.indexOf('newpassword_confirmation') > -1){
						if(!$('#editar').is(':checked')){
							$('#'+indice).removeClass('is-valid');
						}
							
					}
				}
				}
				
			});


			//document.getElementById("mensaje").style.display = 'none';
			//console.log(data);
			/* $.each(data.responseJSON.errors,function(indice,valor){
				if(data.responseJSON.errors+"."+indice)
				{
					console.log("entro")
					$('#'+indice).addClass('is-invalid');
					$('#'+indice).next().addClass('invalid-feedback').text(valor);
				}
				else
				{
					$('#'+indice).removeClass('is-invalid');
					$('#'+indice).addClass('is-valid');
					$('#'+indice).next().addClass('invalid-feedback').text(" ");
				}

				//console.log(indice + ' - ' + valor);
		  	}); */

			/* if(data.responseJSON.errors.nombre )
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

			
			if (data.responseJSON.errors.descripcion_admin ) {
				$('#descripcion_admin').addClass('is-invalid');
				$('#descripcion_admin').next().addClass('invalid-feedback').text(data.responseJSON.errors.descripcion_admin);
			}
			else
			{
				$('#descripcion_admin').removeClass('is-invalid');
				$('#descripcion_admin').next().addClass('invalid-feedback').text(" ");
			}
			if (data.responseJSON.errors.mi_password ) {
				$('#mi_password').addClass('is-invalid');
				$('#mi_password').next().addClass('invalid-feedback').text(data.responseJSON.errors.mi_password);
			}
			else
			{
				$('#mi_password').removeClass('is-invalid');
				$('#mi_password').next().addClass('invalid-feedback').text(" ");
			}

			if(document.getElementById('editar').value == '1')
			if (data.responseJSON.errors.newpassword ) {
				$('#newpassword').addClass('is-invalid');
				$('#newpassword').next().addClass('invalid-feedback').text(data.responseJSON.errors.newpassword);
			}
			else
			{
				$('#newpassword').removeClass('is-invalid');
				$('#newpassword').next().addClass('invalid-feedback').text(" ");
			} */
		} 

	});
});