@extends('plantillas.main') 
@section('title') SisO - Encuentros
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
    <div class="container">
      <div class="card-">
        <div class="container">
          <div class="form-row">
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
                  <li class="nav-item link jugador col-md-4">
                    <a class="nav-link link  col-md-12" href="{{ route('fase.clubs_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Clubs <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item link jugador col-md-4">
                    <a class="nav-link link  col-md-12" href="{{ route('fase.fechas_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
                  </li>
                  <li class="nav-item link jugador col-md-4">
                    <a class="nav-link link active  col-md-12" href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">3. Registrar encuentros</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="">
            <div class="form-row container">
              <div class="form-group col-md-9">
                <h4 class="lista" style="font-size:20px">Lista de Encuentros:</h4>
              </div>
              <div class="form-group col-md-3">
                <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalEncuentro">
                    <div class="button-div" style="width: 100px">
                        <i class="material-icons float-left" style="font-size: 22px">add</i>
                        <span class="letter-size">Agregar</span>
                    </div>
                </button>
              </div>
            </div>
            @include('encuentro.modal_agregar_encuentro_eliminacion')
            @include('encuentro.modal_agregar_resultado')
            @include('encuentro.modal_ver_resultado')
           {{--   {{dd($fechas)}}  --}}
            @foreach ($fechas as $fecha)
            <div>
              <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}
                <a href="{{ route('encuentro.fixture_porfecha',$fecha->id_fecha) }}">
                    <i title="Fixture" class="material-icons delete_button">assignment</i>
                  </a>
              </h4>
            </div>
            <div class="table-responsive-xl">
              <table class="table text-center table-hover table-bordered">
                <thead>
                  <th width="50px">ID</th>
                  <th colspan="3" style="text-align: center;">Equipos</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Ubicacion</th>
                  <th>Detalle</th>
                  <th colspan="3" width="50">Acciones</th>
                </thead>
                <tbody>
                  @php($i=1)
                  @foreach($fecha->encuentros as $encuentro)
                  {{--  {{dd($encuentro->encuentro_club_participaciones_sets->first()->club_participacion)}}  --}}

                  <tr>
                    <td>{{ $encuentro->id_encuentro }}</td>
                    <td width="150" class="border-left-0 border-right-0">
                        <div class="form-row">
                          <img class="mx-auto" src="/storage/logos/{{ $encuentro->encuentro_club_participaciones_sets->first()->club_participacion->club->logo}}" alt="logo1" style="height:30px; width:30px">
                        </div>
                        <div class="form-row">
                          {{ $encuentro->encuentro_club_participaciones_sets->first()->club_participacion->club->nombre_club}}
                        </div>
                    </td>
                    <td width="150" style="vertical-align: middle" class="border-left-0 border-right-0"  --}}>
                        <div class="div_set form-row">
                          <div class="col-2"></div>
                          <div class="col-2">S1</div>
                          <div class="col-2">S2</div>
                          <div class="col-2">S3</div>
                          <div class="col-2">S4</div>
                          <div class="col-2">S5</div>
                        </div>
                        <div class="div_set form-row">
                          <div class="col-2 alert-primary border">{{ $encuentro->encuentro_club_participaciones_sets->first()->set_ganados}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set1}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set2}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set3}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set4}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set5}}</div>
                        </div>
                        <div class="div_set form-row">
                          <div class="col-2  alert-primary border">{{ $encuentro->encuentro_club_participaciones_sets->last()->set_ganados}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set1}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set2}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set3}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set4}}</div>
                          <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set5}}</div>
                        </div>
                      </td>
                    <td width="150" class="border-left-0 border-right-0">
                      <div class="form-row">
                        <img class="mx-auto" src="/storage/logos/{{ $encuentro->encuentro_club_participaciones_sets->last()->club_participacion->club->logo}}" alt="logo2" style="height:30px; width:30px">
                      </div>
                      <div class="form-row">
                        {{ $encuentro->encuentro_club_participaciones_sets->last()->club_participacion->club->nombre_club}}
                      </div>
                    </td>
                    {{-- @foreach ($encuentro->encuentro_club_participaciones as $equipo)
                    <td><img class="img-thumbnail" src="/storage/logos/{{ $equipo->club_participacion->club->logo}}" alt="{{ $equipo->club_participacion->club->nombre_club}}"
                        height=" 50px" width="50px">{{ $equipo->club_participacion->club->nombre_club}}</td>
                    @endforeach --}}
                    <td>{{ $encuentro->formato_fecha($encuentro->fecha) }}</td>
                    <td>{{ $encuentro->formato_hora($encuentro->hora)}}</td>
                    <td>
                      <a href="{{ $encuentro->centro->ubicacion_centro}}" style="color: #EA4335">
                        <i class="material-icons">location_on</i>
                        <span class="letter-size">{{ $encuentro->centro->nombre_centro}}</span>
                      </a>
                    </td>
                    <td>{{ $encuentro->detalle}}</td>
                    <td>
                      @if ($encuentro->tiene_resultado_set($encuentro->id_encuentro) == '1')
                          <a href="{{ route('encuentro.seleccion_eliminacion_set',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}">
                            <i title="Registrar resultados" class="material-icons delete_button">
                              star
                            </i>
                          </a>
                      @else
                        <a href="{{ route('encuentro.seleccion_eliminacion_set',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}">
                            <i title="Jugadores" class="material-icons delete_button">
                              star_border
                            </i>
                          </a>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons delete_button">delete</i></a>
                    </td>
                    </td>
                  </tr>
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
</div>
@endsection