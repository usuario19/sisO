@extends('plantillas.main')

@section('title')
    SisO - Lista de Grupos
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="content">
  <nav aria-label="breadcrumb">
     <ol class="breadcrumb">
       <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
       <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
       <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
     </ol>
  </nav>
</div>
<div class="content form-inline">
    <h4>Lista de Grupos:</h4>
    <a href="{{ route('grupo.create',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn-primary">Agregar</a>
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Encuentros</th>
        <th colspan="2">Acciones</th>
  		</thead>
  		<tbody>

  			@foreach($grupos as $grupo)
  				<tr>
  					<td>{{ $grupo->id_grupo}}</td>
            <td>{{ $grupo->nombre_grupo }}</td>
            @if ($disciplina->tipo == 1)
            <td><a href="{{ route('grupo.listar_clubs_competicion',[$grupo->id_grupo,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}" class="btn btn-success">Competicion</a></td>
                
            @else
            <td><a href="{{ route('grupo.listar_clubs',[$grupo->id_grupo,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}" class="btn btn-success">Encuentros</a></td>
            
            @endif
            <td><a href="" class="btn btn-info">Editar</a></td>
            <td><a href="{{ route('grupo.destroy',$grupo->id_grupo) }}" class="btn btn-danger">Eliminar</a></td>
  				</tr>
  			@endforeach
      
  		</tbody>
  </table>
  {{ $grupos->links() }}
@endsection