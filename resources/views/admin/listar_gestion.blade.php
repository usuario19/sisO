@extends('plantillas.main')

@section('title')
    SisO - Lista de Gestiones
@endsection

@section('content')
<h1>Lista de Gestiones:</h1>
	<table class="table table-condensed">
  		<thead>
  			<th>ID</th>
        <th>Nombre</th>
        <th>Fecha de Inicio</th>
  			<th>Fecha de Fin</th>
        <th>Descripcion</th>
  			<th>Acciones</th>
        <th>Permisos</th>
        
  		</thead>
  		<tbody>
  			@foreach($gestiones as $gestion)
  				<tr>
  					<td>{{ $gestion->id_gestion}}</td>
  					<td>{{ $gestion->nombre_gestion}}</td>
  					<td>{{ $gestion->fecha_ini}}</td>
            <td>{{ $gestion->fecha_fin}}</td>
  					<td>{{ $gestion->desc_gest}}</td>
            <td><a href="{{ route('gestion.edit',$gestion->id_gestion) }}">Editar</a></td>
            <td><a href="{{ route('gestion.destroy',$gestion->id_gestion) }}">Eliminar</a></td>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection