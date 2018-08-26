(function(){
	window.addEventListener("load", inicilizarEventos, false);
	function inicilizarEventos()
	{
		//document.getElementsByTagName("textarea")[0].addEventListener("focusout", validarDescripcion, false);
		var inputs = document.getElementsByTagName('input');
		for (var i = inputs.length - 1; i >= 0; i--) {
			inputs[i].addEventListener("focusout", validarFormulario, false);
		}
	}

	/*function validarDescripcion(){
		if(document.getElementsByTagName("textarea")[0].value != "")
			{
				//console.log("entro")
				document.getElementById("error_desc").innerHTML = " " ;
				elemento.parentNode.setAttribute("class", "form-group col-md-6 noError");
			}
			else
			{
				document.getElementById("error_desc").innerHTML ="Es necesario poner la descripcion.";
				document.getElementsByTagName("textarea")[0].parentNode.setAttribute("class", "form-group col-md-12 siError");
			}
	}*/

	function validarTexto(texto){
	/*Esta expresion indica permite letras 0 o mas mas un espacio puede haber varias palabras*/
		var res = texto.match(/^[A-Za-z.\s]+$/);
		 return res;		
	}

	function validarCI(texto){
	 	var res = texto.match(/^([0-9]){6,13}$/);
	 	return res;
	}

	function validarEmail(texto){
	 	var res = texto.match(/^[-\w.+]{1,64}@(?:[A-Za-z0-9]{1,63}\.)([a-zA-Z]{1,64})$/);
	 	return res;
	}

	function validarContrasenia(texto){
	 	var res = texto.match(/^[\w*.\s]{6,20}/);
	 	return res;
	}

	function validarFormulario(e){
		//console.log(e.target.name)
		var elemento = e.target;
		if(elemento.name.indexOf("nombre") != -1 )
		{
			//console.log(validarTexto(elemento.value))
			if(validarTexto(elemento.value))
			{
				//console.log("entro")
				document.getElementById("error_nombre").innerHTML = " " ;
				elemento.parentNode.setAttribute("class", "form-group col-md-6 noError");
			}
			else
			{
				document.getElementById("error_nombre").innerHTML ="Solo se permite letras.";
				elemento.parentNode.setAttribute("class", "form-group col-md-6 siError");
			}

		}else if (elemento.name.indexOf("apellidos") != -1  ) {
			//console.log(elemento.value)
			if(validarTexto(elemento.value))
			{
				document.getElementById("error_apellidos").innerHTML = " " ;
				elemento.parentNode.setAttribute("class", "form-group col-md-6 noError");
			}
			else
			{
				document.getElementById("error_apellidos").innerHTML ="Solo se permite letras.";
				elemento.parentNode.setAttribute("class", "form-group col-md-6 siError");
			}
		}else if (elemento.name.indexof("fecha_nac") != -1) {
			var fechaHoy = new Date;
			var fecha = elemento.value

			/*console.log(fechaHoy.getFullYear())
			console.log(fecha.split("-",1)-fechaHoy.getFullYear())*/

			if ((fechaHoy.getFullYear()-fecha.split("-",1))<17 || (fechaHoy.getFullYear()-fecha.split("-",1))>100) {
				document.getElementById("error_fecha").innerHTML ="Revise la fecha de nacimiento";
				elemento.parentNode.setAttribute("class", "form-group col-md-6 siError");
			}else{
				document.getElementById("error_fecha").innerHTML = " " ;
				elemento.parentNode.setAttribute("class", "form-group col-md-6 noError");
			}
		}else if (elemento.name.indexOf("ci") != -1 ) {
			if(validarCI(elemento.value))
			{
				var a = elemento.value;
				//var b = document.getElementById('password').value;
				var info = "ci="+a;

				var div = document.getElementById('error_ci');

				var route = "/administrador/validarCI";
				console.log(route);

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					//var mensaje = " ";
					if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
						var mensaje = xmlhttp.responseText;
						if (mensaje == "false") {
						console.log('false');
						document.getElementById("error_ci").innerHTML = " " ;
						elemento.parentNode.setAttribute("class", "form-group col-md-6 noError");
						//window.location.href = location.host+'/welcome';
						} else{
							document.getElementById("error_ci").innerHTML ="Este ci ya está en uso.";
							elemento.parentNode.setAttribute("class", "form-group col-md-6 siError");
						}
					}
					else{
						console.log('else')
						document.getElementById("error_ci").innerHTML = " " ;
						elemento.parentNode.setAttribute("class", "form-group col-md-6 noError");
					}
						
					
						
				}
				xmlhttp.open("POST",route,true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
				xmlhttp.send(info);
				//console.log("entro")
				
			}else{

				document.getElementById("error_ci").innerHTML ="Carnet de identidad no válido";
				elemento.parentNode.setAttribute("class", "form-group col-md-6 siError");
			}
		}else if (elemento.name.indexOf("email") != -1  ) {
			if(validarEmail(elemento.value))
			{
				//console.log("entro")
				document.getElementById("error_email").innerHTML = " " ;
				elemento.parentNode.setAttribute("class", "form-group col-md-12 noError");
			}
			else
			{
				document.getElementById("error_email").innerHTML ="Correo electronico no válido";
				elemento.parentNode.setAttribute("class", "form-group col-md-12 siError");
			}
		}else if (elemento.name == "password") {
			if(validarContrasenia(elemento.value))
			{
				//console.log("entro")
				document.getElementById("error_password").innerHTML = " " ;
				elemento.parentNode.setAttribute("class", "form-group col-md-6 noError");
			}
			else
			{
				document.getElementById("error_password").innerHTML ="Contraseña no segura.";
				elemento.parentNode.setAttribute("class", "form-group col-md-6 siError");
			}
		}else if (elemento.name == "password_confirmation") {
			//console.log(document.getElementsByName("password").value)
			if(elemento.value == document.getElementsByName("password")[0].value)
			{
				//console.log("entro")
				document.getElementById("error_confirmation").innerHTML = " " ;
				elemento.parentNode.setAttribute("class", "form-group col-md-6 noError");
			}
			else
			{
				document.getElementById("error_confirmation").innerHTML ="Las Contraseñas no coinciden.";
				elemento.parentNode.setAttribute("class", "form-group col-md-6 siError");
			}
		}
	}

}())