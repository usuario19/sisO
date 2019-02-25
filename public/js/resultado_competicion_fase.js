$(document).ready(function() {
    $("#form_reg_resultado_competicion_fase").submit(function(e) {
        e.preventDefault();
        valores = new Array();
        $('#tabla_res tbody tr').each(function() {
            var id_jugador = $(this).find('td').eq(0).html();
            var id_club = $(this).find('td').eq(4).html();
            var posicion = $('#id_jugador' + id_jugador).val();
            valor = new Array(id_jugador, id_club, posicion);
            valores.push(valor);
        });
        var id_fase = $('#id_fase').val();
        var id_gestion = $('#id_gestion').val();
        var id_disc = $('#id_disc').val();

        var data = {
            'fase': id_fase,
            'gestion': id_gestion,
            'disc': id_disc,
            'tabla': valores,
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/reg_res_competicion_fase',
            data: data,
            dataType: "json",
            async: true,
            success: function(data) {
                location.reload();
            },
            error: function(data) {
                console.log("data");
            }
        });
    });
});