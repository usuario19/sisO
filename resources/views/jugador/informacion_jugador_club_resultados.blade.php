@extends('jugador.plantilla_info_jug')



@section('nav')
           
                <nav class="navbar navbar-expand-lg menu">
                    <ul class="navbar-nav btn-block">
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link  col-md-12" href={{ route('jugador.informacion',$usuario->id_jugador) }}>Configuración <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link  col-md-12" href="{{ route('jugador.informacion_club',$usuario->id_jugador) }}">Mis clubs</a>
                      </li>
                      <li class="nav-item link col-md-4">
                        <a class="nav-link link active col-md-12" href="{{ route('jugador.informacion_club_resultados',$usuario->id_jugador) }}">Participación</a>
                      </li>
                    </ul>
              
                </nav>
           
@endsection
@section('contenido_nav')
            <div class="col-md-12 table-responsive-xl">
                <div class="container col-md-12">
                  <table class="mi_tabla table table-borderless table-hover">
                    <thead>
                      <tr class="border-table">
                        {{--  <th scope="col">#</th>  --}}
                        <th style="width: 150px" scope="col">GESTION</th>
                        <th style="width: 150px" scope="col">CLUB</th>
                        <th scope="col">DISCIPLINA</th>
                        <th scope="col">RESULTADO</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($usuario->jugador_clubs as $jug_club )
                          <tr class="border-table">
                            <td>{{$jug_club->club->club_participaciones}}</td>
                            <td>{{ 'columna' }}</td>
                          </tr>
                      @endforeach
                       {{--  {{$selecciones}}
                      {{count($selecciones)}}
                        @for ($i = 0 ; $i <= count($selecciones)-1; $i++)
                          @for($j = 1 ; $j <= count($selecciones)-1; $j++)
                        
                          <tr>
                              <td>{{ $selecciones[$i]->club_participacion->id_gestion == $selecciones[$j]->club_participacion->id_gestion ? "true":"false" }}</td>
                              @if($selecciones[$i]->club_participacion->id_gestion != $selecciones[$i++]->club_participacion->id_gestion)
                                <td rowspan={{$i}}>{{$selecciones[$i]->club_participacion->id_gestion}}</td>
                              @endif  
                              <td>{{ $selecciones[$i]->club_participacion->id_gestion }}</td>
                            
                            
                              <td>{{ $selecciones[$i]->club_participacion->id_gestion }}</td>
                           
                          </tr>
                              @if ($selecciones[$i]->club_participacion->id_gestion != $selecciones[$i++]->club_participacion->id_gestion)
                                 <tr>
                                   <td></td>
                                 </tr>
                              @endif
                            {{$selecciones[$i]}}
                           @endfor
                        @endfor  --}}
                      {{--  @foreach ($selecciones as $seleccion )
                      <tr>
                        <td rowspan="">{{$seleccion->club_participacion->gestiones->nombre_gestion}}</td>
                        <td rowspan=""><div class="row"><img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $seleccion->club_participacion->club->logo }}" alt="" height=" 50px" width="50px" ></div>
                        <div>{{$seleccion->club_participacion->club->nombre_club }}</div></td>
                        <td>{{$seleccion->club_participacion->disciplina->nombre_disc}}
                          {{$seleccion->club_participacion->disciplina->categoria == 1 ? 'Mujeres':($seleccion->club_participacion->disciplina->categoria == 2 ? 'Hombres':'Mixto') }}
                        </td>  
                      </tr>
                          
                      @endforeach  --}}
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