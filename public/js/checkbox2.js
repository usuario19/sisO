(function() {
    //window.addEventListener("load", inicializarEventos);
    if (document.getElementById("todo2")) {
        document.getElementById("todo2").addEventListener("mouseover", inicializarEventos);
    }

    if (document.getElementById("todo_hab2")) {
        document.getElementById("todo_hab2").addEventListener("mouseover", inicializarEventos);
    }

    function inicializarEventos() {
        //console.log('hola');
        var checkbox = document.getElementById("todo2");
        checkbox.addEventListener("change", check);

        if (document.getElementById("todo_hab2")) {
            var checkbox2 = document.getElementById("todo_hab2");
            checkbox2.addEventListener("change", check);
        }


    }

    function check(e) {

        var checkbox = e.target;

        if (checkbox.id === "todo2") {
            var array = document.getElementsByClassName("check_us");
            for (var i = array.length - 1; i >= 0; i--) {
                array[i].checked = checkbox.checked;
            }
        } else {
            var array = document.getElementsByClassName("check_hab2");
            for (var i = array.length - 1; i >= 0; i--) {
                array[i].checked = checkbox.checked;
            }
        }

    }
})();