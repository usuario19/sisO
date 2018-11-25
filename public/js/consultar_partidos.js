$("#consultar_partidos").submit(function(event) {
    event.preventDefault()
    var contenido = $('#contenido');
    var error = $('#mensaje_error');
    

   $.ajax({
    type: 'POST',
    url: '/partidos/encuentros',
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
success: function(data){
    console.log(data);
    contenido.html(data);
   /*  $.getScript("/js/vista_previa.js", function(){});
    $.getScript("/js/filtrar_por_nombre.js", function(){});
    $.getScript("/js/validaciones.js", function(){});
    $.getScript("/js/redirect.js", function(){}); */
  },
  error: function(data){
      error.show();
  },
});

});