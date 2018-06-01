@extends('plantillas.main')

@section('title')
    SisO - Lista de jugadores
@endsection

@section('content')
<h1>Lista de Jugadores:</h1>
	<table class="table table-container">
  		<thead>
        <tr>
          @foreach($mi_club as $club)
            <th colspan="2">
              <img src="/storage/logos/{{ $club->logo }}" alt="" width="110px" height="100px">
            </th>
            <th colspan="9">
              <h3 class="display-4">{{ $club->nombre_club }}</h3>
            </th>
          @endforeach
        </tr>
  			<tr>
          <th width="20px">ID</th>
          <th width="100px">Foto</th>
          <th width="50px">CI</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Genero</th>
          <th>Correo</th>
          <th>Fecha de nacimiento</th>
          <th>Descripcion</th>
          <th colspan="3">Acciones</th>
        </tr>
        
  		</thead>
  		<tbody>
  			@foreach($mis_jugadores as $usuario)
  				<tr>
  					<td>{{ $usuario->jugador->id_jugador}}</td>
            <td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="" height=" 80px" width="80px"></td>
            <td>{{ $usuario->jugador->ci_jugador}}</td>
  					<td>{{ $usuario->jugador->nombre_jugador}}</td>
  					<td>{{ $usuario->jugador->apellidos_jugador}}</td>
            <td>@if($usuario->jugador->genero_jugador == "2")
                     {{ "Masculino" }}
                @else
                      {{ "Femenino" }}
                @endif
            </td>
            <td>{{ $usuario->jugador->email_jugador}}</td>
            <td>{{ $usuario->jugador->fecha_nac_jugador}}</td>
  					<td>{{ $usuario->jugador->descripcion_jugador}}</td>
            <td><a href="{{ route('jugador.edit',$usuario->id_jugador) }}" class="btn btn-warning">Editar</a></td>

            <td>
              <a href="{{ route('coordinador.eliminar',[$usuario->id_jugador,$usuario->id_club]) }}"  class="btn btn-danger" data-toggle="modal" data-target="#Eliminar{{ $usuario->id_jugador}}" >Eliminar</a>
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

                      <a href={{ route('coordinador.eliminar',[$usuario->id_jugador,$usuario->id_club]) }} class="btn btn-primary">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <a href={{ route('seleccion.ver_seleccion',[$usuario->id_jugador,$usuario->id_club]) }} class="btn btn-info">Ver Participacion</a>
            </td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection