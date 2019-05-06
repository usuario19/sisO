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
			/* for (var i = 1; i < input.length; i++) {
				if(input[i].type != 'radio' && input[i].type != "date" && input[i].type != "submit")
					input[i].value ="";
			} */
			
			$("#buttonClose").click();
			window.location.reload();
			  
			//console.log(imagen);


			
		},
		error:function(data){
			$.each($('#form_create').find(':input'),function(){
				var indice =  $(this).attr('name');
				//console.log(indice);
				if(indice != "_token" && indice != undefined){
					if(data.responseJSON.errors[indice] )
					{
						$('#'+indice).addClass('is-invalid');
						$('#'+indice).next().addClass('invalid-feedback').text(data.responseJSON.errors[indice]);
					}
					else
					{
						$('#'+indice).removeClass('is-invalid');
						$('#'+indice).addClass('is-valid');
						$('#'+indice).next().addClass('invalid-feedback').text(" ");
						if(indice.indexOf('descripcion') > -1)
						{
							if($.trim($(this).val()).length < 1){
								$('#'+indice).removeClass('is-valid');
							}
						}
					}
				}
			});
		} 

	});
});