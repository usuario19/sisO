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

		var input = $('#form_update').find('input');

		var textarea = $("#form_update").find('textarea');

		var value = $('#id').val();

		
		//console.log($('input[name="_token"]').attr('value'));
        
        $.ajax({
			type: 'POST',
            url: "/administrador/update/"+value+"",
			data: new FormData(this),
			//dataType: "json",
            contentType: false,
            cache: false,
			processData:false,
			
		success: function(data){
			toTop();
			document.getElementById("mensaje").style.display = 'block';
			timeout();
			window.location.reload();
		},
		error:function(data){
			//document.getElementById("mensaje").style.display = 'none';
			console.log(data);
			if(data.responseText.errors.nombre )
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

				/* if (data.responseJSON.errors.password_confirmation ) {
					$('#password_confirmation').addClass('is-invalid');
					$('#password_confirmation').next().addClass('invalid-feedback').text(data.responseJSON.errors.password_confirmation);
				}
				else
				{
					$('#password_confirmation').removeClass('is-invalid');
					$('#password_confirmation').addClass('is-valid');
					$('#password_confirmation').next().addClass('invalid-feedback').text(" ");
				} */
			}
		}

	});
});