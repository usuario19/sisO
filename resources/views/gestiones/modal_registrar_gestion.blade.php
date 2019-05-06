{!! Form::open(['route'=>'gestion.store','metod'=>'POST','enctype'=>'multipart/formdata','file'=>true,'id'=>'form_create']) !!}	
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
											{!! Form::label('nombre_gestion', 'Nombre', []) !!}
											{!! Form::text('nombre_gestion', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
                    						<div class="form-group"></div>
										</div>
									</div>
		
									<div class="form-row">
										<div class="form-group col-md-6">
											{!! Form::label('fecha_inicio', 'Fecha de inicio', []) !!}
											{!! Form::date('fecha_inicio', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                    						<div class="form-group"></div>
										</div>
										<div class="form-group col-md-6">
											{!! Form::label('fecha_fin', 'Fecha de Fin', []) !!}
											{!! Form::date('fecha_fin', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                    						<div class="form-group"></div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											{!! Form::label('sede', 'Sede', []) !!}
											{!! Form::text('sede', null, ['class'=>'form-control','placeholder'=>'Sede']) !!}
                    						<div class="form-group"></div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											{!! Form::label('descripcion', 'Descripcion', []) !!}
											{!! Form::textarea('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion', 'rows'=> 4]) !!}
                    						<div class="form-group"></div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
												{!! Form::label('disciplina', 'Selecciona', []) !!}
											<br>
                    								<div class="check_info form-group"></div>
													<table class="table table-striped table-bordered">
														<thead>
															<tr>
																	<td class="text-center">
																			{!! Form::checkbox('todo','todo', false, ['id'=>'check_us','class'=>'check_all']) !!}
																		</td>
																		<td>
																				{!! Form::label('check_us', 'Disciplinas', []) !!}
																		</td>
															</tr>
														</thead>
														<tbody>
															@foreach ($disciplinas as $disciplina)
														
																<tr>
																	<td class="text-center" style="color: black">
																			{!! Form::checkbox('disciplinas[]',$disciplina->id_disc, false, ['id'=>'c'.$disciplina->id_disc,'class'=>'check_us']) !!}
																	</td>
																	<td>
																			{!! Form::label('c'.$disciplina->id_disc, $disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)." - ".$disciplina->nombre_subcateg($disciplina->sub_categoria), []) !!}
																			{{--  @switch($disciplina->categoria)
																				@case(0)
																					{!! Form::label('c'.$disciplina->id_disc, $disciplina->nombre_disc." Mixto", []) !!}
																					
																					@break
																			
																				@case(1)
																					{!! Form::label('c'.$disciplina->id_disc, $disciplina->nombre_disc." Damas", []) !!}
																					
																					@break
																				@case(2)
																					{!! Form::label('c'.$disciplina->id_disc, $disciplina->nombre_disc." Varones", []) !!}
																					
																				@break
																			@endswitch  --}}
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
								<button class="button_spiner btn btn-block btn-success" type="button" disabled style="display:none">
									<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
									Cargando...
								</button>
								{!! Form::submit('aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
							</div>
							<div class="form-group col-md-6">
								{!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
							</div>
						</div>
					</div>
		</div>
	</div>
</div>
{!! Form::close() !!}