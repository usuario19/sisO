{!! Form::open(['route'=>'centro.update','method'=>'PUT','id'=>'form_update']) !!}
                <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar centro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="container col-md-11">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-grow loading" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        <div class="modal-body">
                            <div class="form-row noVista">
                                <div class="form-group col-md-12">
                                    {!! Form::label('id_centro', 'ID', []) !!}
                                    {!!Form::text('id_centro',null,['id'=>'edit_id_centro'])!!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('nombre_centro', 'Centro', []) !!}
                                    {!! Form::text('nombre_centro', null, ['class'=>'form-control','id'=>'edit_nombre_centro']) !!}
                                    <div class="form-group"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('ubicacion_centro', 'Ublicacion', []) !!}
                                    {!! Form::text('ubicacion_centro', null, ['class'=>'form-control','id'=>'edit_ubicacion_centro']) !!}
                                    <div class="form-group"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-12">
                                            {!! Form::label('descripcion_centro', 'Descripcion', []) !!}
                                            {!! Form::textArea('descripcion_centro', null, ['class'=>'form-control' ,'rows'=>4,'id'=>'edit_descripcion_centro']) !!}
                                            <div class="form-group"></div>
                                        </div> 
                            </div>
                            
                        </div>
                        </div>
                        <div class="modal-footer">
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-primary button_spiner" disabled style="display:none">
                                        <span class="spinner-grow spinner-grow-sm button_spinner" role="status" aria-hidden="true"></span>
                                        Cargando...
                                      </button>
                                    {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar btn-primary']) !!}
                                    </div>
                                    <div class="col-md-6">
                                    {!! Form::reset('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-outline-secondary btn_cerrar']) !!}
                                    </div>
                        </div>
                    </div>
                    </div>
                </div>
                {!! Form::close() !!}