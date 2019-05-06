{!! Form::open(['route'=>'club.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true,'id'=>'form_create'] ) !!}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                      <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar club</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      <div class="modal-body">
                        
                              <div class="row">
                                  <div class="container col-md-11">
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-row">
                                              <div class="form-group col-md-12">
                                                <div class="contenedor_modal  mx-auto">
                                                    <img id="imgOrigen2" class="rounded img-thumbnail mx-auto d-block float-left imgtam" src=" " alt="" {{--  style="height=200px ; width=200px"  --}}>
                                                            
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
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 {{ $errors->has('logo') ? 'siError':'' }}">
                                                      <div style="display:none">
                                                        {!! Form::file('logo', ['class'=>'upload','id'=>'input2']) !!}
                                                      </div>
                                                    </div>
                                                    <div class="form-group errorLogin">
                                                        <span>
                                                          <h6 id="error_foto2">{{ $errors->has('logo') ? $errors->first('logo'):'' }}</h6>
                                                        </span>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                              <div class="form-row">
                                                <div class="form-group col-md-12 {{ $errors->has('nombre_club') ? 'siError':'' }}">
                                                    {!! Form::label('nombre_club', 'Nombre del Club', []) !!}
                                                    {!! Form::text('nombre_club', null, ['id'=>'nombre','class'=>'form-control']) !!}

                                                  <div class="form-group errorLogin"></div>
                                                </div>
                                              </div>
                                              <div class="form-row noVista">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('id_administrador', 'Coordinador', []) !!}
                                                  {!! Form::text('id_administrador',$usuario->id_administrador, ['id'=>'nombre','class'=>'form-control']) !!}
                                                  {{--  {!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}  --}}
                                                  <div class="form-group errorLogin"></div>
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('ciudad', 'Ciudad', []) !!}
                                                  {!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
                                                </div>
                                              </div>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                          <div class="col-md-12">
                                                {!! Form::label('descripcion_club', 'Descripcion', []) !!}
                                                {!! Form::textarea('descripcion_club', null, ['class'=>'form-control','rows'=>4]) !!}
                                                <div class="form-group errorLogin"></div>
                                          </div>
                                      </div>
                                 </div>
                              </div>
                      </div>
                      <div class="modal-footer">
                                <div class="form-group col-md-6">
                                  {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                  <button class="btn btn-block btn-outline-secondary btn_cerrar" data-dismiss="modal">Cancelar</a>
                                </div>
                      </div>
                </div>
          </div>
      </div>
{!! Form::close() !!}                
