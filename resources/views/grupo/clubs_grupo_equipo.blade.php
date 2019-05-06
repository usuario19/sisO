@extends('plantillas.main')

@section('title')
    SisO - Seleccionar clubs
@endsection

@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

    <div class="margin_top col-md-9">
      <div class="">
        <div class="card-">
          <div class="row">
            <div class="form-group col-md-12 margin_bottom_none">
              <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
                  <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
                  <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         
                  <li class="breadcrumb-item active" id="id_grupo" value="{{ $grupo->id_grupo }}"  aria-current="page">{{ $grupo->nombre_grupo }}</li>
                
                </ol>
              </nav>
            </div>
            <div class="form-group col-md-12">
              <nav class="navbar navbar-expand-lg menu">
                <ul class="navbar-nav btn-block">
                  <li class="nav-item link  col-md-4">
                    <a class="nav-link link active col-md-12" href="{{ route('grupo.clubs_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Clubs <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item link  col-md-4">
                    <a class="nav-link link  col-md-12" href="{{ route('grupo.fechas_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
                  </li>
                  <li class="nav-item link  col-md-4">
                    <a class="nav-link link   col-md-12" href="{{ route('grupo.encuentros_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">3. Registrar encuentros</a>
                  </li>
                </ul>
              </nav>
                  {{--  <div class="dropdown" >
                      <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i title="Configuracion" class="material-icons config_encuentro" style="color:black">
                              settings
                              </i></a> 
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{ route('grupo.clubs_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
                          <a class="dropdown-item" href="{{ route('grupo.fechas_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
                          <a class="dropdown-item" href="{{ route('grupo.encuentros_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
                        </div>
                    </div>  --}}
            </div>
          </div>
        </div>
        <div class="container">
          <div class="margin_top">
            <div class="row container">
              <div class="form-group col-md-9">
                <h4 class="lista" style="font-size:20px">Lista de Clubs:</h4>
              </div>
              <div class="form-group col-md-3">
                <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#v">
                  <div class="button-div" style="width: 100px">
                    <i class="material-icons float-left" style="font-size: 22px">add</i>
                    <span class="letter-size">Agregar</span>
                  </div>
                </button>
                @include('grupo.modal_agregar_equipos') 
              </div>
                  {{--  <button class="btn btn-warning " data-toggle="modal" data-target="#v">Agregar</button>  --}}
            </div>
            <table class="mi_tabla table table-bordered table-hover table-sm">
              <thead>
                <th width="30">NO</th>
                <th width="50">Logo</th>
                <th>Nombre</th>
                <th width="50">Acciones</th>
              </thead>
              <tbody>
                @foreach($clubs as $club)
                  <tr>
                    <td>{{ $club->id_club }}</td>
                    <td><img class="" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>
                    <td>{{ $club->nombre_club }}</td>
                    <td class="text-center"><a href="{{ route('grupo.eliminar_club',[$club->id_grupo,$club->id_club_part,$fase->id_fase]) }}"><i title="Eliminar" class="material-icons delete_button">
                      delete
                      </i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div> 
        </div> 
      </div> 
    </div>
</div>

@endsection
@section('scripts')
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/checkbox.js') !!}
@endsection
    