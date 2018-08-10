{!! Form::open(['route'=>'grupo.store_club','method' => 'POST']) !!}
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#v">
                        Inscribir clubs
                      </button>
    
                      <!-- Modal -->
                      <div class="modal fade" id="v" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Agregar clubs</h5>
    
    
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
    
                              <h6>Seleccione los clubs que desea agregar:</h6><br>
    
                          
                              <div style="display: none">
                                  {!! Form::text('id_gestion', $club->id_gestion, []) !!}
                                  {!! Form::text('id_disciplina', $club->id_disc, []) !!}
                                  {!! Form::text('id_grupo', $grupo->id_grupo, []) !!}
                                  
                              </div>
                                   <div class="col-md-6">
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('id_equipo', 'Equipo', []) !!}
                                                  {!! Form::select('id_equipo', $equipos,null, ['class'=>'form-control']) !!}
                                                  </div>
                                              </div>
                                    </div>
                                    <div class="col-md-6">
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  {!! Form::label('ubicacion', 'Ubicacion', []) !!}
                                                  {!! Form::text('ubicacion', null, []) !!}
                                                  </div>
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