
  {!! Form::open(['route'=>'disciplina.update','method'=>'PUT','enctype'=>'multipart/form-data','files'=>true]) !!}
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
                            <div class="row">
                                <div class="form-group col-md-12">
                                  <div class="row">
                                      <div class="form-group col-md-6">
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
                                    </div>
                            
                              <div class="form-group col-md-6">
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    {!! Form::label('nombre_disc', 'Nombre', []) !!}
                                    {!! Form::text('nombre_disc', null, ['id'=>'edit_nombre_disc','class'=>'form-control']) !!}
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    {!! Form::label('categoria', 'Categoria', []) !!}
                                    {!! Form::select('categoria', ['0'=>'Mixto', '1'=>'Damas','2'=>'Varones'], null, ['id'=>'edit_categoria','class'=>'form-control']) !!}
                                  </div>
                                </div>
                                <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('tipo', 'Tipo', []) !!}
                                              {!! Form::select('tipo', ['0'=>'Equipo', '1'=>'Competicion'], null, ['id'=>'edit_tipo','class'=>'form-control']) !!}
                                            </div>
                                          </div>
                              </div>                                
                            
                           </div>
                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    
                                    {!! Form::label('reglamento_disc', 'Subir reglamento', []) !!}
                                    {!! Form::file('reglamento_disc', ['id'=>'edit_reglamento_disc','class'=>'form-control']) !!}
                                  </div>
                            </div>  

                            <div class="form-row">
                                  <div class="form-group col-md-12">

                                    {!! Form::label('descripcion_disc', 'Descripcion', []) !!}
                                    {!! Form::textArea('descripcion_disc', null, ['id'=>'edit_descripcion_disc','class'=>'form-control' ,'rows'=>4]) !!}
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
@section('scripts')
  {!! Html::script('/js/scriptDisc.js') !!}
@endsection