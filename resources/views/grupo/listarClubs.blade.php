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
  <div>
       
     </div>
     <h4>Lista de Encuentros:</h4>
     @include('encuentro.modal_agregar_encuentro')
     

   @foreach ($fechas as $fecha)
      <div>
         <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}</h4>
      </div>
      <table class="table table-condensed">
          <thead>
            <th width="50px">ID</th>
            <th>Equipos</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ubicacion</th>
            <th>Detalle</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach($fecha->encuentros as $encuentro)
              <tr>
                <td>{{ $encuentro->id_encuentro }}</td> 
                <td>

                  @foreach ($encuentro->encuentro_club_participaciones as $equipo)
                  
                    <img class="img-thumbnail" src="/storage/logos/{{ $equipo->club_participacion->club->logo}}" alt="{{ $equipo->club_participacion->club->nombre_club}}" height=" 50px" width="50px">{{ $equipo->club_participacion->club->nombre_club}}
                  @endforeach
                </td>
                       
                <td>{{ $encuentro->fecha}}</td>
                <td>{{ $encuentro->hora}}</td>
                <td>{{ $encuentro->ubicacion}}</td>
                <td>{{ $encuentro->detalle}}</td>

                
                <td><a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}" class="btn btn-danger">Eliminar</a></td>
              </tr>
            @endforeach            
          </tbody>
      </table>
   @endforeach
@endsection