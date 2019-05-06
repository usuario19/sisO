{!! Form::open(['route'=>'encuentro.reg_res_competicion_eliminacion','method' => 'POST','id'=>'form_reg_resultado_competicion']) !!}

 
        <!-- Modal -->
        <div class="modal fade" id="modalResultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                {!! Form::text('set_jugados',3, ['id'=>'id_set_jug']) !!}
                                {!! Form::text('id_gestion',$gestion->id_gestion, ['id'=>'id_gestion']) !!}
                                {!! Form::text('id_fase',$fase->id_fase, ['id'=>'id_fase']) !!}
                                {!! Form::text('id_encuentro',null, ['id'=>'id_encuentro']) !!}
                            </div>
                                <div class="container col-md-12" id="resultado">
                                    <div class="table-responsive-xl">
                                        <table id="tabla_res" class="mi_tabla table table-bordered">
                                                <thead class="table-sm">
                                                    <th>Id</th>
                                                    <th>Foto</th>
                                                    <th>Jugador</th>
                                                    <th>Club</th>
                                                    <th colspan="3" width="150">Sets</th>
                                                    <th width="100">Set <br> ganados</th>
                                                    <th width="100">Puntos</th>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                        </div>
                    </div>    
                    <div class="modal-footer">
                            <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                        <button class="button_spiner btn btn-block btn-success" type="button" disabled style="display:none">
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            Cargando...
                                        </button>
                                        {!! Form::submit('aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
                                    </div>
                                </div>
                    </div>
                </div>      
            </div>
        </div>
 {!! Form::close() !!}
 <script>
    var RegistrarResultadoCompeticion = function(id_encuentro) {
        $('#id_encuentro').val(id_encuentro);
        $('#tabla_res tbody tr').slice(0).remove();
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_competicion_ajax";
      $.get(route, function(data) {
         var i = 1;
         
          $(data).each(function(key,value){
                var nuevaFila = '<tr>'+
                    '<td>'+value.id_jugador +'</td>'+
                    '<td><img class="rounded-circle mx-auto d-block" height=" 30px" width="30px" src=/storage/fotos/'+value.foto_jugador +' '+'/></td>'+
                    '<td>' + value.nombre_jugador +' '+value.apellidos_jugador+ '</td>'+
                    '<td>' + value.alias_club + '</td>'+
                    '<td style=display:none >' + value.id_club + '</td>'+
                    '<td>'+(value.puntos_set1 ==null ? '<input type="text" name="" id=set1'+value.id_jugador+' '+'class="form-control" value="">':'<input type="text" name="" id=set1'+value.id_jugador+' '+'class="form-control" value='+value.puntos_set1+' >')+
                    '<td>'+(value.puntos_set2 ==null ? '<input type="text" name="" id=set2'+value.id_jugador+' '+'class="form-control" value="">':'<input type="text" name="" id=set2'+value.id_jugador+' '+'class="form-control" value='+value.puntos_set2+' >')+
                    '<td>'+(value.puntos_set3 ==null ? '<input type="text" name="" id=set3'+value.id_jugador+' '+'class="form-control" value="">':'<input type="text" name="" id=set3'+value.id_jugador+' '+'class="form-control" value='+value.puntos_set3+' >')+
                    /*'<td>'+(value.puntos_set4 ==null ? '<input type="text" name="" id=set4'+value.id_jugador+' '+'class="form-control" value="">':'<input type="text" name="" id=tiempo'+value.id_jugador+' '+'class="form-control" value='+value.puntos_set4+' >')+
                    '<td>'+(value.puntos_set5 ==null ? '<input type="text" name="" id=set5'+value.id_jugador+' '+'class="form-control" value="">':'<input type="text" name="" id=tiempo'+value.id_jugador+' '+'class="form-control" value='+value.puntos_set5+' >')+
                    '</td>'+*/
                    '<td>' +
                        /*'<select name="" id=id_jugador' + value.id_jugador +' '+'class="form-control" style="width:80px">' +
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
                        '</td>' +*/
                        '<input      id=set_g'+value.id_jugador+' '+'type="text" class="form-control" value='+(value.set_ganados ==null ? " ":value.set_ganados)+'>'
                        + '</td>'+
                        '<td>' +
                                '<select name="" id=id_jugador'+ value.id_jugador +' '+'class="form-control" style="width:80px" value='+value.posicion+' >' +
                                (value.posicion == "0" ? '<option value="0" selected >0</option>':'<option value="0" >0</option>' )+
                                (value.posicion == "1" ? '<option value="1" selected >1</option>':'<option value="1" >1</option>' )+
                                (value.posicion == "2" ? '<option value="2" selected >2</option>':'<option value="2" >2</option>' )+
                                (value.posicion == "3" ? '<option value="3" selected >3</option>':'<option value="3" >3</option>' )+
                                '</select>' +
                                '</td>' +
                        + '</td>'+
                        
                  '</tr>';
            $("#tabla_res").append(nuevaFila);
              i++;
          });
      });
  }

  </script>



{{--  {!! Form::open(['route'=>'encuentro.reg_res_competicion','method' => 'POST','id'=>'form_reg_resultado_competicion']) !!}

 
        <!-- Modal -->
        <div class="modal fade" id="modalResultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                {!! Form::text('id_encuentro',null, ['id'=>'id_encuentro']) !!}
                            </div>
                                <div class="container col-md-12" id="resultado">
                                    <div class="table-responsive-xl">
                                        <table id="tabla_res" class="table">
                                                <thead>
                                                    <th>Id</th>
                                                    <th>Foto</th>
                                                    <th>Jugador</th>
                                                    <th>Club</th>
                                                    <th width="150">Tiempo</th>
                                                    <th width="100">Posicion</th>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                    </div>
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
    var RegistrarResultadoCompeticion = function(id_encuentro) {
        $('#id_encuentro').val(id_encuentro);
        $('#tabla_res tbody tr').slice(0).remove();
      var route = "{{ url('encuentro') }}/" + id_encuentro + "/mostrar_resultado_competicion_ajax";
      $.get(route, function(data) {
         var i = 1;
         
          $(data).each(function(key,value){
                var nuevaFila = '<tr>'+
                    '<td>'+value.id_jugador +'</td>'+
                    '<td><img class="rounded-circle mx-auto d-block" height=" 30px" width="30px" src=/storage/fotos/'+value.foto_jugador +' '+'/></td>'+
                    '<td>' + value.nombre_jugador +' '+value.apellidos_jugador+ '</td>'+
                    '<td>' + value.nombre_club + '</td>'+
                    '<td style=display:none >' + value.id_club + '</td>'+
                    '<td>'+(value.tiempo ==null ? '<input type="text" name="" id=tiempo'+value.id_jugador+' '+'class="form-control" value="" placeholder="HH:mm:ss">':'<input type="text" name="" id=tiempo'+value.id_jugador+' '+'class="form-control" value='+value.tiempo+' placeholder="HH:mm:ss">')+
                    '</td>'+
                    '<td>' +
                        /*'<select name="" id=id_jugador' + value.id_jugador +' '+'class="form-control" style="width:80px">' +
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
                        '</td>' +*/
                        '<input      id=id_jugador'+value.id_jugador+' '+'type="text" class="form-control" value='+(value.posicion ==null ? "":value.posicion)+'>'
                        + '</td>'+
                        
                  '</tr>';
            $("#tabla_res").append(nuevaFila);
              i++;
          });
      });
  }

  </script>  --}}