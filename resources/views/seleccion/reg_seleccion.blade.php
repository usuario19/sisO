@extends('plantillas.main')
@section('title')
	SisO: Seleccion
@endsection
@section('content')
<div class="container table-responsive-xl">
	{{--  <p class="display-4" style="font-size: 20px; font-weight: bold;">CREAR SELECION</p>
	<br>  --}}
	

	<div class="table-responsive-xl">
			@foreach($datos as $dato)
		<div class="container">
			<h1  class="display-1" style="font-size: 14px; margin:0 0 15px 0"><a href="{{route('coordinador.mis_gestiones')}}">Gestiones</a><span>{{" | "}}</span><a href="{{ route('disciplina.ver_disciplinas_inscritas',[$dato->club->id_club, $dato->gestiones->id_gestion]) }}">{{$dato->gestiones->nombre_gestion}}</a>{{" | ".$dato->disciplina->nombre_disc}}</h1>
		</div>
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
							<table class="table table-striped table-bordered">
								<thead>
									<tr class="bg-success">
										<th colspan="6"><p class="text-center display-5" style="color: white;margin: 0%">JUGADORES HABILITADOS PARA LA GESTION</p></th>
									</tr>
									<tr>

										<th>ID</th>
										<th>Foto</th>
										<th>Nombre Completo</th>
										<th>Genero</th>
										{{--  <th>club</th>  --}}
										<th>{!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}</th>
									</tr>
								</thead>
									{!! Form::open(['route'=>'seleccion.store','method'=>'POST']) !!}
									<div style="display: none;">{!! Form::text('id_club_part', $dato->id_club_part, []) !!}</div>
								<tbody>
								
									@foreach($jugadores as $usuario)
									
										@if($datos[0]->disciplina->categoria == $usuario->jugador->genero_jugador)
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
												{{--  <td>{{ $usuario->inscripcion->admin_club->club->nombre_club }}</td>  --}}
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
												{{--  <td>{{ $usuario->inscripcion->admin_club->club->nombre_club }}</td>  --}}
												<td>
													{!! Form::checkbox('id_jug_club[]',$usuario->jugador->jugador_clubs->where('id_club',$usuario->inscripcion->admin_club->id_club)->first()->id_jug_club, false, ['class'=>'check_us']) !!}
												</td>
											</tr>
										@endif
							
									@endforeach
											<tr>
												<td colspan="6" class=
												"text-center">{!! Form::submit('Habilitar', ['class'=>'btn btn-success']) !!}</td>
											</tr>				
								</tbody>
							</table>
						</div>
									{!! Form::close() !!}

						<!--TABLA DE AHBILITADOS ...........................................................-->
						<div class="form-group col-xl-6 table-responsive-md">
							<table class="table table-striped table-bordered">
								<thead>
									<tr class="bg-secondary">
										<th colspan="5"><p class="text-center display-5" style="color: white; margin: 0%">JUGADORES HABILITADOS PARA LA DISCIPLINA</p></th>
									</tr>
									<tr>
										<th>ID</th>
										<th>Foto</th>
										<th>Nombre Completo</th>
										<th>Genero</th>
										<th>{!! Form::checkbox('todo','todo', false, ['id'=>'todo_hab']) !!}</th>
									</tr>
								</thead>
								{!! Form::open(['route'=>'seleccion.deshabilitar','method'=>'POST']) !!}
								<tbody>
									@foreach($habilitados as $usuario)
										<tr>
											
											<td>{{ $usuario->jugador_club->jugador->id_jugador}}</td>
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
										<tr>
											<td colspan="5" class=
											"text-center">{!! Form::submit('Deshabiltar', ['class'=>'btn btn-secondary']) !!}</td>
										</tr>
								</tbody>
							</table>
								{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/checkbox.js') !!}
@endsection