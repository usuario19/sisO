@extends('plantillas.main') 
@section('title') SisO - Tabla de posciones Individual
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
                                            <th class="alert-info">PTOS</th>
                                            <th>Rondas</th> 
                                            <th>RG</th> 
                                            <th>RE</th> 
                                            <th>RP</th>
                                        </thead>
                                        <tbody>
                                            @php ($i = 1) 
                                            @foreach ($tabla_posiciones as $seleccion)
                                                <tr>
                                                    <td class="text-center">{{ $i }} </td>
                                                    <td  class="text-center"><img class="rounded mx-auto d-block" src="/storage/logos/{{ $seleccion->logo}}" alt="" height=" 30px" width="30px"></td>
                                                    <td  class="text-center"><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $seleccion->foto_jugador}}" alt="" height=" 30px" width="30px"></td>
                                                    <td>{{ $seleccion->nombre_jugador." ". $seleccion->apellidos_jugador}}</td>
                                                    <td class="text-center alert-info">{{ $seleccion->posicion == null ? '0': $seleccion->posicion}}</td>
                                                    <td class="text-center">{{ ($seleccion->cantidad_encuentros == null ? '0':$seleccion->cantidad_encuentros) }}</td> 
                                                    <td class="text-center">{{ $seleccion->pg }}</td> 
                                                    <td class="text-center">{{ $seleccion->pe }}</td> 
                                                    <td class="text-center">{{ $seleccion->pp }}</td>
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
                                                                    @if ($encuentros[$i]->posicion !== null)
                                                                    <div class="playoff-2 d-flex align-content-center flex-wrap col-2 alert-success">
                                                                            <div class="mx-auto border-0">
                                                                                {{$encuentros[$i]->posicion }}
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
                                                        <td><b>RG:</b></td>
                                                        <td>Rondas Ganados</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>RE:</b></td>
                                                        <td>Rondas empatados</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>RP:</b></td>
                                                        <td>Rondas Perdidos</td>
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