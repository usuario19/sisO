@extends('plantillas.main') 
@section('title') SisO - Tabla de posiciones
@endsection
 
@section('content')
<div class="form-row">
    @include('plantillas.menus.menu_gestion')

    <div class="margin_top col-md-9">
        <div class="">
            <div class="container col-md-12">
                <div class="reporte">
                    <h4 class="lista_sub_rep" style="font-size:20px">Tabla de Posiciones:</h4>
                </div>
               <div class="form-row">
                   <div class="col-md-12 text-center">
                        <span class="lista_sub">{{$gestion->nombre_gestion}}</span>
                   </div>
                   <div class="col-md-12 text-center">
                        <span class="lista_sub">{{$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)}}</span>
                   
                        <span class="lista_sub">{{$fase->nombre_fase}}</span>
                   </div>
               </div>
               {{-- {{dd($tabla_posiciones)}} --}}
                @foreach ($tabla_posiciones as $grupo)
                {{-- <div class="grupo">
                    {{$grupo->first()->nombre_grupo}}
                </div> --}}
                <div class="table-responsive-xl">
                        <table class="table text-center table-sm table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Logo</th>
                                    <th>Club</th>
                                    <th>Puntos</th>
                                    <th>PJ</th>
                                    <th>PG</th>
                                    <th>PE</th>
                                    <th>PP</th>
                                    @if ($disciplina->es_basket($disciplina->id_disc)== 1)
                                    <th>PF</th>
                                    <th>PC</th>
                                    <th>DP</th> 
                                    @else
                                    <th>GF</th>
                                    <th>GC</th>
                                    <th>DG</th> 
                                    @endif
                                </thead>
                                <tbody>
                                    @php ($i = 1) @foreach ($grupo as $club) {{-- {{dd($club)}} --}}
                                    <tr>
                                        <td>{{ $i }} </td>
                                        <td class="text-center">
                                            <img class="rounded mx-auto d-block" src="/storage/logos/{{ $club->logo}}" alt="" height="30"
                                                width="30">
                                        </td>
                                        <td class="text-left" style="min-width:300px">{{ $club->nombre_club }}</td>
                                        <td>{{ $club->puntos }}</td>
                                        <td>{{ $club->pj }}</td>
                                        <td>{{ $club->pg }}</td>
                                        <td>{{ $club->pe }}</td>
                                        <td>{{ $club->pp }}</td>
                                        <td>{{ $club->gf }}</td>
                                        <td>{{ $club->gc }}</td>
                                        <td>{{ $club->dg }}</td>
                                    </tr>
                                    @php ($i = $i+1) @endforeach
                                </tbody>
                            </table>
                </div>
                {{-- {{dd($encuentros_resultados)}} --}}
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
                                            <div class="playoff-row form-row">
                                                <div class="playoff-0 d-flex align-content-center flex-wrap col-2">
                                                    <img class="rounded mx-auto img_tb_info" src="/storage/logos/{{ $encuentros[$i]->logo}}" alt="" height="30" width="30">
                                                </div>
                                                <div class="playoff-1 d-flex align-content-center flex-wrap col-8">
                                                    {{$encuentros[$i]->nombre_club}}
                                                </div>
                                                @if ($encuentros[$i]->penales !== null)
                                                <div class="playoff-2 d-flex align-content-center flex-wrap col-2 alert-success">
                                                        <div class="mx-auto border-0">
                                                            {{$encuentros[$i]->penales }}
                                                        </div>
                                                </div>
                                                @elseif($encuentros[$i]->penales === null && $encuentros[$i]->puntos_extras !== null )
                                                <div class="playoff-2 d-flex align-content-center flex-wrap col-2 alert-warning">
                                                        <div class="mx-auto border-0">
                                                                @if ($disciplina->es_basket($disciplina->id_disc)== 1)
                                                                {{($encuentros[$i]->puntos_extras + $encuentros[$i]->puntos_b) }}
                                                                @else
                                                                {{($encuentros[$i]->puntos_extras + $encuentros[$i]->goles) }}
                                                                @endif
                                                            
                                                        </div>
                                                </div>
                                                @elseif($encuentros[$i]->penales === null && $encuentros[$i]->puntos_extras === null && $encuentros[$i]->goles !== null )
                                                <div class="playoff-2 d-flex align-content-center flex-wrap col-2 alert-primary">
                                                        <div class="mx-auto border-0">
                                                                    {{$encuentros[$i]->goles }}
                                                        </div>
                                                </div>
                                                @elseif($encuentros[$i]->penales === null && $encuentros[$i]->puntos_extras === null && $encuentros[$i]->puntos_b !== null )
                                                <div class="playoff-2 d-flex align-content-center flex-wrap col-2 alert-primary">
                                                        <div class="mx-auto border-0">
                                                               
                                                                    {{$encuentros[$i]->puntos_b }}
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
                
                @endforeach
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
                            @if ($disciplina->es_basket($disciplina->id_disc)== 1)
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
                            @else
                            <tr>
                                <td><b>GF:</b></td>
                                <td>Goles a favor</td>
                            </tr>
                            <tr>
                                <td><b>GC:</b></td>
                                <td>Goles en contra</td>
                            </tr>
                            <tr>
                                <td><b>DG:</b></td>
                                <td>Diferencia de goles</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection