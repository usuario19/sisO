var Mostrar = function(id){
    $(".spinner-grow").show();
    $.each($('#form_update').find(':input'),function(){
      $("#form_update").find(':input[name='+ $(this).attr('name')+']').removeClass('is-invalid');
      $("#form_update").find(':input[name='+ $(this).attr('name')+']').removeClass('is-valid');
    });
    var route = "{{ url('club') }}/"+id+"/edit";
      $("#nombre_club").val("");
      $('#imgOrigen2').attr('src', "");
      $("#edit_descripcion").val("");
    $.get(route, function(data){
      $("#edit_id_club").val(data.id_club);
      //alert("/storage/logos/"+data.logo);
      $("#nombre_club").val(data.nombre_club);
      $("#edit_administrador").val(data.id_administrador);
      $("#edit_ciudad").val(data.ciudad);
      var url = '/storage/logos/'+data.logo
      var file = $.get(url);
          $('#imgOrigen2').attr('src', url);
      $("#edit_descripcion").val(data.descripcion_club);
      $(".spinner-grow").hide();
    });
  }