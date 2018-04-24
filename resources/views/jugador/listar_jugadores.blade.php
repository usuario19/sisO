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
        <th>Correo</th>
        <th>Descripcion</th>
  			<th>Acciones</th>
        
  		</thead>
  		<tbody>
  			@foreach($usuarios as $usuario)
  				<tr>
  					<td>{{ $usuario->id_jugador}}</td>
            <td><img class="img-thumbnail" src="storage/fotos/{{ $usuario->foto_jugador }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $usuario->ci_jugador}}</td>
  					<td>{{ $usuario->nombre_jugador}}</td>
  					<td>{{ $usuario->apellidos_jugador}}</td>
            <td>{{ $usuario->email_jugador}}</td>
  					<td>{{ $usuario->descripcion_jugador}}</td>
            <td><a href="{{ route('jugador.edit',$usuario->id_jugador) }}">Editar</a></td>
            <td><a href="{{ route('jugador.destroy',$usuario->id_jugador) }}">Eliminar</a></td>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection