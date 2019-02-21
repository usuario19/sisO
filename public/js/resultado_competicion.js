
$(document).ready(function()
{   
     $("#form_reg_resultado_competicion").submit(function(e) {
        e.preventDefault();
        
        valores = new Array();
        $('#tabla_res tbody tr').each(function() {
            var id_jugador = $(this).find('td').eq(0).html();
            var posicion = $(this).find('td').eq(3).html();
            //var id_fase= $();
            valor = new Array(id_jugador, posicion);
            valores.push(valor);
        });
        valores = valores.serialize()
        //console.log(valores);

        var id_fase = $('#id_fase').val().serialize();
        var id_gestion = $('#id_gestion').val().serialize();
        var id_disc = $('#id_disc').val().serialize();
        var token = '{{csrf_token()}}';
        var data = { fase: id_fase,
            gestion: id_gestion,
             disc: id_disc ,
             table:valores,_token:token};
        $.ajax({
            data: data,
                  
            //headers: { 'X-CSRF-TOKEN': token },
            url: '/encuentro_reg_resultado_competicion',
            type: 'POST',
            contentType: false,
            processData: false,
            //data: $(this).serialize(),
            contentType: false,
            //cache: false,
            //processData: false,

            success: function(respose) {
                console.log("dddd");
            },
            error: function(respose) {
                console.log(respose);
            },

        });
        
        $("#modalResultado").modal('hide');
        //location.reload();
    });
});