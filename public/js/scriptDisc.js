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
          document.getElementById("imgOrigenAgrDisc").setAttribute("class","vista");
          document.getElementById("imgParcialAgrDisc").setAttribute("class","noVista");
          document.getElementById("btnCancelarAgrDisc").setAttribute("class","noVista");
          document.getElementById("textoAgrDisc").setAttribute("class","vista");
          document.getElementById("inputAgrDisc").value = "";
        }
        document.getElementById("textoAgrDisc").addEventListener("click", inputfileAgrDisc);
        document.getElementById("btnCancelarAgrDisc").addEventListener("click", cancelarImgAgrDisc);
        document.getElementById("inputAgrDisc").addEventListener("change", vistapreviaAgrDisc);



      var inputfileEditDisc = function(){
      document.getElementById("inputEditDisc").click();
      }
 
 
        var vistapreviaEditDisc = function(){
        var archivoEditDisc = new FileReader();

        archivoEditDisc.onload = function(){
          document.getElementById("imgParcialEditDisc").src = archivoEditDisc.result;

          document.getElementById("imgParcialEditDisc").setAttribute("class","rounded mx-auto d-block float-left");
        }
        if(document.getElementById("inputEditDisc").files[0]){

          archivoEditDisc.readAsDataURL(document.getElementById("inputEditDisc").files[0]);

          document.getElementById("btnCancelarEditDisc").setAttribute("class","vista");
          document.getElementById("imgOrigenEditDisc").setAttribute("class","noVista");
          document.getElementById("textoEditDisc").setAttribute("class","noVista");
          
        }
        else {
          document.getElementById("imgOrigenEditDisc").setAttribute("class","rounded mx-auto d-block float-left");
          document.getElementById("imgParcialEditDisc").setAttribute("class","noVista");
          document.getElementById("btnCancelarEditDisc").setAttribute("class","noVista");
          document.getElementById("textoEditDisc").setAttribute("class","vista");
        }
        }
        var cancelarImgEditDisc = function(){
          document.getElementById("imgOrigenEditDisc").setAttribute("class","vista");
          document.getElementById("imgParcialEditDisc").setAttribute("class","noVista");
          document.getElementById("btnCancelarEditDisc").setAttribute("class","noVista");
          document.getElementById("textoEditDisc").setAttribute("class","vista");
          document.getElementById("inputEditDisc").value = "";
        }
     

        document.getElementById("textoEditDisc").addEventListener("click", inputfileEditDisc);
        document.getElementById("btnCancelarEditDisc").addEventListener("click", cancelarImgEditDisc);
        document.getElementById("inputEditDisc").addEventListener("change", vistapreviaEditDisc);
        
} ())




    



  
