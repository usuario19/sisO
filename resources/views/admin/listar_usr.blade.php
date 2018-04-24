@extends('plantillas.main')

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
        <th>Permisos</th>
        
  		</thead>
  		<tbody>
  			@foreach($usuarios as $usuario)
  				<tr>
  					<td>{{ $usuario->id_administrador}}</td>
            <td><img class="img-thumbnail" src="storage/fotos/{{ $usuario->foto_admin }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $usuario->ci}}</td>
  					<td>{{ $usuario->nombre}}</td>
  					<td>{{ $usuario->apellidos}}</td>
            <td>{{ $usuario->email}}</td>
  					<td>{{ $usuario->descripcion_admin}}</td>
            <td><a href="{{ route('administrador.edit',$usuario->id_administrador) }}">Editar</a></td>
            <td><a href="{{ route('administrador.destroy',$usuario->id_administrador) }}">Eliminar</a></td>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection