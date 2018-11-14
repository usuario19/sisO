$("#id_partido_club").change(function(event) {
   
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/coordinador/partidos/club',
            data: {'id_club' : $('#id_partido_club').val()},
            dataType: "json",
            async:true,
            beforeSend: function () {
            $("#cargando_gest").show();
            $("#id_partido_gest").empty();
            $("#id_partido_disc").empty();
            $("#id_partido_disc").prop('disabled', true);
            },
            
            success: function(data){
                $("#cargando_gest").hide();
                $("#id_partido_gest").prop('disabled', false);
                $("#id_partido_gest").empty();
                data.forEach(element => {
                    if(element.id_gestion == 0)
                    { 
                       $("#id_partido_gest").append("<option class='form-control'  value='"+element.id_gestion+"' disabled selected >"+element.nombre_gestion+"</option>");
                    }
                    else{
                        $("#id_partido_gest").append("<option class='form-control' value='"+element.id_gestion+"'>"+element.nombre_gestion+"</option>");
                    }
                   //
                   
                });
                //console.log(data);  
            },
            error: function(data){
                console.log(data);
            },
        
            });
   /*  } */
    
});
$("#id_partido_gest").change(function(event) {
    /* var club = $("#id_partido_club").val();
    var gestiones = $('#id_partido_gest');
    var disciplinas = $('#id_partido_disc'); */
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/coordinador/partidos/club/gestiones',
            data: {'id_gestion' : $('#id_partido_gest').val(),'id_club': $("#id_partido_club").val()},
            dataType: "json",
            async:true,
            beforeSend: function () {
            $("#cargando_disc").show();
            $("#id_partido_disc").empty();
            },
            success: function(data){
                $("#cargando_disc").hide();
                $("#id_partido_disc").prop('disabled', false);
                $("#id_partido_disc").empty();
                data.forEach(element => {
                    $("#id_partido_disc").append("<option class='form-control' value='"+element.id_club_part+"'>"+element.nombre_disc+"</option>");
                });
                //console.log(data);  
            },
            error: function(data){
                console.log(data);
            },
        
            });
    /* } */
    
});
