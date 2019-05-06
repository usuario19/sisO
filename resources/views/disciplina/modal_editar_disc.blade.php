
  {!! Form::open(['route'=>'disciplina.update','method' => 'PUT' ,'enctype' => 'multipart/form-data', 'files'=>true,'id'=>'form_update'] ) !!}
    <div class="modal fade" id="modalEditDisc" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="modalLabel">Editar disciplina</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>

                        <div class="modal-body">
                                <div class="form-group col-md-12">
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-grow" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-row">
                                              <div class="contenedor_modal">
                                                  <img id="imgOrigen2" class="img-thumbnail rounded mx-auto d-block float-left imgtam" src="/storage/foto_disc/sin_imagen.png" alt="">
                                                  
                                                    <div id="divtexto2">
                                                      <a id="btnCancelar2" class="btn btn-outline-dark button noVista">
                                                          <span class="btn_hover ">
                                                              <i id="btnCancelar2" class="material-icons float-left" style="color:white">clear</i>
                                                              
                                                          </span>
                                                      </a>
                                                      
                                                      <a id="texto2" class="btn btn-dark button vista">
                                                        <span class="btn_hover ">
                                                            <i id="texto2" class="material-icons float-left" style="color:white">edit</i>
                                                        </span>
                                                      </a>
                                                    </div>
                                                </div>
                                                <div style="display: none;">
                                                    {!! Form::text('id_disc', null, ['id'=>'edit_id_disc','class'=>'form-control']) !!}
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 {{ $errors->has('foto_disc') ? 'siError':'' }}">
                                                        {!! Form::file('foto_disc', ['class'=>'','id'=>'input2','style'=>'display:none']) !!}
                                                    </div>
                                                    <div class="form-row errorLogin">
                                                        <span>
                                                          <h6 id="error_foto2">{{ $errors->has('foto_disc') ? $errors->first('foto_disc'):'' }}</h6>
                                                        </span>
                                                    </div>
                                                  </div>
                                            </div>
                                      </div>
                                      {{--  <div class="form-group col-md-6">
                                        <div class="form-row">
                                          <div id="contenedor" class="form-group col-md-12">
                                            <img id="imgOrigenEditDisc" class="rounded mx-auto d-block float-left" src="/storage/foto_disc/sin_imagen.png" alt="" height="200px" width="200px">
                                            <img id="imgParcialEditDisc" height="200px" width="200px" class="noVista" src="" alt="">
                                          </div>
                                        </div>
                                      
                                        <div class="form-row">
                                          <div style="display: none;">
                                                {!! Form::text('id_disc', null, ['id'=>'edit_id_disc','class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group col-md-12">
                                            
                                            <div id="div_fileEditDisc">
                                              <img id="textoEditDisc" src="/storage/fotos/subir.png"  alt="">
                                              {!! Form::file('foto_disc', ['class'=>'upload','id'=>'inputEditDisc']) !!}
                                            </div>
                                            </div>

                                          <div class="form-group col-md-12" id="contentEditDisc" style="">
                                            <div><img id="btnCancelarEditDisc" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
                                          </div>
                                        </div>
                                    </div>  --}}
                            
                              <div class="form-group col-md-6">
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    {!! Form::label('nombre_disc', 'Nombre', []) !!}
                                    {!! Form::text('nombre_disc', null, ['id'=>'edit_nombre_disc','class'=>'form-control']) !!}
                                    <div class="form-group"></div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    {!! Form::label('categoria', 'Categoria', []) !!}
                                    {!! Form::select('categoria', ['0'=>'Mixto', '1'=>'Damas','2'=>'Varones'], null, ['id'=>'edit_categoria','class'=>'form-control']) !!}
                                    <div class="form-group"></div>
                                  </div>
                                </div>
                                <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('sub_categoria', 'SubCategoria', []) !!}
                                              {!! Form::select('sub_categoria', ['0'=>'Senior', '1'=>'Libre','2'=>'Libre - Senior','3'=>'Libre y/o Senior'], null, ['id'=>'edit_sub_categoria','placeholder'=>'Seleccione','class'=>'form-control']) !!}
                                              <div class="form-group"></div>
                                            </div>
                                          </div>
                              </div>                                
                            
                           </div>
                           <div class="form-row">
                              <div class="form-group col-md-12">
                                {!! Form::label('tipo', 'Tipo', []) !!}
                                {!! Form::select('tipo', ['0'=>'Equipo', '1'=>'Competicion'], null, ['id'=>'edit_tipo','class'=>'form-control']) !!}
                                <div class="form-group"></div>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('tipo', 'Reglamento', []) !!}
                                  <div class="custom-file">
                                    {!! Form::file('reglamento_disc', ['class'=>'custom-file-input file_reg','id'=>'edit_reglamento_disc', 'accept'=>".pdf"]) !!}
                                    <div class="form-group"></div>
                                    <label class="custom-file-label" for="pdf_file">Seleccionar Archivo</label>
                                  </div>
                                </div>
                          </div>  
                              {{--  <div class="form-row">
                                  <div class="form-group col-md-12">
                                    
                                    {!! Form::label('reglamento_disc', 'Subir reglamento', []) !!}
                                    {!! Form::file('reglamento_disc', ['id'=>'edit_reglamento_disc','class'=>'form-control']) !!}
                                  </div>
                            </div>    --}}

                            <div class="form-row">
                                  <div class="form-group col-md-12">
                                    {!! Form::label('descripcion_disc', 'Descripcion', []) !!}
                                    {!! Form::textArea('descripcion_disc', null, ['id'=>'edit_descripcion_disc','class'=>'form-control' ,'rows'=>4]) !!}
                                    <div class="form-group"></div>
                                  </div>
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
