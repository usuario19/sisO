function cargarFases() {
    var id_disc = $('#disciplinas2').val();
    //alert(id_disc);
    //peticion ajax
    $.get('/fase/' + id_disc + '/select_fases', function(data) {
        //alert(data);
        $('#fases2').empty();
        var html_fases = '<option value="">seleccione fase</option>';
        if (data.length > 0) {
            var html_fases = '<option value="">seleccione fase</option>';

            for (var i = 0; i < data.length; i++) {
                html_fases += '<option value=" ' + data[i].id_fase + '"> ' + data[i].nombre_fase + '</option>';
                $('#fases2').html(html_fases);
                //console.log(html_fases);
            }
        } else
            $('#fases2').html(html_fases);

    });
}