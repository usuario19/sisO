$("#id_gestion").change(function(event) {
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/coordinador/partidos/participaciones',
        data: {'id_gestion' : $('#id_gestion').val()},
        dataType: "json",
        beforeSend: function() {
            $("#cargando_disc").show();
            $("#id_participacion").empty();
        },
        success: function(data){
            $("#cargando_disc").hide();
            $("#id_participacion").prop('disabled', false);
            $("#id_participacion").empty();
            data.forEach(element => {
                $("#id_participacion").append("<option class='form-control' value='"+element.id_participacion+"'>"+element.nombre_disc+"</option>");
            });
        },
        error: function(data){
            console.log(data);
        },
    });

});