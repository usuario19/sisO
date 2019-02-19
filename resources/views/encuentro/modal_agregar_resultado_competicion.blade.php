{!! Form::open(['route'=>'encuentro.reg_resultado_competicion','method' => 'POST']) !!}
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
                                <div class="container col-md-12">
                                
                                        <div id ="cardJugador">
                                       
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
    //$("#cardJugador").append("<div>Hello, Stack Overflow users</div>");
    //$ (document.createElement ('div'));
    var RegistrarResultadoCompeticion = function(id_encuentro) {
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_competicion_ajax";
      $.get(route, function(data) {
          var i = 1;
          $(data).each(function(key,value){
              $("#cardJugador").append("<div>"+value.id_encuentro+"</div>");
              $("#cardJugador").append("<input type='text'>");
              //$("#id_encuentro"+i).val(value.id_encuentro);
              //$("#id_encuentro_seleccion"+i).val(value.id_encuentro_seleccion);
              //$("#nombre_club"+i).val(value.nombre_club);
              //$("#id_club"+i).val(value.id_club);
              //$("#posicion"+i).val(value.posicion);
              //$("#observacion"+i).val(value.observacion);
              i++;
          });
      });
  }
  
  </script>
 
 @section('scripts')
   {!! Html::script('/js/resultado.js') !!}
@endsection