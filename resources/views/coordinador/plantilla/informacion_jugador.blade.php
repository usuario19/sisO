@extends('plantillas.main')

@section('title')
    SisO - Lista de Usuarios
@endsection

@section('content')
<div class="container">

  <div class="table-responsive-xl">

      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('coordinador.club_jugadores_ajax') }}">Jugadores</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $usuario->nombre_jugador ." ". $usuario->apellidos_jugador }}</li>
          </ol>
      </nav>
   
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
        <th class="">
            <div class=" row text-center" style="height:; margin: 5px">
              <div class="col-md-1" style="margin: auto; padding: 0%">
                <img id="" class="float-md-right rounded mx-auto d-block" src="/storage/logos/{{ $club->logo }}" alt="" width="40" height="40">
              </div>
              <div class="col-md-11">
                <span class="float-left" style="font-size: 18px; padding-top: 5px">{{$club->nombre_club}}</span>
              </div>
            </div>
        </th>
      </thead>
      <tbody>
          <tr>
              <td>
                <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}}>

                  <div class="form-row" {{--  style="position:relative"  --}}>
                    <div class="form-group " style="width: 170px;margin-inline-start: 20px">
                          <div id="contenedor">
                            <img id="imgOrigen" class="img-thumbnail mx-auto d-block float-left imginfo" src="/storage/fotos/{{ $usuario->foto_jugador }}" alt="" >
                            <div id="divtexto">
                              <a id="btnCancelar" class="btn btn-outline-dark button noVista">
                                  <span class="btn_hover ">
                                      <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                                      
                                  </span>
                              </a>
                              <a id="btnUpdate" class="btn btn-outline-dark button noVista">
                                  <span class="btn_hover ">
                                      <i id="btnUpdate" class="material-icons float-left" style="color:white">loop</i>
                                  </span>
                              </a>
                              <a id="texto" class="btn btn-dark button vista">
                              <span class="btn_hover ">
                                  <i id="texto" class="material-icons float-left" style="color:white">edit</i>
                              </span>
                            </a>
                          </div>

                          </div>
                    </div>
                    <div class="form-group col-5" style="position: relative; height:65px ;">
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
                        <a class="nav-link link active col-md-12" href={{ route('jugador.informacion_jug_club',[$usuario->id_jugador,$club->id_club]) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link  col-md-12" href="{{ route('jugador.informacion_jug_participacion',[$usuario->id_jugador,$club->id_club]) }}">PARTICIPACION</a>
                      </li>
                     {{--   <li class="nav-item link col-md-4">
                        <a class="nav-link link col-md-12" href="{{ route('jugador.informacion_club_resultados',$usuario->id_jugador) }}">ESTADISTICAS</a>
                      </li>  --}}
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
</div>



@endsection

@section('scripts')
<script>
  (function(){
      window.addEventListener('load', active_link, false);
      function active_link(){
          document.getElementById('jugadores').className += " active";
      }
  }());
  </script>
  {!! Html::script('/js/vista_previa.js') !!}
 {{--   {!! Html::script('/js/validacion_ajax_request_update.js') !!}  --}}
  {!! Html::script('/js/validaciones.js') !!}
  

@endsection
