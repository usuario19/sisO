
@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Clubs:</h1>
    <a href="club/create/" class="btn btn-primary">Agregar Club</a>
  </div>
  
</div>
	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th width="100px">Logo</th>
  			<th>Nombre</th>
  			<th>Coordinador</th>
        <th>Ciudad</th>
        <th>Descripcion</th>
  			<th>Acciones</th>
        
  		</thead>
  		<tbody>

  			@foreach($clubs as $club)
  				<tr>
  					<td>{{ $club->id_club}}</td>            
            <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $club->nombre_club}}</td>
  					<td>{{ $club->nombre." ".$club->apellidos}}</td>
  					<td>{{ $club->ciudad}}</td>
            <td>{{ $club->descripcion_club}}</td>

            <td><a href="{{ route('club.edit',$club->id_club) }}" class="btn btn-info">Editar</a></td>
            <td><a href="{{ route('club.destroy',$club->id_club) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>         
            <td><a href="{{ route('club.inscribir',$club->id_club) }}">Inscribir</a></td>
                        
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>
@endsection