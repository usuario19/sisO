<button type="button" class="btn btn-warning btn-block   letter-size" data-toggle="modal" data-target="#modalAgrDisc">
  <div class="button-div" style="width: 100px">
    <i class="material-icons float-left" style="font-size: 22px">add</i>
    <span class="letter-size">Imagen</span>
  </div>
</button>

{!! Form::open(['route'=>'centro.store_imagen','method'=>'POST','enctype' => 'multipart/form-data', 'files'=>true,'id'=>'form_create']) !!}
<div class="modal fade" id="modalAgrDisc" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Agregar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container col-md-11">
        <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-12">
                {!! Form::label('titulo', 'Titulo *', []) !!}
                {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
                <div class="form-group"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  {!! Form::label('id_gestion', 'Gestion', []) !!}
                      <select class="form-control form-control-sm" name="id_gestion" id="id_gestion">
                          <option value=" ">{{ "Seleccione" }}</option>
                        @foreach ($gestiones as $gestion)
                        <option value="{{ $gestion->id_gestion}}">{{$gestion->nombre_gestion}}</option>
                        @endforeach
                        </select>
              </div>
              <div class="form-group col-md-6">
                {!! Form::label('id_disc', 'Disciplina', []) !!}
                {!! Form::select('id_disc', [], null, ['id'=>'id_disc','class'=>'form-control form-control-sm','disabled'])
                !!}
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                {!! Form::label('fecha_publicacion', 'Fecha *', []) !!}
                {!! Form::date('fecha_publicacion', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                <div class="form-group"></div>
              </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                  {!! Form::label('contenido', 'Imagen *', []) !!}
                  {!! Form::file('foto', ['class'=>"form-control"]) !!}
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                    {!! Form::label('contenido', 'Comentario *', []) !!}
                    <textarea name="comentario" id="editor" class="form-control" rows="4"></textarea>
                  </div>
                </div>
            
          </div>
        </div>
      


<div class="modal-footer">
  <div class="col-md-6">
    <button class="btn btn-block btn-primary button_spiner" type="submit" disabled style='display:none'>
      <span class="spinner-grow spinner-grow-sm button_spinner" role="status" aria-hidden="true"></span>
      Cargando...
    </button>
    {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar btn-primary']) !!}
  </div>
  <div class="col-md-6">
    {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
  </div>
</div>
</div>
</div>

</div>
</div>
</div>
{!! Form::close() !!}