@extends('plantillas.main') 
@section('title') SisO - Tabla de posiciones Individual
@endsection
 
@section('content')
<div class="form-row">
    @include('plantillas.menus.menu_gestion')

    <div class="margin_top col-md-9">
        <div class="">
            <div class="card-">
                @include('gestiones.modal_reg_resultado_fase')
                <div class="container">
                        <div class="reporte">
                                <h4 class="lista_sub_rep" style="font-size:20px">Tabla de Posiciones:</h4>
                            </div>
                    <div class="">
                            {{--  <button onclick="RegistrarResultadoCompeticionFase({{ $fase->id_fase }});" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalResultadoFase">
                                Resultados
                            </button>  --}}
                        <div class="row container col-md-12">
                                
                            <div class="form-row col-md-12">
                                <div class="col-md-12 text-center">
                                        <span class="lista_sub">{{$gestion->nombre_gestion}}</span>
                                </div>
                                <div class="col-md-12 text-center">
                                        <span class="lista_sub">{{$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)}}</span>
                                </div>
                                <div class="col-md-12  text-center">
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
                                
                            </div>
                        </div>
                            <div class="table-responsive-xl">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <th>#</th>
                                            <th width="30">Club</th>
                                            <th width="30">Foto</th>
                                            <th>Jugador</th>
                                            <th class="alert-info">Pts</th>
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
                                            @php ($i = 1) 
                                            @foreach ($tabla_posiciones->sortBy('tiempo_total') as $seleccion)
                                                <tr>
                                                    <td>{{ $i }} </td>
                                                    <td><img class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $seleccion->logo}}" alt="" height=" 30px" width="30px"></td>
                                                    <td><img class="rounded mx-auto d-block float-left" src="/storage/fotos/{{ $seleccion->foto_jugador}}" alt="" height=" 30px" width="30px"></td>
                                                    <td>{{ $seleccion->nombre_jugador." ". $seleccion->apellidos_jugador}}</td>
                                                    <td class="alert-primary text-center">{{ $seleccion->puntos }}</td>
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
                                                    {{--  <td class="text-center">{{ $seleccion->tiempo_total }}</td>
                                                    <td class="text-center">{{ $seleccion->posicion }}</td>
                                                    <td class="text-center">{{ $seleccion->cantidad_encuentros }}</td>  --}}
                                                </tr>
                                                @php ($i++)
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                        <table class="table mi_tabla">
                                            <thead class="table-bordered">
                                                @foreach ($fechas as $encuentros)
                                                {{-- {{dd($encuentros)}} --}}
                                                    <th style="min-width:300px" >{{$encuentros->first()->nombre_fecha}}</th>
                                                @endforeach
                                            </thead>
                                            <tbody>
                                                <tr>
                                                        {{--  {{dd($encuentros_resultados)}}  --}}
                                                @php($j=1)
                                                @foreach ($encuentros_resultados as $encuentros)
                                                {{-- {{dd($encuentros)}} --}}
                                                    
                                                    <td>
                                                        @for ($i = 0; $i < count($encuentros); $i++)
                                                            @if ($i > 0 && $i % 2 == 0)
                                                                @switch($j)
                                                                     @case(1)
                                                                        <br>
                                                                        @break
                                                                    @case(2)
                                                                        <div style="margin-bottom:46%"></div>
                                                                        @break
                                                                    @case(3)
                                                                        <div style="margin-bottom:128%"></div>
                                                                        @break
                                                                    @case(4)
                                                                        <div style="margin-bottom:350%"></div>
                                                                        @break 
                                                                    @case(5)
                                                                        <div style="margin-bottom:600%"></div>
                                                                        @break
                                                                    @default
                                                                        <br>
                                                                        @break
                                                                @endswitch
                                                            @endif
                                                            <div class="playoff">
                                                                <div class="playoff-row form-row" >
                                                                    <div class="playoff-0 d-flex align-content-center flex-wrap col-2">
                                                                        <img class="rounded mx-auto img_tb_info" src="/storage/logos/{{ $encuentros[$i]->logo}}" alt="" height="30" width="30">
                                                                    </div>
                                                                    <div class="playoff-0 d-flex align-content-center flex-wrap col-2">
                                                                        <img class="rounded mx-auto img_tb_info" src="/storage/fotos/{{ $encuentros[$i]->foto_jugador}}" alt="" height="30" width="30">
                                                                    </div>
                                                                    <div class="playoff-1 d-flex align-content-center flex-wrap col-6">
                                                                        {{$encuentros[$i]->nombre_jugador." ".$encuentros[$i]->apellidos_jugador}}
                                                                    </div>
                                                                    @if ($encuentros[$i]->set_ganados !== null)
                                                                    <div class="playoff-2 d-flex align-content-center flex-wrap col-2 alert-success">
                                                                            <div class="mx-auto border-0">
                                                                                {{$encuentros[$i]->set_ganados }}
                                                                            </div>
                                                                    </div>
                                                                    @else
                                                                    <div class="playoff-2 d-flex align-content-center flex-wrap col-2 alert-primary">
                                                                            <div class="mx-auto border-0">
                                                                                {{"-" }}
                                                                            </div>
                                                                    </div>
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>
                                                        @endfor
                                                        @php($j++)
                                                    </td>
                                                @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
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
        </div>
@endsection