{!! Form::open(['route'=>'fase.store','method' => 'POST' ,'enctype' => 'multipart/form-data','id'=>'reg_fase'] ) !!}
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
            {!! Form::text('nombre_fase', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
            <div id ="error_nombre" class="">
            </div>
          </div>
          <div class="form-group">
            {!! Form::label('tipo', 'Tipo', []) !!}
<<<<<<< HEAD
            <div class="">
            </div>
=======
>>>>>>> refs/remotes/origin/master
            <br>
            <div class="card">
              <div class="card-body padd_bottom_none">
                <div class="form-row">
                    @foreach ($tipos2 as $tipo)
                    <div class="form-group col-md-4">
<<<<<<< HEAD
                      {!! Form::radio('tipo',$tipo->id_tipo,true,['id'=>'series'.$tipo->id_tipo,'class'=>'radio']) !!}
                      {!! Form::label('series'.$tipo->id_tipo,ucwords(strtolower($tipo->nombre_tipo)), []) !!}
=======
                      {!! Form::radio('tipo',$tipo->id_tipo,2,['id'=>'series','class'=>'radio']) !!}
                      {!! Form::label('series',$tipo->nombre_tipo, []) !!}
>>>>>>> refs/remotes/origin/master
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
        
        
    </div>
  </div>
</div>
{!! Form::close() !!}

@section('scripts')
  {!! Html::script('/js/validacion_reg_fase.js') !!}
@endsection

