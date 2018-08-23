(function(){
	
	window.addEventListener('load', inicializarEventos, false);
	//console.log('hola');

	function inicializarEventos(){
		//console.log('entro o');
		var button = document.getElementById('buttonReg');
		button.addEventListener('click', comprobrar, false);

	};

	function comprobrar(e){
		//console.log('entro');

		e.preventDefault();
		var nombre=document.getElementsByName('nombre')[0].value;
		var apellidos=document.getElementsByName('apellidos')[0].value;
		var genero=document.getElementsByName('genero').value;
		var fecha_nac=document.getElementsByName('fecha_nac')[0].value;
		var ci=document.getElementsByName('ci')[0].value;
		var email=document.getElementsByName('email')[0].value;
		var password=document.getElementsByName('password')[0].value;
		var password_confirmation=document.getElementsByName('password_confirmation')[0].value;
		var descripcion_admin = document.getElementsByName('descripcion_admin')[0].value;
		var foto_admin=document.getElementsByName('foto_admin')[0].value;
		console.log(nombre)

		var datos = {"nombre":nombre, 
					"apellidos":apellidos, 
					"genero":genero,
					"fecha_nac":fecha_nac, 
					"ci":ci,
					"email":email,
					"password":password,
					"password_confirmation":password_confirmation, 
					"descripcion_admin":descripcion_admin,
					"foto_admin":foto_admin};
		var info = JSON.stringify(datos);

		console.log(info)

/*		var info ="nombre="+nombre+"&apellidos="+apellidos+"&genero="+genero+"&fecha_nac="+fecha_nac+"&ci="+ci+"&email="+email+"&password="+password+"&password_confirmation="+password_confirmation+"&foto_admin="+foto_admin;
*/
		//var info = "ci="+a+"&password="+b;

		var div = document.getElementsByClassName('form-group errorLogin')[0];

		var route = "/administrador";
		//console.log(route);

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState === 4 && xmlhttp.status === 200)
				var mensaje = xmlhttp.response;
				mensaje->Errors;
				div.innerHTML = mensaje;

				//window.location.href = location.host+'/welcome';
			}
				
		
		xmlhttp.open("POST",route,true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
		xmlhttp.send(info);

	}
	//*///console.log('hola');
}())