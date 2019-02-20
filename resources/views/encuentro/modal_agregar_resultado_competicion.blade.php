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
                                <div class="container col-md-12" id="resultado">
                                        <table id="tabla" class="table">
                                            <thead>
                                                <th>Jugador</th>
                                                <th>Club</th>
                                                <th>Posicion</th>
                                            </thead>
                                            <tbody>
                                               
                                            </tbody>
                                            
                                        </table>
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
    var RegistrarResultadoCompeticion = function(id_encuentro) {
        //$("#tabla: td").empty();
        $('#tabla tbody tr').slice(0).remove();
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_competicion_ajax";
      $.get(route, function(data) {
         var i = 1;
         
          $(data).each(function(key,value){
              /*$("#formulario").append('<div id=cardJugador'+i+' '+'class="card"></div>');
              $("#cardJugador"+i).append('<input type=text class="input form-control" id=nombre_jugador' + i + ' ' +
              'value=" " />' );
              $("#cardJugador"+i).append('<input type=text class="input form-control" id=nombre_jugador' + i + ' ' +
              'value=" " />' );
              
              $("#nombre_jugador"+i).val(value.nombre_jugador+' '+value.apellidos_jugador);
              $("#nombre_jugador"+i).prop("readonly", true);
              $("#cardJugador"+i).append('<input type=text class="input form-control" id=nombre_jugador' + i + ' ' +
              'value=" " />' );
              $("#cardJugador"+i).append('<input type=text class="input form-control" id=posicion_jugador' + i + ' ' +
              'value=" " />' );*/

              var nuevaFila = '<tr>'+
                    '<td>' + value.nombre_jugador +' '+value.apellidos_jugador+ '</td>'+
                    '<td>' + value.nombre_club + '</td>'+
                    '<td>' +
                        '<select name="" id=nombre_jugador' + i +' '+'class="form-control" style="width:80px">' +
                        '<option value="">1</option>' +
                        '<option value="">2</option>' +
                        '<option value="">3</option>' +
                        '<option value="">4</option>' +
                        '<option value="">5</option>' +
                        '<option value="">6</option>' +
                        '<option value="">7</option>' +
                        '<option value="">8</option>' +
                        '<option value="">9</option>' +
                        '<option value="">10</option>' +
                        '</select>' +
                        '</td>' +
                  '</tr>';
            $("#tabla").append(nuevaFila);
             
             
              //$("#posicion_jugador"+i).val(value.nombre_jugador+' '+value.apellidos_jugador);
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