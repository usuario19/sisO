@extends('plantillas.main')

@section('title')
    SisO - Lista de Usuarios
@endsection

@section('content')

<div class="table-responsive-xl">
    <h2  class="display-1" style="font-size: 20px"><a href="{{ route('jugador.index')}}">Jugadores </a>|  {{ $usuario->nombre_jugador ." ". $usuario->apellidos_jugador }}</h2>
    <br>
    <div class="container col-md-12">
        <div id="mensaje" class="alert alert-success alert-dismissible show" role="alert" style="display: none">
          <strong>la informacion se actualizo exitosamente!!!!</strong>
          {{--  <button type="button" class="close" aria-label="Close" onclick="document.getElementById('mensaje').style.display = 'none';">
            <span aria-hidden="true">&times;</span>
          </button>  --}}
        </div>
      </div>
    <table class="table table-sm table-bordered">
      <thead>
        <th class="table-success"><h3 class="display-1" style="font-size: 27px">Ficha de informacion</h3></th>
      </thead>
      <tbody>
          <tr>
              <td>
                <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}}>

                  <div class="form-row" {{--  style="position:relative"  --}}>
                    <div class="form-group " style="width: 180px">
                          <div id="contenedor">
                            <img id="imgOrigen" class="rounded mx-auto d-block float-left imginfo" src="/storage/fotos/{{ $usuario->foto_jugador }}" alt="" >
                            <div id="divtexto">
                              <img id="texto" src="/storage/fotos/subir.png"  alt="">
                              <img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt="">
                              <img id="btnUpdate" class="noVista" src="/storage/fotos/actualizar.png"  alt="">
                            </div>
                          </div>
                    </div>
                    <div class="form-group col-md-9" style="position: relative; height:100px ;">
                            <div style="bottom: 0px; position: absolute; ">
                              <h3 class="display-1" style="font-size: 27px; font-weight:bold;">Jugador</h3>
                              <h3 class="display-4" style="font-size: 24px">{{ $usuario->nombre_jugador ." ". $usuario->apellidos_jugador }}</h3>
                            </div>
                          <div class="form-row errorLogin">
                            <span>
                              <h6 id="error_foto">{{ $errors->has('foto_jugador') ? $errors->first('foto_jugador'):'' }}</h6>
                            </span>
                          </div>
                    </div>
                  </div>  
                </div>
              </td>
          </tr>
      </tbody>
    </table>
    <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">{{--  
            <li class="nav-item">
              <a class="nav-link active" href="#">Active</a>
            </li>  --}}
            <li class="nav-item active">
                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-config" role="tab" aria-controls="nav-profile" aria-selected="false">Información</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-clubs" role="tab" aria-controls="nav-contact" aria-selected="false">Clubs</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
      {{--  <nav  class="navbar">
        <div class="nav nav-tabs" id="myTab" role="tablist">
          <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-home" aria-selected="true">Informacion del usuario</a>
          <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-config" role="tab" aria-controls="nav-profile" aria-selected="false">Información</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-clubs" role="tab" aria-controls="nav-contact" aria-selected="false">Clubs que adminsitra</a>
        </div>
      </nav>  --}}

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-config" role="tabpanel" aria-labelledby="nav-profile-tab">
         
          <br>
          {!! Form::model($usuario,['route'=>['jugador.update',$usuario->id_jugador],'method' => 'PUT' ,'id'=>'form_update','enctype' => 'multipart/form-data', 'files'=>true]) !!}
            <div class="container col-md-9">
                   <div class="form-row noVista">
                          <div class="form-group col-md-12">
                            {!! Form::label('id_jugador', 'ID', []) !!}
                            {!! Form::text('id_jugador',$usuario->id_jugador , ['class'=>'form-control','id'=>'id']) !!}
                          </div>
                    </div>

                 @include('plantillas.forms.form_reg_jugador')

                   
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                    <div class="form-group col-md-6">
                      <a href="" class="btn btn-block btn-secondary">Cancelar</a>
                    </div>                  
                  </div>

            </div>
              
          {!! Form::close() !!}
          

          {!! Form::open(['route'=>['jugador.updateFoto'],'method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}

              <div class="form-row">
                          <div class="{{ $errors->has('foto_jugador') ? 'siError':'' }}">                            
                            <div id="div_file" style="display: none;">
                              {!! Form::text('id_jugador',$usuario->id_jugador, []) !!}
                              {!! Form::file('foto_jugador', ['class'=>'upload','id'=>'input']) !!}
                              <div style="display: none">
                                {!! Form::submit('Actualizar foto', ['class'=>'btn btn-primary btn-block', 'id'=>'buttonUpdate']) !!}
                              </div>
                            </div>                             
                          </div>
              </div>
              
          {!! Form::close() !!}
        </div>

        <div class="tab-pane fade" id="nav-clubs" role="tabpanel" aria-labelledby="nav-contact-tab">
          
            <div class="col-md-12 table-responsive-xl">

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ciudad</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($usuario->jugador_clubs as $club)
                  
                  <tr class="link_pointer" style="cursor:pointer" data-href="{{ route('coordinador.show', $club->id_club) }}">
                      <th scope="row">{{ $club->id_club}}</th>
                      <td data-href="{{ route('coordinador.show', $club->id_club) }}"><img class="rounded float-left" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 50px" width="50px"></td>
                      <td>{{ $club->club->nombre_club}}</td>
                      <td>{{ $club->club->ciudad}}</td>
                      <td></td>
                  </tr>
                
                  @endforeach
                </tbody>
              </table>
              
               
                
                

            </div>
        </div>

      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
    <script>
      (function(){
        window.addEventListener("load", inicializarEventos, false);
        function inicializarEventos(){
          
          tr = document.getElementsByClassName("link_pointer");
          for(var i =0; i<tr.length;i++)
            tr[i].addEventListener("click", redirect, false);
        }
        function redirect(e){
          elemento = e.target;
          window.location = elemento.parentNode.getAttribute('data-href');
          console.log(elemento.parentNode.getAttribute('data-href'));

        }

       
      }())
    </script>
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validacion_ajax_request_update.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  

@endsection