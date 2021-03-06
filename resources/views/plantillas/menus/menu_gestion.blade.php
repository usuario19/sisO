
    <div class="col-md-3 ">
                <nav class="navbar navbar-expand-lg navbar-dark reporte_navbar padd_left_none padd_right_none">
                    <div class="col-md-12 " style="padding: 0%">
                        <div class="form-row header-nav col-md-12" style="margin:0%">
                            <div class="col-11" style="padding:10px">
                            	    <span class="lista_sub" style="padding: 0%;color:white">{{ $gestion->nombre_gestion }}</span>
                            </div>
                            <div class="col-1">

                            	<a class="btn float-right reporte_header" type=" " data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            	        <i class="material-icons d-block d-md-none reporte_icon_title" style="padding-top: 0px;">
                            	            keyboard_arrow_down
                            	        </i>
                            	</a>
                            </div>
                            </div>

                            <div class="collapse navbar-collapse btn-block" id="navbarText">

                                <div class="reporte_menu col-12" style="padding: 0%">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <div class="dropdown-divider reporte_divider"></div>
                                        <a  class="nav-link btn-block" href="{{ route('gestion.configurar',$gestion->id_gestion) }}" >
                                        <i class="material-icons reporte_icon">settings
                                        </i>Configuracion</a>
                                        <div class="dropdown-divider reporte_divider"></div>
                                        <a  class="nav-link btn-block" href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">
                                        <i class="material-icons reporte_icon">
                                            directions_bike
                                            </i>Disciplinas
                                        </a>
                                        <div class="dropdown-divider reporte_divider"></div>
                                        <a class="nav-link btn-block" href="{{ route('gestion.clubs',$gestion->id_gestion) }}">
                                        <i class="material-icons reporte_icon">
                                                create
                                        </i>Inscripcion</a> 
                                        <div class="dropdown-divider reporte_divider"></div>
                                        <a class="nav-link btn-block" href="{{ route('gestion.clasificacion',$gestion->id_gestion) }}">
                                        <i class="material-icons reporte_icon">
                                            star
                                            </i>Clasificacion</a>
                                        <div class="dropdown-divider reporte_divider"></div>
                                        <a class="nav-link btn-block" href="{{ route('gestion.resultados',$gestion->id_gestion) }}">
                                        <i class="material-icons reporte_icon">
                                            equalizer
                                        </i>Resultados</a>
                                        <div class="dropdown-divider reporte_divider"></div>
                                        <a class="nav-link btn-block" href="{{ route('gestion.resultados_finales',$gestion->id_gestion) }}">
                                        <i class="material-icons reporte_icon">
                                        favorite
                                        </i>Ganadores</a>
                                        <div class="dropdown-divider reporte_divider"></div>
                                        <a class="nav-link btn-block" href="{{ route('gestion.reconocimientos',$gestion->id_gestion) }}">
                                        <i class="material-icons reporte_icon">
                                        favorite
                                        </i>Reconocimientos</a>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                </nav>
   {{--   <div  class="col-md-12" >
            <nav id="menu_lateral" class="navbar navbar-expand-lg navbar-dark">
                    <div class="header-nav col-md-12" style="padding: 0%">
                        <a class="navbar-brand">
                            <span class="lista" style=" color:white">{{ $gestion->nombre_gestion }}</span>
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
                        </i>Disciplinas
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('gestion.clubs',$gestion->id_gestion) }}"><i class="material-icons">
                                                create
                    </i>Inscripcion</a> 
                   {{--   <div class="dropdown-divider"></div>
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
                            </div>{{--    --}}
</div>
