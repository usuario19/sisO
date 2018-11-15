(function(){
	//window.addEventListener("load", inicializarEventos);
	if(document.getElementById("todo") && document.getElementById("todo_hab")){
		document.getElementById("todo").addEventListener("mouseover", inicializarEventos);
		document.getElementById("todo_hab").addEventListener("mouseover", inicializarEventos);
	}
	
	function inicializarEventos(){
		//console.log('hola');
		var checkbox = document.getElementById("todo");
		var checkbox2 = document.getElementById("todo_hab");
		checkbox.addEventListener("change", check);
		checkbox2.addEventListener("change", check);
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
}())