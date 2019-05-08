$("#fecha").change(function (event) {
    consultar_partidos();
});
$("#tomorrow").click(function(event){
    console.log('entro');
    consultar_partidos();
});
$("#yesterday").click(function(event){
    consultar_partidos();
});

function consultar_partidos(){
    $("#cargando").show();

    var contenido = $('#partidos_hoy');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/partidos_hoy',
        data: {'disc' : $('#disc').val(),'hoy':$('#fecha').val() },
        dataType: "json",
        async:true,
        beforeSend: function () {
          $("#cargando").show();
        },
        
        success: function(data){
            $("#cargando").hide();
            console.log(data);
            $('#partidos_hoy').html(data.html);
        /* $.getScript("/js/vista_previa.js", function(){});
        $.getScript("/js/validaciones.js", function(){});
        $.getScript("/js/redirect.js", function(){});
        $.getScript("/js/checkbox.js", function(){}); */
        },
        error: function(data){
            console.log(data);
            $('#partidos_hoy').html(data.html);
        },
        
        });
}


    $("#fecha_title").click(function (event) {
        $("#cargando").show();
    
        var contenido = $('#partidos_hoy');
        
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/partidos',
            data: {'disc' : $('#disc').val(),'hoy':$('#fecha').val() },
            dataType: "json",
            async:true,
            beforeSend: function () {
              $("#cargando").show();
            },
            
            success: function(data){
            $("#cargando").hide();
            contenido.html(data.html);
            /* $.getScript("/js/vista_previa.js", function(){});
            $.getScript("/js/validaciones.js", function(){});
            $.getScript("/js/redirect.js", function(){});
            $.getScript("/js/checkbox.js", function(){}); */
            },
            error: function(data){
                console.log(data);
            

            },
            
            });
        });