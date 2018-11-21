$("#boton_aceptar").submit(function (event) {
        event.preventDefault()
        var contenido = $('#tablas_fechas_competicion');
       console.log();

       $.ajax({
        type: 'POST',
        url: '/fecha/store',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
    success: function(res){
         /*  console.log(data.html); */
         //$("#cargando").hide();
         console.log("dddd");
         $('#modalFecha').modal('hide');
         contenido.html("");
         $(res).each(function(key,value){
            contenido.append("<tr><td>"+value.id_fecha+"</td><td>"+value.nombre_fecha+"</td><td><a href='' class='btn btn-success'>Editar</a></td><td><a href=''><i title='Eliminar' class='material-icons'>delete</i></a></td></tr>");
         });
        

      },
      error: function(data){
          console.log('error');
      },
  
      });
  });
  
