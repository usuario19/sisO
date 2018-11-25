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

</head>
<body>
 <div class="container" style="padding: 0%">
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
      <br>
     @include('flash::message')

      @if(count($errors) > 0)
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
   </div>
   

    @yield('submenu')
    @yield('gestiones')
    @yield('content')
   {!! Html::script('/js/jquery.js') !!}
   {!! Html::script('/js/popper.min.js') !!}
   {!! Html::script('/js/bootstrap.min.js') !!}

    @yield('scripts')

</div>

<footer>
  <br><br>
  <div class="container-fluid navbar navbar-light bg-light">
    <div class="container">
      <p>
          Universidad Mayor de San Simon
      </p>
      <p>
          SITUMSS-Administrador de Olimpiadas Deportivas
      </p>
      
    </div>
    
  </div>
</footer>

</html>

