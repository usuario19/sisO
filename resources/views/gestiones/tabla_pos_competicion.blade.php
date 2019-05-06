@extends('plantillas.main') 
@section('title') SisO - Tabla de posiciones Individual
@endsection
 
@section('content')
<div class="form-row">
    @include('plantillas.menus.menu_gestion')

    <div class="margin_top col-md-9">
        <div class="">
            <div class="card-">
                    <div class="reporte">
                            <h4 class="lista_sub_rep" style="font-size:20px">Tabla de Posiciones:</h4>
                    </div>
                @include('gestiones.modal_reg_resultado_fase')
                <div class="container">
                        
                    <div class="">
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
                                <button onclick="RegistrarResultadoCompeticionFase({{ $fase->id_fase }});" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalResultadoFase">
                                    Resultados
                                </button>
                            </div>
                        </div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tabla de posiciones por grupos</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Tabla de posiciones General</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        @foreach ($tabla_posiciones->groupBy('id_grupo') as $grupo)
                                        <div class="grupo">
                                            {{$grupo->first()->nombre_grupo}}
                                        </div>
                                        <div class="table-responsive-xl">
                                            <table class="table text-center table-sm table-bordered">
                                                <thead>
                                                    
                                                    @if ($disciplina->es_ajedrez($disciplina->id_disc)==1)
                                                    <th>#</th>
                                                    <th>Foto</th>
                                                    <th>Jugador</th>
                                                    <th>Club</th>
                                                    <th>PTOS</th>
                                                    <th>Rondas</th> 
                                                    @else
                                                    <th>POS</th>
                                                    <th>Foto</th>
                                                    <th>Jugador</th>
                                                    <th>Club</th>
                                                    <th>Tiempo</th>
                                                    <th>PTOS</th>
                                                    <th>ENCUENTROS</th> 
                                                    @endif
                                                    
                                                </thead>
                                                <tbody>
                                                    @php ($i = 1) 
                                                    @foreach ($grupo as $seleccion) {{-- {{dd($club)}} --}}
                                                    <tr>
                                                        
                                                        @if ($disciplina->es_ajedrez($disciplina->id_disc)==1)
                                                        <td>{{ $i }} </td>
                                                        <td><img class="rounded mx-auto d-block float-left" src="/storage/fotos/{{ $seleccion->foto_jugador}}"
                                                                alt="" height=" 30px" width="30px"></td>
                                                        <td>{{ $seleccion->nombre_jugador." ". $seleccion->apellidos_jugador}}</td>
                                                        <td>{{ $seleccion->nombre_club }}</td>
                                                        <td class="text-center">{{ $seleccion->posicion }}</td>
                                                        <td class="text-center">{{ $seleccion->cantidad_encuentros }}</td> 
                                                        @else
                                                        <td class="alert-primary text-center">{{ $i }} </td>
                                                        <td><img class="rounded mx-auto d-block float-left" src="/storage/fotos/{{ $seleccion->foto_jugador}}"
                                                                alt="" height=" 30px" width="30px"></td>
                                                        <td>{{ $seleccion->nombre_jugador." ". $seleccion->apellidos_jugador}}</td>
                                                        <td>{{ $seleccion->nombre_club }}</td>
                                                        <td class="text-center">{{ $seleccion->tiempo_total }}</td>
                                                        <td class="text-center">{{ $seleccion->posicion }}</td>
                                                        <td class="text-center">{{ $seleccion->cantidad_encuentros }}</td> 
                                                        @endif
                                                        
                                                    </tr>
                                                    @php ($i++)
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endforeach
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="table-responsive-xl">
                                                <table class="table table-sm table-bordered">
                                                    <thead>
                                                        <th>POS</th>
                                                        <th>Foto</th>
                                                        <th>Jugador</th>
                                                        <th>Club</th>
                                                        <th>Tiempo</th>
                                                        <th>PTOS</th>
                                                        <th>ENCUENTROS</th>
                                                    </thead>
                                                    <tbody>
                                                        @php ($i = 1) 
                                                        @foreach ($tabla_posiciones->sortBy('tiempo_total') as $seleccion)
                                                            <tr>
                                                                <td class="alert-primary text-center">{{ $i }} </td>
                                                                <td><img class="rounded mx-auto d-block float-left" src="/storage/fotos/{{ $seleccion->foto_jugador}}"
                                                                        alt="" height=" 30px" width="30px"></td>
                                                                <td>{{ $seleccion->nombre_jugador." ". $seleccion->apellidos_jugador}}</td>
                                                                <td>{{ $seleccion->nombre_club }}</td>
                                                                <td class="text-center">{{ $seleccion->tiempo_total }}</td>
                                                                <td class="text-center">{{ $seleccion->posicion }}</td>
                                                                <td class="text-center">{{ $seleccion->cantidad_encuentros }}</td>
                                                            </tr>
                                                            @php ($i++)
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
@endsection