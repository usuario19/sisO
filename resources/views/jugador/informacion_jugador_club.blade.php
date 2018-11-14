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
                    <div class="form-group" style="width: 140px;">
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
                        <a class="nav-link link   col-md-12" href={{ route('jugador.informacion',$usuario->id_jugador) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link active col-md-12" href="{{ route('jugador.informacion_club',$usuario->id_jugador) }}">CLUBS</a>
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
                <br>
              </div>  --}}

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
       
            <div class="table-responsive-xl">
                <div class="container col-md-10">
              <table class="table {{--  table-hover  --}}">
                <thead>
                  <tr>
                   {{--   <th scope="col">#</th>  --}}
                   <th style="width: 100px" scope="col">LOGO</th>
                    <th style="width: 200px" scope="col">NOMBRE</th>
                    <th style="width: 100px" scope="col">CIUDAD</th>
                    
                    {{--  <th scope="col">DESCRIPCION</th>  --}}
                    <th> <button type="button" style="float:right" class="btn btn-warning button_redirect" data-toggle="modal" data-target="#Inscribirse{{ $usuario->id_jugador}}">
                        Registrar a un club
                      </button>

                      {!! Form::open(['route'=>'jugador_club.store','method' => 'POST']) !!}
                      <div class="modal fade" id="Inscribirse{{ $usuario->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> {{ "Registrar a ".$usuario->nombre_jugador." ".$usuario->apellidos_jugador." en el Club:" }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            
                            <div class="modal-body">
                                
                                
                                <div class="form-row noVista" >
                                    <div class="form-group col-md-12">
                                      {!! Form::label('id', 'Jugador', []) !!}
                                      {!! Form::text('id',$usuario->id_jugador , ['class' =>'form-control']) !!}
                                    </div>
                                  </div> 
                                  @foreach($clubs as $club )
                                  @if(count($club->jugador_clubs->where('id_jugador',$usuario->id_jugador))>0)
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label for=""><img src="/storage/fotos/inscrito.png" alt="" height="20px" width="20px">{{" ".$club->nombre_club}}</label>
                                            </div>
                                          </div>     
                                        @else
                                        
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                                {!! Form::radio('club', $club->id_club , $club->id_club,['id'=> 'club'.$club->id_club.$usuario->id_jugador ,'class'=>'radio']) !!}
                                            
                                                {!! Form::label('club'.$club->id_club.$usuario->id_jugador, $club->nombre_club, []) !!}
                                            </div>
                                          </div>
                                          @endif
                                      
                                  @endforeach
                                  
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </th>
                  </tr>
                  
                </thead>
                <tbody>
                  @foreach($usuario->jugador_clubs as $club)
                  
                  <tr class="link_pointer" style="cursor:pointer" aria-expanded="false" aria-controls="collapseExample" data-toggle="collapse" href="#collapseExample{{ $club->id_club}}"{{--  "{{ route('coordinador.show', $club->id_club) }}"  --}}>
                      {{--  <th scope="row">{{ $club->id_club}}</th>  --}}
                      
                      <td data-href="{{ route('coordinador.show', $club->id_club) }}"><img class="rounded float-left" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 50px" width="50px"></td>
                      <td>{{ $club->club->nombre_club}}</td>
                      <td>{{ $club->club->ciudad}}</td>
                      {{--  <td>{{ $club->club->descripcion_club}}</td>  --}}
                      <td> <a  style="float:right" href={{ route('coordinador.eliminar',[$usuario->id_jugador,$club->id_club]) }} class="btn btn-danger">Eliminar</a></td>
                  </tr>
                  <tr>
                    <td colspan="5"><div class="collapse" id="collapseExample{{ $club->id_club}}">
                        <div class="card card-body">
                            <div class="col-md-12 table-responsive-xl">
                               <p><strong>Participacion del jugador en las Gestiones actualmente activas:</strong></p>
                                <table class="table table-sm">
                                  <thead>
                                      <th style="width: 100px" scope="col">GESTION</th>
                                      <th style="width: 100px" scope="col">DISCIPLINAS</th>
                                      <th style="width: 100px" scope="col">CATEGORIA</th>
                                      {{--  
                                      <th style="width: 100px" scope="col">CIUDAD</th>  --}}
                                  </thead>
                                  <tbody>
                                    @foreach ( $club->selecciones as $seleccion)
                                      @if($seleccion->club_participacion->gestiones->estado_gestion == 1)
                                        <tr>
                                          <td>{{$seleccion->club_participacion->gestiones->nombre_gestion}}</td>
                                          <td>{{$seleccion->club_participacion->disciplina->nombre_disc}}</td>
                                            <td>{{$seleccion->club_participacion->disciplina->categoria == 1 ? 'Mujeres': ($seleccion->club_participacion->disciplina->categoria == 2 ? 'Hombres':'Mixto')}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                  </tbody>
                                  </table>
                        </div>
                    </div></td>
                  </tr>
                
                  @endforeach
                </tbody>
              </table>
              
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