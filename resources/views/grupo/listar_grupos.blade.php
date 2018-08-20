@extends('plantillas.main')

@section('title')
    SisO - Lista de Grupos
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">    
      <a href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">{{ $disciplina->nombre_disc }}/</a>
      <a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">{{ $fase->nombre_fase }}/</a>
  </div> 
</div>
<a href="{{ route('grupo.create2',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn-primary">Agregar Grupo</a>
<h4>Lista de Grupos:</h4>
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
            <td><a href="{{ route('grupo.listar_clubs',[$grupo->id_grupo,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}" class="btn btn-success">Encuentros</a></td>
            <td><a href="" class="btn btn-info">Editar</a></td>
            <td><a href="{{ route('grupo.destroy',$grupo->id_grupo) }}" class="btn btn-danger">Eliminar</a></td>
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>
@endsection