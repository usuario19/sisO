{!! Form::open(['route'=>'encuentro.store_competicion_serie_set','method' => 'POST']) !!}
<!-- Modal -->
<div class="modal fade" id="modalEncuentro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Agregar encuentro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
      </div>

      <div class="modal-body">
        <div style="display: none">
          {!! Form::text('id_gestion', $gestion->id_gestion, []) !!} 
          {!! Form::text('id_disc', $disciplina->id_disc, []) !!}
        </div>
        <div class="form-row container">
            {!! Form::label('jugadores', "Participantes", []) !!}

          <div class="card col-md-12">

            <div class="card-body padd_left_none padd_right_none">
                <div class="form-group col-md-12">
                    {!! Form::label('jugador1', "Participante 1", []) !!}
                    <select class="form-control" name="jugador1" id="">
                       @foreach ($participantes as $participante)
                       <option value="{{$participante->id_seleccion}}">{{ $participante->nombre_jugador." ".$participante->apellidos_jugador." - " }}{{ $participante->alias_club }}</option>
                       @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                     {!! Form::label('jugador2', "Participante 2", []) !!}
                     <select class="form-control" name="jugador2" id="">
                         @foreach ($participantes->sortBy('nombre_jugador') as $participante)
                         <option value="{{$participante->id_seleccion}}">{{ $participante->nombre_jugador." ".$participante->apellidos_jugador." - " }}{{ $participante->alias_club }}</option>
                         @endforeach
                      </select>
                   </div>
            </div>
          </div>
        </div>
        <br>
        <div class="form-row container">
          <div class="form-group col-md-6">
            {!! Form::label('ubicacion', 'Ubicacion', []) !!} {!! Form::select('id_centro',$centros,null, ['class'=>'form-control'])
            !!}

          </div>
          <div class="form-group col-md-6">
            {!! Form::label('id_fecha', 'Fecha', []) !!} {!! Form::select('id_fecha',$fechas2, null,['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-row container">
          <div class="form-group col-md-6">
            {!! Form::label('fechas', 'Fecha', []) !!} {!! Form::date('fecha', \Illuminate\Support\Carbon::now(), ['class'=>'form-control'])
            !!}

          </div>
          <div class="form-group col-md-6">
            {!! Form::label('hora', 'Hora', []) !!} {!! Form::time('hora', \Illuminate\Support\Carbon::now()->format('H:i'), ['class'=>'form-control'])
            !!}

          </div>
        </div>
        <div class="form-row container">
          <div class="form-group col-md-12">
            {!! Form::label('detalle', 'Detalle', []) !!} {!! Form::textarea('detalle',null, ['class'=>'form-control','rows'=>4]) !!}
          </div>
        </div>
        
         {{--   <div class="col-md-12">
              <div class="table-responsive-xl">
                  {!! Form::label('texto', 'Seleccione participantes', []) !!}
                <table class="table mi_tabla table-sm table-bordered">
                  <thead>
                    <tr>
                      <th width="30">
                          {!! Form::checkbox('texto', 'todo', null, ['class'=>'check_all','id'=>'check_us']) !!}
                      </th>
                      <th>club</th>
                      <th>Jugadores</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($participantes as $participante) 
                      <tr>
                        <td>
                          {!! Form::checkbox('id_participante[]',$participante->id_seleccion, false, ['class'=>'check_us','id'=>'check'.$participante->id_jugador]) !!}
                        </td>
                        <td width="30">
                          <img src="/storage/logos/{{ $participante->logo }}" alt="" width="30" height="30">
                        </td>
                        <td><img src="/storage/fotos/{{ $participante->foto_jugador }}" alt="" width="30" height="30">
                          <label for="check{{$participante->id_jugador}}"> {{ $participante->nombre_jugador." ".$participante->apellidos_jugador }}</label>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
          </div> </div> --}}
        
      </div>

      <div class="modal-footer">
          <div class="form-row col-md-12">
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