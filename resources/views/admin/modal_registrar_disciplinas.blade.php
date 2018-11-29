
  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAgregarDisc">Agregar</button>
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
                            <div class="modal-body container col-10">
                              <table class="table table-condensed table-bordered ">
                                <thead>
                                  <tr>
                                    <th class="text-center" style="width: 50px">
                                        
                                        {!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}
                                        
                                    </th>
                                    <th style="font-size: 14px">
                                        Seleccione las disciplinas que desea agregar:
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr style="display: none">
                                    <td>
                                        <div>
                                            {!! Form::text('id_gestion', $gestion->id_gestion, []) !!}
                                        </div>
                                    </td>
                                  </tr>
                                    
                                    @foreach($disciplinasDisponibles as $disciplina)
                                      <tr>
                                        <td class="text-center" style="margin: auto; padding: 5px">
                                            {!! Form::checkbox('id_disc[]',$disciplina->id_disc, false, ['class'=>'check_us']) !!}
                                          </td>
                                          <td>
                                              <img src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" width="30px" height="30px">
                                              <span class="letter-size" style="font-size: 14px">{{ $disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria) }}</span>
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
                              {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                                {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                                </div>
                          </div>
                        </div>
  </div>
{!! Form::close() !!}