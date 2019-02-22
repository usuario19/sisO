
$(document).ready(function()
{   
     $("#form_reg_resultado_competicion").submit(function(e) {
        e.preventDefault();
        
        valores = new Array();
        $('#tabla_res tbody tr').each(function() {
            var id_jugador = $(this).find('td').eq(0).html();
            var id_club = $(this).find('td').eq(4).html();
            var posicion = $(this).find('td select option').eq(5).html();
            //var id_fase= $();
            valor = new Array(id_jugador, posicion);
            valores.push(valor);
        });
        
        //console.log(valores);

        var id_fase = $('#id_fase').val();
        var id_gestion = $('#id_gestion').val();
        var id_disc = $('#id_disc').val();
        
        //var token = {{csrf_token()}};
        
        var data = { fase: id_fase,
            gestion: id_gestion,
             disc: id_disc ,
             table:valores,
            // _token:document.csrf._token.value,
            };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/encuentro_reg_resultado_competicion',
            data: {'fase' : $('#id_fase').val(),'gestion':$('#id_gestion').val(),'disc':$('#id_disc').val(),'tabla':valores },
            dataType: "json",
            async:true,
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
            success: function(respose) {
                console.log(respose);
            },
            error: function(respose) {
                console.log("error");
            },

        });
        
        $("#modalResultado").modal('hide');
        //location.reload();
    });
});