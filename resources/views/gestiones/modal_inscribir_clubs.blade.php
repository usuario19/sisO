<div class="modal fade" id="modalAgregarclub" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      {!! Form::open(['route'=>'gestion.agregar_clubs_inscripcion','method' => 'POST','enctype' => 'multipart/form-data']) !!}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Agregar clubs</h5>    
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
                            
        <div class="modal-body container col-10">
          
          <table class="table table-sm table-bordered">
            <thead>

                <tr>
                    <th class="text-center" style="width: 50px">
                        
                        {!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}
                        
                    </th>
                    <th style="font-size: 12px">
                        <span>Seleccione los clubs que desea inscribir:</span>
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
                      {!! Form::checkbox('id_club[]',$club->id_club, false, ['class'=>'check_us']) !!}
                  </td>
                  <td>
                      <img src="/storage/logos/{{ $club->logo }}" alt="" width="50px" height="50px">
                      <span class="letter-size" style="font-size: 14px">{{ $club->nombre_club }}</span>
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
          {!! Form::close() !!}
      </div>
    </div>
  </div>
