(function(){
    window.addEventListener("load", inicializarEventos, false);
    document.getElementById('contenido').addEventListener("mouseover", inicializarEventos, false);
    function inicializarEventos(){
      tr = document.getElementsByClassName("link_pointer");
        for(var i =0; i<tr.length;i++)
          tr[i].addEventListener("click", redirect, false);
    }
    function redirect(e){
      elemento = e.target;
      if(elemento.className.indexOf('button_redirect') == -1)
       {
          window.location = elemento.parentNode.getAttribute('data-href');
          console.log(e.target)
          console.log(elemento.parentNode.getAttribute('data-href'));
        }
      console.log(elemento);
    }
  }())