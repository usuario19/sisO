{!! Form::open(['route'=>'encuentro.store_gol_jugador','method' => 'POST','enctype' => 'multipart/form-data']) !!}

<div class="modal fade" id="modalRegGol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Registrar Goles</h5>    
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>    
              <div class="modal-body container col-10">
                    <div style="display: none">
                            {!! Form::text('id_encuentro', $encuentro->id_encuentro, ['id'=>'id_encuentro']) !!}
                            {!! Form::text('id_jugador', null, ['id'=>'id_jugador']) !!}
                    </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <img id="foto_jugador" src="" alt="" width="100px" height="100px">

                            </div>
                            <div class="form-group col-md-6">
                                <h5 id="nombre_jugador" value=""></h5>
                                    {!! Form::label('goles', 'Cantidad de goles', []) !!}
                                    {!! Form::text('goles', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
              </div>
              <div class="modal-footer">
                {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
              </div>
                
            </div>
          </div>
        </div>
{!! Form::close() !!}
<script>
    var reg_gol_jugador = function(id_jugador) {
        var id_encuentro =$('#id_encuentro').val();
        var route = "{{ url('encuentro') }}/" + id_encuentro + '/'+id_jugador+"/reg_gol_jugador_ajax";
        $.get(route, function(data) {
            $('#id_jugador').val(data.id_jugador);
            $("#nombre_jugador").text(data.nombre_jugador+' '+data.apellidos_jugador+':');
            var url = '/storage/fotos/'+data.foto_jugador
            var file = $.get(url);
                $('#foto_jugador').attr('src', url);
                        });
            
    }
</script>
