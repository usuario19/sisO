  <button id="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalAgrDisc">
    <div class="button-div" style="width: 100px">
        <i class="material-icons float-left" style="font-size: 22px">add</i>
        <span class="letter-size">Agregar</span>
    </div>
</button>
{!! Form::open(['route'=>'disciplina.store','method'=>'POST','enctype'=>'multipart/form-data','files'=>true,'id'=>'form_create']) !!}
<div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="modalAgrDisc">
          <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="modalLabel">Agregar disciplina</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        
                            <div class="modal-body">
                                      <div class="form-row">
                                          <div class="form-group mx-auto" style="width: 200px">
                                              <div class="form-row">
                                                  <div class="contenedor_modal">
                                                      <img id="imgOrigen" class="img-thumbnail rounded mx-auto d-block float-left imgtam" src="/storage/foto_disc/sin_imagen.png" alt="">
                                                      
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
                                                            {!! Form::file('foto_disc', ['class'=>'upload','id'=>'input','style'=>'display:none']) !!}
                                                        
                                                        <div class="form-row errorLogin">
                                                            <span>
                                                              <h6 id="error_foto">{{ $errors->has('foto_disc') ? $errors->first('foto_disc'):'' }}</h6>
                                                            </span>
                                                        </div>
                                                      </div>
                                                      </div>
                                                </div>
                                          </div>
                                        <div class="form-group col-md-6">
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('nombre_disc', 'Nombre', []) !!}
                                              {!! Form::text('nombre_disc', null, ['class'=>'form-control']) !!}
                                              <div class="form-group"></div>
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('categoria', 'Categoria', []) !!}
                                              {!! Form::select('categoria', ['0'=>'Mixto', '1'=>'Damas','2'=>'Varones'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                                              <div class="form-group"></div>
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('sub_categoria', 'SubCategoria', []) !!}
                                              {!! Form::select('sub_categoria', ['0'=>'Senior', '1'=>'Libre','2'=>'Libre - Senior','3'=>'Libre y/o Senior'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                                              <div class="form-group"></div>
                                            </div>
                                          </div>
                                        </div>                                
                                  </div>
                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                        {!! Form::label('tipo', 'Tipo', []) !!}
                                        {!! Form::select('tipo', ['0'=>'Equipo', '1'=>'Competicion'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                                        <div class="form-group"></div>
                                      </div>
                                    </div>
                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                          {!! Form::label('tipo', 'Reglamento', []) !!}
                                        <div class="custom-file">
                                          {!! Form::file('reglamento_disc', ['class'=>'custom-file-input file_reg','id'=>"pdf_file", 'accept'=>".pdf"]) !!}
                                          <div class="form-group"></div>
                                          <label class="custom-file-label" for="pdf_file">Seleccionar Archivo</label>
                                        </div>
                                      </div>
                                </div>  
    
                                <div class="form-row">
                                      <div class="form-group col-md-12">
                                        {!! Form::label('descripcion_disc', 'Descripcion', []) !!}
                                        {!! Form::textArea('descripcion_disc', null, ['class'=>'form-control' ,'rows'=>4]) !!}
                                        <div class="form-group"></div>
                                      </div>
                                </div>
                             </div>
                            <div class="modal-footer">
                                  <div class="col-md-6">
                                  {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar btn-primary btn_aceptar']) !!}
                                  </div>
                                  <div class="col-md-6">
                                  {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar_modal_import']) !!}
                                  </div>
                              </div>
                
          </div>
  </div>
</div>
{!! Form::close() !!}
