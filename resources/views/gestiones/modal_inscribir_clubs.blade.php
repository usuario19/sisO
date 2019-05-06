<div class="modal fade" id="modalAgregarclub" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      {!! Form::open(['route'=>'gestion.agregar_clubs_inscripcion','method' => 'POST','enctype' => 'multipart/form-data','id'=>'formreg_club','class'=>'form_disc_reg']) !!}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Agregar clubs</h5>    
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
                            
        <div class="modal-body container col-12">
          <div class="form-group formreg_club"></div>
          
          <table class="mi_tabla table table-sm table-bordered">
            <thead>

                <tr>
                    <th class="text-center" style="width: 50px">
                        
                        {!! Form::checkbox('todo','todo', false, ['class'=>'check_all','id'=>"check_us"]) !!}
                        
                    </th>
                    <th style="font-size: 12px">
                        {!! Form::label('check_us',  'Seleccione las disciplinas que desea agregar:', []) !!}
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
            @foreach($clubs as $club)
                <tr>
                  <td class="text-center" style="margin: auto; padding: 5px">
                      {!! Form::checkbox('id_club[]',$club->id_club, false, ['class'=>'check_us','id'=>"check_all".$club->id_club]) !!}
                  </td>
                  <td>
                      <img src="/storage/logos/{{ $club->logo }}" alt="" width="30" height="30">
                      {!! Form::label("check_all".$club->id_club, $club->nombre_club , []) !!}
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>   
                 
              
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
          {!! Form::close() !!}
      </div>
    </div>
  </div>
