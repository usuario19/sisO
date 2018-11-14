<div class="container">	
		@foreach($datos as $dato)
		<div class="container col-md-12">    
			<div class="card">
				<div class="card-header" style="margin: 0%;padding: 5px">
					<div class="row">
						<div class="col-md-6 text-center" style="margin: auto">
							<p class="display-4 title-select" style="font-size:18px; margin: 0%; color: black">{{ strtoupper($dato->gestiones->nombre_gestion) }}</p>
						</div>          	      	
						<div class="col-md-6" >
							<p class="text-center display-4 title-select" style="font-size: 18px; margin: 0%; color: black"><img src="/storage/foto_disc/{{ $dato->disciplina->foto_disc }}" alt="" width="30px" height="30px">
								@if($dato->disciplina->categoria == 1)
									{{ strtoupper($dato->disciplina->nombre_disc."( Mujeres )") }}</p>
								@elseif($dato->disciplina->categoria == 2)
									{{ strtoupper($dato->disciplina->nombre_disc."( Varones )") }}</p>
								@else
									{{ strtoupper($dato->disciplina->nombre_disc."( Mixto )") }}</p>
								@endif
						</div>
					</div>
					
				</div>
				<div class="card-body" style="margin: 0%;padding: 5px">
					<table class="table table-borderless" style="padding: 0px;margin: 0%">
						<tr>
							<th style="width:100px; padding: 0px" class="text-center">
								<img src="/storage/logos/{{ $dato->club->logo }}" alt="" width="80px" height="80px">
							</th>
							<th style="padding: 0px">
								<p  class="display-4" style="font-size:18px;margin: 0%; font-weight: bold; padding: 20px 0px">{{ strtoupper($dato->club->nombre_club) }}</p>
							</th>
						</tr>
					</table>
				</div>
			</div>
		</div>
		@endforeach
		<div class="container">
			<div class="card">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-xl-6 table-responsive-md" >
								<div style="padding: 10px 0px;" class="form-group col-lg-12">
									{!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
								</div>
							{!! Form::open(['route'=>'seleccion.store','method'=>'POST']) !!}
								<div style="display: none;">{!! Form::text('id_club_part', $dato->id_club_part, []) !!}</div>
								<table class="table table-striped table-bordered">
									<thead>
										<tr class="bg-success">
											<th colspan="6"><p class="text-center display-5" style="color: white;margin: 0%">JUGADORES HABILITADOS PARA LA GESTION</p></th>
										</tr>
										<tr>
											<th>#</th>
											<th>Foto</th>
											<th>Nombre Completo</th>
											<th>Genero</th>
											{{--  <th>club</th>  --}}
											<th>{!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}</th>
										</tr>
									</thead>
									<tbody id="datos">
										@php
											$i=1;
										@endphp
										@foreach($jugadores as $usuario)
										
											@if($datos[0]->disciplina->categoria == $usuario->jugador->genero_jugador)
												<tr>
													<td>{{$i}}{{-- {{ $usuario->jugador->id_jugador}} --}}</td>
													<td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="" height=" 50px" width="50px"></td>
													<td>{{ $usuario->jugador->nombre_jugador." ".$usuario->jugador->apellidos_jugador}}</td>
													<td>@if($usuario->jugador->genero_jugador == "2")
															{{ "Masculino" }}
														@else
															{{ "Femenino" }}
														@endif
													</td>
													
													<td>
														{!! Form::checkbox('id_jug_club[]',$usuario->jugador->jugador_clubs->where('id_club',$usuario->inscripcion->admin_club->id_club)->first()->id_jug_club, false, ['class'=>'check_us']) !!}
													</td>
												</tr>
											@elseif($dato->disciplina->categoria ==0)
												<tr>
													<td>{{ $usuario->jugador->id_jugador}}</td>
													<td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="" height=" 50px" width="50px"></td>
													<td>{{ $usuario->jugador->nombre_jugador." ".$usuario->jugador->apellidos_jugador}}</td>
													<td>@if($usuario->jugador->genero_jugador == "2")
															{{ "Masculino" }}
														@else
															{{ "Femenino" }}
														@endif
													</td>
													
													<td>
														{!! Form::checkbox('id_jug_club[]',$usuario->jugador->jugador_clubs->where('id_club',$usuario->inscripcion->admin_club->id_club)->first()->id_jug_club, false, ['class'=>'check_us']) !!}
													</td>
												</tr>
											@endif
											@php
												$i++;
											@endphp
								
										@endforeach
													
									</tbody>
								</table>
								<div>
									<div class="text-center">{!! Form::submit('Habilitar', ['class'=>'btn btn-success']) !!}</div>
								</div>
							{!! Form::close() !!}
						</div>
						
						<!--TABLA DE AHBILITADOS ...........................................................-->
						<div class="form-group col-xl-6 table-responsive-md">
								<div style="padding: 10px 0px;" class="form-group col-lg-12">
									{!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar2','placeholder'=>'Buscar.....']) !!}
								</div>
							{!! Form::open(['route'=>'seleccion.deshabilitar','method'=>'POST']) !!}
							<div style="display: none;">{!! Form::text('id_club_part', $dato->id_club_part, []) !!}</div>
								<table class="table table-striped table-bordered">
									<thead>
										<tr class="bg-secondary">
											<th colspan="5"><p class="text-center display-5" style="color: white; margin: 0%">JUGADORES HABILITADOS PARA LA DISCIPLINA</p></th>
										</tr>
										<tr>
											<th>#</th>
											<th>Foto</th>
											<th>Nombre Completo</th>
											<th>Genero</th>
											<th>{!! Form::checkbox('todo','todo', false, ['id'=>'todo_hab']) !!}</th>
										</tr>
									</thead>
									<tbody id="datos2">
										@php
											$a = 1;
										@endphp
										@foreach($habilitados as $usuario)
											<tr>
												<td>{{$a}}{{-- {{ $usuario->jugador_club->jugador->id_jugador}} --}}</td>
												<td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador_club->jugador->foto_jugador }}" alt="" height=" 50px" width="50px"></td>
												<td>{{ $usuario->jugador_club->jugador->nombre_jugador." ".$usuario->jugador_club->jugador->apellidos_jugador}}</td>
												<td>@if($usuario->jugador_club->jugador->genero_jugador == "2")
														{{ "Masculino" }}
													@else
														{{ "Femenino" }}
													@endif
												</td>
												
												<td>
													{!! Form::checkbox('id_seleccion[]',$usuario->id_seleccion, false, ['class'=>'check_hab']) !!}
												</td>
												
											</tr>
									
										@endforeach
										@php
											$a++;
										@endphp
									</tbody>
								</table>
								<div>
									<div class="text-center">{!! Form::submit('Deshabilitar', ['class'=>'btn btn-secondary']) !!}</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
</div>