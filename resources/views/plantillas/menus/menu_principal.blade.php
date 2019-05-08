<div id="menu_principal" class="menu_style">
    <div class="container padd_none">
    {{--  <div class="container-fluid bg-light" style="padding: 0%">  --}}
    <nav class="navbar navbar-expand-lg  text-center pad_side_none">

      <button class="navbar-toggler btn-block navbar-light" {{--  style="border: solid 1px grey"  --}} type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons icon_white">
              expand_more
              </i>
          </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto menu-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('principal.index')}}">{{--  <i class="material-icons" style="top:4px; padding-right:10px">
                        home
                        </i>  --}}calendario <span class="sr-only">(current)</span></a>
            </li>
          {{--  <div class="dropdown-divider"></div>  --}}
          
            
          {{--  <li class="nav-item dropdown">
            
              <a class="nav-link" href={{ route('jugador.mostrar') }}>JUGADORES</a>
            
          </li>   --}}
         {{--   <li class="nav-item dropdown">
              <a class="nav-link" href={{ route('principal.consultar_resultados') }}>RESULTADOS</a>
          </li>  --}}

          {{--  <div class="dropdown-divider"></div>
          <li class="nav-item dropdown">
              <a class="nav-link" href={{ route('principal.consultar_partidos') }}>FIXTURE</a>
          </li>  --}}
          {{--  <div class="dropdown-divider"></div>  --}}
            {{--  <li class="nav-item dropdown">
                <a class="nav-link" href={{ route('principal.noticias') }}>NOTICIAS</a>
            </li>  --}}
            <div class="dropdown-divider"></div>
            <li class="nav-item dropdown">
                <a class="nav-link" href={{ route('principal.noticias') }}>GALERIA</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item dropdown">
                <a class="nav-link" href={{ route('principal.turismo') }}>TURISMO</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item dropdown">
              <a class="nav-link" href={{ route('gestion.mostrar_principal') }}>GESTIONES</a>
          </li>
          <div class="dropdown-divider"></div>
          
            
          <li class="nav-item dropdown">
            
              <a class="nav-link" href={{ route('club.mostrar_principal') }}>CLUBS</a>
            
          </li> 
          <div class="dropdown-divider"></div>
          <li class="nav-item dropdown">
            
              <a class="nav-link" href={{ route('principal.listar_disciplinas') }}>DISCIPLINAS</a>
            
          </li>
          <div class="dropdown-divider"></div>
          <li class="nav-item dropdown">
            
                <a class="nav-link" href={{ route('principal.medallero') }}>ganadores</a>
              
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item dropdown">
            
                    <a class="nav-link" href={{ route('principal.medallero_club') }}>medallero</a>
                  
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item dropdown">
            
                        <a class="nav-link" href={{ route('principal.reconocimientos') }}>Reconocimientos</a>
                      
                    </li>
                    <div class="dropdown-divider"></div>
        </ul>
          
        <ul class="navbar-nav menu-nav">
          <li class="nav-item">
            <a class="nav-link" href='{{ route('login') }}'>Iniciar Sesión</nav></a>
          </li>
        </ul> 
        </div>   
    </nav>

</div>
</div>



