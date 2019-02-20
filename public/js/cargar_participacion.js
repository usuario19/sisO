/* $(".ck-content").on('focus',function () { 
    console.log('ENTRO');
    $("#editor").contents().find("img").addClass("img-fluid");
}); */


$("#id_gestion").change(function cargar_participacion(event) {
    var id_gestion = $('#id_gestion').val();
    
    //peticion ajax
    $.get('/avisos/consultar/' + id_gestion +'/participacion', function(data) {
        $('#id_disc').empty();
        
        if (data.length > 0) {
                $("#id_disc").prop('disabled', false);
            var html_disc = '<option value="">Seleccione</option>';

            for (var i = 0; i < data.length; i++) {
                html_disc += '<option value=" ' + data[i].id_disc + '"> ' + data[i].nombre_disc + '</option>';
                $('#id_disc').html(html_disc);
            }
        }else
            $("#id_disc").prop('disabled', true);
    });
});
