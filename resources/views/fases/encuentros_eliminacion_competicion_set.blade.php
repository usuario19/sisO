@extends('plantillas.main') 
@section('title') SisO - Lista de clubs
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
    <div class="">
      <div class="row">
        <div class="form-group col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
              <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>

            </ol>
          </nav>
        </div>
        <div class="form-group col-md-12">
          <nav class="navbar navbar-expand-lg menu">
            <ul class="navbar-nav btn-block">
              <li class="nav-item link eliminacion col-md-4">
                <a class="nav-link link   col-md-12" href="{{ route('fase.clubs_eliminacion_competicion',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Participantes <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item link eliminacion col-md-4">
                <a class="nav-link link  col-md-12" href="{{ route('fase.fechas_eliminacion_competicion',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
              </li>
              <li class="nav-item link eliminacion col-md-4">
                <a class="nav-link link  active  col-md-12" href="{{ route('fase.encuentros_eliminacion_competicion',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">3. Registrar encuentros</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="container">
        <div class="card-">
          <div class="form-row container">
            <div class="form-group col-md-9">
              <h4 class="lista_sub">Lista de Encuentros:</h4>
            </div>
            <div class="form-group col-md-3">
              <button type="button_add" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalEncuentro">
                    <div class="button-div" style="width: 100px">
                        <i class="material-icons float-left" style="font-size: 22px">add</i>
                        <span class="letter-size">Agregar</span>
                    </div>
                </button>
            </div>
          </div>
      @include('encuentro.modal_agregar_competicion_eliminacion_set')
      @include('encuentro.modal_agregar_resultado_competicion_eliminacion_set')
      @include('encuentro.modal_ver_resultado_competicion') 

      @foreach ($fechas as $fecha)
          <div>
            <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}
              <a href="{{ route('encuentro.fixture_porfecha',$fecha->id_fecha) }}"><i title="Fixture" class="material-icons delete_button">
                      assignment</i></a></h4>
          </div>
          <div class="table-responsive-xl">
              <table class="table table-sm table-bordered text-center">
                <thead>
                  <th width="30">#</th>
                  <th colspan="3">Participantes</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Lugar</th>
                  <th>Detalle</th>{{-- --}}
                  <th width="50" colspan="2">Acciones</th>
                </thead>
                <tbody>
                    @php($i=1)
                  @foreach($fecha->encuentros as $encuentro)
                    <tr>
                      <td>{{ $i}}</td>
                      <td width="150" class="border-left-0 border-right-0">
                            <div class="form-row">
                              <img class="mx-auto" src="/storage/fotos/{{ $encuentro->jugadores($encuentro->id_encuentro)->first()->foto_jugador}}"
                                alt="logo1" style="height:30px; width:30px">
                            </div>
                            <div class="form-row">
                              <span  class="mx-auto">
                              {{ $encuentro->jugadores($encuentro->id_encuentro)->first()->nombre_jugador." ".$encuentro->jugadores($encuentro->id_encuentro)->first()->apellidos_jugador }}
                              </span>
                            </div>
                          </td>
                          <td width="150" style="vertical-align: middle" class="border-left-0 border-right-0">
                            <div class="div_set form-row">
                              <div class="col-3"></div>
                              <div class="col-3">J1</div>
                              <div class="col-3">J2</div>
                              <div class="col-3">J3</div>
                              {{--  <div class="col-2">S4</div>
                              <div class="col-2">S5</div>  --}}
                            </div>
                            <div class="div_set form-row">
                              <div class="col-3 alert-primary border">{{ $encuentro->jugadores($encuentro->id_encuentro)->first()->set_ganados}}</div>
                              <div class="col-3  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->first()->puntos_set1}}</div>
                              <div class="col-3  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->first()->puntos_set2}}</div>
                              <div class="col-3  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->first()->puntos_set3}}</div>
                              {{--  <div class="col-2  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->first()->puntos_set4}}</div>
                              <div class="col-2  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->first()->puntos_set5}}</div>  --}}
                            </div>
                            <div class="div_set form-row">
                              <div class="col-3  alert-primary border">{{ $encuentro->jugadores($encuentro->id_encuentro)->last()->set_ganados}}</div>
                              <div class="col-3  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->last()->puntos_set1}}</div>
                              <div class="col-3  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->last()->puntos_set2}}</div>
                              <div class="col-3  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->last()->puntos_set3}}</div>
                              {{--  <div class="col-2  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->last()->puntos_set4}}</div>
                              <div class="col-2  border">{{ $encuentro->jugadores($encuentro->id_encuentro)->last()->puntos_set5}}</div>  --}}
                            </div>
                          </td>
                          <td width="150" class="border-left-0 border-right-0">
                            <div class="form-row">
                              <img class="mx-auto" src="/storage/fotos/{{ $encuentro->jugadores($encuentro->id_encuentro)->last()->foto_jugador}}"
                                alt="logo2" style="height:30px; width:30px">
                            </div>
                            <div class="form-row">
                                <span  class="mx-auto">
                                {{ $encuentro->jugadores($encuentro->id_encuentro)->last()->nombre_jugador." ".$encuentro->jugadores($encuentro->id_encuentro)->last()->apellidos_jugador }}
                                {{--   {{ $encuentro->jugadores($encuentro->id_encuentro)->last()->nombre_club}}  --}}
                                </span>
      
                            </div>
                          </td>
                          
                         {{--   @foreach ($encuentro->jugadores($encuentro->id_encuentro) as $jugador)
                          <div class="div_set_jugador form-row">
                              <div class="col-1 text-center alert-primary border">{{ $jugador->posicion}}</div>
                              <div class="col-1 text-center  border"><img class="" src="/storage/logos/{{ $jugador->logo}}" height=" 30" width="30"></div>
                              <div class="col-8  border"><img class="" src="/storage/fotos/{{ $jugador->foto_jugador}}" height=" 30" width="30">{{ $jugador->nombre_jugador." ".$jugador->apellidos_jugador}}</div>
                              <div class="col-2 text-center border">{{$encuentro->formato_crono($jugador->tiempo)}}</div>
                            </div>
                          
                          @endforeach  --}}
                      </td>
                      <td class="text-center">{{ $encuentro->formato_fecha($encuentro->fecha) }}</td>
                      <td class="text-center">{{ $encuentro->formato_hora($encuentro->hora)}}</td>
                      <td><a href="{{ $encuentro->centro->ubicacion_centro}}">
                          <i class="material-icons float-left">location_on</i>
                          {{$encuentro->centro->nombre_centro}}
                      </a></td>
                      <td>{{ $encuentro->detalle}}</td>
                      {{-- <a data-toggle="collapse" href={{ "#colapsado". $encuentro->id_encuentro }}  aria-expanded="false" aria-controls={{ "#colapsado". $encuentro->id_encuentro }}><i title="Descripcion" class="material-icons delete_button">
                              description</i></a> --}} 
                              {{$encuentro->tiene_resultado_competicion($encuentro->id_encuentro)}}
                      @if($encuentro->tiene_resultado_competicion($encuentro->id_encuentro) == 1)
                      
                      <td>
                          <a href=" " onclick="RegistrarResultadoCompeticion({{ $encuentro->id_encuentro }});" class="button_delete" data-toggle="modal"
                              data-target="#modalResultado">
                              <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                star
                              </i>
                            </a>
                        {{--  <a href=" " onclick="VerResultadoCompeticion({{ $encuentro->id_encuentro }});" class="button_delete" data-toggle="modal"
                        data-target="#modalVerResultado">
                            <i title="Ver resultados" class="material-icons delete_button button_redirect">
                              star
                            </i>
                          </a>  --}} 
                      </td>
                      <td>
                          <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons delete_button">delete
                              </i></a>
                        </td>
                      @else
                      
                      <td>
                        <a href=" " onclick="RegistrarResultadoCompeticion({{ $encuentro->id_encuentro }});" class="button_delete" data-toggle="modal"
                          data-target="#modalResultado">
                          <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                            star_border
                          </i>
                        </a>
                      </td>
                      <td>
                          <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons delete_button">delete
                              </i></a>
                        </td>
                    @endif
                  </tr>
                  @php( $i+=1) 
                  @endforeach
                </tbody>
              </table>
            </div>
                    @endforeach
                  </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts') {!! Html::script('/js/resultado_competicion.js') !!} {!! Html::script('/js/checkbox.js')
!!}
@endsection