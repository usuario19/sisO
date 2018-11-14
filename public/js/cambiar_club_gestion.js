var cambiar = $("#id_club_gestion").ready(function cambiar_club(event) {
		
    var contenido = $('#contenido');
    var id_club = $('#id_club_gestion').val();
    /* var info ="id_club="+id_club;
    console.log(id_club); */

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/coordinador/gestiones_activas/club',
        data: {'id_club' : $('#id_club_gestion').val()},
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
    $.getScript("/js/validaciones.js", function(){});
    $.getScript("/js/redirect.js", function(){});

  /*   $.getScript("/js/validaciones_ajax_request.js", function(){}); */
    },
    error: function(data){
        console.log('error');
    },

});
});

$("#id_club_gestion").change(function cambiar_club(event) {
    
var contenido = $('#contenido');
var id_club = $('#id_club_gestion').val();
var info ="id_club="+id_club;
console.log(id_club);

$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: 'POST',
    url: '/coordinador/gestiones_activas/club',
    data: {'id_club' : $('#id_club_gestion').val()},
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
    $.getScript("/js/validaciones.js", function(){});
    $.getScript("/js/redirect.js", function(){});
},
error: function(data){
    console.log('error');
},

});
});