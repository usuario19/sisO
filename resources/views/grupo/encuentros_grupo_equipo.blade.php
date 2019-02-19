@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
         <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
         <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
         <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         
         <li class="breadcrumb-item active" id="id_grupo" value="{{ $grupo->id_grupo }}"  aria-current="page">{{ $grupo->nombre_grupo }}</li>
       </ol>
    </nav>
</div>
<div class="dropdown container">
    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Configuracion
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="{{ route('grupo.clubs_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
      <a class="dropdown-item" href="{{ route('grupo.fechas_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
      <a class="dropdown-item" href="{{ route('grupo.encuentros_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
    </div>
  </div> 
    <div class="container">
  <div class="card">

        <h4>Lista de Encuentros:</h4>
        @include('encuentro.modal_agregar_encuentro')     
        @include('encuentro.modal_agregar_resultado')     
        @include('encuentro.modal_ver_resultado')     
   
      @foreach ($fechas as $fecha)
         <div>
            <h6 style="text-align: center; ">{{ $fecha->nombre_fecha }}
              <a href="{{ route('encuentro.fixture') }}"><i title="Fixture" class="material-icons delete_button">
                  assignment</i></a></h4>
            
         </div>
         <table class="table table-condensed">
             <thead>
               <th width="50px">ID</th>
               <th colspan="2" style="text-align: center;">Equipos</th>
               <th>Fecha</th>
               <th>Hora</th>
               <th>Ubicacion</th>
               <th>Detalle</th>
               <th colspan="2">Acciones</th>
             </thead>
             <tbody>
               @foreach($fecha->encuentros as $encuentro)
                 <tr>
                   <td>{{ $encuentro->id_encuentro }}</td> 
                     @foreach ($encuentro->encuentro_club_participaciones as $equipo)
                       <td><img class="img-thumbnail" src="/storage/logos/{{ $equipo->club_participacion->club->logo}}" alt="{{ $equipo->club_participacion->club->nombre_club}}" height=" 50px" width="50px">{{ $equipo->club_participacion->club->nombre_club}}</td>
                     @endforeach
                   <td>{{ $encuentro->fecha }}</td>
                   <td>{{ $encuentro->hora}}</td>
                   <td>{{ $encuentro->centro->ubicacion_centro}}</td>
                   <td>{{ $encuentro->detalle}}</td>                 
                   <td>
                    @if ($encuentro->tiene_resultado($encuentro->id_encuentro) == 1)
                      <a href=" " onclick="VerResultado({{ $encuentro->id_encuentro }});"  class="button_delete" data-toggle="modal" data-target="#modalVerResultado">
                        <i title="Ver resultados" class="material-icons delete_button button_redirect">
                          collections_bookmark
                        </i>
                      </a>
                    @else
                    <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons delete_button">
                      delete</i></a>
                   
                      <a href=" " onclick="RegistrarResultado({{ $encuentro->id_encuentro }});"  class="button_delete" data-toggle="modal" data-target="#modalResultado">
                        <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                          collections_bookmark
                        </i>
                      </a>
                    @endif
                      {{--  <button data-toggle="modal" data-target="#modalResultado" style="padding: 0%"><i title="Resultados" class="material-icons delete-button">collections_bookmark</i></button>  --}}
                  </td>
                 </tr>
               @endforeach            
             </tbody>
         </table>
      @endforeach
      </div>
    </div>
@endsection
