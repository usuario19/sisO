(function(){
	window.addEventListener('load', inicializarEventos, false)
	function inicializarEventos(){
		var texto_buscar = document.getElementById('buscar');
		texto_buscar.addEventListener('keyup', filtrar_datos, false)
		//var tbody = document.getElementById('datos');

	}
	function filtrar_datos(){
		var texto_buscar = document.getElementById('buscar');
		var datos = document.getElementById('datos');
		var tr = datos.children;

		if (texto_buscar.value == "") {
			for (var i = tr.length - 1; i >= 0; i--) {
				//tr[i].style.visibility = 'visible';
				//var td = tr[i].children;
				tr[i].style.display = 'table-row';


				console.log('null');
			}

		}else {
			for (var i = tr.length - 1; i >= 0; i--) {
			var tri = tr[i].children;
			var td = tr[i].children;

			//console.log(td[3].innerHTML);
			console.log('--------------------')
			console.log(String(td[3].innerHTML).indexOf(texto_buscar.value));
			console.log(String(td[3].innerHTML));


				if(String(td[3].innerHTML).indexOf(texto_buscar.value) == -1){ //si no es encontrado
					//tr[i].style.visibility = 'hidden';
					tr[i].style.display = 'none';

					console.log('entro');
				}
				else{//si es encontrado
					//tr[i].style.visibility = 'visible';
					tr[i].style.display = 'table-row';


				}
			}
		}

		
		
	}

}());