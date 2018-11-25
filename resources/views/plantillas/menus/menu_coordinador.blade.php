<div class="container-fluid bg-dark ">
  <div class="container">

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark text-center" style="padding: 4px">
        <a class="navbar-brand" href={{url('/')}}>
          <img src="/storage/logos/abcd.png" height="40" class="d-inline-block align-top" alt="">
        {{--   <div class="row">
              <div class="col-xl-1 text-center float-left" style="padding:0% ;height: 60px"><img src="/storage/logos/abcd.jpg" height="60" class="d-inline-block align-top" alt=""></div>
              <div class="col-xl-4" style="padding:0%"><p class="title text-center" style="height: 60px;">OLIMPIADAS SITUMSS</p></div>
          </div>
            --}}
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href={{url('welcome')}}>HOME <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href={{ route('coordinador.index') }}>MIS CLUBS</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href={{ route('coordinador.club_jugadores_ajax') }}>JUGADORES</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href={{ route('coordinador.mis_gestiones') }}>GESTIONES</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href={{ route('disciplina.index') }}>DISCIPLINAS</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href={{ route('partido.ver_partidos') }}>PARTIDOS</a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href={{ route('disciplina.index') }}>RESULTADOS</a>
          </li>
          

          
            </ul>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::User()->nombre." ".Auth::User()->apellidos }}
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href={{ route('logout') }}>Logout</a>
                <a class="dropdown-item" href={{ route('administrador.edit',Auth::User()->id_administrador) }}>Editar perfil</a>
              </div>
            </li>
        </ul>  
      </div>
    </nav>
  </div>
</div>
