{!! Form::open(['route'=>'encuentro.reg_res_competicion','method' => 'POST','id'=>'form_reg_resultado_competicion_fase']) !!}

    <div class="modal fade" id="modalResultadoFase" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                {!! Form::text('id_disc',$disciplina->id_disc, ['id'=>'id_disc']) !!}
                                {!! Form::text('id_gestion',$gestion->id_gestion, ['id'=>'id_gestion']) !!}
                                {!! Form::text('id_fase',$fase->id_fase, ['id'=>'id_fase']) !!}
                                
                            </div>
                                <div class="container col-md-12" id="resultado">
                                        <table id="tabla_res" class="table">
                                            <thead>
                                                <th>Id</th>
                                                <th>Foto</th>
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
                            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary','id'=>'aceptar_resultado']) !!}
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 <script>
    var RegistrarResultadoCompeticionFase = function(id_fase) {
        $('#id_fase').val(id_fase);
        $('#tabla_res tbody tr').slice(0).remove();
      var route = "{{ url('gestion') }}/" + id_fase + "/mostrar_resultado_competicion_fase_ajax";
      $.get(route, function(data) {
         var i = 1;
          $(data).each(function(key,value){
                var nuevaFila = '<tr>'+
                    '<td>'+value.id_jugador +'</td>'+
                    '<td><img class="rounded-circle mx-auto d-block" height=" 30px" width="30px" src=/storage/fotos/'+value.foto_jugador +' '+'/></td>'+
                    '<td>' + value.nombre_jugador +' '+value.apellidos_jugador+ '</td>'+
                    '<td>' + value.nombre_club + '</td>'+
                    '<td style=display:none >' + value.id_club + '</td>'+
                    '<td>' +
                        '<input value="" id=id_jugador'+value.id_jugador+' '+'type="text" class="form-control" style="width:50px"/>'
                        + '</td>'+
                        
                  '</tr>';
            $("#tabla_res").append(nuevaFila);
              i++;
          });
      });
  }

  </script>
  @section('scripts')
  {!! Html::script('/js/resultado_competicion_fase.js') !!}
  @endsection