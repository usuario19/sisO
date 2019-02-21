window.addEventListener("load", function() {
    document.getElementById('form_reg_resultado_competicion').addEventListener("submit", function(e) {
        e.preventDefault();
        //alert('hi');
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
        });
        valores = new Array();
        $('#tabla_res tbody tr').each(function() {
            var id_jugador = $(this).find('td').eq(0).html();
            var posicion = $(this).find('td').eq(3).html();
            //var id_fase= $();
            valor = new Array(id_jugador, posicion);
            valores.push(valor);
        });
        //console.log(valores);

        var id_fase = $('#id_fase').val();
        var id_gestion = $('#id_gestion').val();
        var id_disc = $('#id_disc').val();

        $.ajax({
            type: 'POST',
            //headers: { 'X-CSRF-TOKEN': token },
            url: '/encuentro/reg_resultado_competicion',
            //data: { fase: id_fase, gestion: id_gestion, disc: id_disc, tabla: valores },
            data: $(this).serialize(),
            contentType: false,
            cache: false,
            processData: false,

            success: function(data) {
                console.log("dddd");
            },
            error: function(data) {
                console.log(data);
            },

        });
    });
});