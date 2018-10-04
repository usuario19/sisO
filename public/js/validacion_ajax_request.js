
$("#form_create").submit(function(event) {
	/* Act on the event */
		event.preventDefault();
		var input = $('#form_create').find('input');
		var imagen = $('#imgOrigen');
		var textarea = $("#form_create").find('textarea');
		var archivo = new FileReader();

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
			document.getElementById("mensaje").style.display = 'block';
        	$("#btnCancelar").click();
			for (var i = 1; i < input.length; i++) {
				if(input[i].type != 'radio' && input[i].type != "date" && input[i].type != "submit")
					input[i].value ="";
			}
			textarea.val("");
			//console.log(imagen);


			
		},
		error:function(data){
			console.log(data)
			document.getElementById("mensaje").style.display = 'none';

			if(data.responseJSON.errors.nombre )
			{
				console.log("entro")
				document.getElementById("error_nombre").innerHTML =data.responseJSON.errors.nombre;
				document.getElementById("nombre").parentNode.setAttribute("class", "form-group col-md-6 siError");
			}
			else
			{
				document.getElementById("error_nombre").innerHTML = " " ;
				document.getElementById("nombre").parentNode.setAttribute("class", "form-group col-md-6 noError");

			}

			if (data.responseJSON.errors.apellidos ) {
				document.getElementById("error_apellidos").innerHTML =data.responseJSON.errors.apellidos;
				document.getElementById("apellidos").parentNode.setAttribute("class", "form-group col-md-6 siError");
					
			}
			else
			{
				document.getElementById("error_apellidos").innerHTML = " " ;
				document.getElementById("apellidos").parentNode.setAttribute("class", "form-group col-md-6 noError");
			}
			if (data.responseJSON.errors.fecha_nac ) {
				document.getElementById("error_fecha").innerHTML =data.responseJSON.errors.fecha_nac;
				document.getElementById("fecha_nac").parentNode.setAttribute("class", "form-group col-md-6 siError");
					
			}
			else
			{
				document.getElementById("error_fecha").innerHTML = " " ;
				document.getElementById("fecha_nac").parentNode.setAttribute("class", "form-group col-md-6 noError");
			}

			if (data.responseJSON.errors.ci ) {
				document.getElementById("error_ci").innerHTML =data.responseJSON.errors.ci;
				document.getElementById("ci").parentNode.setAttribute("class", "form-group col-md-6 siError");
					
			}
			else
			{
				document.getElementById("error_ci").innerHTML = " " ;
				document.getElementById("ci").parentNode.setAttribute("class", "form-group col-md-6 noError");
			}

			if (data.responseJSON.errors.email ) {
				document.getElementById("error_email").innerHTML =data.responseJSON.errors.email;
				document.getElementById("email").parentNode.setAttribute("class", "form-group col-md-12 siError");
					
			}
			else
			{
				document.getElementById("error_email").innerHTML = " " ;
				document.getElementById("email").parentNode.setAttribute("class", "form-group col-md-12 noError");
			}

			if (data.responseJSON.errors.password ) {
				document.getElementById("error_password").innerHTML =data.responseJSON.errors.password;
				document.getElementById("password").parentNode.setAttribute("class", "form-group col-md-6 siError");
					
			}
			else
			{
				document.getElementById("error_password").innerHTML = " " ;
				document.getElementById("password").parentNode.setAttribute("class", "form-group col-md-6 noError");
			}

			if (data.responseJSON.errors.password ) {
				document.getElementById("error_password").innerHTML =data.responseJSON.errors.password;
				document.getElementById("password").parentNode.setAttribute("class", "form-group col-md-6 siError");
					
			}
			else
			{
				document.getElementById("error_password").innerHTML = " " ;
				document.getElementById("password").parentNode.setAttribute("class", "form-group col-md-6 noError");
			}

			if (data.responseJSON.errors.password_confirmation ) {
				document.getElementById("error_confirmation").innerHTML =data.responseJSON.errors.password_confirmation;
				document.getElementById("password_confirmation").parentNode.setAttribute("class", "form-group col-md-6 siError");
					
			}
			else
			{
				document.getElementById("error_confirmation").innerHTML = " " ;
				document.getElementById("password_confirmation").parentNode.setAttribute("class", "form-group col-md-6 noError");
			}

			if (data.responseJSON.errors.descripcion_admin ) {
				document.getElementById("error_desc").innerHTML =data.responseJSON.errors.descripcion_admin;
				document.getElementById("descripcion_admin").parentNode.setAttribute("class", "form-group col-md-12 siError");
					
			}
			else
			{
				document.getElementById("error_desc").innerHTML = " " ;
				document.getElementById("descripcion_admin").parentNode.setAttribute("class", "form-group col-md-12 noError");
			}
		}

	});
});