{!! Form::open(['route'=>'encuentro.reg_resultado_competicion','method' => 'POST']) !!}
        <!-- Modal -->
        <div class="modal fade" id="modalVerResultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                {!! Form::text('id_disc',$disciplina->id_disc, []) !!}
                                {!! Form::text('id_gestion',$gestion->id_gestion, []) !!}
                            </div>
                                <div class="container col-md-12">
                                    <div class="card">
                                        <div style="display: none">
                                            {!! Form::text('id_encuentro1', null, ['id'=>'id_encuentro_ver1']) !!}
                                            {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part_ver1']) !!}
                                        </div>
                                        <div class="col-md-12">
                                            {!! Form::label('equipo', 'Equipo', []) !!}
                                            {!! Form::text('equipo1',null, ['id'=>'nombre_club_ver1','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('punto', 'Puntos', []) !!}
                                            {!! Form::text('punto1', null, ['id'=>'puntos_ver1','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('observacion', 'Observacion', []) !!}
                                            {!! Form::textarea('observacion1', null, ['id'=>'observacion_ver1','class'=>'form-control','rows'=>'2','readonly'=>'true']) !!} 
                                        </div><br>  
                                    </div><br>
                                    <div class="card">
                                        <div style="display: none">
                                            {!! Form::text('id_encuentro2',null,['id'=>'id_encuentro_ver2']) !!}
                                            {!! Form::text('id_encuentro_club_part2', null, ['id'=>'id_encuentro_club_part_ver2']) !!}
                                        </div>
                                        <div class="col-md-12">
                                            {!! Form::label('equipo', 'Equipo', []) !!}
                                            {!! Form::text('equipo2', null, ['id'=>'nombre_club_ver2','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('punto', 'Puntos', []) !!}
                                            {!! Form::text('punto2', null, ['id'=>'puntos_ver2','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('observacion', 'Observacion', []) !!}
                                            {!! Form::textarea('observacion2', null, ['id'=>'observacion_ver2','class'=>'form-control','rows'=>'2','readonly'=>'true']) !!} 
                                        </div><br>  
                                    </div><br>
                                </div>
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">ACEPTAR</button>
                            {{-- {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!} --}}
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 <script>
    var VerResultadoCompeticion = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_competicion_ajax";
      $.get(route, function(data) {
          var i = 1;
          $(data).each(function(key,value){
              $("#id_encuentro_ver"+i).val(value.id_encuentro);
              $("#id_encuentro_club_part_ver"+i).val(value.id_encuentro_club_part);
             // alert("#nombre_club"+i);
              $("#nombre_club_ver"+i).val(value.nombre_club);
              $("#id_club_ver"+i).val(value.id_club);
              $("#puntos_ver"+i).val(value.puntos);
              $("#observacion_ver"+i).val(value.observacion);
              i++;
          });
      });
  }
  </script>
 @section('scripts')
   {!! Html::script('/js/resultado.js') !!}
@endsection