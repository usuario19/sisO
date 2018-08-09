@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <a href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">{{ $disciplina->nombre_disc }}/</a>
      <a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">{{ $fase->nombre_fase }}/</a>                       
      <a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">{{ $grupo->nombre_grupo }}/</a>
  </div> 
</div>
<h4>Lista de Clubs:</h4>
  @include('grupo.modal_agregar_equipos') 
	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Logo</th>
        <th>Nombre</th>
        <th>Acciones</th>
  		</thead>
  		<tbody>

  			@foreach($clubs as $club)
  				<tr>
  					<td>{{ $club->id_club }}</td>
             <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>
            <td>{{ $club->nombre_club }}</td>
            <td><a href="{{ route('grupo.eliminar_club',[$club->id_grupo,$club->id_club_part]) }}" class="btn btn-danger">Eliminar</a></td>
           
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>
   <h4>Lista de Fechas:</h4>
  <table class="table table-condensed">
      <thead>
        <th width="50px">ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </thead>
      <tbody>
        @foreach($fechas as $fecha)
          <tr>
            <td>{{ $fecha->id_fecha }}</td>
            <td>{{ $fecha->nombre_fecha }}</td>
            <td><a href="{{ route('fecha.destroy',$fecha->id_fecha) }}" class="btn btn-danger">Eliminar</a></td>
          </tr>
        @endforeach
      </tbody>
  </table>
@endsection