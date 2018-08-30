@extends('plantillas.main')

@section('title')
    SisO - Lista de Campeonatos
@endsection

@section('submenu')
<div class="form-row">

  <div class="form-group col-md-12 form-inline">
    <a href="{{ route('gestion.index') }}"><h5>Gestiones/</h5></a>
    <h5>{{ $gestion->nombre_gestion }}</h5>
  </div> 
</div>

 <nav class="nav nav-justified navbar-light bg-secondary" >
  <a class="nav-item nav-link text-white" href="{{ route('gestion.configurar',$gestion->id_gestion) }}">Configuracion</a>
  <a class="nav-item nav-link text-white" href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">Disciplinas</a>
  <a class="nav-item nav-link text-white" href="{{ route('gestion.clubs',$gestion->id_gestion) }}">Inscripcion</a>
  <a class="nav-item nav-link text-white" href="{{ route('gestion.listar_clubs',$gestion->id_gestion) }}">Clubs</a>
  <a class="nav-item nav-link text-white" href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">Clasificacion y Calendario</a>
</nav>
    
 
@endsection