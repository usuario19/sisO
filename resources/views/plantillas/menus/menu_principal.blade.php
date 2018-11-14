<div class="container-fluid -whitebg" style="padding: 0%">
  <div class="container">
    <div class="col-md-12">
        <nav class="col-md-12 navbar navbar-light bg-white" style="padding: 5px 0% 0% 0%">
            <a class="navbar-brand col-md-12" href={{url('/')}}>
              <div class="row">
                  <div class="col-xl-1 text-center float-left" style="padding:0% ;height: 60px"><img src="/storage/logos/abcd.jpg" height="60" class="d-inline-block align-top" alt=""></div>
                  <div class="col-xl-4" style="padding:0%"><p class="title text-center" style="height: 60px;">OLIMPIADAS SITUMSS</p></div>
              </div>
              
            </a>
            
          </nav>
    </div>
</div>
</div>  
<div class="container-fluid bg-light" style="padding: 0%">
    <div class="container">
    {{--  <div class="container-fluid bg-light" style="padding: 0%">  --}}
    <nav class="navbar navbar-expand-lg bg-light  text-center">

      <button class="navbar-toggler btn-block navbar-light" {{--  style="border: solid 1px grey"  --}} type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons" style="color:grey">
              expand_more
              </i>
          </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href={{url('/')}}>HOME <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown">
            
              <a class="nav-link" href={{ route('gestion.mostrar_principal') }}>GESTIONES</a>
              
          </li>
          
          
            
          <li class="nav-item dropdown">
            
              <a class="nav-link" href={{ route('jugador.mostrar') }}>JUGADORES</a>
            
          </li> 

          <li class="nav-item dropdown">
            
              <a class="nav-link" href={{ route('club.mostrar_principal') }}>CLUBS</a>
            
          </li> 

          <li class="nav-item dropdown">
            
              <a class="nav-link" href={{ route('disciplina.mostrar') }}>DISCIPLINAS</a>
            
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link" href={{ route('gestion.mostrar') }}>RESULTADOS</a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link" href={{ route('gestion.mostrar') }}>PARTIDOS</a>
          </li>
          <li class="nav-item dropdown">
                <a class="nav-link" href={{ route('gestion.mostrar') }}>NOTICIAS</a>
            </li>
        </ul>
          
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href='{{ route('login.index') }}'>LOGIN</a>
          </li>
        </ul> 
        </div>   
    </nav>

</div>
</div>



