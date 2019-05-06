@extends('jugador.plantilla_info_jug')



@section('nav')
           
                <nav class="navbar navbar-expand-lg menu">
                    <ul class="navbar-nav btn-block">
                      <li class="nav-item link jugador col-md-4">
                        <a class="nav-link link  col-md-12" href={{ route('jugador.informacion',$usuario->id_jugador) }}>Configuración <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item link jugador col-md-4">
                        <a class="nav-link link col-md-12" href="{{ route('jugador.informacion_club',$usuario->id_jugador) }}">Mis clubs</a>
                      </li>
                      <li class="nav-item link jugador col-md-4">
                        <a class="nav-link link active col-md-12" href="{{ route('jugador.informacion_club_resultados',$usuario->id_jugador) }}">Participación</a>
                      </li>
                    </ul>
              
                </nav>
           
@endsection
@section('contenido_nav')
                <div class="container col-md-12">
                  <div class="form-group title-table">
                    Participacion en gestiones activas:
                  </div>
                  <br>
                  <table class="mi_tabla table table-bordered">
                    <thead>
                      <tr class="border-table">
                        {{--  <th scope="col">#</th>  --}}
                        <th style="width: 150px" scope="col">CLUB</th>
                        <th {{--  style="width: 150px"  --}} scope="col">GESTION</th>
                        <th scope="col">DISCIPLINA</th>
                        {{--  <th scope="col">RESULTADO</th>  --}}
                      </tr>
                    </thead>
                    <tbody>
                      {{--  {{  dd($participaciones->groupBy('id_club')) }}  --}}

                      @foreach ($participaciones->groupBy('id_club') as $participacion )
                      <tr>
                        <td class="text-center" rowspan="{{ count($participacion->groupBy('id_gestion')) }}">
                            <img class="mx-auto rounded-circle img-thumbnail d-block" src="/storage/logos/{{ $participacion->first()->logo}}" alt="" style="height: 70px; width:70px">
                            {{ $participacion->first()->nombre_club }}
                        </td>
                      
                        {{--  {{ dd($participacion->groupBy('id_gestion')) }}  --}}
                        @foreach ($participacion->groupBy('id_gestion') as $gestion)
                          {{--  <tr style="height:100% ">  --}}
                              <td>
                                {{ $gestion->first()->nombre_gestion }}
                              </td>
                              <td>
                                <ol>
                                @foreach ($gestion->groupBy('id_seleccion') as $item)
                                  <li>
                                    {{ $item->first()->nombre_disc ." - "}}
                                    {{ $item->first()->categoria == 1 ?  'Damas':$item->first()->categoria == 2 ?  'Varones':'Mixto' }}
                                  </li>
                                @endforeach
                                </ol>
                              </td>
                            </tr>
                        @endforeach
                      
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
  {!! Html::script('/Jcrop/js/jquery.Jcrop.min.js') !!}
  {!! Html::script('/js/jcrop_imagen.js') !!}
@endsection