$(document).ready(function() {
    $("#form_reg_resultado_competicion").submit(function(e) {
        e.preventDefault();

        valores = new Array();
        $('#tabla_res tbody tr').each(function() {
            var id_jugador = $(this).find('td').eq(0).html();
            var id_club = $(this).find('td').eq(4).html();
            var posicion = $('#id_jugador' + id_jugador).val();//puntos
            var tiempo = $('#tiempo' + id_jugador).val();
            var puntos_set1 = $('#set1' + id_jugador).val();
            var puntos_set2 = $('#set2' + id_jugador).val();
            var puntos_set3 = $('#set3' + id_jugador).val();
            var set_ganados = $('#set_g' + id_jugador).val();
            console.log(posicion);
            //var combo = document.getElementById('#nombre_jugador'.id_jugador);
            //var posicion = combo.options[combo.selectedIndex].text;
            //var posicion = $('#nombre_jugador' + id_jugador + ' ' + 'selected').text();
            //var posicion = $(this).find('td').eq(5).html();
            // console.log(posicion);
            //option:selected").text()
            //var id_fase= $();
            valor = new Array(id_jugador, id_club, posicion,tiempo,puntos_set1, puntos_set2,puntos_set3,set_ganados);
            valores.push(valor);
        });

        //console.log(valores);

        var id_fase = $('#id_fase').val();
        var id_gestion = $('#id_gestion').val();
        var id_disc = $('#id_disc').val();
        var id_encuentro = $('#id_encuentro').val();
        var id_grupo = $('#id_grupo').val();

        var data = {
            'fase': id_fase,
            'gestion': id_gestion,
            'disc': id_disc,
            'encuentro': id_encuentro,
            'grupo': id_grupo,
            'tabla': valores,
            // _token:document.csrf._token.value,
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/reg_res_competicion',
            data: data,
            dataType: "json",
            async: true,
            /* type: 'POST',
             url: '/encuentro_reg_resultado_competicion',
             data: new FormData(this),
             contentType: false,
             cache: false,
             processData:false,*/

            //dataType: "json",
            //data: $(data).serialize(),
            //contentType: false,
            //cache: false,
            //processData: false,
            success: function(data) {
                location.reload();
            },
            error: function(data) {
                console.log("data");
            }

        });

        //$("#modalResultado").modal('hide');
        //location.reload();
    });
});