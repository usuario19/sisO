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
                            <div class="reporte">
                                    <h4 class="lista" style="font-size:20px">Ganadores:</h4>

                            </div>
    <table class="table  table-sm table-bordered" style="margin: 0%"">
        <thead>
            <th width="100px">Posicion</th>
            <th>Club</th>
            <th>Jugador</th>
            <th>Editar</th>
        </thead>
        <tbody>
                @foreach ($ganadores as $ganador)
                <tr>
                    @switch($ganador->posicion_ganador)
                        @case(1)
                        <td>
                            <img class="rounded mx-auto d-block float-left" 
                            src="/storage/archivos/1.600.png" alt="" height=" 50px" width="50px">
                        </td>
                            @break
                        @case(2)
                        <td>
                                <img class="rounded mx-auto d-block float-left" 
                                src="/storage/archivos/2.600.png" alt="" height=" 50px" width="50px">
                            </td>
                            @break
                        @case(3)
                        <td>
                                <img class="rounded mx-auto d-block float-left" 
                                src="/storage/archivos/3.600.png" alt="" height=" 50px" width="50px">
                            </td>
                            @break
                        @default
                    @endswitch
                   
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $ganador->logo}}" alt="" height=" 30px" width="30px">
                    {{ $ganador->nombre_club }}</td>
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/fotos/{{ $ganador->foto_jugador}}" alt="" height=" 30px" width="30px">
                    {{ $ganador->nombre_jugador.' '.  $ganador->apellidos_jugador}}</td>
                    <td>
                        
                            {!! Form::open(['route'=>'gestion.editar_ganador','method' => 'PUT','id'=>'form_update'] ) !!}
                            
                            {!! Form::text('id_ganador', $ganador->id_ganador, ['style'=>'display:none']) !!}
                            <div class="form-row">
                                <div class="col-md-10">
                                        <select name="id_jug_club" class="form-control" id=""> 
                                                <option value="">Selecciona jugador</option>
                                                @foreach ($data as $d)
                                                <option value={{$d->id_jug_club}}>{{$d->id_jug_club."  ".$d->nombre_club."-".$d->nombre_jugador." ".$d->apellidos_jugador}}</option>
                                                    
                                                @endforeach
                                            </select>
                                </div>
                                <div class="col-md-2">
                                        <button class="btn btn-dark" type="submit">
                                                Editar
                                            </button>
                                            
                                </div>
                            </div>
                            {!! Form::close() !!}
                            
                        
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
@endsection