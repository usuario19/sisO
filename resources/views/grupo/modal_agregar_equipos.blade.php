{!! Form::open(['route'=>'grupo.store_club','method' => 'POST']) !!}
                
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
                              <table class="table table-bordered">
                                <thead>
                                    <th class="text-center" style="width: 50px">
                        
                                        {!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}
                                        
                                    </th>
                                    <th style="font-size: 14px">
                                        Seleccione los clubs que desea agregar:
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($clubsDisponibles as $club)
                                    <div style="display: none">
                                        {!! Form::text('id_gestion', $club->id_gestion, []) !!}
                                        {!! Form::text('id_disciplina', $club->id_disc, []) !!}
                                        {!! Form::text('id_grupo', $grupo->id_grupo, []) !!}
                                       
                                    </div>
                                        <tr>
                                          <td class="text-center">
                                              {!! Form::checkbox('id_club[]',$club->id_club, false, ['class'=>'check_us']) !!}
                                          </td>
                                          <td>
                                              <img src="/storage/logos/{{ $club->logo }}" alt="" width="50px" height="50px" style="margin-inline-end:15px"><span>{{ $club->nombre_club }} </span>
                                          </td>
                                        </tr>
                                    
                                  @endforeach
                                </tbody>
                              </table>
    
                              
                                    <div class="col-md-6">
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                 
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