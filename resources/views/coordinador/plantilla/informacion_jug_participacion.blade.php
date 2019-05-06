@extends('coordinador.plantilla.plantilla_info_jug')
@section('nav')
           
                <nav class="navbar navbar-expand-lg menu">
                    <ul class="navbar-nav btn-block">
                      <li class="nav-item link jugador col-md-6">
                        <a class="nav-link link col-md-12" href={{ route('jugador.informacion_jug_club',[$usuario->id_jugador,$club->id_club]) }}>Configuración <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item link jugador col-md-6">
                        <a class="nav-link link active col-md-12" href="{{ route('jugador.informacion_jug_participacion',[$usuario->id_jugador,$club->id_club]) }}">Participación</a>
                      </li>
                    </ul>
                </nav>
           
@endsection
@section('contenido_nav')
    
          <div class="title-table">Participación del jugador en gestiones activas:</div>
              <table class="mi_tabla table table-bordered">
                <thead>
                  <th>#</th>
                  <th>
                    Gestion
                  </th>
                  <th>
                    Disciplina
                  </th>
                </thead>
               
              <tbody>
                @php
                    $i=1;
                @endphp
                <tr>
                @foreach ($participaciones->groupBy('id_gestion') as $gestion)
                  <td class="text-center">
                    {{$i}}
                  </td>
                  <td>
                    {{ $gestion->first()->nombre_gestion }}
                  </td>
                  <td>
                      <ol>
                  @foreach ($gestion->groupBy('id_disc') as $disc)
                        <li>
                          {{ $disc->first()->nombre_disc." - " }}
                          {{  $disc->first()->categoria == 1 ? "Damas": ($disc->first()->categoria == 2 ? "Varones":"Mixo" )}}
                        </li>
                  @endforeach
                      </ol>
                    </td>
                  </tr>
                  @php
                      $i++;
                  @endphp
                  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
@endsection

@section('scripts')
    {{--  <script>
      (function(){
          window.addEventListener('load', active_link, false);
          function active_link(){
              document.getElementById('jugadores').className += " active";
          }
      }());
      </script>  --}}
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  {!! Html::script('/Jcrop/js/jquery.Jcrop.min.js') !!}
  {!! Html::script('/js/jcrop_imagen.js') !!}
  

@endsection