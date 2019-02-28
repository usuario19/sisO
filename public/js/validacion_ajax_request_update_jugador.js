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

		var input = $('#form_update').find('input');

		var textarea = $("#form_update").find('textarea');

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