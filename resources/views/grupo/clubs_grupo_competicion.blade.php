@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
  @include('plantillas.menus.menu_gestion')
@endsection

@section('content')
    <div class="container">
      <div class="row">
      <div class="form-group col-md-11">
          <nav aria-label="breadcrumb" >
              <ol class="breadcrumb">
                  <li  class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
                  <li  class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
                  <li  class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         
                  <li  class="breadcrumb-item active" aria-current="page">{{ $grupo->nombre_grupo }}</li>
                  
                </ol>
              </nav>
      </div>
      <div class="form-group col-md-1">
          <div class="dropdown" >
              <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i title="Configuracion" class="material-icons delete_button">
                      settings
                      </i></a> 
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('grupo.clubs_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
                    <a class="dropdown-item" href="{{ route('grupo.fechas_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
                    <a class="dropdown-item" href="{{ route('grupo.encuentros_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
                  </div>
            </div>
        </div>
      </div>
    </div>

{{--  <nav class="navbar navbar-expand-md table-bordered menu">
    <ul class="navbar-nav btn-block">
      <li class="nav-item link col-md-3" style="padding: 0%">
        <a class="nav-link link active col-md-12" href="{{ route('grupo.clubs_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">clubs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item link col-md-3" style="padding: 0%">
        <a class="nav-link link col-md-12" href="{{ route('grupo.fechas_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
      </li>
      <li class="nav-item link col-md-3" style="padding: 0%">
          <a class="nav-link link col-md-12" href="{{ route('grupo.encuentros_grupo_competicion',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
        </li>
    </ul>
  </nav>  --}}
  <div class="container">
      <div class="card">
          <div class="row container">
              <div class="form-group col-md-10"><h4>Lista de Clubs:</h4></div>
              <div class="form-group col-md-2">
                  <button class="btn btn-primary " data-toggle="modal" data-target="#v">Agregar</button>
              </div>
          </div>

      @include('grupo.modal_agregar_equipos')
      <div class="card-body">

      <div class="table-responsive-xl"> 
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
</div>
</div>
@endsection
