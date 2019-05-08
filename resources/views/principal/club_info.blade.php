@extends('plantillas.main')

@section('title')
    SisO - Lista de gestiones
@endsection

@section('content')

    <div class="container" style="background: #00447B">
        <div class="div-title-sub container text-left">
            <a class="" href="{{ route('club.mostrar_principal') }}" style="text-decoration:none"><h6 class="title-principal">CLUBS</h6></a>
        </div>
    </div>
    <div class="container" style="background:#0060AE">
        <div class="div-title-principal container text-center">
                <h1 class="title-principal">{{strtoupper($club->nombre_club)}}</h1>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="table-responsive-xl">
                {{--  <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                    <table class="table table-borderless" style="margin: 0%">
                        <thead>
                            <th class="sub-title">informacion</th>
                        </thead>
                    </table>
                </div>  --}}
                {{--  <br>  --}}
            <div class="col-md-12 mx-auto p-0">
                <div class="card">
                    <div class="card-body p-1">
                        <div class="text-center" style="margin: 0 20px 20px 20px">
                            <img class="rounded mx-auto d-block" src="/storage/logos/{{$club->logo}}" alt="" width="200px" height="200px">
                        </div>
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="min-width: 100px">
                                        nombre del club
                                    </th>
                                    <td>
                                        <strong>{{strtoupper ($club->nombre_club)}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        ciudad
                                    </th>
                                    <td>
                                        <strong>{{strtoupper ($club->ciudad)}}</strong> 
                                    </td>
                                </tr>
                                <tr>
                                        <th>
                                            descripcion
                                        </th>
                                        <td>
                                            <p class="text-justify">
                                                <strong>{{$club->descripcion_club}}</strong>
                                            </p>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-xl">
            <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                <table class="table table-borderless" style="margin: 0%">
                    <thead>
                        <th class="lista_sub text-dark">logros</th>
                    </thead>
                </table>
            </div>
            <br>
        <div class=" form-row col-md-12 mx-auto">
                    @foreach ($logros->groupBy('id_gestion') as $logro)
                    <div class="col-md-10 mx-auto">
                            <table class="table table-sm mi_tabla table-bordered">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th class="text-white" colspan="3">{{$logro->first()->nombre_gestion}}</th>
                                        </tr>
                                        {{--  <tr>
                                            <th colspan="3">
                                                DISCIPLINAS EN CONJUNTO
                                            </th>
                                        </tr>  --}}
                                        <tr>
                                            <th style="width: 50px">#</th>
                                            <th colspan="">disciplina</th>
                                            <th colspan="">posicion</th>
                                        </tr>
                                        </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($logro as $item)
                                    @php $d = App\Models\Disciplina::find($item->id_disc) @endphp
                                        <tr>
                                            <td class="text-center">{{$i}}</td>
                                            <td>
                                                {{$item->nombre_disc." ".$d->nombre_categoria($item->categoria)." ".$d->nombre_subcateg($item->sub_categoria)}}
                                            </td>
                                            <td>
                                                <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/archivos/{{ $item->posicion_ganador.'.600.png'}}" alt="" width="30">
                                            </td>
                                        </tr>
                                        @php
                                        $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    @endforeach
                    {{--  @foreach ($logros->groupBy('id_gestion') as $logro)
                    <div class="col-md-6">
                            <table class="table table-sm mi_tabla table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="5">{{$logro->first()->nombre_gestion}}</th>
                                        </tr>
                                        <th colspan="5">
                                                DISCIPLINAS INDIVIDUAL
                                            </th>
                                        <tr>
                                            <th style="width: 50px">#</th>
                                            <th colspan="">disciplina</th>
                                            <th colspan="2">jugador</th>
                                            <th colspan="">posicion</th>
                                        </tr>
                                        </thead>
                                <tbody>
                                        @php
                                        $i=1;
                                    @endphp
                                    
                                    @foreach ($logro as $item)
                                    @php $d = App\Models\Disciplina::find($item->id_disc) @endphp
                                        <tr>
                                            <td class="text-center">{{$i}}</td>
                                            <td>
                                                {{$item->nombre_disc." ".$d->nombre_categoria($item->categoria)." ".$d->nombre_subcateg($item->sub_categoria)}}
                                            </td>
                                            <td>
                                                    <img class="img-fluid rounded-circle" src="/storage/fotos/{{$item->foto_jugador}}" alt="" width="30">
                                                </td>
                                            <td>
                                                    {{$item->nombre_jugador." ".$item->apellidos_jugador}}
                                                </td>
                                            <td>
                                                <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/archivos/{{$item->posicion_participante.'.600.png'}}" alt="" width="30">
                                            </td>
                                        </tr>
                                        @php
                                        $i++;
                                    @endphp
                                    @endforeach  --}}
                                {{--  </tbody>
                            </table>
                    </div>
                    @endforeach    --}}
                
               
        </div>
    </div>

        <div class="table-responsive-xl">
                <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                    <table class="table table-borderless" style="margin: 0%">
                        <thead>
                            <th class="lista_sub text-dark">jugadores</th>
                        </thead>
                    </table>
                </div>
                <br>
            <div class="col-md-12 mx-auto">
                        <div class="form-group col-md-12">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                        </div>
                        
                        <table class="table mi_tabla table-condensed">
                            <thead>
                                    <tr>
                                            <th style="width: 50px">#</th>
                                            <th>foto</th>
                                            <th class="text-left" colspan="">Nombre</th>
                                            <th class="text-left" colspan="">Apellidos</th>
                                        </tr>
                            </thead>
                                
                            <tbody id="datos">
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($jug_clubs as $jug_club)
                                    <tr>
                                        <td style="width: 50px"><strong>{{$i}}</strong></td>
                                        <td style="width: 60px"><img class="rounded-circle mx-auto d-block" src="/storage/fotos/{{$jug_club->jugador->foto_jugador}}" alt="" width="50px" height="50px"></td>
                                        <td width="200px"><strong>
                                            {{$jug_club->jugador->nombre_jugador}}
                                        </strong></td>
                                        <td><strong>
                                                    {{$jug_club->jugador->apellidos_jugador}}
                                            </strong></td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection