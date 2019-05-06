$("#form-create-jug").submit(function(event) {
	/* Act on the event */
		event.preventDefault();
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
			/* document.getElementById("mensaje").style.display = 'block';
        	$("#btnCancelar").click();
			for (var i = 1; i < input.length; i++) {
				if(input[i].type != 'radio' && input[i].type != "date" && input[i].type != "submit")
					input[i].value ="";
			}
			textarea.val(""); */
			$("#buttonClose").click();
			window.location.reload();
			  
			//console.log(imagen);


			
		},
		error:function(data){
			/* document.getElementById("mensaje").style.display = 'none'; */
			$.each($('#form-create-jug').find(':input'),function(){
				var indice =  $(this).attr('name');

				if(indice != "_token" && indice != undefined){
					if(data.responseJSON.errors[indice])
					{
						$(':input[name='+indice+']').addClass('is-invalid');
						$(':input[name='+indice+']').next().addClass('invalid-feedback').text(data.responseJSON.errors[indice]);
					}
					else
					{
						if($(this).attr('type') != 'radio')
						{	
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
		}

	});
});