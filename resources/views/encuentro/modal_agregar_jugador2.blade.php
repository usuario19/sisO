{!! Form::open(['route'=>'encuentro.agregar_jugador_encuentro','method' => 'POST','enctype' => 'multipart/form-data']) !!}

<div class="modal fade" id="modalAgregarJugador2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Jugador</h5>    
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>    
              <div class="modal-body container col-10">
                <table class="table table-sm table-bordered">
                  <thead>
                      <tr>
                          <th class="text-center" style="width: 50px">
                              {!! Form::checkbox('todo','todo', false, ['id'=>'todo2']) !!}
                          </th>
                          <th style="font-size: 12px">
                              <span>Seleccione los jugadores que participaran:</span>
                          </th>
                        </tr>
                  </thead>
                <tbody>
                  <tr style="display: none">
                    <td>
                        <div>
                            {!! Form::text('id_encuentro', $encuentro->id_encuentro, []) !!}
                          </div>
                    </td>
                  </tr>
                  @foreach($jug_disp2 as $jugador)
                      <tr>
                        <td class="text-center" style="margin: auto; padding: 5px">
                            {!! Form::checkbox('id_jugador[]',$jugador->id_jugador, false, ['class'=>'check_us']) !!}
                        </td>
                        <td>
                            <img src="/storage/fotos/{{ $jugador->foto_jugador }}" alt="" width="50px" height="50px">
                            <span class="letter-size" style="font-size: 14px">{{ $jugador->nombre_jugador.' '. $jugador->apellidos_jugador}}</span>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>   
                       
                    
              </div>
              <div class="modal-footer">
                  <div class="row col-md-12">
                      <div class="form-group col-md-6">
                          {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary btn_aceptar']) !!}
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