{!! Form::open(['route'=>'fase.store','method' => 'POST' ,'enctype' => 'multipart/form-data'] ) !!}
<div class="modal fade" id="modalFase" tabindex="-1" role="dialog" aria-labelledby="modalLabelFase" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelFase">Agregar fase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       

          <div class="form-group">
            {!! Form::label('nombre', 'Nombre', []) !!}
            {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('tipo', 'Tipo', []) !!}
            <br>
            <div class="card">
              <div class="card-body">
                <div class="form-row">
                  
                    @foreach ($tipos2 as $tipo)
                    <div class="form-group col-md-4">
                      {!! Form::radio('tipo',$tipo->id_tipo,null,['id'=>'series','class'=>'radio']) !!}
                      {!! Form::label('series',$tipo->nombre_tipo, []) !!}
                      </div>
                    @endforeach       
                </div>  
              </div>
           </div>
       
          </div>
      <div>
        <div style="display: none;">
        {!! Form::text('id_disc', $id_disc, []) !!}
        {!! Form::text('id_gestion', $id_gestion, []) !!}
         </div>
      </div>
        <div class="modal-footer">
          {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
          {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
        </div>
        
        </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
