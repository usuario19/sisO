(function(){
	window.addEventListener('load', inicializarEventos, false)
	function inicializarEventos(){
		var texto_buscar = document.getElementById('buscar');
		texto_buscar.addEventListener('keydown', filtrar_datos, false)
		texto_buscar.addEventListener('keyup', filtrar_datos_completos, false)
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


				//console.log('null');
			}

		}else {
			for (var i = tr.length - 1; i >= 0; i--) {
			var tri = tr[i].children;
			var td = tr[i].children;
			var str = texto_buscar.value.trim();
			var str2 = String(td[3].innerHTML).trim();


			//console.log(td[3].innerHTML);
			//console.log(str.toLowerCase());
			//console.log(str2.toLowerCase());
			//console.log('--------------------')
			//console.log(String(td[3].innerHTML).indexOf(texto_buscar.value));
			//console.log(String(td[3].innerHTML));


				if((str2.toLowerCase()).indexOf(str.toLowerCase()) == -1){ //si no es encontrado
					//tr[i].style.visibility = 'hidden';
					tr[i].style.display = 'none';

					//console.log('entro');
				}
				else{//si es encontrado
					//tr[i].style.visibility = 'visible';
					tr[i].style.display = 'table-row';


				}
			}
		}

		
		
	}

	function filtrar_datos_completos(){
		var texto_buscar = document.getElementById('buscar');
		var datos = document.getElementById('datos');
		var tr = datos.children;

		if (texto_buscar.value == "") {
			for (var i = tr.length - 1; i >= 0; i--) {
				//tr[i].style.visibility = 'visible';
				//var td = tr[i].children;
				tr[i].style.display = 'table-row';


				//console.log('null');
			}

		}else {
			for (var i = tr.length - 1; i >= 0; i--) {
			var tri = tr[i].children;
			var td = tr[i].children;
			var str = texto_buscar.value.trim();
			var str2 = String(td[3].innerHTML).trim();


			//console.log(td[3].innerHTML);
			//console.log(str.toLowerCase());
			//console.log(str2.toLowerCase());
			//console.log('--------------------')
			//console.log(String(td[3].innerHTML).indexOf(texto_buscar.value));
			//console.log(String(td[3].innerHTML));


				if((str2.toLowerCase()).indexOf(str.toLowerCase()) == -1){ //si no es encontrado
					//tr[i].style.visibility = 'hidden';
					tr[i].style.display = 'none';

					//console.log('entro');
				}
				else{//si es encontrado
					//tr[i].style.visibility = 'visible';
					tr[i].style.display = 'table-row';


				}
			}
		}

		
		
	}

}());