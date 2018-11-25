@extends('plantillas.main')
@section('title')
	SisO: Seleccion
@endsection

@section('content')
<div class="container">
    <div class="table-responsive-xl">
            <div class="container">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{route('coordinador.mis_gestiones')}}">Gestiones</a></li>
                              @if ($participacion->gestiones->estado_inscripcion == 1)
							  <li class="breadcrumb-item"><a href="{{ route('disciplina.ver_disciplinas_inscritas',[$participacion->club->id_club, $participacion->gestiones->id_gestion]) }}">{{$participacion->gestiones->nombre_gestion}}</a></li>
                                  
                              @endif
                              <li class="breadcrumb-item active" aria-current="page">Seleccion</li>
                            </ol>
                          </nav>
            </div>
        <div class="container col-md-12">    
            <div class="card">
                <div class="card-header" style="margin: 0%;padding: 5px">
                    <div class="row">
                        <div class="col-md-6 text-center" style="margin: auto">
                            <p class="display-4 title-select" style="font-size:16px; margin: 0%; color: black">{{ strtoupper($participacion->gestiones->nombre_gestion) }}</p>
                        </div>          	      	
                        <div class="col-md-6" >
                            <p class="text-center display-4 title-select" style="font-size: 16px; margin: 0%; color: black">
                                <img src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" width="30px" height="30px">
                                @if($participacion->disciplina->categoria == 1)
                                    {{ strtoupper($participacion->disciplina->nombre_disc."( Mujeres )") }}</p>
                                @elseif($participacion->disciplina->categoria == 2)
                                    {{ strtoupper($participacion->disciplina->nombre_disc."( Varones )") }}</p>
                                @else
                                    {{ strtoupper($participacion->disciplina->nombre_disc."( Mixto )") }}</p>
                                @endif
                        </div>
                    </div>
                    
                    
                </div>
                <div class="card-body" style="margin: 0%;padding: 5px">
                    <table class="table table-borderless" style="padding: 0px;margin: 0%">
                        <tr>
                            <th style="width:100px; padding: 0px" class="text-center">
                                <img src="/storage/logos/{{ $participacion->club->logo }}" alt="" width="80px" height="80px">
                            </th>
                            <th style="padding: 0px">
                                <p  class="display-4" style="font-size:16px;margin: 0%; font-weight: bold; padding: 20px 0px">{{ strtoupper($participacion->club->nombre_club) }}</p>
                            </th>
                        </tr>
                    </table>

                    
                </div>
            </div>

            <div class="container" style="padding: 0%">
                    <div class="card">
                        <div class="card-body">
                            <!--TABLA DE AHBILITADOS ...........................................................-->
                            <div class="container col-md-12 table-responsive-md">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-secondary">
                                                <th colspan="5"><p class="text-center display-5" style="color: white; margin: 0%">JUGADORES HABILITADOS PARA LA DISCIPLINA</p></th>
                                            </tr>
                                            <tr>
                                                <th>ID</th>
                                                <th>Foto</th>
                                                <th>Nombre Completo</th>
                                                <th>Genero</th>
                                                <th>Fecha de Nacimiento</th>
                                               {{--   <th>{!! Form::checkbox('todo','todo', false, ['id'=>'todo_hab']) !!}</th>  --}}
                                            </tr>
                                        </thead>
                                        {!! Form::open(['route'=>'seleccion.deshabilitar','method'=>'POST']) !!}
                                        <tbody>
                                            @foreach($participacion->selecciones as $usuario)
                                                <tr>
                                                    
                                                    <td>{{ $usuario->jugador_club->jugador->id_jugador}}</td>
                                                    <td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador_club->jugador->foto_jugador }}" alt="" height=" 50px" width="50px"></td>
                                                    <td>{{ $usuario->jugador_club->jugador->nombre_jugador." ".$usuario->jugador_club->jugador->apellidos_jugador}}</td>
                                                    <td>@if($usuario->jugador_club->jugador->genero_jugador == "2")
                                                            {{ "Masculino" }}
                                                        @else
                                                            {{ "Femenino" }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$usuario->jugador_club->jugador->fecha_nac_jugador}}
                                                    </td>
                                                    {{--  <td>
                                                        {!! Form::checkbox('id_seleccion[]',$usuario->id_seleccion, false, ['class'=>'check_hab']) !!}
                                                    </td>  --}}
                                                    
                                                </tr>
                                        
                                            @endforeach
                                                {{--  <tr>
                                                    <td colspan="5" class=
                                                    "text-center">{!! Form::submit('Deshabiltar', ['class'=>'btn btn-secondary']) !!}</td>
                                                </tr>  --}}
                                        </tbody>
                                    </table>
                                        {!! Form::close() !!}
                                </div>
                           
                        </div>
                    </div>
                </div>


        </div>
    </div>

</div>

@endsection

@section('scripts')
@endsection