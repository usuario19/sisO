$("#id_club_jugadores").change(function(event) {
		
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
           
            
		success: function(data){
            console.log(data.html);
            contenido.html(data.html);
		},
		error: function(data){
			console.log('error');
		},

	})/* .done( function(data) {
        contenido.html(data.html);
        
    
    }).fail( function( jqXHR) {
    
        alert( jqXHR.responseText );
    
    }) */;
});