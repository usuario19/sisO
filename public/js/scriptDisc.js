(function(){

    var inputfileAgrDisc = function(){
      document.getElementById("inputAgrDisc").click();
    }

 
    var vistapreviaAgrDisc = function(){
        var archivoAgrDisc = new FileReader();

        archivoAgrDisc.onload = function(){
          document.getElementById("imgParcialAgrDisc").src = archivoAgrDisc.result;

          document.getElementById("imgParcialAgrDisc").setAttribute("class","rounded mx-auto d-block float-left");
        }
        if(document.getElementById("inputAgrDisc").files[0]){

          archivoAgrDisc.readAsDataURL(document.getElementById("inputAgrDisc").files[0]);

          document.getElementById("btnCancelarAgrDisc").setAttribute("class","vista");
          document.getElementById("imgOrigenAgrDisc").setAttribute("class","noVista");
          document.getElementById("textoAgrDisc").setAttribute("class","noVista");
          
        }
        else {
          document.getElementById("imgOrigenAgrDisc").setAttribute("class","rounded mx-auto d-block float-left");
          document.getElementById("imgParcialAgrDisc").setAttribute("class","noVista");
          document.getElementById("btnCancelarAgrDisc").setAttribute("class","noVista");
          document.getElementById("textoAgrDisc").setAttribute("class","vista");
        }
    }

        var cancelarImgAgrDisc = function(){
          document.getElementById("imgOrigenAgrDisc").setAttribute("class","");
          document.getElementById("imgParcialAgrDisc").setAttribute("class","noVista");
          document.getElementById("btnCancelarAgrDisc").setAttribute("class","noVista");
          document.getElementById("textoAgrDisc").setAttribute("class","vista");
          document.getElementById("inputAgrDisc").value = "";
        }
        
        document.getElementById("textoAgrDisc").addEventListener("click", inputfileAgrDisc);

        document.getElementById("btnCancelarAgrDisc").addEventListener("click", cancelarImgAgrDisc);
        document.getElementById("inputAgrDisc").addEventListener("change", vistapreviaAgrDisc);
    
} ())




    



  
