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

      <div class="col-md-3">
<nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="col-md-12" style="padding: 0%">
                            <a class="navbar-brand">
                                <i class="material-icons reporte_icon">
                                    list_alt
                                </i><span class="title-principal" style="padding: 0%">REPORTES</span>
                            </a>
                            <a class="btn float-right" type=" " data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="material-icons d-block d-md-none" style="padding-top: 7px; color: white">
                                        keyboard_arrow_down
                                    </i>
                            </a>
                            <div class="collapse navbar-collapse btn-block" id="navbarText">

                                <div class="reporte_menu col-12" style="padding: 0%">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <div class="dropdown-divider"></div>
                                        
                                        <a class="nav-item nav-link active btn-block" id="v-pills-home-tab" href="{{ route('gestion.configurar',$gestion->id_gestion) }}" ><i class="material-icons">
                settings
                </i>Configuracion</a></a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}"><i class="material-icons">
                directions_bike
                </i>Disciplinas</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link btn-block" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Fixture</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link btn-block" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Resultado</a>
                                    </div>
                                </div>
                              <span class="navbar-text">
                                
                              </span>
                            </div>
                        </div>
</nav>
</div>
<nav id = "menu_lateral" style="background:#DA4640">
<ul class="nav flex-column" style="background:#DA4640">
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
    <li>
        <a href="{{ route('gestion.resultados_finales',$gestion->id_gestion) }}"><i class="material-icons">
            favorite
            </i>Ganadores</a>
    </li>
</ul>
</nav>
</div>
@endsection 
