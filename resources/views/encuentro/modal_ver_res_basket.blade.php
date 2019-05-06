{{--  {!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}  --}}
<!-- Modal -->
<div class="modal fade" id="modalVerResultadoBasket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Resultados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div style="display: none">
                        {!! Form::text('id_disc',$disciplina->id_disc, []) !!} {!! Form::text('id_gestion',$gestion->id_gestion, []) !!}
                    </div>
                    <div class="form-row col-12">
                        <div class="form-group col-4">
                            <div style="display: none">
                                {!! Form::text('id_encuentro1', null, ['id'=>'id_encuentro_fut1']) !!} 
                                {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part_fut1'])!!}
                            </div>
                            <img id="imgClub1" class="img-fluid rounded mx-auto d-block" src="" alt="" height=" 100px" width="100px">                                
                            {!! Form::label('club1',null, ['id'=>'nombre_club_fut1']) !!}
                        </div>
                        <div class="form-group col-4">
                            <div class="form-row">
                                <div class="form-group col-5" style="text-align: center;">
                                    <h1 class="d-none d-md-block text-center" id='puntos_fut1'></h1>
                                    <span class="d-md-none d-block text-center" id='puntos_fut11'></span>
                                </div>
                                <div class="form-group col-2">
                                </div>
                                <div class="form-group col-5" style="text-align: center;">
                                    <h1 class="d-none d-md-block text-center" id='puntos_fut2'></h1>
                                    <span class="d-md-none d-block text-center" id='puntos_fut12'></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-5 text-center" style="text-align: center;">
                                    <h1 class="d-none d-md-block text-center" id='goles_fut1'></h1>
                                    <span class="d-md-none d-block text-center" id='goles_fut11'></span>
                                </div>
                                <div class="form-group col-2 text-center">
                                    <h1 class="d-none d-md-block text-center">{{" - "}}</h1>
                                    <span class="d-md-none d-block text-center">{{" - "}}</span>
                                </div>
                                <div class="form-group col-5 text-center" style="text-align: center;">
                                    <h1 class="d-none d-md-block text-center" id='goles_fut2'></h1>
                                    <span class="d-md-none d-block text-center" id='goles_fut12'></span>
                                </div>
                            </div>
                            <div class="form-row" id="div-puntos_extras" style="display:none">
                                <div class="col-4" style="text-align: center;">
                                        <h1 class="text-center" id='puntos_extras_fut1'></h1>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="text-center">{{ "-" }}</h3>
                                </div>
                                <div class="col-4" style="text-align: center;">
                                    <h1 class="text-center" id='puntos_extras_fut2'></h1>
                                </div>
                                <div class="form-group col-12" style="text-align: center;">
                                        <span class="text-center form-text text-muted alert-warning">Tiempo extra.</span>
                                </div>
                            </div>
                            {{--  <div class="form-row" id="div-penales" style="display:none">
                                <div class="col-4" style="text-align: center;">
                                    <h1 class="text-center" id='penales_fut1'></h1>
                                </div>
                                <div class="col-4">
                                    <h3 class="text-center">{{"-"}}</h3>
                                </div>
                                <div class="col-4" style="text-align: center;">
                                    <h1 class="text-center" id='penales_fut2'></h1>
                                </div>
                                <div class="form-group col-12" style="text-align: center;">
                                        <span class="text-center form-text text-muted alert-success">Penales.</span>
                                </div>
                            </div>  --}}
                        </div>
                        <div class="form-group col-4">
                            <div style="display: none">
                                {!! Form::text('id_encuentro2',null,['id'=>'id_encuentro_fut2']) !!} 
                                {!! Form::text('id_encuentro_club_part2', null, ['id'=>'id_encuentro_club_part_fut2'])!!}
                            </div>
                                <img id="imgClub2" class="img-fluid rounded mx-auto d-block" src="" alt="" height=" 100px" width="100px">                                {!! Form::label('club2',null, ['id'=>'nombre_club_fut2']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-block btn-primary btn_aceptar" data-dismiss="modal">ACEPTAR</button>                {{-- {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!} --}}
            </div>
        </div>
    </div>
</div>
{{--  {!! Form::close() !!}  --}}
<script>
    var VerResultadoBasket = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_ajax";
      $.get(route, function(data) {
          var i = 1;
          $(data).each(function(key,value){
                $("#id_encuentro_fut"+i).val(value.id_encuentro);
                $("#id_encuentro_club_part_fut"+i).val(value.id_encuentro_club_part);
                $("#nombre_club_fut"+i).text(value.nombre_club);
                $("#id_club_fut"+i).val(value.id_club);
                if(value.puntos == null)
                {
                    $("#puntos_fut"+i).text("+0");
                    $("#puntos_fut1"+i).text("+0");
                }else{
                    $("#puntos_fut"+i).text("+"+value.puntos);
                    $("#puntos_fut1"+i).text("+"+value.puntos);
                }
                $("#goles_fut"+i).text(value.puntos_b);
                $("#goles_fut1"+i).text(value.puntos_b);
                console.log(value.penales)
                if (value.puntos_extras != null) {
                    $("#puntos_extras_fut"+i).text(value.puntos_extras);
                    $("#goles_fut"+i).text(value.puntos_b + value.puntos_extras);
                    $("#div-puntos_extras").show();
                }
                //alert(value.goles);
                var url = '/storage/logos/'+value.logo
                var file = $.get(url);
                    $('#imgClub'+i).attr('src', url);
              i++;
          });
      });
  }
</script>