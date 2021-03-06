{!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}
        <!-- Modal -->
        <div class="modal fade" id="modalResultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                {!! Form::text('id_fase',$fase->id_fase, []) !!}
                            </div>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                            <div class="card">
                                        <div style="display: none">
                                            {!! Form::text('id_encuentro1', null, ['id'=>'id_encuentro1']) !!}
                                            {!! Form::text('id_encuentro_club_part1',null, ['id'=>'id_encuentro_club_part1']) !!}
                                        </div>
                                        <div class="col-md-12">
                                            {!! Form::label('equipo', 'Equipo', []) !!}
                                            {!! Form::text('equipo1',null, ['id'=>'nombre_club1','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div style="display: none">
                                            {!! Form::text('id_club1', null, ['id'=>'id_club1','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('punto', 'Puntos', []) !!}
                                            {!! Form::text('punto1', null, ['id'=>'puntos1','class'=>'form-control','required'=>'required']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('observacion', 'Observacion', []) !!}
                                            {!! Form::textarea('observacion1', null, ['id'=>'observacion1','class'=>'form-control','rows'=>'2']) !!} 
                                        </div><br>  
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="card">
                                        <div style="display: none">
                                            {!! Form::text('id_encuentro2',null,['id'=>'id_encuentro2']) !!}
                                            {!! Form::text('id_encuentro_club_part2', null, ['id'=>'id_encuentro_club_part2']) !!}
                                        </div>
                                        <div class="col-md-12">
                                            {!! Form::label('equipo', 'Equipo', []) !!}
                                            {!! Form::text('equipo2', null, ['id'=>'nombre_club2','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div style="display: none">
                                            {!! Form::text('id_club2', null, ['id'=>'id_club2','class'=>'form-control','readonly'=>'true']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('punto', 'Puntos', []) !!}
                                            {!! Form::text('punto2', null, ['id'=>'puntos2','class'=>'form-control','required'=>'required']) !!} 
                                        </div> 
                                        <div class="col-md-12">
                                            {!! Form::label('observacion', 'Observacion', []) !!}
                                            {!! Form::textarea('observacion2', null, ['id'=>'observacion2','class'=>'form-control','rows'=>'2']) !!} 
                                        </div><br>  
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>    
                    <div class="modal-footer">
<<<<<<< HEAD
                       <div class="row col-md-12">
                                                <div class="form-group col-md-6">
                                                    {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary btn_aceptar']) !!}
                                                    </div>
                                                <div class="form-group col-md-6">
                                            {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary']) !!}
                                            </div>
                                            
                                            </div>
=======
                            <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                        {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary btn_aceptar']) !!}
                                        </div>
                                    <div class="form-group col-md-6">
                                {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary']) !!}
                                </div>
                                
                                </div>
>>>>>>> refs/remotes/origin/master
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 <script>
    var RegistrarResultado = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_ajax";
      $.get(route, function(data) {
          var i = 1;
          $(data).each(function(key,value){
              $("#id_encuentro"+i).val(value.id_encuentro);
              $("#id_encuentro_club_part"+i).val(value.id_encuentro_club_part);
              $("#nombre_club"+i).val(value.nombre_club);
              $("#id_club"+i).val(value.id_club);
              $("#puntos"+i).val(value.puntos);
              $("#observacion"+i).val(value.observacion);
              i++;
          });
      });
  }
  </script>
 @section('scripts')
   {!! Html::script('/js/resultado.js') !!}
@endsection