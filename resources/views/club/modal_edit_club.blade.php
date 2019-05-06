{!! Form::open(['route'=>'club.update','method' => 'PUT' ,'enctype' => 'multipart/form-data', 'files'=>true,'id'=>'form_update'] ) !!}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
                      <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Editar club</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                    <div class="spinner-grow loading" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                        
                                    {{-- <div class="spinner-grow" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div> --}}
                                    <div class="form-row">
                                        <div class="form-group mx-auto" style="width:200px">
                                            <div class="contenedor_modal">

                                                
                                                <img id="imgOrigen2" class="img-thumbnail rounded mx-auto d-block float-left imgtam" src=" " alt="" {{--  style="height=200px ; width=200px"  --}}>
                                                
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
                                                    {!! Form::file('logo', ['class'=>'upload','id'=>'input2','style'=>'display:none']) !!}
                                                </div>
                                                <div class="form-row errorLogin">
                                                    <span>
                                                      <h6 id="error_foto2">{{ $errors->has('logo') ? $errors->first('logo'):'' }}</h6>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-row" style="display: none">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('id_club', 'Nombre del Club', []) !!}
                                                    {!! Form::text('id_club', null, ['id'=>'edit_id_club','class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('nombre_club', 'Nombre del Club', []) !!}
                                                    {!! Form::text('nombre_club', null, ['id'=>'nombre_club','class'=>'form-control']) !!}
		                                            <div class="form-group"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    {!! Form::label('alias_club', 'Alias del Club', []) !!}
                                                    {!! Form::text('alias_club', null, ['id'=>'edit_alias','class'=>'form-control']) !!}
                                                        <div class="form-group"></div>
                                                </div>
                                              </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-12">
                                                {!! Form::label('id_administrador', 'Coordinador', []) !!}
                                                {!! Form::select('id_administrador', $administradores,null, ['id'=>'edit_administrador','class'=>'form-control']) !!}
                                                <div class="form-group"></div>
                                              </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-12">
                                                {!! Form::label('ciudad', 'Ciudad', []) !!}
                                                {!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['id'=>'edit_ciudad','class'=>'form-control']) !!}
                                                <div class="form-group"></div>
                                              </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-12">
                                                          {!! Form::label('descripcion_club', 'Descripcion', []) !!}
                                                          {!! Form::textarea('descripcion_club', null, ['id'=>'edit_descripcion','class'=>'form-control','rows'=>4]) !!}
                                                          <div class="form-group"></div>
                                                    </div>
                                                </div>
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