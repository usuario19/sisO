@extends('plantillas.main')
@section('title')
    SisO - Reconocimientos
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
                                    <h4 class="lista" style="font-size:20px">Reconocimientos:</h4>

                            </div>
    <table class="table  table-sm table-bordered" style="margin: 0%"">
        <thead>
            <th>club</th>
            <th>jugador</th>
            <th>titulo</th>
            <th>descripcion</th>
            <th>eliminar</th>
            <th>Editar</th>
        </thead>
        <tbody>
                @foreach ($ganadores2 as $ganador)
                <tr>
                   
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $ganador->logo}}" alt="" height=" 30px" width="30px">
                    {{ $ganador->nombre_club }}</td>
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/fotos/{{ $ganador->foto_jugador}}" alt="" height=" 30px" width="30px">
                    {{ $ganador->nombre_jugador.' '.  $ganador->apellidos_jugador}}</td>
                    <td>
                        {{$ganador->titulo}}
                    </td>
                    <td>
                            {{$ganador->descripcion}}
                        </td>
                        <td class="text-center">
                                <a class="delete_button" href="{{ route('gestion.destroy_rec',$ganador->id_reconocimiento) }}">
                                    <i title="Eliminar" class="material-icons delete_button">delete</i>
                                    </a>
                        </td>
                    <td>
                        
                            {!! Form::open(['route'=>'gestion.editar_rec','method' => 'PUT','id'=>'form_update'] ) !!}
                            
                            {!! Form::text('id_reconocimiento', $ganador->id_reconocimiento, ['style'=>'display:none']) !!}
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
    <br><br>
    <table class="table  table-sm table-bordered" style="margin: 0%">
            <thead>
                <th colspan="2" width="100px">Club</th>
                <th>Titulo</th>
                <th>DEscripcion</th>
                <th>eliminar</th>
                <th>Editar</th>
            </thead>
            <tbody>
                    @foreach ($ganadores as $ganador)
                    <tr>
                        <td><img class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $ganador->logo}}" alt="" height=" 30px" width="30px"></td>
                        <td>{{ $ganador->nombre_club }}</td>
                        <td>
                                {{$ganador->titulo}}
                            </td>
                            <td>
                                    {{$ganador->descripcion}}
                                </td>
                                <td class="text-center">
                                        <a class="delete_button" href="{{ route('gestion.destroy_rec',$ganador->id_reconocimiento) }}">
                                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                                            </a>
                                </td>
                        <td>
                            
                                {!! Form::open(['route'=>'gestion.editar_rec_club','method' => 'PUT','id'=>'form_update'] ) !!}
                                
                                {!! Form::text('id_reconocimiento', $ganador->id_reconocimiento, ['style'=>'display:none']) !!}
                                <div class="form-row">
                                    <div class="col-md-10">
                                            <select name="id_club" class="form-control" id=""> 
                                                    <option value="">Selecciona club</option>
                                                    @foreach ($data_club as $d)
                                                    <option value={{$d->id_club}}>{{$d->nombre_club}}</option>
                                                        
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