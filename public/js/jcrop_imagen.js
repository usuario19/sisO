var x,y,w,h;
var src = $('#imgCrop').attr('src');
$(document).ready(function(){
    if (src.indexOf('usuario-sin-foto') > -1 || src.indexOf('sin_imagen') > -1 ) {
        $('#crop').hide();
    } else {
        $('#crop').show();
    }
});
/* console.log(src); */
function showCords(c){
    
    x = c.x;
    y = c.y;
    w = c.w;
    h = c.h;
   /*  alert(x+' '+y+' '+w+' '+h); */

}
jQuery(function($){
    $('#imgCrop').Jcrop({
            onSelect: showCords,
            bgColor:     'black',
            bgOpacity:   .4,
            setSelect:   [ 300, 300, 50, 50 ],
            aspectRatio: 1
    });
});
$('#button_crop').click(function enviar_recorte(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/crop',
        data: {'x' : x,'y':y, 'w':w, 'h':h ,'src':src},
        dataType: "json",
        async:true,
        /* beforeSend: function () {
          $("#cargando").show();
        }, */
        
        success: function(data){
            window.location.reload();
       /*  $("#cargando").hide();
        contenido.html(data.html); */
        /* $.getScript("/js/vista_previa.js", function(){});
        $.getScript("/js/validaciones.js", function(){});
        $.getScript("/js/redirect.js", function(){});
        $.getScript("/js/checkbox.js", function(){}); */
        },
        error: function(data){
            console.log(data);
        },
        
        });
})