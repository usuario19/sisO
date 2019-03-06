{!! Form::open(['route'=>'gestion.store','metod'=>'POST','enctype'=>'multipart/formdata','file'=>true]) !!}	
<div class="modal fade" id="modalGestion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
              <div class="modal-content">
                      <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Agregar campeonato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
					  </div>
					  <div class="container col-md-11">
							<div class="modal-body">
									<div class="form-row">
										<div class="form-group col-md-12">
											{!! Form::label('nombre', 'Nombre', []) !!}
											{!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
										</div>
									</div>
		
									<div class="form-row">
										<div class="form-group col-md-6">
											{!! Form::label('fechaIni', 'Fecha de inicio', []) !!}
											{!! Form::date('fechaIni', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
										</div>
										<div class="form-group col-md-6">
											{!! Form::label('fechaFin', 'Fecha de Fin', []) !!}
											{!! Form::date('fechaFin', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											{!! Form::label('sede', 'Sede', []) !!}
											{!! Form::text('sede', null, ['class'=>'form-control','placeholder'=>'Sede']) !!}
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											{!! Form::label('descripcion', 'Descripcion', []) !!}
											{!! Form::textarea('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion', 'rows'=> 4]) !!}
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
												{!! Form::label('disciplina', 'Selecciona', []) !!}
											<br>
													<table class="table table-striped table-bordered">
														<thead>
															<tr>
																	<th class="text-center">
																			{!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}
																		</th>
																		<td>
																				{!! Form::label('disciplina', 'Disciplinas', []) !!}
																		</td>
															</tr>
														</thead>
														<tbody>
															@foreach ($disciplinas as $disciplina)
														
																<tr>
																	<td class="text-center" style="color: black">
																			{!! Form::checkbox('id_disciplinas[]',$disciplina->id_disc, false, ['class'=>'check_us']) !!}
																	</td>
																	<td>
																			@switch($disciplina->categoria)
																				@case(0)
																					{!! ($disciplina->nombre_disc." Mixto") !!}
																					@break
																			
																				@case(1)
																					{!! $disciplina->nombre_disc." Damas"!!}
																					@break
																				@case(2)
																					{!! $disciplina->nombre_disc." Varones" !!}
																				@break
																			@endswitch
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
						{!! Form::submit('aceptar', ['class'=>'btn btn-primary btn-block btn_aceptar']) !!}
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