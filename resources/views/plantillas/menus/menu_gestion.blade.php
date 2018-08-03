@extends('plantillas.main')

@section('title')
    SisO - Lista de Campeonatos
@endsection

@section('submenu')
<h1>{{ $gestion->nombre_gestion }}</h1>
 <nav class="nav nav-justified navbar-light bg-light" >
  <a class="nav-item nav-link" href="{{ route('gestion.configurar',$gestion->id_gestion) }}">Configuracion</a>
  <a class="nav-item nav-link" href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">Disciplinas</a>
  <a class="nav-item nav-link" href="{{ route('gestion.clubs',$gestion->id_gestion) }}">Inscripcion</a>
  <a class="nav-item nav-link" href="#">Clubs</a>
  <a class="nav-item nav-link" href="#">Clasificacion y Calendario</a>
</nav>
    
 
@endsection