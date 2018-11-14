(function(){
	window.addEventListener('load', inicializarEventos, false);
	//document.getElementById('buscar').addEventListener('focus', inicializarEventos, false);
	if(document.getElementById('buscar2'))
		document.getElementById('buscar2').addEventListener('focus', inicializarEventos, false);
	if(document.getElementById('buscar'))
	document.getElementById('buscar').addEventListener('focus', inicializarEventos, false);

	function inicializarEventos(){
		if(document.getElementById('buscar'))
		document.getElementById('buscar').addEventListener('keyup', filtrar_datos_completos, false);
		
		
		if(document.getElementById('buscar2'))
		document.getElementById('buscar2').addEventListener('keyup', filtrar_datos_completos, false);

	}
	function filtrar_datos(){
		var texto_buscar = document.getElementById('buscar');
		var datos = document.getElementById('datos');
		var tr = datos.children;

		if (texto_buscar.value == "") {
			for (var i = tr.length - 1; i >= 0; i--) {
				tr[i].style.display = 'table-row';

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

	function filtrar_datos_completos(e){
		if(e.target.id == 'buscar'){
			var texto_buscar = document.getElementById('buscar');
			var datos = document.getElementById('datos');
		}
		else{
			if(e.target.id == 'buscar2'){
				var texto_buscar = document.getElementById('buscar2');
				var datos = document.getElementById('datos2');
			}
		}
			
		
		
		//console.log(datos);
		var tr = datos.children;
	
		//console.log(tr)

		if (texto_buscar.value == "") {
			for (var i = tr.length - 1; i >= 0; i--) {
				//tr[i].style.visibility = 'visible';
				//var td = tr[i].children;
				tr[i].style.display = 'table-row';


				//console.log('null');
			}

		}else {
			
			for (var i = tr.length - 1; i >= 0; i--) {
				//var tri = tr[i].children;
				//console.log(tri);
				//console.log(tr[i].tagName)

				if(tr[i].tagName == 'TR')
				{
					var td = tr[i].children;
					var str = texto_buscar.value;
					//console.log(td[3]);
					var str2 = String(td[3].innerHTML);
					var str3 = String(td[2].innerHTML);


					//console.log(td[3].innerHTML);

					if((str2.toLowerCase()).indexOf(str.toLowerCase()) == -1 && (str3.toLowerCase()).indexOf(str.toLowerCase()) == -1){ //si no es encontrado
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

		
		
	}

}());