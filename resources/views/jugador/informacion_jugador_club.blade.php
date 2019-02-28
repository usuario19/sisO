@extends('jugador.plantilla_info_jug')



@section('nav')
<nav class="navbar navbar-expand-lg menu">
    <ul class="navbar-nav btn-block">
      <li class="nav-item link col-md-4">
        <a class="nav-link link  col-md-12" href={{ route('jugador.informacion',$usuario->id_jugador) }}>Configuración <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item link col-md-4">
        <a class="nav-link link active col-md-12" href="{{ route('jugador.informacion_club',$usuario->id_jugador) }}">Mis clubs</a>
      </li>
      <li class="nav-item link col-md-4">
        <a class="nav-link link col-md-12" href="{{ route('jugador.informacion_club_resultados',$usuario->id_jugador) }}">Participación</a>
      </li>
    </ul>

</nav>
@endsection
@section('contenido_nav')
            <div class="table-responsive-xl">
                <div class="container col-md-12">
                <table class="mi_tabla table table-striped table-borderless">
                  <thead>
                    <tr class="border-table">
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
                        <td> <a  style="float:right" href={{ route('coordinador.eliminar',[$usuario->id_jugador,$club->id_club]) }} class="button_delete">
                            <i title="Eliminar" class="material-icons delete_button">
                                delete
                            </i>  
                        </a></td>
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