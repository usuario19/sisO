<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>
	{!! Html::style('/css/bootstrap.min.css') !!}
  {!! Html::style('/css/mis_estilos.css') !!}

</head>
<body>
	
	<div class="container">

      <nav class="navbar navbar-expand-lg bg-dark navbar-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="">Home <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gestiones
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href={{ route('gestion.create') }}>Registrar Gestion</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
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
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Jugadores
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href={{ route('jugador.create') }}>Registrar Jugador</a>
              <a class="dropdown-item" href={{ route('jugador.index') }}>Lista de jugadores</a>
            </div>
          </li> 

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Administradores
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href={{ route('administrador.create') }}>Registrar Administrador</a>
              <a class="dropdown-item" href={{ route('administrador.index') }}>Lista de adminstrdores</a>
            </div>
          </li> 

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Clubs
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href={{ route('club.create') }}>Registrar Club</a>
              <a class="dropdown-item" href={{ route('club.index') }}>Lista de Clubs</a>
            </div>
          </li> 

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Disciplinas
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href={{ route('disciplina.create') }}>Registrar Disciplina</a>
              <a class="dropdown-item" href={{ route('disciplina.index') }}>Lista de Disciplinas</a>
            </div>
          </li>
        <ul class="navbar-nav">
         	 <li class="nav-item">
             <a class="nav-link" href="#">Login</a>
         		</li>
        </ul>  
    	  
      </nav>
    </div>
  </nav>
	
	</div>

 	<div class="container">
 		@yield('content')
 	</div>
	{!! Html::script('/js/jquery.js') !!}
	{!! Html::script('/js/bootstrap.min.js') !!}
	
	
</body>
</html>

