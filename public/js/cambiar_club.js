var cambiar = $("#id_club_jugadores").ready(function cambiar_club(event) {
		
		var contenido = $('#contenido');
        var id_club = $('#id_club_jugadores').val();
        /* var info ="id_club="+id_club;
        console.log(id_club); */

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/coordinador/jugadores/club',
            data: {'id_club' : $('#id_club_jugadores').val()},
            dataType: "json",
            async:true,
            beforeSend: function () {
              $("#cargando").show();
            },
           
            
		success: function(data){
           /*  console.log(data.html); */
        $("#cargando").hide();
        contenido.html(data.html);
        $.getScript("/js/vista_previa.js", function(){});
        $.getScript("/js/filtrar_por_nombre.js", function(){});
        $.getScript("/js/validaciones.js", function(){});
        $.getScript("/js/redirect.js", function(){});

      /*   $.getScript("/js/validaciones_ajax_request.js", function(){}); */
		},
		error: function(data){
			console.log('error');
		},

	});
});

$("#id_club_jugadores").change(function cambiar_club(event) {
		
    var contenido = $('#contenido');
    var id_club = $('#id_club_jugadores').val();
    var info ="id_club="+id_club;
    console.log(id_club);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/coordinador/jugadores/club',
        data: {'id_club' : $('#id_club_jugadores').val()},
        dataType: "json",
        async:true,
        beforeSend: function () {
          $("#cargando").show();
        },
        
    success: function(data){
       /*  console.log(data.html); */
       $("#cargando").hide();
        contenido.html(data.html);
        $.getScript("/js/vista_previa.js", function(){});
        $.getScript("/js/filtrar_por_nombre.js", function(){});
        $.getScript("/js/validaciones.js", function(){});
        $.getScript("/js/redirect.js", function(){});
    },
    error: function(data){
        console.log('error');
    },

});
});