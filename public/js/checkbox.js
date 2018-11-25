(function(){
	//window.addEventListener("load", inicializarEventos);
	if(document.getElementById("todo")){
		document.getElementById("todo").addEventListener("mouseover", inicializarEventos);
	}

	if(document.getElementById("todo_hab")){
		document.getElementById("todo_hab").addEventListener("mouseover", inicializarEventos);
	}
	
	function inicializarEventos(){
		//console.log('hola');
		var checkbox = document.getElementById("todo");
		checkbox.addEventListener("change", check);

		if(document.getElementById("todo_hab"))
		{
			var checkbox2 = document.getElementById("todo_hab");
			checkbox2.addEventListener("change", check);
		}
		
		
	}

	function check(e){
		
		var checkbox = e.target;
		
		if(checkbox.id === "todo"){
			var array = document.getElementsByClassName("check_us");
			for (var i = array.length - 1; i >= 0; i--) {
				array[i].checked = checkbox.checked;
			}
		}else {
			var array = document.getElementsByClassName("check_hab");
			for (var i = array.length - 1; i >= 0; i--) {
				array[i].checked = checkbox.checked;
			}
		}
		
	}
})();