(function(){
	window.addEventListener('load', inicializarEventos, false);
	//console.log('hola');

	function inicializarEventos(){
		listar();
		console.log('entro o');
		var select = document.getElementsByTagName('select');
		for (var i = select.length - 1; i >= 0; i--) 
		{
			console.log('entro o2');
			select[i].addEventListener('change', filtrar, false);
		}

	}

	function listar(){
		var a = 0;
		var b = 0;
		var info = "club="+a+"&genero="+b;
		var route = '/coordinador/filtrar';
		//console.log(route);
		var div = document.getElementById('datos');
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState === 4 && xmlhttp.status === 200)
				var mensaje = xmlhttp.responseText;
				div.innerHTML = mensaje;
				//console.log(mensaje);
				
		}
		xmlhttp.open("POST",route,true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
		xmlhttp.send(info);
	}

	function filtrar(){
		//console.log('entro');
		//e.preventDefault();
		var a = document.getElementById('club').value;
		var b = document.getElementById('genero').value;
		var info = "club="+a+"&genero="+b;

		var div = document.getElementById('datos');

		var route = '/coordinador/filtrar';
		//console.log(route);

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState === 4 && xmlhttp.status === 200)
				{
					var mensaje = xmlhttp.responseText;
								div.innerHTML = mensaje;
								//console.log(mensaje);
				}
				
		}
		xmlhttp.open("POST",route,true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
		xmlhttp.send(info);
	}
	//console.log('hola');
}())