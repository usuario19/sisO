$("#fecha").change(function (event) {
    
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
    $("#fecha_title").click(function (event) {
    
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