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
			if(document.getElementById("mi_password"))
				document.getElementById("mi_password").value = "";

			document.getElementById("mensaje").style.display = 'block';
			toTop();
			timeout();
		},
		error:function(data){
			//document.getElementById("mensaje").style.display = 'none';
			//console.log(data);
			if(data.responseJSON.errors.nombre)
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
			if (data.responseJSON.errors.descripcion_admin ) {
				document.getElementById("error_desc").innerHTML =data.responseJSON.errors.descripcion_admin;
				document.getElementById("descripcion_admin").parentNode.setAttribute("class", "form-group col-md-12 siError");
					
			}
			else
			{
				document.getElementById("error_desc").innerHTML = " " ;
				document.getElementById("descripcion_admin").parentNode.setAttribute("class", "form-group col-md-12 noError");
			}
			
			if (data.responseJSON.errors.mi_password ) {
				document.getElementById("error_mi_password").innerHTML = data.responseJSON.errors.mi_password;
				document.getElementById("mi_password").parentNode.setAttribute("class", "form-group col-md-6 siError");
					
			}
			else
			{
				document.getElementById("error_mi_password").innerHTML = " " ;
				document.getElementById("mi_password").parentNode.setAttribute("class", "form-group col-md-6 noError");
			}

			if(document.getElementById('editar').value == '1')
				if (data.responseJSON.errors.newpassword ) {
					document.getElementById("error_newpassword").innerHTML =data.responseJSON.errors.newpassword;
					document.getElementById("newpassword").parentNode.setAttribute("class", "form-group col-md-6 siError");
						
				}
				else
				{
					document.getElementById("error_newpassword").innerHTML = " " ;
					document.getElementById("newpassword").parentNode.setAttribute("class", "form-group col-md-6 noError");
				}
		}

	});
});