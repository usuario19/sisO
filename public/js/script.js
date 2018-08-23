(function(){

    var inputfile = function(){
      document.getElementById("input").click();
    }

    var inputfile2 = function(){
      document.getElementById("input2").click();
    }

    var vistaprevia = function(){
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
          
        }
        else {
          document.getElementById("imgOrigen").setAttribute("class","rounded mx-auto d-block float-left");
          document.getElementById("imgParcial").setAttribute("class","noVista");
          document.getElementById("btnCancelar").setAttribute("class","noVista");
          document.getElementById("texto").setAttribute("class","vista");
        }
    }
    var vistaprevia2 = function(){
        var archivo2 = new FileReader();

        archivo2.onload = function(){
          document.getElementById("imgParcial2").src = archivo2.result;

          document.getElementById("imgParcial2").setAttribute("class","rounded mx-auto d-block float-left");
        }
        if(document.getElementById("input2").files[0]){

          archivo2.readAsDataURL(document.getElementById("input2").files[0]);

          document.getElementById("btnCancelar2").setAttribute("class","uploader} vista");
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
          document.getElementById("imgOrigen").setAttribute("class","");
          document.getElementById("imgParcial").setAttribute("class","noVista");
          document.getElementById("btnCancelar").setAttribute("class","noVista");
          document.getElementById("texto").setAttribute("class","vista");
          document.getElementById("input").value = "";
        }
        var cancelarImg2 = function(){
          document.getElementById("imgOrigen2").setAttribute("class","");
          document.getElementById("imgParcial2").setAttribute("class","noVista");
          document.getElementById("btnCancelar2").setAttribute("class","noVista");
          document.getElementById("texto2").setAttribute("class","vista");
          document.getElementById("input2").value = "";
        }
       
        document.getElementById("texto").addEventListener("click", inputfile);
        document.getElementById("texto2").addEventListener("click", inputfile2);
       
        document.getElementById("btnCancelar").addEventListener("click", cancelarImg);
        document.getElementById("btnCancelar2").addEventListener("click", cancelarImg2);
      
        document.getElementById("input").addEventListener("change", vistaprevia);
        document.getElementById("input2").addEventListener("change", vistaprevia2);
       
} ())




    



  
