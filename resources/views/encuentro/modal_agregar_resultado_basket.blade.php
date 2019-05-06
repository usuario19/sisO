{!! Form::open(['route'=>'encuentro.reg_resultado_basket','method' => 'POST']) !!}
<!-- Modal -->
<div class="modal fade" id="modalResultadoBasket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: flex; align-items: center;">
                <img class="mr-1 img_tb_info" src="/storage/logos/basket.png" alt="">
                <span class="modal-title" id="exampleModalCenterTitle">Registar resultados de {{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) .":"}}</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                    <div class="form-row col-md-12">
                        <div class="col-12 margin_top">
                            Seleccione las siguientes opciones en caso de que el partido tenga tiempo extra:
                        </div>
                        <div class="margin_top col-4">
                            <input type="checkbox" name="hab_te" id="t-extra" class="habilitar">
                            <label for="t-extra">Registrar puntos en tiempo extra</label>
                        </div>
                    </div>
                    @endif
                    <div style="display: none">
                        {!! Form::text('id_disc',$disciplina->id_disc, []) !!} 
                        {!! Form::text('id_enc',$encuentro->id_encuentro, []) !!} 
                        {!! Form::text('id_gestion',$gestion->id_gestion, []) !!} 
                        {!! Form::text('id_fase',$fase->id_fase, []) !!}
                    </div>
                    <div class="form-row col-md-12 margin_none">
                        <div class="form-group col-md-6">
                            <div class="card">
                                <div style="display: none">
                                    {!! Form::text('id_encuentro1', null, ['id'=>'id_encuentro1']) !!} 
                                    {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part1'])
                                    !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('equipo', 'Equipo 1', []) !!} 
                                    {!! Form::text('equipo1',$club1->nombre_club, ['id'=>'nombre_club1','class'=>'form-control','readonly'=>'true'])
                                    !!}
                                </div>
                                <div style="display: none">
                                    {!! Form::text('id_club1',$club1->id_club, ['id'=>'id_club1','class'=>'form-control','readonly'=>'true']) !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('puntos_b1', 'Total puntos partido', []) !!}
                                    {!! Form::text('puntos_b1', null, ['id'=>'puntos_b1','class'=>'form-control',{{--  'readonly'=>'true'  --}}]) !!}
                                </div>
                                @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                                    <div class="margin_top col-md-12 t-extra" style="display:none">
                                        {!! Form::label('puntos_extras1', 'Puntos tiempo extra', []) !!} 
                                        {!! Form::text('puntos_extras1', null, ['id'=>'puntos_extras1','class'=>'form-group form-control',{{--  'readonly'=>'true'  --}}]) !!}
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    {!! Form::label('punto', 'Puntos', []) !!}
                                    <select name="punto1" id="puntos1" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                </div>

                                <div class="margin_top col-md-12">
                                    {!! Form::label('observacion', 'Observacion', []) !!} 
                                    {!! Form::textarea('observacion1', null, ['id'=>'observacion1','class'=>'form-control','rows'=>'2'])
                                    !!}
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="card">
                                <div style="display: none">
                                    {!! Form::text('id_encuentro2',null,['id'=>'id_encuentro2']) !!} {!! Form::text('id_encuentro_club_part2', null, ['id'=>'id_encuentro_club_part2'])
                                    !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('equipo', 'Equipo 2', []) !!} {!! Form::text('equipo2', $club2->nombre_club, ['id'=>'nombre_club2','class'=>'form-control','readonly'=>'true'])
                                    !!}
                                </div>
                                <div style="display: none">
                                    {!! Form::text('id_club2', $club2->id_club, ['id'=>'id_club2','class'=>'form-control','readonly'=>'true']) !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('puntos_b2', 'Total puntos partido', []) !!} 
                                    {!! Form::text('puntos_b2', null, ['id'=>'puntos_b2','class'=>'form-control',{{--  'readonly'=>'true'  --}}])
                                    !!}
                                </div>
                                @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                                <div class="margin_top col-md-12 t-extra" style="display:none">
                                        {!! Form::label('puntos_extras2', 'Puntos tiempo extra', []) !!} 
                                        {!! Form::text('puntos_extras2', null, ['id'=>'puntos_extras2','class'=>'form-group form-control',{{--  'readonly'=>'true'  --}}]) !!}
                                </div>
                                @endif
                                <div class="col-md-12">
                                    {!! Form::label('punto2', 'Puntos', []) !!}
                                    <select name="punto2" id="puntos2" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                </div>

                                <div class="margin_top col-md-12">
                                    {!! Form::label('observacion2', 'Observacion', []) !!} 
                                    {!! Form::textarea('observacion2', null, ['id'=>'observacion2','class'=>'form-control','rows'=>'2'])
                                    !!}
                                </div> 
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-row col-md-12">
                    <div class="form-group col-md-6">
                        {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script>
    var RegistrarResultadoBasket = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_basket_ajax";
      $.get(route, function(data) {
          console.log(data);
          var i = 1;
              $("#puntos1").val(data.puntos1);
              $("#puntos2").val(data.puntos2);
              $("#puntos_b1").val(data.club1);
              $("#puntos_b2").val(data.club2);
              $("#puntos_extras1").val(data.puntos_extras1);
              $("#puntos_extras2").val(data.puntos_extras2);
              $("#observacion1").val(data.observacion1);
              $("#observacion2").val(data.observacion2);
              $("#id_encuentro_club_part1").val(data.id_encuentro_club_part1);
              $("#id_encuentro_club_part2").val(data.id_encuentro_club_part2);
      });
  };
</script>