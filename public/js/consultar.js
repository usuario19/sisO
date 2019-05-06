$("#buscador_club").change(function (event) {
    var id_club = $('#buscador_club').val();
    $("#buscador_club_gestion").prev('.loading').show();
    //peticion ajax
    $.get('reportes/consultar/'+ id_club +'/gestiones', function(data) {
        //$('#buscador_club').empty();
        
        if (data.length > 0) {
                $("#buscador_club_gestion").prop('disabled', false);
                var html_disc = '<option value="" selected>Seleccione una gestion</option>';

            for (var i = 0; i < data.length; i++) {
                html_disc += '<option value=" ' + data[i].id_gestion + '"> ' + data[i].nombre_gestion + '</option>';
                $('#buscador_club_gestion').html(html_disc);
            }
        }else
            $("#buscador_club_gestion").prop('disabled', true);


            $("#buscador_club_gestion").prev('.loading').hide();
        
    });
});
$("#buscador_club_gestion").change(function (event) {
    var id_club = $('#buscador_club').val();
    var id_gestion = $('#buscador_club_gestion').val();
    $("#buscador_club_disc").prev('.loading').show();
    //peticion ajax
    $.get('reportes/consultar/'+ id_club +'/'+id_gestion+'/disciplinas', function(data) {
        //$('#buscador_club').empty();
        
        if (data.length > 0) {
                $("#buscador_club_disc").prop('disabled', false);
                var html_disc = '<option value="" selected>Seleccione una disciplina</option>';

            for (var i = 0; i < data.length; i++) {
                html_disc += '<option value=" ' + data[i].id_club_part + '"> ' + data[i].nombre_disc + '</option>';
                $('#buscador_club_disc').html(html_disc);
            }
        }else
            $("#buscador_club_disc").prop('disabled', true);


            $("#buscador_club_disc").prev('.loading').hide();
        
    });
});
//reporte fixture
$("#buscador_fix_gest").change(function (event) {
    var id_gestion = $('#buscador_fix_gest').val();
    $("#buscador_fix_disc").prev('.loading').show();
    //peticion ajax
    $.get('reportes/consultar/'+id_gestion+'/disciplinas', function(data) {
        //$('#buscador_club').empty();
        
        if (data.length > 0) {
                $("#buscador_fix_disc").prop('disabled', false);
                var html_disc = '<option value="" selected>Seleccione una disciplina</option>';

            for (var i = 0; i < data.length; i++) {
                html_disc += '<option value=" ' + data[i].id_part + '"> ' + data[i].nombre_disc + '</option>';
                $('#buscador_fix_disc').html(html_disc);
            }
        }else
            $("#buscador_fix_disc").prop('disabled', true);
            $("#buscador_fix_disc").prev('.loading').hide();
        
    });
});
$("#buscador_res_gest").change(function (event) {
    var id_gestion = $('#buscador_res_gest').val();
    $("#buscador_res_disc").prev('.loading').show();
    //peticion ajax
    $.get('reportes/consultar/'+id_gestion+'/disciplinas', function(data) {
        //$('#buscador_club').empty();
        
        if (data.length > 0) {
                $("#buscador_res_disc").prop('disabled', false);
                var html_disc = '<option value="" selected>Seleccione una disciplina</option>';

            for (var i = 0; i < data.length; i++) {
                html_disc += '<option value=" ' + data[i].id_part + '"> ' + data[i].nombre_disc + '</option>';
                $('#buscador_res_disc').html(html_disc);
            }
        }else
            $("#buscador_res_disc").prop('disabled', true);
            $("#buscador_res_disc").prev('.loading').hide();
        
    });
});
$("#buscador_res_disc").change(function (event) {
    var id_part = $('#buscador_res_disc').val();
    $("#buscador_res_fase").prev('.loading').show();
    //peticion ajax
    $.get('reportes/consultar/'+id_part+'/fases', function(data) {
        //$('#buscador_club').empty();
        
        if (data.length > 0) {
                $("#buscador_res_fase").prop('disabled', false);
                var html_disc = '<option value="" selected>Seleccione una fase</option>';

            for (var i = 0; i < data.length; i++) {
                html_disc += '<option value=" ' + data[i].id_fase + '"> ' + data[i].nombre_fase + '</option>';
                $('#buscador_res_fase').html(html_disc);
            }
        }else
            $("#buscador_res_fase").prop('disabled', true);
            $("#buscador_res_fase").prev('.loading').hide();
        
    });
});