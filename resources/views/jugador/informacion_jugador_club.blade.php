@extends('jugador.plantilla_info_jug')



@section('nav')
<nav class="navbar navbar-expand-lg menu">
    <ul class="navbar-nav btn-block">
      <li class="nav-item link jugador col-md-4 col-xl-4">
        <a class="nav-link link  col-md-12" href={{ route('jugador.informacion',$usuario->id_jugador) }}>Configuración <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item link jugador col-md-4">
        <a class="nav-link link active col-md-12" href="{{ route('jugador.informacion_club',$usuario->id_jugador) }}">Mis clubs</a>
      </li>
      <li class="nav-item link jugador col-md-4">
        <a class="nav-link link col-md-12" href="{{ route('jugador.informacion_club_resultados',$usuario->id_jugador) }}">Participación</a>
      </li>
    </ul>

</nav>
@endsection
@section('contenido_nav')
    <div class="col-md-12">
        <div class="title-table">
            Clubs en los que actualmente esta inscrito el jugador:
          </div>
          <br>
        <table class="table table-borderless tabla_info_club col-md-12" style="margin: 0%">
              <td>
                <div class="form-group col-xl-3 float-right">
                  <a style="float: right" class="btn btn-block btn-success" data-toggle="modal" data-target="#Inscribirse{{ $usuario->id_jugador}}">
                    <i class="material-icons" style="top: 5px">
                        add
                    </i>
                  Agregar
                </a>
                </div></td>
              {!! Form::open(['route'=>'jugador_club.store','method' => 'POST','class'=>'form_reg_jugClub','id'=>'reg_jugClub'.$usuario->id_jugador]) !!}
                <div class="modal fade" id="Inscribirse{{ $usuario->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title us_nombre" id="exampleModalLabel"> {{ "Registrar a  "}}<span class='modal_us_nombre'>{{ $usuario->nombre_jugador." ".$usuario->apellidos_jugador }}</span>{{ "  en el Club:" }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <div class="modal-body">
                          <div class="form-row noVista" >
                              <div class="form-group col-md-12">
                                {!! Form::label('id_jug', 'Jugador', []) !!}
                                {!! Form::text('id_jug',$usuario->id_jugador , ['class' =>'form-control']) !!}
                              </div>
                            </div>
                            <div class="form-group reg_jugClub{{ $usuario->id_jugador}}"></div> 
                            <ul class="list-group table-sm text-left">
                            @foreach($clubs as $club )
                              @if(count($club->jugador_clubs->where('id_jugador',$usuario->id_jugador))>0)
                              <li class="list-group-item">
                                <div class="form-row">
                                    <div class="col-1">
                                      <i class="material-icons" style="font-size: 20px; color:#218838;">
                                          check_circle
                                      </i>
                                    </div>
                                    <div class="col-11">
                                      {{ $club->nombre_club}}
                                    </div>
                                </div>  
                              </li>
                              @else
                              <li class="list-group-item">
                                    <div class="custom-control custom-radio custom-control-inline">
                                          {!! Form::radio('club', $club->id_club , null ,['id'=> 'club'.$club->id_club.$usuario->id_jugador ,'class'=>'custom-control-input']) !!}
                                          {!! Form::label('club'.$club->id_club.$usuario->id_jugador, $club->nombre_club, ['class'=>'custom-control-label']) !!}
                                    </div>
                              </li>
                              @endif
                            @endforeach
                          </ul>
                      </div>
                      <div class="modal-footer">
                          <div class="col-md-6">
                            {!! Form::submit('Registrar', ['class'=>'btn btn-block btn_aceptar']) !!}
                          </div>
                          <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                          </div>
                    </div>
                  </div>
                </div>
              {!! Form::close() !!}
        </table>
    <div class="col-md-12 mx-auto">
        <div class="form-row">
          
            {{--  <div class="table-responsive-xl">
                <div class="container col-md-12">
                <table class="mi_tabla table table-condensed">
                  <thead>
                    <tr class="border-table">
                    <th style="width: 100px" scope="col">LOGO</th>
                      <th style="width: 200px" scope="col">NOMBRE</th>
                      <th style="width: 100px" scope="col">CIUDAD</th>
                      
                      <th> <button type="button" style="float:right" class="btn btn-warning button_redirect" data-toggle="modal" data-target="#Inscribirse{{ $usuario->id_jugador}}">
                          Registrar a un club
                        </button>  --}}

                        
                     {{--   </th>
                    </tr>
                    
                  </thead>
                  <tbody>  --}}
                    @foreach($usuario->jugador_clubs as $club)
                    <div class="col-md-4 mx-auto bg-white" style="position:relative; border: solid rgb(227, 228, 230) 1px; margin-bottom: 20px;">

                    <a {{--  class="link_pointer"  --}} {{--  style="cursor:pointer"  --}} aria-expanded="false" aria-controls="collapseExample" data-toggle="collapse" {{--  href="#collapseExample{{ $club->id_club}}"  --}}{{--  "{{ route('coordinador.show', $club->id_club) }}"  --}}>
                        {{--  <th scope="row">{{ $club->id_club}}</th>  --}}
                        <div class="text-center" style="margin: 10px 0px">
                            <img class="img_info_club mx-auto rounded-circle img-thumbnail d-block" src="/storage/logos/{{ $club->club->logo}}" alt="">
                            <br>
                            <div style="padding:10px">
                              <span style="color: black">
                                {{ $club->club->nombre_club}}<br>
                                {{ $club->club->ciudad}}
                              </span>
                            </div>
                            
                        </div>
                      </a>
                        {{--  <td data-href="{{ route('coordinador.show', $club->id_club) }}"><img class="rounded float-left" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 50px" width="50px"></td>  --}}
                        {{--  <td>{{ $club->club->nombre_club}}</td>
                        <td>{{ $club->club->ciudad}}</td>  --}}
                        {{--  <td>{{ $club->club->descripcion_club}}</td>  --}}
                        <a  style="float:right" href={{ route('coordinador.eliminar',[$usuario->id_jugador,$club->id_club]) }} class="eliminar_card" data-toggle="modal" data-target="#exampleModal{{ $club->id_club }}">
                            <i title="Eliminar" class="material-icons">
                                clear
                            </i>  
                        </a>
                        <div class="modal fade" id="exampleModal{{ $club->id_club}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header modal_advertencia">
                                  <h5 class="modal-title" id="exampleModalLabel">advertencia:</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body modal_advertencia">
                                  ¿Esta seguro de querer eliminar eliminar al jugador de este club?
                                </div>
                                <div class="modal-footer">
                                   <div class="col-6">
                                     <a href="{{ route('coordinador.eliminar',[$usuario->id_jugador,$club->id_club]) }}" class="btn btn-danger btn-block btn_eliminar"> Eliminar </a>
                                   </div>
                                   <div class="col-6">
                                     <a class="btn btn-outline-secondary btn-block" data-dismiss="modal">No</a>
                                   </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       <div class="collapse" id="collapseExample{{ $club->id_club}}">
                          <div class="card card-body">
                              <div class="col-md-12 table-responsive-xl">
                                <p><strong>Participacion del jugador en las Gestiones actualmente activas:</strong></p>
                                  <table class="table table-sm">
                                    <thead>
                                        <th style="width: 100px" scope="col">GESTION</th>
                                        <th style="width: 100px" scope="col">DISCIPLINAS</th>
                                        <th style="width: 100px" scope="col">CATEGORIA</th>
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
                          </div>
                        </div>
                    @endforeach
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
  {!! Html::script('/js/validacion_ajax_jugClub_reg.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  {!! Html::script('/Jcrop/js/jquery.Jcrop.min.js') !!}
  {!! Html::script('/js/jcrop_imagen.js') !!}

@endsection