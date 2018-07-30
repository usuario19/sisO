(function(){
	window.addEventListener('load', inicializarEventos, false);
	//console.log('hola');

	function inicializarEventos(){
		//console.log('entro o');
		var button = document.getElementById('buttonLogin');
		button.addEventListener('click', comprobrar, false);

	};

	function comprobrar(e){
		//console.log('entro');
		//e.preventDefault();

		var a = document.getElementById('ci').value;
		var b = document.getElementById('password').value;
		var info = "ci="+a+"&password="+b;

		var div = document.getElementById('alert');

		var route = "login.store";
		console.log(route);

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState === 4 && xmlhttp.status === 200)
				var mensaje = xmlhttp.responseText;
				
			if (mensaje == "false") {
				console.log('false');
				e.preventDefault();
				div.innerHTML = mensaje;

				//window.location.href = location.host+'/welcome';
			}
				
		}
		xmlhttp.open("POST",route,true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
		xmlhttp.send(info);
	}
	//console.log('hola');
}())