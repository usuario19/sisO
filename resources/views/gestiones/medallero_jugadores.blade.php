@extends('plantillas.main')
@section('title')
    SisO - Lista de Disciplinas
@endsection
@section('content')
<div class="form-row">
@include('plantillas.menus.menu_gestion')

<div class="col-md-9">
    <div class="">
      <div class="card-">
            
                <div class="card-body col-md-12">
                        <div class="table-responsive">
    <h4 class="lista" style="font-size:20px">Ganadores:</h4>
    <table class="table  table-sm table-bordered" style="margin: 0%"">
        <thead>
            <th width="100px">Posicion</th>
            <th>Club</th>
            <th>Jugador</th>
        </thead>
        <tbody>
                @foreach ($ganadores as $ganador)
                <tr>
                    @switch($ganador->posicion_participante)
                        @case(1)
                        <td>
                            <img class="rounded mx-auto d-block float-left" 
                            src="/storage/logos/oro.jpg" alt="" height=" 50px" width="50px">
                        </td>
                            @break
                        @case(2)
                        <td>
                                <img class="rounded mx-auto d-block float-left" 
                                src="/storage/logos/plata.jpg" alt="" height=" 50px" width="50px">
                            </td>
                            @break
                        @case(3)
                        <td>
                                <img class="rounded mx-auto d-block float-left" 
                                src="/storage/logos/bronce.jpg" alt="" height=" 50px" width="50px">
                            </td>
                            @break
                        @default
                    @endswitch
                   
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $ganador->logo}}" alt="" height=" 30px" width="30px">
                    {{ $ganador->nombre_club }}</td>
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/fotos/{{ $ganador->foto_jugador}}" alt="" height=" 30px" width="30px">
                    {{ $ganador->nombre_jugador.' '.  $ganador->apellidos_jugador}}</td>
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
@endsection