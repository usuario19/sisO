{{--  @extends('plantillas.main')
@section('title')
	SisO: Partidos
@endsection
@section('content')  --}}
    <div class="container col-md-12">
        
           {{--   <div class="col-md-12 text-center" style="padding: 10px 0px">
                @foreach ($club_part as $elemento)
                <th class="">{{strtoupper($elemento->gestiones->nombre_gestion)}}</th>
                @endforeach
               
            </div>    --}}
            @foreach ($participacion as $elemento)
            <div class="card">
                    <div class="card-header">
                        @foreach ($club_part as $elemento2)
                            <th class="text-center"  ><span style="color:lightslategrey; font-size: 14px">{{strtoupper($elemento2->gestiones->nombre_gestion)." - "}}</span></th>
                        @endforeach
                        <th><span style="color:lightslategrey; font-size: 14px">{{strtoupper($elemento->disciplina->nombre_disc)}}
                            {{$elemento->disciplina->categoria == 1 ? '( Mujeres )':($elemento->disciplina->categoria == 2 ? '( Hombres )':'( Mixto )')}}</span>                         
                        </th>
                    </div>
                    @if ($elemento->disciplina->tipo == '0'){{--    EQUIPO  --}}
                        <div class="card-body bg-light" style="padding: 0%">
                            <div class="accordion" id="accordionExample">
                                
                                    @foreach ($elemento->fases as $fase)
                                    
                                    @if ($fase->fase_tipos->first()->tipos->nombre_tipo == 'series')
                                        <div class="card">
                                                <div class="card-header" id="{{$fase->nombre_fase}}" style="padding: 0%">
                                                    <h5 class="mb-0">
                                                    <button class="btn btn-lg btn-light btn-block" type="button" data-toggle="collapse" href="#{{$fase->id_fase}}" role="button" aria-expanded="false" aria-controls="collapseExample" {{--  data-toggle="collapse" data-target="#{{$elemento->nombre_fase}}" aria-expanded="true" aria-controls="{{$elemento->nombre_fase}}"  --}}>
                                                        <span class="letter-size">{{$fase->nombre_fase." - ".$fase->fase_tipos->first()->tipos->nombre_tipo}}</span>
                                                    </button>
                                                    </h5>
                                                </div>
                                            
                                                <div class="collapse" id="{{$fase->id_fase}}" {{--  id="{{$elemento->nombre_fase}}" class="collapse" aria-labelledby="{{$elemento->id_fase}}" data-parent="#accordionExample"  --}}>
                                                    <div class="card-body">
                                                    
                                                        @foreach ($fase->grupos as $grupo)
                                                        <div class="col-md-6 float-left">
                                                            <div class="table-responsive-xl">
                                                                <table class="table table-condensed">
                                                                        <thead>
                                                                            <tr class="bg-secondary">
                                                                                <th colspan="6" style="color: white">{{$grupo->nombre_grupo}}</th>
                                                                            </tr>
                                                                            
                                                                            
                                                                            @foreach ($fase->fechas as $fecha)
                                                                            <tr class="bg-light">
                                                                                <th colspan="6" class="text-center">
                                                                                    {{$fecha->nombre_fecha}}
                                                                                </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                @foreach ($fecha->encuentros->sortBy('fecha')->sortBy('hora') as $encuentro)
                                                                                            @php
                                                                                                $a = false;
                                                                                            @endphp
                                                                                    
                                                                                    @foreach ($encuentro->encuentro_club_participaciones as $encuentro_club_participacion)
                                                                                    
                                                                                        @if (count($encuentro_club_participacion->club_participacion->grupo_club_participaciones->where('id_grupo',$grupo->id_grupo)) > 0)
                                                                                            @php
                                                                                                $a = true;
                                                                                            @endphp
                                                                                        <td class="text-center">    
                                                                                            <div>
                                                                                                <img id="imgOrigen" class="rounded-circle mx-auto d-block" src="/storage/logos/{{ $encuentro_club_participacion->club_participacion->club->logo }}" alt="" height=" 50px" width="50px">
                                                                                            
                                                                                                {{$encuentro_club_participacion->club_participacion->club->nombre_club}}
                                                                                            </div>
                                                                                        </td>
                                                                                        
                                                                                        @else   
                                                                                            @break
                                                                                        @endif
                                                                                            
                                                                                    @endforeach
                                                                                        @if ($a ==true)
                                                                                            <tr>
                                                                                                    <td colspan=""> 
                                                                                                        @php
                                                                                                        $date = new Date($encuentro->fecha."".$encuentro->hora);
                                                                                                        @endphp
                                                                                                            <strong>{{ $date->format('l j F Y g:ia') }}</strong> 
                                                                                                        </td>
                                                                                                        
                                                                                                        <td colspan="">
                                                                                                                <a href="" title="Ver en Google maps" >
                                                
                                                                                                                    <div class="button-div" style="">
                                                                                                                        <i class="material-icons float-left">location_on</i>
                                                                                                                        <span class="letter-size">{{$encuentro->ubicacion}}</span>
                                                                                                                    </div>
                                                                                                            
                                                                                                        </td>
                                                                                                        
                                                                                            </tr>
                                                                                        @endif
                                                                                
                                                                                    
                                                                                @endforeach
                                                                            </tr>
                                                                                
                                                                            @endforeach
                                                                            
                                                                        </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                        @endforeach
                                                        
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <div class="card-header" id="{{$fase->nombre_fase}}" style="padding: 0%">
                                                <h5 class="mb-0">
                                                <button class="btn btn-lg btn-light btn-block" type="button" data-toggle="collapse" href="#{{$fase->id_fase}}" role="button" aria-expanded="false" aria-controls="collapseExample" {{--  data-toggle="collapse" data-target="#{{$elemento->nombre_fase}}" aria-expanded="true" aria-controls="{{$elemento->nombre_fase}}"  --}}>
                                                    <span class="letter-size">{{$fase->nombre_fase." - ".$fase->fase_tipos->first()->tipos->nombre_tipo}}</span>
                                                </button>
                                                </h5>
                                            </div>
                                        
                                            <div class="collapse" id="{{$fase->id_fase}}" {{--  id="{{$elemento->nombre_fase}}" class="collapse" aria-labelledby="{{$elemento->id_fase}}" data-parent="#accordionExample"  --}}>
                                                <div class="card-body">
                                                
                                                    {{--  @foreach ($fase->grupos as $grupo)  --}}
    
                                                    @foreach ($fase->fechas as $fecha)
                                                    <div class="col-md-6 float-left">
                                                        <div class="table-responsive-xl">
                                                            <table class="table table-condensed">
                                                                    <thead>
                                                                        <tr class="bg-light">
                                                                            <th colspan="6" class="text-center">
                                                                                {{$fecha->nombre_fecha}}
                                                                            </th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            @foreach ($fecha->encuentros->sortBy('fecha')->sortBy('hora') as $encuentro)
                                                                                       {{--   @php
                                                                                            $a = false;
                                                                                        @endphp  --}}
                                                                                
                                                                                @foreach ($encuentro->encuentro_club_participaciones as $encuentro_club_participacion)
    
                                                                                
                                                                                    {{--  @if (count($encuentro_club_participacion->club_participacion->grupo_club_participaciones->where('id_grupo',$grupo->id_grupo)) > 0)
                                                                                        @php
                                                                                            $a = true;
                                                                                        @endphp  --}}
                                                                                    <td class="text-center">    
                                                                                        <div>
                                                                                            <img id="imgOrigen" class="rounded-circle mx-auto d-block" src="/storage/logos/{{ $encuentro_club_participacion->club_participacion->club->logo }}" alt="" height=" 50px" width="50px">
                                                                                        
                                                                                            {{$encuentro_club_participacion->club_participacion->club->nombre_club}}
                                                                                        </div>
                                                                                    </td>
                                                                                    
                                                                                   {{--   @else   
                                                                                        @break
                                                                                    @endif  --}}
                                                                                        
                                                                                @endforeach
                                                                                  {{--    @if ($a ==true)  --}}
                                                                                        <tr>
                                                                                                <td colspan=""> 
                                                                                                    @php
                                                                                                    $date = new Date($encuentro->fecha."".$encuentro->hora);
                                                                                                    @endphp
                                                                                                        <strong>{{ $date->format('l j F Y g:ia') }}</strong> 
                                                                                                    </td>
                                                                                                    
                                                                                                    <td colspan="">
                                                                                                            <a href="" title="Ver en Google maps" >
                                            
                                                                                                                <div class="button-div" style="">
                                                                                                                    <i class="material-icons float-left">location_on</i>
                                                                                                                    <span class="letter-size">{{$encuentro->ubicacion}}</span>
                                                                                                                </div>
                                                                                                        
                                                                                                    </td>
                                                                                                    
                                                                                        </tr>
                                                                                   {{--   @endif  --}}
                                                                            
                                                                                
                                                                            @endforeach
                                                                        </tr>
                                                                            
                                                                    </tbody>
                                                            </table>
                                                        </div>
                                                        
                                                    </div>
                                                    @endforeach
                                                   {{--   @endforeach  --}}
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    
                                    @endforeach
                            </div>
                        </div>
                    @else
                    <div class="card-body bg-light" style="padding: 0%">
                            <div class="accordion" id="accordionExample">
                                
                                    @foreach ($elemento->fases as $fase)
                                    
                                    @if($fase->fase_tipos->first()->tipos->nombre_tipo == 'series')
                                        <div class="card">
                                                <div class="card-header" id="{{$fase->nombre_fase}}" style="padding: 0%">
                                                    <h5 class="mb-0">
                                                    <button class="btn btn-lg btn-light btn-block" type="button" data-toggle="collapse" href="#{{$fase->id_fase}}" role="button" aria-expanded="false" aria-controls="collapseExample" {{--  data-toggle="collapse" data-target="#{{$elemento->nombre_fase}}" aria-expanded="true" aria-controls="{{$elemento->nombre_fase}}"  --}}>
                                                        <span class="letter-size">{{$fase->nombre_fase." - ".$fase->fase_tipos->first()->tipos->nombre_tipo}}</span>
                                                    </button>
                                                    </h5>
                                                </div>
                                            
                                                <div class="collapse" id="{{$fase->id_fase}}" {{--  id="{{$elemento->nombre_fase}}" class="collapse" aria-labelledby="{{$elemento->id_fase}}" data-parent="#accordionExample"  --}}>
                                                    <div class="card-body">
                                                    
                                                        @foreach ($fase->grupos as $grupo)
                                                        <div class="col-md-6 float-left">
                                                            <div class="table-responsive-xl">
                                                                <table class="table table-condensed">
                                                                        <thead>
                                                                            <tr class="bg-secondary">
                                                                                <th colspan="6" style="color: white">{{$grupo->nombre_grupo}}</th>
                                                                            </tr>
                                                                            
                                                                            
                                                                            @foreach ($fase->fechas as $fecha)
                                                                            <tr class="bg-light">
                                                                                <th colspan="6" class="text-center">
                                                                                    {{$fecha->nombre_fecha}}
                                                                                </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                @foreach ($fecha->encuentros->sortBy('fecha')->sortBy('hora') as $encuentro)
                                                                                            @php
                                                                                                $a = false;
                                                                                            @endphp
                                                                                    
                                                                                    @foreach ($encuentro->encuentro_club_participaciones as $encuentro_club_participacion)
                                                                                    
                                                                                        @if (count($encuentro_club_participacion->club_participacion->grupo_club_participaciones->where('id_grupo',$grupo->id_grupo)) > 0)
                                                                                            @php
                                                                                                $a = true;
                                                                                            @endphp
                                                                                        <td class="text-center">    
                                                                                            <div>
                                                                                                <img id="imgOrigen" class="rounded-circle mx-auto d-block" src="/storage/logos/{{ $encuentro_club_participacion->club_participacion->club->logo }}" alt="" height=" 50px" width="50px">
                                                                                            
                                                                                                {{$encuentro_club_participacion->club_participacion->club->nombre_club}}
                                                                                            </div>
                                                                                        </td>
                                                                                        
                                                                                        @else   
                                                                                            @break
                                                                                        @endif
                                                                                            
                                                                                    @endforeach
                                                                                        @if ($a ==true)
                                                                                            <tr>
                                                                                                    <td colspan=""> 
                                                                                                        @php
                                                                                                        $date = new Date($encuentro->fecha."".$encuentro->hora);
                                                                                                        @endphp
                                                                                                            <strong>{{ $date->format('l j F Y g:ia') }}</strong> 
                                                                                                        </td>
                                                                                                        
                                                                                                        <td colspan="">
                                                                                                                <a href="" title="Ver en Google maps" >
                                                
                                                                                                                    <div class="button-div" style="">
                                                                                                                        <i class="material-icons float-left">location_on</i>
                                                                                                                        <span class="letter-size">{{$encuentro->ubicacion}}</span>
                                                                                                                    </div>
                                                                                                            
                                                                                                        </td>
                                                                                                        
                                                                                            </tr>
                                                                                        @endif
                                                                                
                                                                                    
                                                                                @endforeach
                                                                            </tr>
                                                                                
                                                                            @endforeach
                                                                            
                                                                        </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>
                                                        @endforeach
                                                        
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <div class="card-header" id="{{$fase->nombre_fase}}" style="padding: 0%">
                                                <h5 class="mb-0">
                                                <button class="btn btn-lg btn-light btn-block" type="button" data-toggle="collapse" href="#{{$fase->id_fase}}" role="button" aria-expanded="false" aria-controls="collapseExample" {{--  data-toggle="collapse" data-target="#{{$elemento->nombre_fase}}" aria-expanded="true" aria-controls="{{$elemento->nombre_fase}}"  --}}>
                                                    <span class="letter-size">{{$fase->nombre_fase." - ".$fase->fase_tipos->first()->tipos->nombre_tipo}}</span>
                                                </button>
                                                </h5>
                                            </div>
                                        
                                            <div class="collapse" id="{{$fase->id_fase}}" {{--  id="{{$elemento->nombre_fase}}" class="collapse" aria-labelledby="{{$elemento->id_fase}}" data-parent="#accordionExample"  --}}>
                                                <div class="card-body">
                                                
                                                    {{--  @foreach ($fase->grupos as $grupo)  --}}
    
                                                    @foreach ($fase->fechas as $fecha)
                                                    <div class="col-md-6 float-left">
                                                        <div class="table-responsive-xl">
                                                            <table class="table table-condensed">
                                                                    <thead>
                                                                        <tr class="bg-light">
                                                                            <th colspan="6" class="text-center">
                                                                                {{$fecha->nombre_fecha}}
                                                                            </th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            @foreach ($fecha->encuentros->sortBy('fecha')->sortBy('hora') as $encuentro)
                                                                                       {{--   @php
                                                                                            $a = false;
                                                                                        @endphp  --}}
                                                                                
                                                                                @foreach ($encuentro->encuentro_club_participaciones as $encuentro_club_participacion)
    
                                                                                
                                                                                    {{--  @if (count($encuentro_club_participacion->club_participacion->grupo_club_participaciones->where('id_grupo',$grupo->id_grupo)) > 0)
                                                                                        @php
                                                                                            $a = true;
                                                                                        @endphp  --}}
                                                                                    <td class="text-center">    
                                                                                        <div>
                                                                                            <img id="imgOrigen" class="rounded-circle mx-auto d-block" src="/storage/logos/{{ $encuentro_club_participacion->club_participacion->club->logo }}" alt="" height=" 50px" width="50px">
                                                                                        
                                                                                            {{$encuentro_club_participacion->club_participacion->club->nombre_club}}
                                                                                        </div>
                                                                                    </td>
                                                                                    
                                                                                   {{--   @else   
                                                                                        @break
                                                                                    @endif  --}}
                                                                                        
                                                                                @endforeach
                                                                                  {{--    @if ($a ==true)  --}}
                                                                                        <tr>
                                                                                                <td colspan=""> 
                                                                                                    @php
                                                                                                    $date = new Date($encuentro->fecha."".$encuentro->hora);
                                                                                                    @endphp
                                                                                                        <strong>{{ $date->format('l j F Y g:ia') }}</strong> 
                                                                                                    </td>
                                                                                                    
                                                                                                    <td colspan="">
                                                                                                            <a href="" title="Ver en Google maps" >
                                            
                                                                                                                <div class="button-div" style="">
                                                                                                                    <i class="material-icons float-left">location_on</i>
                                                                                                                    <span class="letter-size">{{$encuentro->ubicacion}}</span>
                                                                                                                </div>
                                                                                                        
                                                                                                    </td>
                                                                                                    
                                                                                        </tr>
                                                                                   {{--   @endif  --}}
                                                                            
                                                                                
                                                                            @endforeach
                                                                        </tr>
                                                                            
                                                                    </tbody>
                                                            </table>
                                                        </div>
                                                        
                                                    </div>
                                                    @endforeach
                                                   {{--   @endforeach  --}}
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    
                                    @endforeach
                            </div>
                        </div>
                    @endif
                    
            </div>
            @endforeach
    </div>
{{--  @endsection  --}}
