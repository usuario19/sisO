  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                      <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Editar club</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      <div class="modal-body">
                            {!! Form::open(['route'=>'club.update','method' => 'PUT' ,'enctype' => 'multipart/form-data', 'files'=>true] ) !!}
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-row">
                                                  <div id="contenedor" class="form-group col-md-2">
                                                    <img id="imgOrigen2" class="rounded mx-auto d-block float-left" src="" alt="" height="200px" width="200px">
                                                    <img id="imgParcial2" height="200px" width="200px" class="noVista" src="" alt="">
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                  <div class="form-group col-md-2">
                                                    
                                                    <div id="div_file2">
                                                      <img id="texto2" src="/storage/fotos/subir.png"  alt="" height="50px" width="50px">
                                                      {!! Form::file('logo', ['class'=>'upload','id'=>'input2']) !!}
                                                    </div>
                                                  </div>
                                                  <div class="form-group col-md-4" id="content2" style="">
                                                    <div><img id="btnCancelar2" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
                                                  </div>
                                              </div>
                                        </div>
                                        <div class="col-md-6">
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
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('id_administrador', 'Coordinador', []) !!}
                                                  {!! Form::select('id_administrador', $administradores,null, ['id'=>'edit_administrador','class'=>'form-control']) !!}
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('ciudad', 'Ciudad', []) !!}
                                                  {!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['id'=>'edit_ciudad','class'=>'form-control']) !!}
                                                  </div>
                                              </div>
                                        </div>
                                </div>
                                      <div class="row">
                                          <div class="col-md-12">
                                                {!! Form::label('descripcion_club', 'Descripcion', []) !!}
                                                {!! Form::textarea('descripcion_club', null, ['id'=>'edit_descripcion','class'=>'form-control','rows'=>4]) !!}
                                          </div>
                                      </div>
                                 </div>
                              </div>                    
                                  <div class="modal-footer">
                                  {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
                                  {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                                  </div>
                            {!! Form::close() !!}
                      </div>                      
                </div>
          </div>
            