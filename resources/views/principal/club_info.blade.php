@extends('plantillas.main')

@section('title')
    SisO - Lista de gestiones
@endsection

@section('content')

    <div class="container-fluid" style="background: #00447B">
        <div class="div-title-sub container text-left">
            <a class="" href="{{ route('club.mostrar_principal') }}" style="text-decoration:none"><h6 class="title-principal">CLUBS</h6></a>
        </div>
    </div>
    <div class="container-fluid" style="background:#0060AE">
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
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center" style="margin: 0 20px 20px 20px">
                            <img class="rounded mx-auto d-block" src="/storage/logos/{{$club->logo}}" alt="" width="200px" height="200px">
                        </div>
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 200px">
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
                        <th class="sub-title">logros</th>
                    </thead>
                </table>
            </div>
            <br>
        <div class="col-md-12 mx-auto">
            <table class="table table-borderless" style="margin: 0%">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th colspan="">campeonato</th>
                        <th colspan="">disciplina</th>
                        <th colspan="">posicion</th>
                    </tr>
                </thead>
            </table>
            <table class="table table-condensed">
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    {{--  @foreach ($jug_clubs as $jug_club)
                        <tr>
                            <td style="width: 50px">{{$i}}</td>
                            <td style="width: 60px"><img class="rounded-circle mx-auto d-block" src="/storage/fotos/{{$jug_club->jugador->foto_jugador}}" alt="" width="50px" height="50px"></td>
                            <td>{{$jug_club->jugador->nombre_jugador}}
                                {{$jug_club->jugador->apellidos_jugador}}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach --}}
                </tbody>
            </table>
               
        </div>
    </div>

        <div class="table-responsive-xl">
                <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                    <table class="table table-borderless" style="margin: 0%">
                        <thead>
                            <th class="sub-title">jugadores</th>
                        </thead>
                    </table>
                </div>
                <br>
            <div class="col-md-12 mx-auto">
                
                        
                        <div class="form-group col-md-12">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                        </div>
                        
                        <table class="table table-borderless" style="margin: 0%">
                            <thead>
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th>foto</th>
                                    <th class="text-left" colspan="">Nombre</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table table-condensed">
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($jug_clubs as $jug_club)
                                    <tr>
                                        <td style="width: 50px"><strong>{{$i}}</strong></td>
                                        <td style="width: 60px"><img class="rounded-circle mx-auto d-block" src="/storage/fotos/{{$jug_club->jugador->foto_jugador}}" alt="" width="50px" height="50px"></td>
                                        <td><strong>
                                            {{$jug_club->jugador->nombre_jugador}}
                                                {{$jug_club->jugador->apellidos_jugador}}
                                        </strong></td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        {{$jug_clubs->links() }}
            </div>
        </div>
        
    </div>

   {{--   @include('sweetalert::cdn') 
 @include('vendor.sweetalert.view')   --}}
@endsection