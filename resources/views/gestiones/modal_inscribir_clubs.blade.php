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
                            
        <div class="modal-body">
          <h6>Seleccione los clubs que desea inscribir:</h6><br>
          <div class="col-md-6">
            <div class="form-row">
              <div class="form-group col-md-12">
                <div style="display: none">
                  {!! Form::text('id_gestion', $gestion->id_gestion, []) !!}
                </div>
                 @foreach($clubs as $club)
                    {!! Form::checkbox('id_club[]',$club->id_club, false, ['class'=>'check_us']) !!}
                    <img src="/storage/logos/{{ $club->logo }}" alt="" width="50px" height="50px">{{ $club->nombre_club }} <br>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
          {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
        </div>
          {!! Form::close() !!}
      </div>
    </div>
  </div>
