(function(){
    window.addEventListener('load', inicializarElementos, false);
    var imgO = document.getElementById("imgOrigen").src;
    
 
    function inicializarElementos(){
      
     var img = document.getElementsByTagName("img");
     var input = document.getElementsByTagName("input");

      for (var i = img.length - 1; i >= 0; i--) {
        img[i].addEventListener("click",clickIMagen , false );
      }

      for (var i = input.length - 1; i >= 0; i--) {
        if(input[i].type == "file")
          input[i].addEventListener("change", vista_previa_Click, false);
      }
    }

    function clickIMagen(e){
      var elemento = e.target;
      if(elemento.id =="texto")
        inputfile();

      if(elemento.id =="texto2")
        inputfile2();

      if(elemento.id =="btnCancelar")
        cancelarImg();

      if(elemento.id =="btnCancelar2")
        cancelarImg2();
    }

    function vista_previa_Click(e){
       var elemento = e.target;
      if(elemento.id =="input")
        vista_previa();

      if(elemento.id =="input2")
        vistaprevia2();
    }

    

    function inputfile(){
      document.getElementById("input").click();
    }

    function inputfile2(){
      document.getElementById("input2").click();
    }

    function vista_previa(){
        //var origen = document.getElementById("img").src;
        var archivo = new FileReader();

        archivo.onload = function(){
          /*document.getElementById("imgParcial").src = archivo.result;
          document.getElementById("imgParcial").setAttribute("class","rounded mx-auto d-block float-left");*/
          document.getElementById("imgOrigen").src = archivo.result;

        }

        if(document.getElementById("input").files[0]){

          archivo.readAsDataURL(document.getElementById("input").files[0]);

          document.getElementById("btnCancelar").setAttribute("class","uploader vista");
          //document.getElementById("imgOrigen").setAttribute("class","noVista");
          //document.getElementById("texto").setAttribute("class","noVista");
          
        }else {
          console.log(imgO)
          document.getElementById("imgOrigen").src = imgO;
          document.getElementById("input").value = "";
         /* document.getElementById("imgOrigen").setAttribute("class","rounded mx-auto d-block float-left");
          document.getElementById("imgParcial").setAttribute("class","noVista");*/
          document.getElementById("btnCancelar").setAttribute("class","noVista");
          //document.getElementById("texto").setAttribute("class","vista");
        }
    }


    function vistaprevia2(){
        var archivo2 = new FileReader();

        archivo2.onload = function(){
          document.getElementById("imgParcial2").src = archivo2.result;

          document.getElementById("imgParcial2").setAttribute("class","rounded mx-auto d-block float-left");
        }
        if(document.getElementById("input2").files[0]){

          archivo2.readAsDataURL(document.getElementById("input2").files[0]);

          document.getElementById("btnCancelar2").setAttribute("class","uploader vista");
          document.getElementById("imgOrigen2").setAttribute("class","noVista");
          document.getElementById("texto2").setAttribute("class","noVista");
          
        }
        else {
          document.getElementById("imgOrigen2").setAttribute("class","rounded mx-auto d-block float-left");
          document.getElementById("imgParcial2").setAttribute("class","noVista");
          document.getElementById("btnCancelar2").setAttribute("class","noVista");
          document.getElementById("texto2").setAttribute("class","vista");
        }
    }

    var cancelarImg = function(){
      document.getElementById("imgOrigen").src = imgO;
      /*document.getElementById("imgOrigen").setAttribute("class","");
      document.getElementById("imgParcial").setAttribute("class","noVista");*/
      document.getElementById("btnCancelar").setAttribute("class","noVista");
      /*document.getElementById("texto").setAttribute("class","vista");*/
      document.getElementById("input").value = "";
    }

    var cancelarImg2 = function(){
          document.getElementById("imgOrigen2").setAttribute("class","");
          document.getElementById("imgParcial2").setAttribute("class","noVista");
          document.getElementById("btnCancela2r").setAttribute("class","noVista");
          document.getElementById("texto2").setAttribute("class","vista");
          document.getElementById("input2").value = "";
    }
}())