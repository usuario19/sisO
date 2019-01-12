@extends('plantillas.main')

@section('title')
    SitUMSS
@endsection

@section('submenu')
<div class="container"> 
 {{--  <div class="content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('gestion.index') }}">Gestiones</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $gestion->nombre_gestion }}</li>
            </ol>
          </nav>
      </div>   --}}
    
      {!! Html::style('/css/estilo_menu_vertical.css') !!}
      {{--  {!! Html::style('/css/bootstrap.min.css') !!}  --}}

<nav id = "menu_lateral">
<ul class="nav flex-column">
    <li id="cabecera">
        <a href=""><span>{{ $gestion->nombre_gestion }}</span></a> 
    </li>
    <li>
        <a href="{{ route('gestion.configurar',$gestion->id_gestion) }}"><i class="material-icons">
                settings
                </i>Configuracion</a> 
    </li> 
    <li>
        <a href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}"><i class="material-icons">
                directions_bike
                </i>Disciplinas</a>  
    </li> 
    <li>
        <a href="{{ route('gestion.clubs',$gestion->id_gestion) }}"><i class="material-icons">
                create
                </i>Inscripcion</a> 
    </li> 
    <li>
        <a href="{{ route('gestion.listar_clubs',$gestion->id_gestion) }}"><i class="material-icons">
                group
                </i>Clubs</a>
    </li> 
    <li>
        <a href="{{ route('gestion.clasificacion',$gestion->id_gestion) }}"><i class="material-icons">
                star
                </i>Clasificacion</a>
    </li> 
    <li>
        <a href="{{ route('gestion.resultados',$gestion->id_gestion) }}"><i class="material-icons">
                poll
                </i>Resultados</a>
    </li>
</ul>
</nav>
</div>
<script>
    $(document).ready(function(){
        
        $('#submenu li a').on('click', function(e){
            $('#submenu').removeClass('in');
        });
        
     });
</script>
@endsection 
