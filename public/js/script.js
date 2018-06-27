(function(){

    var inputfile = function(){
      document.getElementById("input").click();
    }

    var vistaprevia = function(){
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
          document.getElementById("imgOrigen2").setAttribute("class","noVista");
          document.getElementById("texto").setAttribute("class","noVista");
          
        }else {
          document.getElementById("imgOrigen").setAttribute("class","rounded mx-auto d-block float-left");
          document.getElementById("imgParcial").setAttribute("class","noVista");
          document.getElementById("btnCancelar").setAttribute("class","noVista");
          document.getElementById("texto").setAttribute("class","vista");
        }
    }

(function(){

    var inputfile2 = function(){
      document.getElementById("input2").click();
    }

    var vistaprevia2 = function(){
        //var origen = document.getElementById("img").src;
        var archivo = new FileReader();

        archivo.onload = function(){
          document.getElementById("imgParcial2").src = archivo.result;

          document.getElementById("imgParcial2").setAttribute("class","rounded mx-auto d-block float-left");
        }
        if(document.getElementById("input2").files[0]){

          archivo.readAsDataURL(document.getElementById("input2").files[0]);

          document.getElementById("btnCancelar2").setAttribute("class","uploader vista");
          document.getElementById("imgOrigen2").setAttribute("class","noVista");
          document.getElementById("imgOrigen2").setAttribute("class","noVista");
          document.getElementById("texto2").setAttribute("class","noVista");
          
        }else {
          document.getElementById("imgOrigen2").setAttribute("class","rounded mx-auto d-block float-left");
          document.getElementById("imgParcial2").setAttribute("class","noVista");
          document.getElementById("btnCancelar2").setAttribute("class","noVista");
          document.getElementById("texto2").setAttribute("class","vista");
        }
    }



    var cancelarImg2 = function(){
      document.getElementById("imgOrigen2").setAttribute("class","");
      document.getElementById("imgParcial2").setAttribute("class","noVista");
      document.getElementById("btnCancelar2").setAttribute("class","noVista");
      document.getElementById("texto2").setAttribute("class","vista");
      document.getElementById("input2").value = "";
    }
    
    document.getElementById("texto2").addEventListener("click", inputfile2);
    document.getElementById("btnCancelar2").addEventListener("click", cancelarImg2);

    document.getElementById("input2").addEventListener("change", vistaprevia2);
  
}())
