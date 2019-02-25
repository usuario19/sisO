<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        {!! Html::style('/css/bootstrap.min.css') !!}
        {!! Html::style('/css/mis_estilos.css') !!}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet">
        @yield('cdn')
</head>
<body>
{{--   <div class="container-fluid" style="padding: 0%">  --}}
    @if(Auth::check())
     @if(Auth::user()->tipo == 'Administrador')
       @include('plantillas.menus.menu_admin')
   
     @else
       @include('plantillas.menus.menu_coordinador')
     @endif
    @else
      @include('plantillas.menus.menu_principal')
    @endif
   
    <div class="container">
     <div  style="margin: 10px 0px 0px 0px">
       @include('flash::message')
     </div>

      @if(count($errors) > 0)
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 0%">
                <ul style="margin: 0%">
                @foreach($errors->all() as $error)
                <li style="list-style: circle">{{ $error }}</li>
                @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
      @endif
  
   

    @yield('submenu')
    @yield('gestiones')
    @yield('content')
    </div>
   {!! Html::script('/js/jquery.js') !!}
   {!! Html::script('/js/popper.min.js') !!}
   {!! Html::script('/js/bootstrap.min.js') !!}
   
   <!-- <script>
      window.addEventListener('load', inicializar, false);
      function inicializar(){
          var elemento = document.getElementsByClassName('nav-link');
          for(var i = 0; i < elemento.length; i++)
                  elemento[i].addEventListener('click',active_link_menu,false);
          
          
      }
      function active_link_menu(e)
      {
          e.target.className += " active";
      }
     </script> -->
    @yield('scripts')
    </body>
<footer>
  <br><br>
  <div class="container-fluid navbar navbar-dark bg-dark">
    <div class="container">
      <p class="text-light">
          Universidad Mayor de San Simon
      </p>
      <p class="text-light">
          SITUMSS-Administrador de Olimpiadas Deportivas
      </p>
      
    </div>
    
  </div>
</footer>

</html>

