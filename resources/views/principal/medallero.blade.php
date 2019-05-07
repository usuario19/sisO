@extends('plantillas.main')

@section('title')
SisO - Lista de gestiones
@endsection
@section('content')


<div class="container mx-auto padd_none">
  <div class="container-fluid" style="background: #FFC107">
    <div class="div-title-principal container text-center" style="height: 80px">
      <h5 class="lista text-dark">medallero</h5>
    </div>
  </div>

  <div class="container col-md-10">
    @foreach ($participacion->groupBy('id_gestion') as $gestion)
    <div class="margin_top col-md-12 mx-auto padd_none">
      <h5 class="lista text-center" style="color:black">{{$gestion->first()->gestiones->nombre_gestion}}</h5>
    </div>
      @foreach ($gestion->groupBy('id_disciplina') as $disc)
        @if ($disc->first()->disciplina->tipo == 0){{--  comperticion  --}}
        <table class="table table-sm table-bordered mi_tabla">
            <thead>
              <tr class="bg-dark ">
                    <th colspan="4" class="text-white">{{$disc->first()->disciplina->nombre_disc." ".$disc->first()->disciplina->nombre_categoria($disc->first()->disciplina->categoria)." ".$disc->first()->disciplina->nombre_subcateg($disc->first()->disciplina->sub_categoria)}}</th>
              </tr>
              <tr>
                  <th>ciudad</th>
                  <th colspan="2">Club</th>
                  <th>Medallas</th>
              </tr>
              
            </thead>
            <tbody>
              @foreach ($disc as $item)
                @foreach ($item->ganadores->sortBy('posicion_ganador') as $ganador)
                    <tr class="table-condensed">
                        <td>
                            {{$ganador->club->ciudad}}
                          </td>
                      <td width="50">
                          <img class="" src="/storage/logos/{{ $ganador->club->logo }}" alt="" width="50">
                      </td>
                      <td>
                          {{$ganador->club->nombre_club}}
                        </td>
                        
                        <td>
                            <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/archivos/{{ $ganador->posicion_ganador.'.600.png'}}" alt="" width="50">

                        </td>
                    </tr>
                @endforeach
                  
              @endforeach
            </tbody>
          </table>
        @else
        <table class="table table-sm table-bordered mi_tabla">
            <thead>
              <tr class="alert-success">
                    <th colspan="6">{{$disc->first()->disciplina->nombre_disc." ".$disc->first()->disciplina->nombre_categoria($disc->first()->disciplina->categoria)." ".$disc->first()->disciplina->nombre_subcateg($disc->first()->disciplina->sub_categoria)}}</th>
              </tr>
              <tr>
                  <th>ciudad</th>
                  <th colspan="2">Club</th>
                  <th colspan="2">Participante</th>
                  <th>Medallas</th>
              </tr>
              
            </thead>
            <tbody>
              @foreach ($disc as $item)
                @foreach ($item->participante_ganadors->sortBy('posicion_ganador') as $ganador)
                    <tr class="table-condensed">
                        <td>
                            {{$ganador->jugador->jugador_clubs->first()->club->ciudad}}
                          </td>
                          <td width="50">
                              <img class="" src="/storage/logos/{{ $ganador->jugador->jugador_clubs->first()->club->logo }}" alt="" width="50">
                          </td>
                          <td>
                              {{$ganador->jugador->jugador_clubs->first()->club->nombre_club}}
                            </td>
                      <td width="50">
                          <img class="" src="/storage/fotos/{{ $ganador->jugador->foto_jugador }}" alt="" width="50">
                      </td>
                      <td>
                            {{$ganador->jugador->nombre_jugador}}
                        </td>
                        
                        <td>
                            <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/archivos/{{ $ganador->posicion_participante.'.600.png'}}" alt="" width="50">

                        </td>
                    </tr>
                @endforeach
                  
              @endforeach
            </tbody>
          </table>
        @endif
          
      @endforeach
        
    @endforeach
    
  </div>
</div>

@endsection