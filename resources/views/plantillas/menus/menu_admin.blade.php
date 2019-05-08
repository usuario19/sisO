<div class="container-fluid menu_style">
<div class="container">

      <nav class="navbar navbar-expand-lg  navbar-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto menu-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('welcome')}}">Home <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Campeonatos
                </a>
    
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href={{ route('gestion.index') }} style="color:black">Lista de Campeonatos</a>
                  <div class="dropdown-divider"></div>
                  <a id="gestiones" class="dropdown-item" href={{ route('coordinador.mis_gestiones') }} style="color:black">Seleccion Campeonatos</a>
                </div>
              
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link" href="{{ route('administrador.index') }}" >
              Coordinadores
            </a>
          </li> 
          <li class="nav-item active">
              <a class="nav-link" href={{ route('jugador.index') }}>jugadores
              </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href={{ route('club.index') }}>CLUBS
                </a>
              </li>
         {{--   <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Jugadores
              </a>
  
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href={{ route('jugador.index') }} style="color:black">Lista de jugadores</a>
                <a id="jugadores" class="dropdown-item" href={{ route('coordinador.club_jugadores_ajax') }} style="color:black">MIS JUGADORES</a>
              </div>
            </li>  --}}
          {{--  <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Clubs
                </a>
    
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('club.index') }}" style="color:black">Lista de clubs</a>
                  <a class="dropdown-item" href={{ route('coordinador.index') }} style="color:black">MIS CLUBS</a>
                </div>
          </li>   --}}

           <li class="nav-item active">
            <a class="nav-link" href="{{ route('disciplina.index')}}">
              Disciplinas
            </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="{{ route('lugares.index') }}">
                lugares
              </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="{{ route('aviso.index') }}">
                avisos
              </a>
          </li>
          <li class="nav-item dropdown active">
              <a class="nav-link" href="{{ route('lugares.imagenes_partidos') }}" >
                Galeria
              </a>
            </li>  
          {{--  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Resultados
              </a>
  
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>  --}}
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('reporte.index') }}">
                  Reportes
                </a>
              </li>
          </ul>
          <ul class="navbar-nav text-center">
              <li class="nav-item dropdown">
                <a class="nav-link text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="row mx-auto">
                      <span class="mx-auto row">
                        <img class="rounded-circle d-block text-center" src="/storage/fotos/{{ Auth::User()->foto_admin }}" alt="" height=" 40px" width="38px">
                        <i class="material-icons btn text-center float-left" style="color:white">
                            keyboard_arrow_down
                        </i>
                      </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href={{ route('administrador.show',Auth::User()->id_administrador) }}>Usuario: <strong>{{Auth::User()->nombre}} <br>{{Auth::User()->apellidos}}</strong></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href={{ route('administrador.edit',Auth::User()->id_administrador) }}>Editar perfil</a>
                    
                    <a class="dropdown-item" href={{ route('logout') }}>Cerrar Sesión</a>
                  </div>
                {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href={{ route('logout') }}>Logout</a>
                  <a class="dropdown-item" href={{ route('administrador.edit',Auth::User()->id_administrador) }}>Editar perfil</a>
                </div> --}}
              </li>
          </ul>  
        {{--  <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::User()->nombre." ".Auth::User()->apellidos }}
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href={{ route('logout') }}>Logout</a>
            </div>
          </li>
        </ul>    --}}
    	  </div>
      </nav>
    </div>
  </div>