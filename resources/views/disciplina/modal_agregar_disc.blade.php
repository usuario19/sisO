  <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalAgrDisc">
    <div class="button-div" style="width: 100px">
        <i class="material-icons float-left" style="font-size: 18px">add_circle</i>
        <span class="letter-size">Agregar</span>
    </div>
</button>
  {!! Form::open(['route'=>'disciplina.store','method'=>'POST','enctype'=>'multipart/form-data','files'=>true]) !!}
    <div class="modal fade" id="modalAgrDisc" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="modalLabel">Agregar disciplina</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        
                            <div class="modal-body">
                                <div class="container col-md-12">
                                    <div class="form-group col-md-12">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-row">
                                                  <div class="contenedor">
                                                      <img id="imgOrigen" class="rounded mx-auto d-block float-left imgtam" src="/storage/foto_disc/sin_imagen.png" alt="" {{--  style="height=200px ; width=200px"  --}}>
                                                      
                                                        <div id="divtexto">
                                                          <a id="btnCancelar" class="btn btn-outline-dark button noVista">
                                                              <span class="btn_hover ">
                                                                  <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                                                                  
                                                              </span>
                                                          </a>
                                                          
                                                          <a id="texto" class="btn btn-dark button vista">
                                                            <span class="btn_hover ">
                                                                <i id="texto" class="material-icons float-left" style="color:white">edit</i>
                                                            </span>
                                                          </a>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12 {{ $errors->has('logo') ? 'siError':'' }}">
                                                          <div style="display:none">
                                                            {!! Form::file('foto_disc', ['class'=>'upload','id'=>'input']) !!}
                                                          </div>
                                                        </div>
                                                        <div class="form-row errorLogin">
                                                            <span>
                                                              <h6 id="error_foto">{{ $errors->has('foto_disc') ? $errors->first('logo'):'' }}</h6>
                                                            </span>
                                                        </div>
                                                      </div>
                                                </div>
                                          </div>
                                        <div class="form-group col-md-6">
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('nombre_disc', 'Nombre', []) !!}
                                              {!! Form::text('nombre_disc', null, ['class'=>'form-control']) !!}
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('categoria', 'Categoria', []) !!}
                                              {!! Form::select('categoria', ['0'=>'Mixto', '1'=>'Damas','2'=>'Varones'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                                            </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-12">
                                                {!! Form::label('sub_categoria', 'Sub-Categoria', []) !!}
                                                {!! Form::text('sub_categoria', null, ['class'=>'form-control']) !!}
                                              </div>
                                            </div>
                                          
                                        </div>                                
                                
                                  </div>
                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                        {!! Form::label('tipo', 'Tipo', []) !!}
                                        {!! Form::select('tipo', ['0'=>'Equipo', '1'=>'Competicion'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                                      </div>
                                    </div>
                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                        
                                        {!! Form::label('reglamento_disc', 'Subir reglamento', []) !!}
                                        {!! Form::file('reglamento_disc', ['class'=>'form-control']) !!}
                                      </div>
                                </div>  
    
                                <div class="form-row">
                                      <div class="form-group col-md-12">
    
                                        {!! Form::label('descripcion_disc', 'Descripcion', []) !!}
                                        {!! Form::textArea('descripcion_disc', null, ['class'=>'form-control' ,'rows'=>4]) !!}
                                      </div>
                                </div>
                              
                              
                             </div>
                             </div>
                        </div>

                        
                            <div class="modal-footer">
                              {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                                {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                          </div>
                
          </div>
  </div></div>
{!! Form::close() !!}
