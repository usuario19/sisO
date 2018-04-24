@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Disciplina:</h1>
    <a href="club/create/" class="btn btn-primary">Agregar Disciplina</a>
  </div>
  
</div>


	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th width="100px">Foto</th>
  			<th>Nombre</th>
  			<th>Reglamento</th>
        <th>Descripcion</th>
  		</thead>
  		<tbody>

  			@foreach($disciplinas as $disciplina)
        
  				<tr>
  					<td>{{ $disciplina->id_club}}</td>

            <td><img class="img-thumbnail" src="storage/logos/{{ $club->logo }}" alt="" height=" 100px" width="100px"></td>

            <td>{{ $disciplina->id_disc}}</td>
  					<td>{{ $disciplina->foto_disc}}</td>
            <td>{{ $disciplina->nombre_disc}}</td>
            <td>{{ $disciplina->reglamento_disc}}</td>
            <td>{{ $disciplina->descripcion_club}}</td>

            <td><a href="{{ route('disciplina.edit',$disciplina->id_disc) }}">Editar</a></td>
            <td><a href="{{ route('disciplina.destroy',$disciplina->id_disc) }}">Eliminar</a></td>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection