@extends('plantillas.main')

@section('title')
    SisO - Lista de Usuarios
@endsection

@section('content')
<div class="container col-md-12">
  <div id="mensaje" class="alert alert-success alert-dismissible show" role="alert" style="display: none">
    La informacion se actualizo exitosamente!!!!
  </div>
</div>
<h2  class="display-1" style="font-size: 16px"><a href="{{ route('administrador.index')}}">Coordinadores </a>|  {{ $usuario->nombre ." ". $usuario->apellidos }}</h2>
<br>

<div class="table-responsive-xl">
    
    <table class="table table-sm table-bordered">
      <thead>
         <th class="table"><h3 class="display-4" style="font-size: 20px">Ficha de informacion</h3></th>
      </thead>
      <tbody>
          <tr>
              <td>
                <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}}>

                  <div class="form-row" {{--  style="position:relative"  --}}>
                    <div class="form-group " style="width: 140px">
                          <div id="contenedor">
                            <img id="imgOrigen" class="rounded mx-auto d-block float-left imginfo" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="" >
                            <div id="divtexto">
                              <img id="texto" src="/storage/fotos/subir.png"  alt="">
                              <img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt="">
                              <img id="btnUpdate" class="noVista" src="/storage/fotos/actualizar.png"  alt="">
                            </div>
                          </div>
                    </div>
                    <div class="form-group col-md-5" style="position: relative; height:65px ;">
                            <div style="bottom: 0px; position: absolute; ">
                              <h3 class="display-1" style="font-size: 20px; font-weight:bold;">{{ strtoupper($usuario->tipo ).":" }}</h3>
                              <h3 class="display-1" style="font-size: 18px">{{ $usuario->nombre ." ". $usuario->apellidos }}</h3>
                            </div>
                          <div class="form-row errorLogin">
                            <span>
                              <h6 id="error_foto">{{ $errors->has('foto_admin') ? $errors->first('foto_admin'):'' }}</h6>
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
                    <a class="nav-link link  col-md-12" href={{ route('administrador.informacion',$usuario->id_administrador) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item link col-md-4">
                    <a class="nav-link link  col-md-12" href="{{ route('administrador.informacion_club',$usuario->id_administrador) }}">CLUBS QUE ADMINSITRA</a>
                  </li>
                  <li class="nav-item link col-md-4">
                    <a class="nav-link link active col-md-12" href="{{ route('administrador.informacion_club_resultados',$usuario->id_administrador) }}">ESTADISTICAS</a>
                  </li>
                </ul>
          
            </nav>
        </div>
        
        <div class="card-body">
            {!! Form::open(['route'=>['administrador.updateFoto'],'method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}

            <div class="form-row">
                        <div class="{{ $errors->has('foto_admin') ? 'siError':'' }}">                            
                          <div id="div_file" style="display: none;">
                            {!! Form::text('id_administrador',$usuario->id_administrador, []) !!}
                            {!! Form::file('foto_admin', ['class'=>'upload','id'=>'input']) !!}
                            <div style="display: none">
                              {!! Form::submit('Actualizar foto', ['class'=>'btn btn-primary btn-block', 'id'=>'buttonUpdate']) !!}
                            </div>
                          </div>                             
                        </div>
            </div>
            
        {!! Form::close() !!}

            <div class="col-md-12 table-responsive-xl">
                <div class="title-table">
                  <h3 class="display-6" style="float: left;">RESULTADOS</h3>

                </div>

              <table class="table table-hover table-condensed">
                <thead>
                  <tr>
                    {{--  <th scope="col">#</th>  --}}
                    
                    <th style="width: 150px" scope="col">GESTION</th>
                    <th style="width: 100px" scope="col">CLUB</th>
                    <th style="min-width: 200px" scope="col">DISCIPLINA</th>
                    <th scope="col">RESULTADO</th>
                    {{--  <th><button type="button" class="btn  btn-block btn-warning" data-toggle="modal" data-target="#modal">Agregar</button></th>  --}}
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach($inscripciones as $inscripcion)
                  
                  <tr class="link_pointer" style="cursor:pointer" data-href="{{--  {{ route('coordinador.show', $club->id_club) }}  --}}">
                      <td>{{ $inscripcion->gestion->nombre_gestion}}</td>
                     
                      <td><img class="rounded float-left" src="/storage/logos/{{ $inscripcion->admin_club->club->logo}}" alt="" height=" 50px" width="50px"></td>
                      <td>
                       <ul class="list-unstyled">
                          @foreach ($inscripcion->gestion->club_participaciones->where('id_club',$inscripcion->admin_club->club->id_club) as $club_part)
                          <li>
                            <img class="rounded float-left" src="/storage/foto_disc/{{$club_part->disciplina->foto_disc}}" alt="" height=" 25px" width="25px">
                            {{$club_part->disciplina->nombre_disc}}
                            {{$club_part->disciplina->categoria == 1 ? 'Mujeres':($club_part->disciplina->categoria == 2 ? 'Hombres':'Mixto')}}
                          </li>
                          <br>
                          @endforeach
                       </ul>
                        
                      </td>
                      <td>
                        <ul>
                            @foreach ($inscripcion->gestion->club_participaciones->where('id_club',$inscripcion->admin_club->club->id_club) as $club_part)
                            <li>
                              eliminado
                            </li>
                            <br>
                            @endforeach
                        </ul>
                      </td>
                     
                      
                  </tr>
                
                  @endforeach
                </tbody>
              </table>
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