@extends('plantillas.main') 
@section('title') SisO - Registrar resultados
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
    <div class="">
      <div class="card-">
        @include('encuentro.modal_agregar_jugador')
        @include('encuentro.modal_agregar_jugador2')
        @include('encuentro.modal_reg_gol_jugador')
        @include('encuentro.modal_agregar_resultado_futbol')
        @include('encuentro.modal_ver_res_futbol')
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
              <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
              <li class="breadcrumb-item"><a href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">Encuentros</a></li>
              <li class="breadcrumb-item active" value="{{ $encuentro->id_encuentro }}" aria-current="page">{{ $encuentro->id_encuentro }}</li>
            </ol>
          </nav>
        </div>
        <div class="container">
          <div class="">
            <div class="row col-md-12 margin_none">
              <div class="form-group col-md-6">
                <h4 class="lista" style="font-size:20px">Conformacion de equipos</h4>
              </div>
              <div class="form-group col-md-3">
                  <button type="button" onclick="VerResultadoFutbol({{ $encuentro->id_encuentro }});" class="btn btn-success btn-block" data-toggle="modal" data-target="#modalVerResultadoFutbol">
                    <div class="button-div" style="width: 100px">
                        <i class="material-icons float-left" style="font-size: 22px">done</i>
                        <span class="letter-size">resultado</span>
                      </div>
                    </button> 
                </div>
              <div class="form-group col-md-3">
                <button type="button" href=" " onclick="RegistrarResultadoFutbol({{ $encuentro->id_encuentro }});" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalResultadoFutbol">
                    <div class="button-div" style="width: 100px">
                        <i class="material-icons float-left" style="font-size: 22px">edit</i>
                        <span class="letter-size">resultado</span>
                      </div>
                </button>
              </div>
            </div>
            <div class="row container col-md-12 margin_none padd_none">

              <div class="form-group col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row col-md-12">
                        <div class="form-group col-md-10" style="min-height:50px">
                          <h4 class="lista_sub">{{ $club1->nombre_club }}</h4>
                        </div>
                      <div class="form-group col-md-2">
                        <a class="btn btn-block" data-toggle="modal" data-target="#modalAgregarJugador1">
                            <i title="Agregar jugadores" class="material-icons delete_button" style="font-size: 35px">group_add</i>
                        </a>
                      </div>
                    </div>
                    <div class="table-responsive-xl">
                      <table class="table table-bordered table-sm">
                        <thead>
                          <th width="30">ID</th>
                          <th>Jugador</th>
                          <th>Goles</th>
                          <th>T.R</th>
                          <th>T.A</th>
                          <th>G.EX</th>
                          <th>G.P</th>
                          <th  width="30"></th>
                        </thead>
                        <tbody>
                          @foreach($jug_hab1 as $jugadores)
                          <tr>
                            <td>{{ $jugadores->id_jugador }}</td>
                            <td>
                              <img class="img-thumbnail" src="/storage/fotos/{{ $jugadores->foto_jugador}}" alt="" height=" 50px" width="50px">                          {{ $jugadores->nombre_jugador.' '.$jugadores->apellidos_jugador }}
                            </td>
                            <td style="text-align:center;">{{ $jugadores->posicion }}</td>
                            <td style="text-align:center;">{{ $jugadores->tr }}</td>
                            <td style="text-align:center;">{{ $jugadores->ta }}</td>
                            <td style="text-align:center;">{{ $jugadores->puntos_tiempo_extra }}</td>
                            <td style="text-align:center;">{{ $jugadores->penales }}</td>
                            <td><a href=" " onclick="reg_gol_jugador({{ $jugadores->id_jugador }});" class="button_delete" data-toggle="modal"
                                data-target="#modalRegGol">
                                      <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                          control_point
                                      </i>
                              </a>
                              <a href="{{ route('encuentro.eliminar_jugador_encuentro',[$encuentro->id_encuentro,$jugadores->id_jugador]) }}">
                                  <i title="Eliminar" class="material-icons delete_button">
                                delete</i></a>
    
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row col-md-12 margin_none">
                      <div class="form-group col-md-10" style="min-height:50px">
                        <h4 class="lista_sub">{{ $club2->nombre_club }}</h4>
                      </div>
                      <div class="form-group col-md-2">
                        <a class="btn" data-toggle="modal" data-target="#modalAgregarJugador2">
                            <i title="Agregar jugadores" class="material-icons delete_button" style="font-size: 35px">group_add</i>
                        </a>
                      </div>
                    </div>
                    <div class="table-responsive-xl">
                      <table class="table table-sm table-bordered">
                        <thead>
                          <th width="30">ID</th>
                          <th>Jugador</th>
                          <th>Goles</th>
                          <th>T.R</th>
                          <th>T.A</th>
                          <th>G.EX</th>
                          <th>G.P</th>
                          <th width="30"></th>
                        </thead>
                        <tbody>
                          @foreach($jug_hab2 as $jugadores)
                          <tr>
                            <td>{{ $jugadores->id_jugador }}</td>
                            <td>
                              <img class="img-thumbnail" src="/storage/fotos/{{ $jugadores->foto_jugador}}" alt="" height=" 50px" width="50px">                          {{ $jugadores->nombre_jugador.' '.$jugadores->apellidos_jugador }}
                            </td>
                            <td style="text-align:center;">{{ $jugadores->posicion }}</td>
                            <td style="text-align:center;">{{ $jugadores->tr }}</td>
                            <td style="text-align:center;">{{ $jugadores->ta }}</td>
                            <td style="text-align:center;">{{ $jugadores->puntos_tiempo_extra }}</td>
                            <td style="text-align:center;">{{ $jugadores->penales }}</td>
                            <td>
                              <a href=" " onclick="reg_gol_jugador({{ $jugadores->id_jugador }});" class="button_delete" data-toggle="modal" data-target="#modalRegGol">
                                <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                    control_point
                                </i>
                              </a>
                              <a href="{{ route('encuentro.eliminar_jugador_encuentro',[$encuentro->id_encuentro,$jugadores->id_jugador]) }}"><i title="Eliminar" class="material-icons delete_button">
                            delete</i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('scripts') 
{!! Html::script('/js/habilitar.js') !!} 
{!! Html::script('/js/checkbox.js')!!}
@endsection