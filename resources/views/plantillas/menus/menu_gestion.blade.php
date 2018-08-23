@extends('plantillas.main')

@section('title')
    SisO - Lista de Campeonatos
@endsection

@section('submenu')
<h3>{{ $gestion->nombre_gestion }}</h3>
 <nav class="nav nav-justified navbar-light bg-secondary" >
  <a class="nav-item nav-link text-white" href="{{ route('gestion.configurar',$gestion->id_gestion) }}">Configuracion</a>
  <a class="nav-item nav-link text-white" href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">Disciplinas</a>
  <a class="nav-item nav-link text-white" href="{{ route('gestion.clubs',$gestion->id_gestion) }}">Inscripcion</a>
  <a class="nav-item nav-link text-white" href="#">Clubs</a>
  <a class="nav-item nav-link text-white" href="#">Clasificacion y Calendario</a>
</nav>
    
 
@endsection