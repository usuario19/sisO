  <button type="button" class="btn btn-warning btn-block   letter-size" data-toggle="modal" data-target="#modalAgrDisc">Agregar</button>

  {!! Form::open(['route'=>'centro.store','method'=>'POST','enctype'=>'multipart/form-data','files'=>true]) !!}
    <div class="modal fade" id="modalAgrDisc" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="modalLabel">Agregar Centro</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <div class="container col-md-10">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                      <div class="row">
                                        <div class="form-group col-md-12">
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('nombre_centro', 'Centro', []) !!}
                                              {!! Form::text('nombre_centro', null, ['class'=>'form-control','placeholder'=>'Nombre del Lugar']) !!}
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                                {!! Form::label('ubicacion_centro', 'Ublicacion', []) !!}
                                                {!! Form::text('ubicacion_centro', null, ['class'=>'form-control','placeholder'=>'URL de Google Maps']) !!}
                                              </div>
                                          </div>
                                        </div>     
                                        <div class="form-group col-md-12">
                                            {!! Form::label('descripcion_centro', 'Descripcion', []) !!}
                                            {!! Form::textArea('descripcion_centro', null, ['class'=>'form-control' ,'rows'=>4]) !!}
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
