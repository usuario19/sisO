{{--  {!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}  --}}
<!-- Modal -->
<div class="modal fade" id="modalVerResultadoSet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <div class="form-row col-12">
                        <div class="form-group col-4">
                            <img id="imgClub1" class="img-fluid rounded mx-auto d-block" src="" alt="" height=" 50px" width="50px">                                
                            {!! Form::label('club1',null, ['id'=>'nombre_club_fut1','class'=>'text-center']) !!}
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
                        </div>
                        <div class="form-group col-4">
                            <img id="imgClub2" class="img-fluid rounded mx-auto d-block" src="" alt="" height="50px" width="50px">                                
                            {!! Form::label('club2',null, ['id'=>'nombre_club_fut2','class'=>'text-center']) !!}
                        </div>
                    </div>
                    <div class="mx-auto col-12">
                        <div class="div_sets form-row">
                            <div class="col-2"></div>
                            <div class="col-2">S1</div>
                            <div class="col-2">S2</div>
                            <div class="col-2">S3</div>
                            <div class="col-2">S4</div>
                            <div class="col-2">S5</div>
                        </div>
                        <div class="div_sets form-row">
                            <div id="p_set_g1" class="col-2 alert-primary border"></div>
                            <div id="p_set11" class="col-2  border"></div>
                            <div id="p_set21" class="col-2  border"></div>
                            <div id="p_set31" class="col-2  border"></div>
                            <div id="p_set41" class="col-2  border"></div>
                            <div id="p_set51" class="col-2  border"></div>
                        </div>
                        <div class="div_sets form-row">
                            <div id="p_set_g2" class="col-2  alert-primary border"></div>
                            <div id="p_set12" class="col-2  border"></div>
                            <div id="p_set22" class="col-2  border"></div>
                            <div id="p_set32" class="col-2  border"></div>
                            <div id="p_set42" class="col-2  border"></div>
                            <div id="p_set52" class="col-2  border"></div>
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
    var VerResultadoSet = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_ajax_set";
      $.get(route, function(data) {
          console.log(data);
          var i = 1;
          $(data).each(function(key,value){
                $("#nombre_club_fut"+i).text(value.nombre_club);
                if(value.puntos == null)
                {
                    $("#puntos_fut"+i).text("+0");
                    $("#puntos_fut1"+i).text("+0");
                }else{
                    $("#puntos_fut"+i).text("+"+value.puntos);
                    $("#puntos_fut1"+i).text("+"+value.puntos);
                }
                $("#goles_fut"+i).text(value.set_ganados);
                $("#goles_fut1"+i).text(value.set_ganados);

                $("#p_set_g"+i).text(value.set_ganados);
                
                $("#p_set1"+i).text(value.puntos_set1);
                $("#p_set2"+i).text(value.puntos_set2);
                $("#p_set3"+i).text(value.puntos_set3);
                $("#p_set4"+i).text(value.puntos_set4);
                $("#p_set5"+i).text(value.puntos_set5);
                
                
                var url = '/storage/logos/'+value.logo
                var file = $.get(url);
                    $('#imgClub'+i).attr('src', url);
              i++;
          });
      });
  }
</script>