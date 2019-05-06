{!! Form::open(['route'=>'club.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true,'id'=>'form_create'] ) !!}

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Agregar club</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            
                                    <div class="form-row">
                                        <div class="form-group mx-auto" style="width: 200px">
                                            <div class="form-row">
                                                <div class="contenedor_modal">
                                                    <img id="imgOrigen" class="img-thumbnail rounded mx-auto d-block float-left imgtam" src="/storage/logos/sin_imagen.png" alt="">
                                                    
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
                                                          {!! Form::file('logo', ['class'=>'upload','id'=>'input','style'=>'display:none']) !!}
                                                      </div>
                                                      <div class="form-row errorLogin">
                                                          <span>
                                                            <h6 id="error_foto">{{ $errors->has('logo') ? $errors->first('logo'):'' }}</h6>
                                                          </span>
                                                      </div>
                                                    </div>
                                              </div>
                                        </div>
                                      <div class="form-group col-md-8">
                                            <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  {!! Form::label('nombre_club', 'Nombre del Club', []) !!}
                                                  {!! Form::text('nombre_club', null, ['id'=>'nombre','class'=>'form-control']) !!}
		                                              <div class="form-group"></div>
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-12">
                                                  {!! Form::label('alias_club', 'Alias del Club', []) !!}
                                                  {!! Form::text('alias_club', null, ['id'=>'alias','class'=>'form-control']) !!}
		                                              <div class="form-group"></div>
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-12">
                                                {!! Form::label('id_administrador', 'Coordinador', []) !!}
                                                {!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}
                                                <div class="form-group"></div>
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-12">
                                                {!! Form::label('ciudad', 'Ciudad', []) !!}
                                                {!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
                                                <div class="form-group"></div>
                                              </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                      {!! Form::label('descripcion_club', 'Descripcion', []) !!}
                                                      {!! Form::textarea('descripcion_club', null, ['class'=>'form-control','rows'=>4]) !!}
                                                      <div class="form-group"></div>
                                                </div>
                                            </div>
                                      </div>
                                    </div>
                                   
                      </div>
                      <div class="modal-footer">
                          <div class="form-row col-md-8">
                              <div class="form-group col-md-6">
                                  {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary btn_aceptar']) !!}
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