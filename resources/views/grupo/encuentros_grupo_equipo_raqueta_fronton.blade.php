@extends('plantillas.main') 
@section('title') SisO - Encuentros
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
    <div class="">
      <div class="form-row">
        <div class="form-group col-md-12 margin_bottom_none">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
              <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
              <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>
              <li class="breadcrumb-item active" id="id_grupo" value="{{ $grupo->id_grupo }}" aria-current="page">{{ $grupo->nombre_grupo }}</li>
            </ol>
          </nav>
        </div>
        <div class="form-group col-md-12">
          <nav class="navbar navbar-expand-lg menu">
            <ul class="navbar-nav btn-block">
              <li class="nav-item link  col-md-4">
                <a class="nav-link link  col-md-12" href="{{ route('grupo.clubs_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Clubs <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item link  col-md-4">
                <a class="nav-link link  col-md-12" href="{{ route('grupo.fechas_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
              </li>
              <li class="nav-item link  col-md-4">
                <a class="nav-link link active  col-md-12" href="{{ route('grupo.encuentros_grupo_equipo',[$grupo->id_grupo, $fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">3. Registrar encuentros</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="">
        <div class="margin_top form-row container col-md-12">
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
        @foreach ($fechas as $fecha)
        <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}
          <a href="{{ route('encuentro.fixture_porfecha',$fecha->id_fecha) }}">
            <i title="Fixture" class="material-icons delete_button">
              assignment
            </i>
          </a>
        </h4>
        <div class="table-responsive-xl">
            <table class="table table-bordered table-hover text-center">
                <thead>
                  <th width="50px">NO</th>
                  <th colspan="3" style="text-align: center;">Equipos</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Ubicacion</th>
                  <th>Detalle</th>
                  <th colspan="3">Acciones</th>
                </thead>
                <tbody>
                  @php($i=1) 
                  @foreach($fecha->encuentros as $encuentro)
                  <tr>
                    <td>{{ $i}}</td>
                    <td width="150" class="border-left-0 border-right-0">
                      <div class="form-row">
                        <img class="mx-auto" src="/storage/logos/{{ $encuentro->encuentro_club_participaciones_sets->first()->club_participacion->club->logo}}"
                          alt="logo1" style="height:30px; width:30px">
                      </div>
                      <div class="form-row">
                        {{ $encuentro->encuentro_club_participaciones_sets->first()->club_participacion->club->nombre_club}}
                      </div>
                    </td>
                    <td width="150" style="vertical-align: middle" class="border-left-0 border-right-0"  --}}>
                      <div class="div_set_rf form-row">
                        <div class="col-3"></div>
                        <div class="col-3">C1</div>
                        <div class="col-3">C2</div>
                        <div class="col-3">C3</div>
                        {{--  <div class="col-2">S4</div>
                        <div class="col-2">S5</div>  --}}
                      </div>
                      <div class="div_set_rf form-row">
                        <div class="col-3 alert-primary border">{{ $encuentro->encuentro_club_participaciones_sets->first()->set_ganados}}</div>
                        <div class="col-3  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set1}}</div>
                        <div class="col-3  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set2}}</div>
                        <div class="col-3  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set3}}</div>
                        {{--  <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set4}}</div>
                        <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->first()->puntos_set5}}</div>  --}}
                      </div>
                      <div class="div_set_rf form-row">
                        <div class="col-3  alert-primary border">{{ $encuentro->encuentro_club_participaciones_sets->last()->set_ganados}}</div>
                        <div class="col-3  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set1}}</div>
                        <div class="col-3  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set2}}</div>
                        <div class="col-3  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set3}}</div>
                        {{--  <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set4}}</div>
                        <div class="col-2  border">{{ $encuentro->encuentro_club_participaciones_sets->last()->puntos_set5}}</div>  --}}
                      </div>
                    </td>
                    <td width="150" class="border-left-0 border-right-0">
                      <div class="form-row">
                        <img class="mx-auto" src="/storage/logos/{{ $encuentro->encuentro_club_participaciones_sets->last()->club_participacion->club->logo}}"
                          alt="logo2" style="height:30px; width:30px">
                      </div>
                      <div class="form-row">
                        {{ $encuentro->encuentro_club_participaciones_sets->last()->club_participacion->club->nombre_club}}
                      </div>
                    </td>
                    <td>{{ $encuentro->formato_fecha($encuentro->fecha) }}</td>
                    <td>{{ $encuentro->formato_hora($encuentro->hora)}}</td>
                    <td><a href="{{ $encuentro->centro->ubicacion_centro}}" style="color: #EA4335">
                            <i class="material-icons">location_on</i>
                            <span class="letter-size">{{ $encuentro->centro->nombre_centro}}</span>
                            </a>
                    </td>
                    <td> {{ $encuentro->detalle}}</td>
                    {{--  VOLEIBOL WALLY RAQUETA  --}}
                    @if ($encuentro->tiene_resultado_set($encuentro->id_encuentro)) 
                        <td class="text-center" colsapn="2">
                          <a href="{{ route('encuentro.seleccion_series_set',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase,$grupo->id_grupo]) }}">
                            <i title="Editar resultado" class="material-icons delete_button">
                              star
                            </i>
                          </a> 
                        </td>
                    @else
                      
                        <td class="text-center" colsapn="2">
                          <a href="{{ route('encuentro.seleccion_series_set',[$encuentro->id_encuentro,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase,$grupo->id_grupo]) }}">
                            <i title="Editar resultado" class="material-icons delete_button">
                              star_border
                            </i>
                          </a> 
                        </td>
                      
                    @endif
                    <td width="70">
                        <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}" data-toggle="modal" data-target="#exampleModal{{ $encuentro->id_encuentro }}">
                          <i title="Eliminar" class="material-icons delete_button">delete</i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $encuentro->id_encuentro}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header modal_advertencia">
                                <h5 class="modal-title" id="exampleModalLabel">advertencia:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                              </div>
                              <div class="modal-body modal_advertencia">
                                ¿Esta seguro de querer eliminar este ENCUENTRO?
                              </div>
                              <div class="modal-footer">
                                <div class="col-6">
                                  <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}" class="btn btn-danger btn-block btn_eliminar"> Eliminar </a>
                                </div>
                                <div class="col-6">
                                  <a class="btn btn-outline-secondary btn-block" data-dismiss="modal">No</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @php($i++) 
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
  @include('encuentro.modal_agregar_encuentro')
  @include('encuentro.modal_agregar_resultado')
  @include('encuentro.modal_ver_resultado')
  @include('encuentro.modal_ver_res_futbol')
@endsection