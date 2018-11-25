  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAgrDisc">Agregar</button>

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
                        <div class="container col-md-10">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                      <div class="row">
                                          <div class="form-group col-md-6">
                                            <div class="form-row">
                                              <div id="contenedor" class="form-group col-md-12">
                                                <img id="imgOrigenAgrDisc" class="rounded mx-auto d-block float-left" src="/storage/foto_disc/sin_imagen.png" alt="" height="200px" width="200px">
                                                <img id="imgParcialAgrDisc" height="200px" width="200px" class="noVista" src="" alt="">
                                              </div>
                                            </div>
                                          
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                
                                                <div id="div_fileAgrDisc">
                                                  <img id="textoAgrDisc" src="/storage/fotos/subir.png"  alt="">
                                                  {!! Form::file('foto_disc', ['class'=>'upload','id'=>'inputAgrDisc']) !!}
                                                </div>
                                                </div>
                                              <div class="form-group col-md-12" id="contentAgrDisc" style="">
                                                <div><img id="btnCancelarAgrDisc" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
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
                                              {!! Form::label('tipo', 'Tipo', []) !!}
                                              {!! Form::select('tipo', ['0'=>'Equipo', '1'=>'Competicion'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                                            </div>
                                          </div>
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