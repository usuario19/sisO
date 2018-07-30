@extends('plantillas.main')

@section('title')
    SisO - Lista de Grupos
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    
      <h1>Lista de Grupos:</h1>
      <h2> {{ $fase->nombre_fase }}</h2>

    <a href="{{ route('grupo.create2',$fase->id_fase) }}" class="btn btn-primary">Agregar Grupo</a>
  </div> 
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Encuentros</th>
  		</thead>
  		<tbody>

  			@foreach($grupos as $grupo)
  				<tr>
  					<td>{{ $grupo->id_grupo}}</td>
            <td>{{ $grupo->nombre_grupo }}</td>
            <td><a href="{{ route('grupo.listar_clubs',$grupo->id_grupo) }}" class="btn btn-success">Encuentros</a></td>
            <td><a href="{{ route('grupo.destroy',$grupo->id_grupo) }}" class="btn btn-danger">Eliminar</a></td>
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>
@endsection