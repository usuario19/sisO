@extends('plantillas.main')

@section('title')
    SitUMSS
@endsection

@section('submenu')
<div class="content">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gestion.index') }}">Gestiones</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $gestion->nombre_gestion }}</li>
      </ol>
    </nav>
</div>

<div class="content">
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
             <a class="nav-item nav-link text-white" href="{{ route('gestion.configurar',$gestion->id_gestion) }}">Configuracion</a>
          </li>

          <li class="nav-item">
           <a class="nav-item nav-link text-white" href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">Disciplinas</a>
          </li>
    		  <li class="nav-item">
             <a class="nav-item nav-link text-white" href="{{ route('gestion.clubs',$gestion->id_gestion) }}">Inscripcion</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-item nav-link text-white" href="{{ route('gestion.listar_clubs',$gestion->id_gestion) }}">Clubs</a>
          </li> 

          <li class="nav-item">
             <a class="nav-item nav-link text-white" href="{{ route('gestion.clasificacion',$gestion->id_gestion) }}">Clasificacion</a>
          </li> 

          <li class="nav-item">
            <a class="nav-item nav-link text-white" href="{{ route('gestion.resultados',$gestion->id_gestion) }}">Resultados</a>
          </li> 
        </ul>  
    	  </div>
      </nav>
    </div>
@endsection