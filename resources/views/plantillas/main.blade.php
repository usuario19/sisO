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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
  @yield('cdn')
</head>

<body>
  <div class="container-fluid banner">
    <div class="container">
      <nav class="col-md-12 navbar navbar-light">
        <a class="navbar-brand col-md-12" href="{{route('principal.index')}}">
          <div class="row">
            <div class="col-md-2 col-12 text-center" style="padding:0% ;height: 60px">
              <img src="/storage/logos/abcd.png" height="60" class="rounded float-md-right" alt="">
            </div>
            <div class="col-md-10 col-12" style="padding:0%">
              <p class="title text-md-left text-wrap text-center">OLIMPIADAS F.N.T.U.B</p>
            </div>
          </div>
        </a>
      </nav>
    </div>
  </div>
  @if(Auth::check())
  @if(Auth::user()->tipo == 'Administrador')
  @include('plantillas.menus.menu_admin')

  @else
  @include('plantillas.menus.menu_coordinador')
  @endif
  @else
  @include('plantillas.menus.menu_principal')
  @endif

  @yield('menu_disciplinas')

  <div class="container-fluid body_conenido" style="padding:10px">
    <div style="margin: 10px 0px 0px 0px">
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
  @yield('scripts')

</body>


<footer class="font-small mdb-color">

  <div class="container text-center text-md-left d-none d-md-block" style="background: #0C1F2C">

    <div class="row text-center text-md-left mt-3 pb-3">
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3 align-baseline" style="display: flex; align-items: center;">
        <img class="mx-auto" src="/storage/logos/fntub.png" alt="" height="50">
        <p class="px-3">
          <b class="font-weight-bold">F.N.T.U.B</b><br>
          Federación Nacional de Trabajadores Universitarios.
        </p>
      </div>
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3" style="display: flex; align-items: center;">
        <img class="mx-auto" src="/storage/logos/umss.png" alt="" height="50">
        <p>
          <b class="font-weight-bold">UMSS</b><br>
          Universidad Mayor de San Simon
        </p>
      </div>
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <div class="col-md-12">
          <p class="text-center text-md-left">© 2019 Copyright
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container text-center text-md-left d-md-none d-xl-none d-block" style="background: #0C1F2C">

      <div class="row text-center text-md-left mt-3 pb-3">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3 align-baseline">
          <img class="mx-auto" src="/storage/logos/fntub.png" alt="" height="50">
          <p class="px-3">
            <b class="font-weight-bold">F.N.T.U.B</b><br>
            Federación Nacional de Trabajadores Universitarios.
          </p>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <img class="mx-auto" src="/storage/logos/umss.png" alt="" height="50">
          <p>
            <b class="font-weight-bold">UMSS</b><br>
            Universidad Mayor de San Simon
          </p>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <div class="col-md-12">
            <p class="text-center text-md-left">© 2019 Copyright
            </p>
          </div>
        </div>
      </div>
    </div>
</footer>

</html>