{!! Form::open(['route'=>'fase.store_club_eliminacion','method' => 'POST','class'=>'form_disc_reg','id'=>'form1']) !!}
                
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
                              <h6></h6>
                                    <div class="col-md-12">
                                              <div class="form-row">
                                                <div class="form1 form-group">
                                                </div>
                                                <div class="form-group col-md-12">
                                                  <table class="table mi_tabla table-sm table-bordered">
                                                    <thead>
                                                      <th> {!! Form::checkbox('todo','check', false, ['class'=>'check_all','id'=>'check_us']) !!}</th>
                                                      <th>Seleccione los clubs que desea agregar:</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($clubsDisponibles as $club)
                                                        <tr>
                                                            <div style="display: none">
                                                                {!! Form::text('id_gestion', $club->id_gestion, []) !!}
                                                                {!! Form::text('id_disciplina', $club->id_disc, []) !!}
                                                                {!! Form::text('id_fase', $fase->id_fase, []) !!}
                                                            </div>
                                                          <td>
                                                              {!! Form::checkbox('id_club[]',$club->id_club, false, ['class'=>'check_us','id'=>'club'.$club->id_club]) !!}
                                                          </td>
                                                          <td>
                                                              <img class="img_tb_info" src="/storage/logos/{{ $club->logo }}" alt="">
                                                              {!! Form::label('club'.$club->id_club, $club->nombre_club, []) !!}
                                                          </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                        {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary btn_aceptar']) !!}
                                        </div>
                                    <div class="form-group col-md-6">
                                {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary']) !!}
                                </div>
                                
                                </div>
                                </div>
                          </div>
                        </div>
                      </div>
{!! Form::close() !!}