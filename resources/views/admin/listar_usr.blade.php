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
        <th>Fecha <br> nacimiento</th>
        <th>Descripcion</th>
  			<th>Acciones</th>
        <th>Permisos</th>
        
  		</thead>
  		<tbody>
  			@foreach($usuarios as $usuario)
  				<tr>
  					<td>{{ $usuario->id_administrador}}</td>
            <td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="" height=" 90px" width="90px"></td>
            <td>{{ $usuario->ci}}</td>
  					<td>{{ $usuario->nombre}}</td>
  					<td>{{ $usuario->apellidos}}</td>
            <td>{{ $usuario->email}}</td>
            <td>{{ $usuario->fecha_nac}}</td>
  					<td>{{ $usuario->descripcion_admin}}</td>
            <td><a href="{{ route('administrador.edit',$usuario->id_administrador) }}">Editar</a></td>
            <td><a href="{{ route('administrador.destroy',$usuario->id_administrador) }}">Eliminar</a></td>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection