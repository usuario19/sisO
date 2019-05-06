@extends('plantillas.main') 
@section('title') SisO - Tabla de posiciones Individual
@endsection
 
@section('content')
@section('menu_disciplinas')
<div class="menu_h col-md-12 padd_none d-md-none d-block">

        @foreach ($disciplinas2 as $item)
        <div class="card-a py-1">
            <a class="mx-auto w-100" href="{{ route('principal.index_partidos_conjunto',[$item->nombre_disc]) }}">
                <div class="form-row col-12 text-center margin_none">
                    <img class="mx-auto" src="/storage/logos/{{$item->nombre_disc.".png"}}" alt="" width="30" height="30">
                </div>
                <div class="form-row text-wrap text-center px-2">
                  <span class="span_disc text-center mx-auto">{{ $item->nombre_disc}}</span>
                </div>
            </a>
        </div>
        @endforeach</div>
@endsection
<div class="container padd_none">
        <div class="container-fluid" style="background: #C40F31; margin-block-end: 10px">
                <div class="div-title-sub container text-left">
                  <a class="" href="#" style="text-decoration:none">
                    <h6 class="title-principal">Tabla de posiciones</h6>
                  </a>
                </div>
              </div>
              <div class="margin_top col-md-12 padd_none">
                    <div class="">
                        <div class="container col-md-12 padd_none">
                        <div class="row container col-md-12">
                            <div class="form-row col-md-12">
                                <div class="col-md-12 text-center">
                                    <span class="lista_sub">{{$gestion->nombre_gestion}}</span>
                                </div>
                                <div class="col-md-12 text-center">
                                    <span class="lista_sub">{{$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)}}</span>
                                </div>
                                <div class="col-md-12 text-center">
                                    <span class="lista_sub">{{$fase->nombre_fase}}</span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                {{-- <a href=" " onclick="RegistrarResultadoCompeticion({{ $encuentro->id_encuentro }});"
                                    class="button_delete" data-toggle="modal" data-target="#modalResultado">
                                <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                collections_bookmark
                                </i>
                            </a> --}}
                                {{--  <button onclick="RegistrarResultadoCompeticionFase({{ $fase->id_fase }});" type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalResultadoFase">
                                    Resultados
                                </button>  --}}
                            </div>
                        </div>
                        @foreach ($tabla_posiciones->groupBy('id_grupo') as $grupo)
                        <div class="grupo">
                            {{$grupo->first()->nombre_grupo}}
                        </div>
                        <div class="table-responsive-xl">
                            <table class="table text-center table-sm table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Jugador</th>
                                    <th>Club</th>
                                    <th  class="alert-primary text-center">PTS</th>
                                    <th>PJ</th>
                                    <th>PG</th>
                                    <th>PE</th>
                                    <th>PP</th>
                                    <th>JF</th>
                                    <th>JC</th>
                                    <th class="alert-warning">DJ</th>
                                    <th>PF</th>
                                    <th>PC</th>
                                    <th class="alert-danger">DP</th>
                                </thead>
                                <tbody>
                                    @php ($i = 1) @foreach ($grupo as $seleccion) {{-- {{dd($seleccion)}} --}}
                                    <tr>
                                        <td>{{ $i }} </td>
                                        <td><img class="rounded mx-auto d-block float-left" src="/storage/fotos/{{ $seleccion->foto_jugador}}"
                                                alt="" height=" 30px" width="30px"></td>
                                        <td>{{ $seleccion->nombre_jugador." ". $seleccion->apellidos_jugador}}</td>
                                        <td>{{ $seleccion->nombre_club }}</td>
                                        <td class="alert-info">{{ $seleccion->puntos }}</td>
                                        <td>{{ $seleccion->pj }}</td>
                                        <td>{{ $seleccion->pg }}</td>
                                        <td>{{ $seleccion->pe }}</td>
                                        <td>{{ $seleccion->pp }}</td>
                                        <td>{{ $seleccion->sf }}</td>
                                        <td>{{ $seleccion->sc }}</td>
                                        <td class="alert-warning">{{ $seleccion->ds }}</td>
                                        <td>{{ $seleccion->pf }}</td>
                                        <td>{{ $seleccion->pc }}</td>
                                        <td class="alert-danger">{{ $seleccion->dp }}</td>
                                        {{--  <td  class="alert-primary text-center">{{ $seleccion->posicion }}</td>
                                        <td class="text-center">{{ $seleccion->posicion }}</td>
                                        <td class="text-center">{{ $seleccion->cantidad_encuentros }}</td>  --}}
                                    </tr>
                                    @php ($i++) @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach

                    </div>
                    <div class="form-row col-md-4">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <td><b>PJ:</b></td>
                                        <td>Partidos Jugados</td>
                                    </tr>
                                    <tr>
                                        <td><b>PG:</b></td>
                                        <td>Partidos Ganados</td>
                                    </tr>
                                    <tr>
                                        <td><b>PE:</b></td>
                                        <td>Partidos empatados</td>
                                    </tr>
                                    <tr>
                                        <td><b>PP:</b></td>
                                        <td>Partidos Perdidos</td>
                                    </tr>
                                    <tr>
                                            <td><b>CF:</b></td>
                                            <td>Canchas a favor</td>
                                        </tr>
                                        <tr>
                                            <td><b>CC:</b></td>
                                            <td>Canchas en contra</td>
                                        </tr>
                                        <tr>
                                            <td><b>DC:</b></td>
                                            <td>Diferencia de Canchas</td>
                                        </tr>
                                    <tr>
                                        <td><b>PF:</b></td>
                                        <td>Puntos a favor</td>
                                    </tr>
                                    <tr>
                                        <td><b>PC:</b></td>
                                        <td>Puntos en contra</td>
                                    </tr>
                                    <tr>
                                        <td><b>DP:</b></td>
                                        <td>Diferencia de puntos</td>
                                    </tr> 
                                    
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection