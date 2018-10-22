
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDisc">Agregar</button>
  {!! Form::open(['route'=>'gestion.agregar_disciplinas','method' => 'POST','enctype'=>'multipart/form-data','files'=>true]) !!}
    <div class="modal fade" id="modalAgregarDisc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Agregar disciplinas</h5>    
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
    
                              <h6>Seleccione las disciplinas que desea agregar:</h6><br>
                                    <div class="col-md-6">
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  <div style="display: none">
                                                        {!! Form::text('id_gestion', $gestion->id_gestion, []) !!}
                                                    </div>
                                                  @foreach($disciplinasDisponibles as $disciplina)
                                                        {!! Form::checkbox('id_disc[]',$disciplina->id_disc, false, ['class'=>'check_us']) !!}
                                                        <img src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" width="50px" height="50px">{{ $disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria) }} <br>
                                                  @endforeach
                                                  </div>
                                              </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                              {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                                {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                                </div>
                          </div>
                        </div>
  </div>
{!! Form::close() !!}