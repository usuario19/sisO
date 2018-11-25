$("#id_club_inf").change(function(event) {
		
		var contenido = $('#contenido');
        var id_club = $('#id_club_inf').val();
        var info ="id_club="+id_club;
        console.log(id_club);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/coordinador/club/inf',
            data: {'id_club' : $('#id_club_inf').val()},
            dataType: "json",
           /*  async:true, */
            beforeSend: function () {
                $("#cargando").show();
        },
           
            
		success: function(data){
            $("#cargando").hide();
            console.log(data);
            console.log(data.html);
            contenido.html(data.html);
		},
		error: function(data){
			console.log(data);
		},

	});
});