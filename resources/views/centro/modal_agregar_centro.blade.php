  <button type="button" class="btn btn-warning btn-block   letter-size" data-toggle="modal" data-target="#modalAgrDisc">
      <div class="button-div" style="width: 100px">
          <i class="material-icons float-left" style="font-size: 22px">add</i>
          <span class="letter-size">Agregar</span>
      </div>
  </button>

  {!! Form::open(['route'=>'centro.store','method'=>'POST','id'=>'form_create']) !!}
    <div class="modal fade" id="modalAgrDisc" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="modalLabel">Agregar Centro</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <div class="container col-md-11">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                      <div class="row">
                                        <div class="form-group col-md-12">
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              {!! Form::label('nombre_centro', 'Centro', []) !!}
                                              {!! Form::text('nombre_centro', null, ['class'=>'form-control','placeholder'=>'Nombre del Lugar']) !!}
                                              <div class="form-group"></div>
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                                {!! Form::label('ubicacion_centro', 'Ublicacion', []) !!}
                                                {!! Form::text('ubicacion_centro', null, ['class'=>'form-control','placeholder'=>'URL de Google Maps']) !!}
                                              <div class="form-group"></div>
                                            </div>
                                          </div>
                                        </div>     
                                        <div class="form-group col-md-12">
                                            {!! Form::label('descripcion_centro', 'Descripcion', []) !!}
                                            {!! Form::textArea('descripcion_centro', null, ['class'=>'form-control' ,'rows'=>4]) !!}
                                            <div class="form-group"></div>
                                          </div>                           
                                
                                  </div>
                             </div>
                              </div>
                             </div>
                        </div>

                        
                            <div class="modal-footer">
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-primary button_spiner" type="submit" disabled style='display:none'>
                                      <span class="spinner-grow spinner-grow-sm button_spinner" role="status" aria-hidden="true"></span>
                                      Cargando...
                                    </button>
                                    {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar btn-primary']) !!}
                                    </div>
                                    <div class="col-md-6">
                                    {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
                                    </div>
                          </div>
                
          </div>
  </div></div>
{!! Form::close() !!}
