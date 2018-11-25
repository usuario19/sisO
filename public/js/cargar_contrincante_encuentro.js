function cargarContrincantes() {
    var id_club1 = $('#club1').val();
    var id_grupo = $('#id_grupo').val();
   // alert(id_grupo);
    //peticion ajax
    $.get('/encuentro/' + id_club1 +"/"+id_grupo+ '/select_contrincante', function(data) {
        //alert(data[0]);
        $('#club2').empty();
        //var html_club2 = '<option value="">seleccione equip1</option>';
        if (data.length > 0) {
            //alert(data[0].id_club);
            var html_club2 = '<option value="">seleccione contrincante</option>';

            for (var i = 0; i < data.length; i++) {
                html_club2 += '<option value=" ' + data[i].id_club + '"> ' + data[i].nombre_club + '</option>';
                $('#club2').html(html_club2);
                //console.log(html_fases);
            }
        } else
            $('#club2').html(html_club2);

    });
}