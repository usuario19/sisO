@extends('plantillas.menu_inicio')

@section('title')
    SisO - Lista de Usuarios
@endsection

@section('content')
<h1>Lista de Usuarios:</h1>
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
  					<td>{{ $usuario->id_usuario}}</td>
            <td><img class="img-thumbnail" src="storage/fotos/{{ $usuario->foto }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $usuario->ci}}</td>
  					<td>{{ $usuario->nombre}}</td>
  					<td>{{ $usuario->apellidos}}</td>
            <td>{{ $usuario->email}}</td>
  					<td>{{ $usuario->descripcion_usuario}}</td>
            <td><a href="{{ route('usuario.edit',$usuario->id_usuario) }}">Editar</a></td>
            <td><a href="{{ route('usuario.destroy',$usuario->id_usuario) }}">Eliminar</a></td>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection