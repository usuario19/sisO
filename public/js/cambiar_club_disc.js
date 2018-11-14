var cambiar = $("#id_jug_disc").ready(function (event) {
	//console.log('entro');
    var contenido = $('#contenido');
   /*  var id_club = $('#id_jug_disc').val(); */
    /* var info ="id_club="+id_club;
    console.log(id_club); */

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        url: '/seleccion/jugadores/disc',
        data: {'id_disc' : $('#id_jug_disc').val()},
        dataType: "json",
        async:true,
        beforeSend: function () {
          $("#cargando").show();
        },
       
            
        success: function(data){
            $("#cargando").hide();
            contenido.html(data.html);
            //console.log('entro');
            $.getScript("/js/checkbox.js", function(){});
            $.getScript("/js/filtrar_por_nombre.js", function(){});

        },
        error: function(data){
            console.log('error');
        },

    });
});

$("#id_jug_disc").change(function(event) {
    
var contenido = $('#contenido');
$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'POST',
    url: '/seleccion/jugadores/disc',
    data: {'id_disc' : $('#id_jug_disc').val()},
    dataType: "json",
    async:true,
    beforeSend: function () {
      $("#cargando").show();
    },
    
    success: function(data){
        $("#cargando").hide();
        contenido.html(data.html);
        $.getScript("/js/checkbox.js", function(){});
        $.getScript("/js/filtrar_por_nombre.js", function(){});

        
    },
    error: function(data){
        console.log(data);
    },

    });
});