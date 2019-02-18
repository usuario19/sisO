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
    <div style="float: left;" class="form-row col-md-12 form-inline">
        <h4>Lista de Clubs:</h4>
        <button class="btn btn-primary " data-toggle="modal" data-target="#v">Agregar</button>
    </div>
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
                <td><a href="{{ route('grupo.eliminar_club',[$club->id_grupo,$club->id_club_part]) }}"><i title="Eliminar" class="material-icons delete_button">
                  delete
                  </i></a></td>
               
              </tr>
            @endforeach
            
          </tbody>
      </table>
    </div> 
</div>
@endsection

    