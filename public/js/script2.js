(function(){
	window.addEventListener('load', inicializarEventos, true);
	
	var inicializarEventos = function(){
		var button = document.getElementById('buttonEnviar');
		button.addEventListener('click', filtrar, true);

	};

	var filtrar= function(){

		var club = document.getElementById('club').value;
		var genero = document.getElementById('genero').value;
		var info = "id_club="+a+"&genero="+b;

		var tabla = document.getElementById('datos');

		var route = location.hostname+"/coordinador/ver_misJugadores"

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState === 4 && xmlhttp.status === 200)
				var mensaje = xmlhttp.responseText;
			tabla.innerHTML = mensaje;
		}
		xmlhttp.open("POST",route,true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(info);
	}
	//console.log('hola');
}())