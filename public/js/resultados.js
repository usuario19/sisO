function MostrarResultado(id_encuentro) {
    var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_ajax";
    $.get(route, function(data) {
        var i = 1;
        $(data).each(function(key, value) {
            $("#id_encuentro" + i).val(value.id_encuentro);
            $("#id_encuentro_club_part" + i).val(value.id_encuentro_club_part);
            // alert("#nombre_club"+i);
            $("#nombre_club" + i).val(value.nombre_club);
            $("#id_club" + i).val(value.id_club);
            $("#puntos" + i).val(value.puntos);
            $("#observacion" + i).val(value.observacion);
            i++;
        });
    });
}
//revisar este metoso
function MostrarResultadoCompeticion(id_encuentro) {
    var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_competicion_ajax";
    $.get(route, function(data) {
        var i = 1;
        $(data).each(function(key, value) {
            $("#id_encuentro" + i).val(value.id_encuentro);
            $("#id_encuentro_club_part" + i).val(value.id_encuentro_club_part);
            // alert("#nombre_club"+i);
            $("#nombre_club" + i).val(value.nombre_club);
            $("#id_club" + i).val(value.id_club);
            $("#puntos" + i).val(value.puntos);
            $("#observacion" + i).val(value.observacion);
            i++;
        });
    });
}