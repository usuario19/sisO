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

@endsection
  @section('scripts')
     {!! Html::script('/js/filtrar_por_nombre.js') !!}
    {!! Html::script('/js/vista_previa.js') !!}
  
  @endsection