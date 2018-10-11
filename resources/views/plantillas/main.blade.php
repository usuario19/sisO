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


 <div class="container col-md-12">
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
     @if(count($errors) > 10000000)
             <div class="alert alert-danger" role="alert">
               <ul>
               @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
               </ul>
             </div>
         @endif
   </div>
   
      <div class="container">
        @yield('submenu')
        @yield('gestiones')
        @yield('content')
  {!! Html::script('/js/jquery.js') !!}
  {{--  {!! Html::script('/js/popper.min.js') !!}  --}}
  {!! Html::script('/js/bootstrap.min.js') !!}

     @yield('scripts')
      </div>
</body>
<footer>
  <br><br>
  <div class="container navbar bg-secondary">SITUMSS-Administrador de Olimpiadas Deportivas</div>
</footer>

</html>

