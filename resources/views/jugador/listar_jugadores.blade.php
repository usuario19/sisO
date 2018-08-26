@extends('plantillas.main')

@section('title')
    SisO - Lista de jugadores
@endsection

@section('content')
<h1>Lista de Jugadores:</h1>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th width="100px">Foto</th>
        <th>CI</th>
  			<th>Nombre</th>
  			<th>Apellidos</th>
        <th>Genero</th>
        <th>Correo</th>
        <th>Fecha <br> nacimiento</th>
        <th>Descripcion</th>
  			<th colspan="2">Acciones</th>
        
  		</thead>
  		<tbody>
  			@foreach($usuarios as $usuario)
  				<tr>
  					<td>{{ $usuario->id_jugador}}</td>
            <td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->foto_jugador }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $usuario->ci_jugador}}</td>
  					<td>{{ $usuario->nombre_jugador}}</td>
  					<td>{{ $usuario->apellidos_jugador}}</td>
            <td>@if($usuario->genero_jugador == "2")
                     {{ "Masculino" }}
                @else
                      {{ "Femenino" }}
                @endif
            </td>
            <td>{{ $usuario->email_jugador}}</td>
            <td>{{ $usuario->fecha_nac_jugador}}</td>
  					<td>{{ $usuario->descripcion_jugador}}</td>
            <td><a href="{{ route('jugador.edit',$usuario->id_jugador) }}" class="btn btn-warning">Editar</a></td>

            <td>
              <a href="{{ route('jugador.destroy',$usuario->id_jugador) }}"  class="btn btn-danger" data-toggle="modal" data-target="#Eliminar{{ $usuario->id_jugador}}" >Eliminar</a>
              <!-- Modal -->
              <div class="modal fade" id="Eliminar{{ $usuario->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SisO:</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      Esta seguro de querer eliminar al usuario?
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                      <a href="{{ route('jugador.destroy',$usuario->id_jugador) }}" class="btn btn-primary">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          @if(Auth::User()->tipo == 'Administrador')
            <td>
              {!! Form::open(['route'=>'jugador_inscripcion.store','method' => 'POST']) !!}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Inscribirse{{ $usuario->id_jugador}}">
                  Registrar a un club
                </button>
                  <!-- Modal -->
                <div class="modal fade" id="Inscribirse{{ $usuario->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Clubs:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="form-row">
                              <div class="form-group col-md-12">
                                {{ "Registrar a ".$usuario->nombre_jugador." ".$usuario->apellidos_jugador." en el Club:" }}
                              </div>
                          </div>
                           <div class="form-row" style="display: none">
                              <div class="form-group col-md-12">
                                {!! Form::label('id_jugador', 'Jugador', []) !!}
                                {!! Form::text('id_jugador',$usuario->id_jugador , ['class' =>'form-control']) !!}
                              </div>
                            </div> 
                            @foreach($clubs as $club)
                                
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                      {!! Form::radio('club', $club->id_club ,null,['id'=> 'club'.$usuario->id_jugador ,'class'=>'radio']) !!}
                                  
                                      {!! Form::label('club'.$usuario->id_jugador, $club->nombre_club, []) !!}
                                  </div>
                                </div>
                            @endforeach
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                         {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
                      </div>
                    </div>
                  </div>
                </div>
                {!! Form::close() !!}
            </td>
          @endif
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection