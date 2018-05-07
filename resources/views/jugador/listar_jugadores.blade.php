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
            <td><img class="rounded mx-auto d-block" src="storage/fotos/{{ $usuario->foto_jugador }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $usuario->ci_jugador}}</td>
  					<td>{{ $usuario->nombre_jugador}}</td>
  					<td>{{ $usuario->apellidos_jugador}}</td>
            <td>@if($usuario->genero_jugador == "0")
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
              <a href="#confirm?"  class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >Eliminar</a>
              </td>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                       <a href="{{ route('jugador.destroy',$usuario->id_jugador) }}" class="btn btn-primary">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection