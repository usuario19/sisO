 {!! Form::open(['route'=>'fecha.store','method' => 'POST' ,'enctype' => 'multipart/form-data','id'=>'boton_aceptar'] ) !!}
  <div class="modal fade" id="modalFecha" tabindex="-1" role="dialog" aria-labelledby="modalLabelFecha" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelFecha">Agregar fecha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div style="display:none">
          {!! Form::text('id_grupo', $grupo->id_grupo, ['class'=>'form-control','placeholder'=>'Nombre','required' => 'required']) !!}
        </div>

          <div class="form-group">
            {!! Form::label('nombre_fecha', 'Nombre', []) !!}
            {!! Form::text('nombre_fecha', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
          </div>
         
      <div>
        <div style="display: none;">
        {!! Form::text('id_fase', $fase->id_fase, []) !!}
        
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
</div>
{!! Form::close() !!}
