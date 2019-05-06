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