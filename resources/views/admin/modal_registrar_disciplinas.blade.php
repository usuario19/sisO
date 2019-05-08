<button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalAgregarDisc">
                              <div class="button-div" style="width: 100px">
                                  <i class="material-icons float-left" style="font-size: 22px">add</i>
                                  <span class="letter-size">Agregar</span>
                              </div>
                          </button>
{!! Form::open(['route'=>'gestion.agregar_disciplinas','method' => 'POST','enctype'=>'multipart/form-data','files'=>true,'id'=>'formreg_disc','class'=>'form_disc_reg'])
!!}
<div class="modal fade" id="modalAgregarDisc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Agregar disciplinas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
      </div>
      <div class="modal-body container col-10">
        <div class="form-group formreg_disc"></div>

        <table class="mi_tabla table table-condensed table-bordered ">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px">

                {!! Form::checkbox('todo','todo', false, ['class'=>'check_all','id'=>"check_us"]) !!}


              </th>
              <th style="font-size: 14px">
                {!! Form::label('check_us', 'Seleccione las disciplinas que desea agregar:', []) !!}

              </th>
            </tr>
          </thead>
          <tbody>
            <tr style="display: none">
              <td>
                <div>
                  {!! Form::text('id_gestion', $gestion->id_gestion, []) !!}
                </div>
              </td>
            </tr>

            @foreach($disciplinasDisponibles as $disciplina)
            <tr>
              <td class="text-center" style="margin: auto; padding: 5px">
                {!! Form::checkbox('id_disc[]',$disciplina->id_disc, false, ['class'=>'check_us','id'=>"check_all".$disciplina->id_disc])
                !!}
              </td>
              <td>
                <img src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" width="30px" height="30px"> 
                {!! Form::label("check_all".$disciplina->id_disc,$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)." ".$disciplina->nombre_subcateg($disciplina->sub_categoria) , []) !!}

              </td>
            </tr>
            @endforeach

          </tbody>
        </table>

        <div class="col-md-6">
          <div class="form-row">
            <div class="form-group col-md-12">


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
									</button> {!! Form::submit('aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
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