@extends('plantillas.main')
@section('title')
	SisO: Partidos
@endsection
@section('content')
    <div class="container col-md-10">
        
            <div class="col-md-12 text-center" style="padding: 10px 0px">
                @foreach ($club_part as $elemento)
                <h4 class="">{{strtoupper($elemento->gestiones->nombre_gestion)}}</h4>
                @endforeach
               
            </div>  
            @foreach ($participacion as $elemento)
            <div class="card">
                    <div class="card-header">
                        <span>{{strtoupper($elemento->disciplina->nombre_disc)}}
                            {{$elemento->disciplina->categoria == 1 ? '( Mujeres )':($elemento->disciplina->categoria == 2 ? '( Hombres )':'( Mixto )')}}                         
                        </span>
                    </div>
                    <div class="card-body bg-light" style="padding: 0%">
                       
                       {{--  {{ $elemento->fases}}  --}}
                       
                        <div class="accordion" id="accordionExample">
                                @foreach ($elemento->fases as $fase)
                                <div class="card">
                                     <div class="card-header" id="{{$fase->nombre_fase}}">
                                         <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" href="#{{$fase->id_fase}}" role="button" aria-expanded="false" aria-controls="collapseExample" {{--  data-toggle="collapse" data-target="#{{$elemento->nombre_fase}}" aria-expanded="true" aria-controls="{{$elemento->nombre_fase}}"  --}}>
                                                {{$fase->nombre_fase}}
                                            </button>
                                         </h5>
                                     </div>
                                 
                                     <div class="collapse" id="{{$fase->id_fase}}" {{--  id="{{$elemento->nombre_fase}}" class="collapse" aria-labelledby="{{$elemento->id_fase}}" data-parent="#accordionExample"  --}}>
                                         <div class="card-body">
                                            {{--   {{$fase->grupos}}  --}}
                                             @foreach ($fase->grupos as $grupo)
                                             <div class="col-md-8">
                                                    <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="6">{{$grupo->nombre_grupo}}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                    #
                                                                    </th>
                                                                    <th>
                                                                        Equipos
                                                                    </th>
                                                                    <th>
                                                                        Fecha del partido
                                                                    </th>
                                                                    <th>
                                                                        hora del partido
                                                                    </th>
                                                                    <th>
                                                                        lugar del encuentro
                                                                    </th>
                                                                    <th>
                                                                        detalle
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {{--  {{$grupo->grupo_club_particpaciones}}  --}}
                                                                @foreach ($grupo->grupo_club_particpaciones as $grupo_club_part)
                                                                <tr>
                                                                        <td>
                                                                            {{$grupo_club_part->club_participacion->encuentro_club_participaciones}}
                                                                        </td>
                                                                </tr>
                                                                @endforeach
                                                                
                                                            </tbody>
                                                        </table>
                                             </div>
                                             @endforeach
                                             
                                             
                                         </div>
                                     </div>
                                 </div>
                                @endforeach
                            
                            
                        </div>
                    </div>
                </div>
            @endforeach

            
    </div>
@endsection
