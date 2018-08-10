{!! Form::open(['route'=>'encuentro.store','method' => 'POST']) !!}
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEncuentro">
                        Programar encuentro
                      </button>
    
                      <!-- Modal -->
                      <div class="modal fade" id="modalEncuentro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Agregar encuentro</h5>
    
    
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
    
                              <h6>Seleccione los clubs a enfrentarse:</h6><br>
    
                              <div class="form-row">
                                <div class="col-md-5">
                                    @foreach($clubsDisponibles as $club)
                                      <div style="display: none">
                                          {!! Form::text('id_gestion', $club->id_gestion, []) !!}
                                          {!! Form::text('id_disciplina', $club->id_disc, []) !!}
                                          {!! Form::text('id_grupo', $grupo->id_grupo, []) !!}
                                          
                                      </div>
                                          {!! Form::text('nombre', $value, []) !!}
                                          {!! Form::checkbox('id_club[]',$club->id_club, false, ['class'=>'check_us']) !!}
                                          <img src="/storage/logos/{{ $club->logo }}" alt="" width="50px" height="50px">{{ $club->nombre_club }} <br>

                                    @endforeach
                                </div>
                                <div class="col-md-2">
                                  <h1>Vs.</h1>
                                </div>
                                <div class="col-md-5">
                                     @foreach($clubsDisponibles as $club)
                                      <div style="display: none">
                                          {!! Form::text('id_gestion', $club->id_gestion, []) !!}
                                          {!! Form::text('id_disciplina', $club->id_disc, []) !!}
                                          {!! Form::text('id_grupo', $grupo->id_grupo, []) !!}
                                          
                                      </div>

                                          {!! Form::checkbox('id_club[]',$club->id_club, false, ['class'=>'check_us']) !!}
                                          <img src="/storage/logos/{{ $club->logo }}" alt="" width="50px" height="50px">{{ $club->nombre_club }} <br>

                                    @endforeach
                                </div>
                              </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                                </div>
                          </div>
                        </div>
                      </div>
{!! Form::close() !!}