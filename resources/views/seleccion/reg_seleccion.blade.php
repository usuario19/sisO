@extends('plantillas.main')
@section('title')
	SisO: Seleccion
@endsection
@section('content')
<div class="container col-md-12">
	<p class="display-4" style="font-size: 30px; font-weight: bold;">Crear Seleccion </p>
	<br>
	<table class="table table-sm table-bordered">
		<thead>
          	@foreach($datos as $dato)
          	<tr>

	            <th colspan="2">
	              	<p class="display-4 text-center"><img src="/storage/logos/{{ $dato->club->logo }}" alt="" width="80px" height="80px">{{ $dato->club->nombre_club }}</p>
	            </th>
	             
	        </tr>
	        <tr>
	      		<th>
	      			<div class="row">
	      				<div class="col-md-6" >
	      					<p class="text-center align-text-bottom display-4" style="font-size: 30px;">{{ $dato->gestion->nombre_gestion }}</p>
	      				</div>          	      	
			             <div class="col-md-6" >
			              	<p class="text-center display-4" style="font-size: 30px;"><img src="/storage/foto_disc/{{ $dato->disciplina->foto_disc }}" alt="" width="50px" height="50px">
			              		@if($dato->disciplina->categoria == 1)
			              			{{ $dato->disciplina->nombre_disc."(Mujeres)" }}</p>
			              		@elseif($dato->disciplina->categoria == 2)
			              			{{ $dato->disciplina->nombre_disc."(Varones)" }}</p>
			              		@else
			              			{{ $dato->disciplina->nombre_disc."(Mixto)" }}</p>
			              		@endif
						</div>
	              	</div>
	      		</th>
	        </tr>
       		@endforeach
		</thead>
	</table>
</div>
<div class="container col-md-12">
		<div class="form-row">
			<div class="form-group col-md-6" >
				<table class="table table-bordered">
				  <thead>
				  	<tr>
				  		<th colspan="6"><p class="text-center display-5" style="">TODOS LOS JUGADORES</p></th>
				  	</tr>
				  	<tr>

				  		<th>ID</th>
				  		<th>Foto</th>
				  		<th>Nombre Completo</th>
				  		<th>Genero</th>
				  		<th>club</th>
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
		            		<td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="" height=" 80px" width="80px"></td>
		  					<td>{{ $usuario->jugador->nombre_jugador." ".$usuario->jugador->apellidos_jugador}}</td>
		            		<td>@if($usuario->jugador->genero_jugador == "2")
		                     		{{ "Masculino" }}
		                		@else
		                      		{{ "Femenino" }}
		                		@endif
		            		</td>
		            		<td>{{ $usuario->club->nombre_club }}</td>
		            		<td>
								{!! Form::checkbox('id_jug_club[]',$usuario->id_jug_club, false, ['class'=>'check_us']) !!}
		  					</td>
		            		
  						</tr>
  					@elseif($dato->disciplina->categoria ==0)
  						<tr>
		  					<td>{{ $usuario->jugador->id_jugador}}</td>
		            		<td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="" height=" 80px" width="80px"></td>
		  					<td>{{ $usuario->jugador->nombre_jugador." ".$usuario->jugador->apellidos_jugador}}</td>
		            		<td>@if($usuario->jugador->genero_jugador == "2")
		                     		{{ "Masculino" }}
		                		@else
		                      		{{ "Femenino" }}
		                		@endif
		            		</td>
		            		
		            		<td>
								{!! Form::checkbox('id_jug_club[]',$usuario->id_jug_club, false, ['class'=>'check_us']) !!}
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
			<div class="form-group col-md-6">
				<table class="table table-bordered">
				  <thead>
				  	<tr>
				  		<th colspan="5"><p class="text-center display-5" style="">JUGADORES HABILITADOS</p></th>
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
		            		<td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador_club->jugador->foto_jugador }}" alt="" height=" 80px" width="80px"></td>
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
  						"text-center">{!! Form::submit('Deshabiltar', ['class'=>'btn btn-warning']) !!}</td>
  					</tr>
				  </tbody>
				</table>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	
</div>
@endsection
@section('scripts')
  {!! Html::script('/js/checkbox.js') !!}
@endsection