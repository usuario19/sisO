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
<body style="background:#173D58; ">

    @if(Auth::check())
     @if(Auth::user()->tipo == 'Administrador')
       @include('plantillas.menus.menu_admin')
   
     @else
       @include('plantillas.menus.menu_coordinador')
     @endif
    @else
      @include('plantillas.menus.menu_principal')
    @endif
   
    <div class="container" style="">
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
    @yield('scripts')

  </body>


<footer class="page-footer font-small mdb-color pt-4">
    <div class="container text-center text-md-left">
      <div class="row text-center text-md-left mt-3 pb-3">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
          <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
            adipisicing elit.</p>
        </div>
        <hr class="w-100 clearfix d-md-none">
        <hr class="w-100 clearfix d-md-none">
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
          <p>
            <a href="#!">Your Account</a>
          </p>
          <p>
            <a href="#!">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!">Shipping Rates</a>
          </p>
          <p>
            <a href="#!">Help</a>
          </p>
        </div>
        <hr class="w-100 clearfix d-md-none">
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
          <p>
            <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
          
          
        </div>

      </div>

      <hr>
      <div class="row d-flex align-items-center">
        <div class="col-md-7 col-lg-8">
          <p class="text-center text-md-left">© 2018 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/">
              <strong> MDBootstrap.com</strong>
            </a>
          </p>

        </div>
        <div class="col-md-5 col-lg-4 ml-lg-0">
          <div class="text-center text-md-right">
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                  <i class="fab fa-google-plus-g"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
</html>

