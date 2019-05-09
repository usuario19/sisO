@extends('plantillas.main')

@section('title')
SisO - Lista de gestiones
@endsection

@section('content')
<div class="container mx-auto padd_none">
  <div class="container"  style="background: #FFB935" >
    <div class="div-title-principal container text-center">
        <h1 class="title-principal text-dark">medallero</h1>
    </div>
</div>
</div>
<div class="container col-md-10 p-0">
    @foreach ($ganadores->groupBy('id_gestion') as $gestion)
    <div class="margin_top col-md-12 mx-auto padd_none">
      <h5 class="lista text-center" style="color:black">{{$gestion->first()->participacion->gestiones->nombre_gestion}}
      </h5>
    </div>
    <br>
    <div class="col-md-10 mx-auto p-0">
        <table class="table table-sm mi_tabla text-center table-bordered" >
            <thead>
              <tr>
                  <th>
                      club
                    </th>
                <th>
                    <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/archivos/1.600.png" alt="" width="30">
                </th>
                <th>
                    <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/archivos/2.600.png" alt="" width="30">
                </th>
                <th>
                    <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/archivos/3.600.png" alt="" width="30">
                  </th>
              </tr>
            </thead>
            <tbody>
    @foreach ($gestion->groupBy('id_club') as $club)
    
                <tr class="bg-dark text-white">
                    <th class="text-white">{{$club->first()->club->nombre_club}}</th>
                   
                    
                    @php
                    $oro=0;
                    $plata =0;
                    $bronce =0;
                  @endphp

              @foreach ($club->groupBy('posicion_ganador') as $posicion)
              
                  
              @foreach ($posicion as $pos)
                @if ($pos->posicion_ganador == 1)
                  @php
                  $oro++;
                  @endphp
                @elseif($pos->posicion_ganador == 2)
                  @php
                  $plata++;
                  @endphp
                @else
                  @php
                  $bronce++;
                  @endphp
                @endif
              @endforeach
                  
              @endforeach
              <td>{{$oro}}</td>
                  <td>{{$plata}}</td>
                  <td>{{$bronce}}</td>
            </tr>
    @endforeach
  </tbody>
</table>
</div>
  @endforeach
</div>

@endsection