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
							{!! Form::label('disciplina', 'Disciplinas', []) !!}
							<br>
							<div class="card">
								<div class="card-body col-md-8">
									<table class="table table-sm table-bordered">
										<thead>
											<th class="text-center">
												{!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}
											</th>
											<th>
												Selecciona...
											</th>
										</thead>
										<tbody>
										@foreach ($disciplinas as $disciplina)
										
												<tr>
													<td class="text-center">
															{!! Form::checkbox('id_disciplinas[]',$disciplina->id_disc, false, ['class'=>'check_us']) !!}
													</td>
													<td>
															@switch($disciplina->categoria)
																@case(0)
																	{!! Form::label('disciplina',$disciplina->nombre_disc." mixto", []) !!}
																	@break
															
																@case(1)
																	{!! Form::label('disciplina',$disciplina->nombre_disc." damas", []) !!}
																	@break
																@case(2)
																	{!! Form::label('disciplina',$disciplina->nombre_disc." varones", []) !!}
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
	</div>
			
					 <div class="modal-footer">
		                                  {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
		                                  {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
		                                  </div>
				


                       
		</div>
	</div>
</div>
{!! Form::close() !!}