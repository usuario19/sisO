<div class="container-fluid " style="background:#ffffff">
<div class="container-fluid -whitebg" style="padding: 0%">
  <div class="container">
    <div class="col-md-12">
        <nav class="col-md-12 navbar navbar-light bg-white" style="padding: 5px 0% 0% 0%">
            <a class="navbar-brand col-md-12" href="{{route('principal.index')}}">
              <div class="row">
                  <div class="col-xl-1 text-center float-left" style="padding:0% ;height: 60px"><img src="/storage/logos/abcd.jpg" height="60" class="d-inline-block align-top" alt=""></div>
                  <div class="col-xl-5" style="padding:0%"><p class="title text-left" style="height: 60px; padding-block-start: 20px; padding-inline-start:50px">OLIMPIADAS SI.T.UMSS</p></div>
              </div>
              
            </a>
            
          </nav>
    </div>
</div>
</div>  
</div>
<div class="container-fluid " style="background:#DA4640">
<div class="container ">

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

          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Campeonatos
                </a>
    
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href={{ route('gestion.index') }}>Lista de Campeonatos</a>
                  <div class="dropdown-divider"></div>
                  <a id="gestiones" class="dropdown-item" href={{ route('coordinador.mis_gestiones') }}>Mis Campeonatos</a>
                </div>
              
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('administrador.index') }}" >
              Coordinadores
            </a>
          </li> 
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Jugadores
              </a>
  
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href={{ route('jugador.index') }}>Lista de jugadores</a>
                <a id="jugadores" class="dropdown-item" href={{ route('coordinador.club_jugadores_ajax') }}>MIS JUGADORES</a>
              </div>
            </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Clubs
                </a>
    
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('club.index') }}">Lista de clubs</a>
                  <a class="dropdown-item" href={{ route('coordinador.index') }}>MIS CLUBS</a>
                </div>
          </li> 

           <li class="nav-item ">
            <a class="nav-link" href="{{ route('disciplina.index')}}">
              Disciplinas
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('lugares.index') }}">
                lugares
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('aviso.index') }}">
                avisos
              </a>
          </li> 
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Resultados
              </a>
  
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
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
                        <i class="material-icons btn text-center float-left">
                            keyboard_arrow_down
                        </i>
                      </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('administrador.show',Auth::User()->id_administrador) }}">Usuario: <strong>{{Auth::User()->nombre}} <br>{{Auth::User()->apellidos}}</strong></a>
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