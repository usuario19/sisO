@extends('plantillas.main')

@section('title')
    SitUMSS
@endsection

@section('submenu')
{!! Html::style('/css/estilo_menu_vertical.css') !!}
<div class="container"> 
    <div class="col-md-3" style="float:left;" >
    <div  class="col-md-12" >
            <nav id="menu_lateral" class="navbar navbar-expand-lg navbar-dark">
                    <div class="col-md-12" style="padding: 0%">
                        <a class="navbar-brand">
                            <span class="title-principal" style="padding: 0%">{{ $gestion->nombre_gestion }}</span>
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
                    <a href="{{ route('gestion.configurar',$gestion->id_gestion) }}" >
                        <i class="material-icons">settings
                        </i>Configuracion</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}"><i class="material-icons">
                        directions_bike
                        </i>Disciplinas</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('gestion.clubs',$gestion->id_gestion) }}"><i class="material-icons">
                                                create
                    </i>Inscripcion</a> 
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('gestion.listar_clubs',$gestion->id_gestion) }}"><i class="material-icons">
                                                group
                    </i>Clubs</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('gestion.clasificacion',$gestion->id_gestion) }}"><i class="material-icons">
                                                star
                                                </i>Clasificacion</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route('gestion.resultados',$gestion->id_gestion) }}"><i class="material-icons">
                                                        poll
                                                        </i>Resultados</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route('gestion.resultados_finales',$gestion->id_gestion) }}"><i class="material-icons">
                                                        favorite
                                                        </i>Ganadores</a>

                                        
                                    </div>
                                </div>
                            </div>
        </div>
</nav>
</div>
{{--  </div>   

<div class="card" style="heigth:100%">
    <pre>holas a todos























    </pre>

</div>  --}}
</div>
@endsection 
