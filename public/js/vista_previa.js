(function(){
    /*
    "readAsDataURL" es usado para leer el contenido del especificado Blob o File
    "readyState" se convierte en DONE, y el "loadend" es lanzado
    En ese momento, el atributo "result" contiene  la información como una URL 
    representando la información del archivo como una cadena de caracteres 
    codificados en base64
    */
    

    var addEvent = function(elemento, nom_evento, funcion, captura){
      if(elemento.attachEvent)
      {
        elemento.attachEvent('on'+nom_evento,funcion);
        return true;
      }else{
        if(elemento.addEventListener)
        {
          elemento.addEventListener(nom_evento, funcion, captura);
          return true;
        }else {
          return false;
        }
      }
    }

    var inicializarElementos = function(){

      var elemento = document.getElementById('input');

      addEvent(elemento, 'change', vista_previa,false);
    }

    

    var vista_previa = function(){
        //var origen = document.getElementById("img").src;
        var archivo = new FileReader();

        archivo.onload = function(){
          document.getElementById("imgParcial").src = archivo.result;
          document.getElementById("imgParcial").setAttribute("class","rounded mx-auto d-block float-left");
        }
        if(document.getElementById("input").files[0]){

          archivo.readAsDataURL(document.getElementById("input").files[0]);

          document.getElementById("btnCancelar").setAttribute("class","uploader vista");
          document.getElementById("imgOrigen").setAttribute("class","noVista");
          document.getElementById("texto").setAttribute("class","noVista");
          
        }else {
          document.getElementById("imgOrigen").setAttribute("class","rounded mx-auto d-block float-left");
          document.getElementById("imgParcial").setAttribute("class","noVista");
          document.getElementById("btnCancelar").setAttribute("class","noVista");
          document.getElementById("texto").setAttribute("class","vista");
        }
    }

    var inputfile = function(){
      document.getElementById("input").click();
    }

    var cancelarImg = function(){
      document.getElementById("imgOrigen").setAttribute("class","");
      document.getElementById("imgParcial").setAttribute("class","noVista");
      document.getElementById("btnCancelar").setAttribute("class","noVista");
      document.getElementById("texto").setAttribute("class","vista");
      document.getElementById("input").value = "";
    }

    addEvent('window', 'load', 'inicializarElementos' false);
    document.getElementById("texto").addEventListener("click", inputfile);
    document.getElementById("btnCancelar").addEventListener("click", cancelarImg);
    document.getElementById("input").addEventListener("change", vistaprevia);
  
}())