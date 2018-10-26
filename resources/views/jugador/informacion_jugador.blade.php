@extends('plantillas.main')

@section('title')
    SisO - Lista de Usuarios
@endsection

@section('content')

<div class="table-responsive-xl">
    <h2  class="display-1" style="font-size: 16px"><a href="{{ route('jugador.index')}}">Jugadores </a>|  {{ $usuario->nombre_jugador ." ". $usuario->apellidos_jugador }}</h2>
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
        <th class=""><h3 class="display-1" style="font-size: 20px">Ficha de informacion</h3></th>
      </thead>
      <tbody>
          <tr>
              <td>
                <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}}>

                  <div class="form-row" {{--  style="position:relative"  --}}>
                    <div class="form-group " style="width: 140px">
                          <div id="contenedor">
                            <img id="imgOrigen" class="rounded mx-auto d-block float-left imginfo" src="/storage/fotos/{{ $usuario->foto_jugador }}" alt="" >
                            <div id="divtexto">
                              <img id="texto" src="/storage/fotos/subir.png"  alt="">
                              <img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt="">
                              <img id="btnUpdate" class="noVista" src="/storage/fotos/actualizar.png"  alt="">
                            </div>
                          </div>
                    </div>
                    <div class="form-group col-md-5" style="position: relative; height:65px ;">
                            <div style="bottom: 0px; position: absolute; ">
                              <h3 class="display-1" style="font-size: 20px; font-weight:bold;">JUGADOR</h3>
                              <h3 class="display-4" style="font-size: 18px">{{ $usuario->nombre_jugador ." ". $usuario->apellidos_jugador }}</h3>
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
        <div class="card-header" style="padding: 0%">
           
                <nav class="navbar navbar-expand-lg table-bordered menu">
                    <ul class="navbar-nav btn-block">
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link active col-md-12" href={{ route('jugador.informacion',$usuario->id_jugador) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link  col-md-12" href="{{ route('jugador.informacion_club',$usuario->id_jugador) }}">CLUBS</a>
                      </li>
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link col-md-12" href="{{ route('jugador.informacion_club_resultados',$usuario->id_jugador) }}">ESTADISTICAS</a>
                      </li>
                    </ul>
              
                </nav>
           
        </div>

        
        <div class="card-body">
            {{--  <div class="row title-table col-md-10">
                <h3 class="display-6" style="float: left; font-size: 16px">INFORMACION</h3>

              </div>
          <br>  --}}
    
          {!! Form::model($usuario,['route'=>['jugador.update',$usuario->id_jugador],'method' => 'PUT' ,'id'=>'form_update','enctype' => 'multipart/form-data', 'files'=>true]) !!}
            <div class="container col-md-10">
                   <div class="form-row noVista">
                          <div class="form-group col-md-12">
                            {!! Form::label('id_jugador', 'ID', []) !!}
                            {!! Form::text('id_jugador',$usuario->id_jugador , ['class'=>'form-control','id'=>'id']) !!}
                          </div>
                    </div>

                 @include('plantillas.forms.form_reg_jugador')

                   
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                    <div class="form-group col-md-4">
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
                      {!! Form::submit('Actualizar foto', ['class'=>'btn btn-primary', 'id'=>'buttonUpdate']) !!}
                    </div>
                  </div>                             
                </div>
              </div>
              
          {!! Form::close() !!}
        </div>

       

      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
    <script>
     {{--   (function(){
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

       
      }())  --}}
    </script>
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validacion_ajax_request_update.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  

@endsection