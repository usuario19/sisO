var MostrarResultado = function(id_encuentro) {
    var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_ajax";
    $.get(route, function(data) {
        $i = 0;
        array.forEach(dara => {
            $("#id_encuentro_club_part").val(data.id_encuentro_club_part);
            //alert("/storage/logos/"+data.logo);
            $("#nombre_club".$i).val(data.nombre_club);
            $("#puntos_club".$i).val(data.puntos);
            $("#observ_club".$i).val(data.observacion);
        });
    });
}