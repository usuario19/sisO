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
                        
                            {!! Form::open(['route'=>'club.store','method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}
                              <div class="row">
                                  <div class="container col-md-11">
                                      <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-row">
                                              <div class="form-group col-md-12">
                                                <div class="contenedor_modal">
                                                  <img id="imgOrigen2" class="rounded mx-auto d-block float-left imgtam" src="/storage/logos/sin_imagen.png" alt="" height="200px" width="200px">
                                                  
                                                  <div id="divtexto2">
                                                    
                                                    <img id="texto2" src="/storage/fotos/subir.png"  alt="">
                                                
                                                    <img id="btnCancelar2" class="noVista" src="/storage/fotos/cancelar.png"  alt="">
                                                    
                                                  </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-12 {{ $errors->has('foto_admin') ? 'siError':'' }}">
                                                         {!! Form::file('logo', ['class'=>'upload','id'=>'input2']) !!}
                                                    </div>
                                                    <div class="form-row errorLogin">
                                                        <span>
                                                          <h6 id="error_foto2">{{ $errors->has('logo') ? $errors->first('logo'):'' }}</h6>
                                                        </span>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>
                                           
                                            
                                        </div>
                                        <div class="col-md-7">
                                             <div class="form-row">
                                                <div class="form-group col-md-12 {{ $errors->has('nombre_club') ? 'siError':'' }}">
                                                    {!! Form::label('nombre_club', 'Nombre del Club', []) !!}
                                                    {!! Form::text('nombre_club', null, ['id'=>'nombre','class'=>'form-control']) !!}

                                                <div class="form-row errorLogin">
                                                    <span>
                                                      <h6 id="error_nombre">{{ $errors->has('nombre_club') ? $errors->first('nombre_club'):'' }}</h6>
                                                    </span>
                                                  </div>
                                                </div>
                                                
                                                
                                              </div>
                                              <div class="form-row noVista">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('id_administrador', 'Coordinador', []) !!}
                                                  {!! Form::text('id_administrador',$usuario->id_administrador, ['id'=>'nombre','class'=>'form-control']) !!}
                                                  {{--  {!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}  --}}
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
                                          </div>
                                      </div>
                                 </div>
                              </div>
                                  <div class="modal-footer">
                                    {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                                  {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
                                  
                                  </div>
                            {!! Form::close() !!}
                           
                      </div>                
                </div>
          </div>
      </div>
