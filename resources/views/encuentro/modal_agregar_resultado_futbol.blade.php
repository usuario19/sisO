{!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}
        <!-- Modal -->
        <div class="modal fade" id="modalResultadoFutbol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <!-- {!! Form::text('id_disc',$disciplina->id_disc, []) !!}
                                {!! Form::text('id_gestion',$gestion->id_gestion, []) !!}
                                {!! Form::text('id_fase',$fase->id_fase, []) !!} -->
                            </div>
                                <div class="container col-md-12">
                                    <div class="card">
                                        <div style="display: none">
                                            {!! Form::text('id_encuentro1', null, ['id'=>'id_encuentro1']) !!}
                                            {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part1']) !!}
                                        </div>
                                        <div class="col-md-12">
                                            {!! Form::label('equipo', 'Equipo', []) !!}
                                            {!! Form::text('equipo1',$club1->nombre_club, ['id'=>'nombre_club1','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div style="display: none">
                                            {!! Form::text('id_club1', null, ['id'=>'id_club1','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('goles', 'Total goles', []) !!}
                                            {!! Form::text('goles1', null, ['id'=>'goles1','class'=>'form-control']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('punto', 'Puntos', []) !!}
                                            {!! Form::text('punto1', null, ['id'=>'puntos1','class'=>'form-control']) !!} 
                                        </div> 
                                        
                                        <div class="col-md-12">
                                            {!! Form::label('observacion', 'Observacion', []) !!}
                                            {!! Form::textarea('observacion1', null, ['id'=>'observacion1','class'=>'form-control','rows'=>'2']) !!} 
                                        </div><br>  
                                    </div><br>
                                    <div class="card">
                                        <div style="display: none">
                                            {!! Form::text('id_encuentro2',null,['id'=>'id_encuentro2']) !!}
                                            {!! Form::text('id_encuentro_club_part2', null, ['id'=>'id_encuentro_club_part2']) !!}
                                        </div>
                                        <div class="col-md-12">
                                            {!! Form::label('equipo', 'Equipo', []) !!}
                                            {!! Form::text('equipo2', $club2->nombre_club, ['id'=>'nombre_club2','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div style="display: none">
                                            {!! Form::text('id_club2', null, ['id'=>'id_club2','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('goles', 'Total goles', []) !!}
                                            {!! Form::text('goles2', null, ['id'=>'goles2','class'=>'form-control']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('punto', 'Puntos', []) !!}
                                            {!! Form::text('punto2', null, ['id'=>'puntos2','class'=>'form-control']) !!} 
                                        </div> 

                                        <div class="col-md-12">
                                            {!! Form::label('observacion', 'Observacion', []) !!}
                                            {!! Form::textarea('observacion2', null, ['id'=>'observacion2','class'=>'form-control','rows'=>'2']) !!} 
                                        </div><br>  
                                    </div><br>
                                </div>
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 <script>
    var RegistrarResultadoFutbol = function(id_encuentro) {
        
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_futbol_ajax";
      //console.log(route);
      $.get(route, function(data) {
          console.log(data);
          var i = 1;
         // $(data).each(function(key,value){
          //console.log(value);

              //$("#id_encuentro"+i).val(value.id_encuentro);
             // $("#id_encuentro_club_part"+i).val(value.id_encuentro_club_part);
              //$("#nombre_club"+i).val(value.nombre_club);
              //$("#id_club"+i).val(value.id_club);
              $("#goles1").val(data.club1);
              $("#goles2").val(data.club2);
              //$("#puntos"+i).val(value.puntos);
              //$("#observacion"+i).val(value.observacion);
              //i++;
          //});
      });
  }
  </script>
 @section('scripts')
   {!! Html::script('/js/resultado.js') !!}
@endsection