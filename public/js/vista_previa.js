(function(){
    window.addEventListener('load', inicializarElementos, false);
    var imgO = document.getElementById("imgOrigen").src;
    if(document.getElementById("imgOrigen2"))
      var imgO2 = document.getElementById("imgOrigen2").src;
    //var tipos = ["image/png","image/jpeg", "image/jpg", "image/bmp"];
    
 
    function inicializarElementos(){
      
     var img = document.getElementsByTagName("button");
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
      console.log(e);
      if(elemento.id =="texto")
        inputfile();

      if(elemento.id =="texto2")
        inputfile2();

      if(elemento.id =="btnCancelar")
        cancelarImg();

      if(elemento.id =="btnUpdate")
        actualizarImagen();
        

      if(elemento.id =="btnCancelar2")
        cancelarImg2();
    }

    function vista_previa_Click(e){
       var elemento = e.target;

      if(elemento.id =="input")
        vista_previa();

      if(elemento.id =="input2")
        console.log(e);
        vista_previa2();
    }

    

    function inputfile(){
      document.getElementById("input").click();
    }
    function actualizarImagen(){
      console.log('entro')
      document.getElementById("buttonUpdate").click();
    }

    function inputfile2(){
      document.getElementById("input2").click();
    }

    function vista_previa(){
        //var origen = document.getElementById("img").src;
        var archivo = new FileReader();

        archivo.onload = function(){
          
          document.getElementById("imgOrigen").src = archivo.result;
        }

        if(document.getElementById("input").files[0])
        {
          //VALIDACION
          var tipo = document.getElementById("input").files[0].type;
          if(tipo == "image/png"|| tipo =="image/jpeg" || tipo == "image/jpg" || tipo == "image/bmp")
          {
            archivo.readAsDataURL(document.getElementById("input").files[0]);

            var botones = document.getElementById("divtexto").children;
            for (var i = botones.length - 1; i >= 0; i--) {
              if(botones[i].id.indexOf("btn") != -1)
              {
                botones[i].setAttribute("class","btn btn-dark button vista");
              }
            }

            document.getElementById("error_foto").innerHTML ="";
          }else {
            document.getElementById("imgOrigen").src = imgO;
            document.getElementById("error_foto").innerHTML = "Solo se premite archivos de tipo imagen jpeg,jpg,png."
          }
        
          
        }else{
          //console.log(imgO);
          console.log(document.getElementById("input").value);
          document.getElementById("imgOrigen").src = imgO;
          document.getElementById("input").value = "";
        
          var botones = document.getElementById("divtexto").children;
            for (var i = botones.length - 1; i >= 0; i--) {
              if(botones[i].id.indexOf("btn") != -1)
              {
                botones[i].setAttribute("class","btn btn-outline-dark button noVista");
              }
            }
         
        }
    }

    function vista_previa2(){
      //var origen = document.getElementById("img").src;
      var archivo = new FileReader();

      archivo.onload = function(){
        
        document.getElementById("imgOrigen2").src = archivo.result;
      }

      if(document.getElementById("input2").files[0])
      {
        //VALIDACION
        var tipo = document.getElementById("input2").files[0].type;
        if(tipo == "image/png"|| tipo =="image/jpeg" || tipo == "image/jpg" || tipo == "image/bmp")
        {
          console.log('1');
          archivo.readAsDataURL(document.getElementById("input2").files[0]);

          var botones = document.getElementById("divtexto2").children;
          for (var i = botones.length - 1; i >= 0; i--) {
            if(botones[i].id.indexOf("btn") != -1)
            {
              botones[i].setAttribute("class","btn btn-dark button vista");
            }
          }

          document.getElementById("error_foto2").innerHTML ="";
        }else {
          document.getElementById("imgOrigen2").src = imgO2;
          document.getElementById("error_foto2").innerHTML = "Solo se premite archivos de tipo imagen jpeg,jpg,png."
        }
      
        
      }else{
        //console.log(imgO);
        console.log(document.getElementById("input2").value);
        document.getElementById("imgOrigen2").src = imgO;
        document.getElementById("input2").value = "";
      
        var botones = document.getElementById("divtexto2").children;
          for (var i = botones.length - 1; i >= 0; i--) {
            if(botones[i].id.indexOf("btn") != -1)
            {
              botones[i].setAttribute("class","btn btn-outline-dark button noVista");
            }
          }
       
      }
  }
    /* function vista_previa2(){
      //var origen = document.getElementById("img").src;
      
      var archivo = new FileReader();

      archivo.onload = function(){
        
        document.getElementById("imgOrigen2").src = archivo.result;
      }

      if(document.getElementById("input2").files[0])
      {
        //VALIDACION
        var tipo = document.getElementById("input2").files[0].type;
        if(tipo == "image/png"|| tipo =="image/jpeg" || tipo == "image/jpg" || tipo == "image/bmp")
        {
          archivo.readAsDataURL(document.getElementById("input2").files[0]);

          var botones = document.getElementById("divtexto2").children;
            for (var i = botones.length - 1; i >= 0; i--) {
              if(botones[i].id.indexOf("btn") != -1)
              {
                botones[i].setAttribute("class","btn btn-dark button vista");
              }
            }

          document.getElementById("error_foto2").innerHTML ="";
        }else {
          document.getElementById("imgOrigen2").src = imgO2;
          document.getElementById("error_foto2").innerHTML = "Solo se premite archivos de tipo imagen jpeg,jpg,png."
        }
      
        
      }else{
        //console.log(imgO);
        console.log(document.getElementById("input2").value);
        document.getElementById("imgOrigen2").src = imgO;
        document.getElementById("input2").value = "";
      
        var botones = document.getElementById("divtexto").children;
        for (var i = botones.length - 1; i >= 0; i--) {
          if(botones[i].id.indexOf("btn") != -1)
          {
            botones[i].setAttribute("class","btn btn-outline-dark button noVista");
          }
        }
       
      }
  } */


    /* function vistaprevia2(){
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
    } */

    var cancelarImg = function(){
      document.getElementById("imgOrigen").src = imgO;
      var botones = document.getElementById("divtexto").children;
            for (var i = botones.length - 1; i >= 0; i--) {
              if(botones[i].id.indexOf("btn") != -1)
              {
                botones[i].setAttribute("class","noVista");
              }
            }
      
      document.getElementById("input").value = "";
    }

    var cancelarImg2 = function(){
      document.getElementById("imgOrigen2").src = imgO2;
      var botones = document.getElementById("divtexto2").children;
            for (var i = botones.length - 1; i >= 0; i--) {
              if(botones[i].id.indexOf("btn") != -1)
              {
                botones[i].setAttribute("class","noVista");
              }
            }
      
      document.getElementById("input2").value = "";
    }

    /* var cancelarImg2 = function(){
          document.getElementById("imgOrigen2").setAttribute("class","");
          document.getElementById("imgParcial2").setAttribute("class","noVista");
          document.getElementById("btnCancela2r").setAttribute("class","noVista");
          document.getElementById("texto2").setAttribute("class","vista");
          document.getElementById("input2").value = "";
    } */
}())