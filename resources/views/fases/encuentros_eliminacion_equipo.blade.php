@extends('plantillas.main') 
@section('title') SisO - Lista de clubs
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
              {{-- <div class="dropdown">
                <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i title="Configuracion" class="material-icons delete_button">
                    settings
                    </i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('fase.clubs_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Clubs</a>
                  <a class="dropdown-item" href="{{ route('fase.fechas_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Fechas</a>
                  <a class="dropdown-item" href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a>
                </div>
              </div> --}}
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
                  <th colspan="2" width="50">Acciones</th>
                </thead>
                <tbody>
                  @foreach($fecha->encuentros as $encuentro)
                  <tr>
                    <td>{{ $encuentro->id_encuentro }}</td>
                    <td width="150" class="border-left-0 border-right-0">
                        <div class="form-row">
                          <img class="mx-auto" src="/storage/logos/{{ $encuentro->encuentro_club_participaciones->first()->club_participacion->club->logo}}" alt="logo1" style="height:30px; width:30px">
                        </div>
                        <div class="form-row">
                          {{ $encuentro->encuentro_club_participaciones->first()->club_participacion->club->nombre_club}}
                        </div>
                    </td>
                    <td width="100"  style="vertical-align: middle" class="border-left-0 border-right-0">
                      @if ($encuentro->es_futbol($encuentro->id_encuentro)==1)
                        {{ $encuentro->encuentro_club_participaciones->first()->goles." - ".$encuentro->encuentro_club_participaciones->last()->goles}}<br>
                        @if ($encuentro->encuentro_club_participaciones->first()->puntos_extras != NULL)
                        {{ $encuentro->encuentro_club_participaciones->first()->puntos_extras." - ".$encuentro->encuentro_club_participaciones->last()->puntos_extras}}<br>
                        <small id="passwordHelpBlock" class="form-text text-center text-muted alert-info">
                            Tiempo extra.
                        </small>
                        @endif
                        @if($encuentro->encuentro_club_participaciones->first()->penales != NULL)
                          {{ $encuentro->encuentro_club_participaciones->first()->penales." - ".$encuentro->encuentro_club_participaciones->last()->penales}}<br>
                          <small id="passwordHelpBlock" class="form-text text-center text-muted alert-success">
                              Penales.
                          </small>
                        @endif
                      @elseif($encuentro->es_basket($encuentro->id_encuentro)==1)
                        @if ($encuentro->encuentro_club_participaciones->first()->puntos_extras != NULL)
                        {{ ($encuentro->encuentro_club_participaciones->first()->puntos_b + $encuentro->encuentro_club_participaciones->first()->puntos_extras)." - ".($encuentro->encuentro_club_participaciones->last()->puntos_b + $encuentro->encuentro_club_participaciones->last()->puntos_extras)}}<br>
                        {{ $encuentro->encuentro_club_participaciones->first()->puntos_extras." - ".$encuentro->encuentro_club_participaciones->last()->puntos_extras}}<br>
                        <small id="passwordHelpBlock" class="form-text text-center text-muted alert-warning">
                            Tiempo extra.
                        </small>
                        @else
                        {{ $encuentro->encuentro_club_participaciones->first()->puntos_b." - ".$encuentro->encuentro_club_participaciones->last()->puntos_b}}<br>
                        @endif
                        {{-- @if($encuentro->encuentro_club_participaciones->first()->penales != NULL)
                          {{ $encuentro->encuentro_club_participaciones->first()->penales." - ".$encuentro->encuentro_club_participaciones->last()->penales}}<br>
                          <small id="passwordHelpBlock" class="form-text text-center text-muted alert-success">
                              Penales.
                          </small>
                        @endif --}}
                      @endif
                        
                    </td>
                    <td width="150" class="border-left-0 border-right-0">
                      <div class="form-row">
                        <img class="mx-auto" src="/storage/logos/{{ $encuentro->encuentro_club_participaciones->last()->club_participacion->club->logo}}" alt="logo2" style="height:30px; width:30px">
                      </div>
                      <div class="form-row">
                        {{ $encuentro->encuentro_club_participaciones->last()->club_participacion->club->nombre_club}}
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
                        <i class="material-icons float-left">location_on</i>
                        <span class="letter-size">{{ $encuentro->centro->nombre_centro}}</span>
                      </a>
                    </td>
                    <td>{{ $encuentro->detalle}}</td>
                    
                      {{-- {{dd($encuentro->tiene_resultado($encuentro->id_encuentro))}} --}}
                      @if ($encuentro->tiene_resultado($encuentro->id_encuentro) == '1')
                        {{-- <a href=" " onclick="VerResultado({{ $encuentro->id_encuentro }});" class="button_delete" data-toggle="modal" data-target="#modalVerResultado">
                          <i title="Ver resultados" class="material-icons delete_button button_redirect">
                            collections_bookmark
                          </i>
                        </a> --}}
                        @if ($encuentro->es_futbol($encuentro->id_encuentro)==1)
                        <td>
                          <a href="{{ route('encuentro.seleccion_eliminacion',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}">
                            <i title="Registrar resultados" class="material-icons delete_button">
                              star
                            </i>
                          </a>
                        </td>
                        @elseif($encuentro->es_basket($encuentro->id_encuentro)==1)
                        <td>
                          <a href="{{ route('encuentro.seleccion_eliminacion',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}">
                            <i title="Registrar resultados" class="material-icons delete_button">
                              star
                            </i>
                          </a>
                        </td>
                        @endif
                        <td>
                            <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons delete_button">delete</i></a>
                        </td>
                      @else
                      @if ($encuentro->es_futbol($encuentro->id_encuentro)==1)
                      <td>
                        <a href="{{ route('encuentro.seleccion_eliminacion',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}">
                          <i title="Jugadores" class="material-icons delete_button">
                            star_border
                          </i>
                        </a>
                      </td>
                      @elseif($encuentro->es_basket($encuentro->id_encuentro)==1)
                      <td>
                        <a href="{{ route('encuentro.seleccion_eliminacion',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}">
                          <i title="Jugadores" class="material-icons delete_button">
                            star_border
                          </i>
                        </a>
                      </td>
                      {{-- @elseif($encuentro->es_set($encuentro->id_encuentro)==1)
                        <a href="{{ route('encuentro.seleccion_eliminacion',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}">
                            <i title="Jugadores" class="material-icons delete_button">
                              star_border
                            </i>
                          </a> --}}
                      @endif
                      <td>
                        <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons delete_button">delete</i></a>
                      </td>
                      @endif
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