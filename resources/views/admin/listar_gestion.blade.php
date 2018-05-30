@extends('plantillas.main')

@section('title')
    SisO - Lista de Campeonatos
@endsection

@section('content')
<h1>Lista de Campeonatos:</h1>
	<table class="table table-condensed">
  		<thead>
  			<th>ID</th>
        <th>Nombre</th>
        <th>Fecha de Inicio</th>
  			<th>Fecha de Fin</th>
        <th>Descripcion</th>
  			<th>Acciones</th>
        <th>Permisos</th>
        <th>Clubs</th>
        
  		</thead>
  		<tbody>
  			@foreach($gestiones as $gestion)
  				<tr>
  					<td>{{ $gestion->id_gestion}}</td>
  					<td>{{ $gestion->nombre_gestion}}</td>
  					<td>{{ $gestion->fecha_ini}}</td>
            <td>{{ $gestion->fecha_fin}}</td>
  					<td>{{ $gestion->desc_gest}}</td>
            <td><a href="{{ route('gestion.edit',$gestion->id_gestion) }}" class="btn btn-info">Editar</a></td>
            <td><a href="{{ route('gestion.destroy',$gestion->id_gestion) }}" class="btn btn-danger">Eliminar</a></td>
            <td><a href="{{ route('gestion.clubs',$gestion->id_gestion) }}" class="btn btn-success">Ver</a></td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection