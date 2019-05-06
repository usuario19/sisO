{!! Form::open(['route'=>'fase.store_jug_eliminacion_competicion','method' => 'POST','class'=>'form_disc_reg','id'=>'Form'.$fase->id_fase])
!!}

<div class="modal fade" id="v" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Agregar jugadors</h5>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
      </div>
      <div class="modal-body">
        <div class="form-group Form{{ $fase->id_fase}}"></div>
        <div class="col-md-12">
          <div style="display:none ">
            {!! Form::text('id_gestion', $gestion->id_gestion, []) !!} {!! Form::text('id_disciplina', $disciplina->id_disc, []) !!}
            {!! Form::text('id_fase', $fase->id_fase, []) !!}
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <table class="table mi_tabla table-sm table-bordered">
                <thead>
                  <tr>
                    <th colspan="6">
                      {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                    </th>
                  </tr>
                  <tr>
                    <th> {!! Form::checkbox('todo','check', false, ['class'=>'check_all','id'=>'check_us']) !!}</th>
                    <th colspan="4">
                      <label for="check_us">Seleccione los jugadores que desea agregar:</label>
                    </th>
                  </tr>

                </thead>
                <tbody id="datos">
                  @foreach($jugsDisponibles as $jugador)
                  <tr>
                    <td class="text-center">
                      {!! Form::checkbox('id_jugador[]',$jugador->id_seleccion, false, ['class'=>'check_us','id'=>'jugador'.$jugador->id_jugador])
                      !!}
                    </td>
                    <td width="30">
                      <img class="img_tb_info" src="/storage/logos/{{ $jugador->logo }}" alt="">
                    </td>
                    <td width="30">
                      <img class="img_tb_info" src="/storage/fotos/{{ $jugador->foto_jugador }}" alt=""> 
                    </td>
                    <td>
                      {!! Form::label('jugador'.$jugador->id_jugador,$jugador->nombre_jugador." ".$jugador->apellidos_jugador, []) !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
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