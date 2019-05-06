{!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}
<!-- Modal -->
<div class="modal fade" id="modalResultadoFutbol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Resultados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                    <div class="form-row col-md-12">
                        <div class="col-12 margin_top">
                            Seleccione las siguientes opciones en caso de que el partido tenga tiempo extra y/o penales:
                        </div>
                        <div class="margin_top col-4">
                            <input type="checkbox" name="hab_te" id="t-extra" class="habilitar">
                            <label for="t-extra">Registrar goles tiempo extra</label>
                        </div>
                        <div class="margin_top col-3">
                            <input type="checkbox" name="hab_p" id="goles_penales" class="habilitar">
                            <label for="goles_penales">Registrar penales</label>
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
                                    {!! Form::text('id_encuentro1', null, ['id'=>'id_encuentro1']) !!} {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part1'])
                                    !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('equipo', 'Equipo 1', []) !!} {!! Form::text('equipo1',$club1->nombre_club, ['id'=>'nombre_club1','class'=>'form-control','readonly'=>'true'])
                                    !!}
                                </div>
                                <div style="display: none">
                                    {!! Form::text('id_club1',$club1->id_club, ['id'=>'id_club1','class'=>'form-control','readonly'=>'true']) !!}
                                </div>
                                <div class="margin_top col-md-12">
                                    {!! Form::label('goles', 'Total goles', []) !!} 
                                    {!! Form::text('goles1', null, ['id'=>'goles1','class'=>'form-control','readonly'=>'true']) !!}
                                </div>
                                @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                                    <div class="margin_top col-md-12 t-extra" style="display:none">
                                        {!! Form::label('puntos_extras1', 'Goles tiempo extra', []) !!} 
                                        {!! Form::text('puntos_extras1', null, ['id'=>'puntos_extras1','class'=>'form-group form-control','readonly'=>'true']) !!}
                                    </div>
                                    <div class="margin_top col-md-12 goles_penales" style="display:none">
                                        {!! Form::label('penales1', 'Goles penales', []) !!} 
                                        {!! Form::text('penales1', null, ['id'=>'penales1','class'=>'form-group form-control','readonly'=>'true']) !!}
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    {!! Form::label('punto', 'Puntos', []) !!}
                                    <select name="punto1" id="puntos1" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select> {{-- {!! Form::text('punto1', null,
                                    ['id'=>'puntos1','class'=>'form-control']) !!} --}}
                                </div>

                                <div class="margin_top col-md-12">
                                    {!! Form::label('observacion', 'Observacion', []) !!} {!! Form::textarea('observacion1', null, ['id'=>'observacion1','class'=>'form-control','rows'=>'2'])
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
                                    {!! Form::label('goles', 'Total goles', []) !!} {!! Form::text('goles2', null, ['id'=>'goles2','class'=>'form-control','readonly'=>'true'])
                                    !!}
                                </div>
                                @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'eliminacion')
                                <div class="margin_top col-md-12 t-extra" style="display:none">
                                        {!! Form::label('puntos_extras2', 'Goles tiempo extra', []) !!} 
                                        {!! Form::text('puntos_extras2', null, ['id'=>'puntos_extras2','class'=>'form-group form-control','readonly'=>'true']) !!}
                                </div>
                                        
                                <div class="margin_top col-md-12 goles_penales" style="display:none">

                                        {!! Form::label('penales2', 'Goles penales', ['class'=>'margin_top']) !!} 
                                        {!! Form::text('penales2', null, ['id'=>'penales2','class'=>'form-group form-control','readonly'=>'true']) !!}
                                </div>
                                @endif
                                <div class="col-md-12">
                                    {!! Form::label('punto2', 'Puntos', []) !!}
                                    <select name="punto2" id="puntos2" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select> {{-- {!! Form::text('punto2', null,
                                    ['id'=>'puntos2','class'=>'form-control']) !!} --}}
                                </div>

                                <div class="margin_top col-md-12">
                                    {!! Form::label('observacion2', 'Observacion', []) !!} {!! Form::textarea('observacion2', null, ['id'=>'observacion2','class'=>'form-control','rows'=>'2'])
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
    var RegistrarResultadoFutbol = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_futbol_ajax";
      $.get(route, function(data) {
          console.log(data);
          var i = 1;
              $("#goles1").val(data.club1);
              $("#goles2").val(data.club2);
              $("#puntos1").val(data.puntos1);
              $("#puntos2").val(data.puntos2);
              $("#penales1").val(data.penales1);
              $("#penales2").val(data.penales2);
              $("#puntos_extras1").val(data.puntos_extras1);
              $("#puntos_extras2").val(data.puntos_extras2);
              $("#observacion1").val(data.observacion1);
              $("#observacion2").val(data.observacion2);
              $("#id_encuentro_club_part1").val(data.id_encuentro_club_part1);
              $("#id_encuentro_club_part2").val(data.id_encuentro_club_part2);
      });
  };
</script>