@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline" style="background-color: #cccccc">
    <h5>{{ $disciplina->nombre_disc }}/</h5>
      <a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}"><h5>Fases/</h5></a>                       
      <a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}"><h5>Grupos/</h5></a>
      <h5>{{ $grupo->nombre_grupo }}</h5>
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
            <th colspan="2" style="text-align: center;">Equipos</th>
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
                

                  @foreach ($encuentro->encuentro_club_participaciones as $equipo)
                  
                    <td><img class="img-thumbnail" src="/storage/logos/{{ $equipo->club_participacion->club->logo}}" alt="{{ $equipo->club_participacion->club->nombre_club}}" height=" 50px" width="50px">{{ $equipo->club_participacion->club->nombre_club}}</td>
                  @endforeach
                
                       
                <td>{{ $encuentro->fecha}}</td>
                <td>{{ $encuentro->hora}}</td>
                <td>{{ $encuentro->ubicacion}}</td>
                <td>{{ $encuentro->detalle}}</td>

                
                <td><a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}" class="btn btn-danger">Eliminar</a></td>
                <td><a href="{{ route('encuentro.fixture') }}" class="btn btn-danger">fixture</a></td>
                <td><a href="{{ route('encuentro.mostrar_resultado',$encuentro->id_encuentro) }}" class="btn btn-success">Resultado</a></td>
              </tr>
            @endforeach            
          </tbody>
      </table>
   @endforeach
@endsection