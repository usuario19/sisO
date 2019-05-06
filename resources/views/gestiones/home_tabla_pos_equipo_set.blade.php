@extends('plantillas.main') 
@section('title') SisO - Home
@endsection
 
@section('cdn') {!! Html::style('/jquery-ui/jquery-ui.css')
!!}
@endsection
 
@section('content')
@section('menu_disciplinas')
<div class="menu_h col-md-12 padd_none d-md-none d-block">

        @foreach ($disciplinas2 as $item)
        <div class="card-a py-1">
            <a class="mx-auto w-100" href="{{ route('principal.index_partidos_conjunto',[$item->nombre_disc]) }}">
                <div class="form-row col-12 text-center margin_none">
                    <img class="mx-auto" src="/storage/logos/{{$item->nombre_disc.".png"}}" alt="" width="30" height="30">
                </div>
                <div class="form-row text-wrap text-center px-2">
                  <span class="span_disc text-center mx-auto">{{ $item->nombre_disc}}</span>
                </div>
            </a>
        </div>
        @endforeach</div>
@endsection
<div class="container padd_none">
        <div class="container-fluid" style="background: #C40F31; margin-block-end: 10px">
                <div class="div-title-sub container text-left" style="background: #C40F31">
                  <a class="" href="#" style="text-decoration:none; background: #C40F31">
                    <h6 class="title-principal">Tabla de posiciones</h6>
                  </a>
                </div>
              </div>
<div class="container padd_none">

    <div class="margin_top col-md-12 padd_none">
        <div class="">
            <div class="container col-md-12 padd_none">
                {{--  <div class="reporte">
                    <h4 class="lista_sub_rep" style="font-size:20px">Tabla de Posiciones:</h4>
                </div>  --}}
               <div class="form-row">
                   <div class="col-md-12 text-center">
                        <span class="lista_sub">{{$gestion->nombre_gestion}}</span>
                   </div>
                   <div class="col-md-12 text-center">
                        <span class="lista_sub">{{$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)}}</span>
                   </div>
                   <div class="col-md-12 text-center">
                        <span class="lista_sub">{{$fase->nombre_fase}}</span>
                   </div>
               </div>
                @foreach ($tabla_posiciones as $grupo)
                <div class="grupo">
                    {{$grupo->first()->nombre_grupo}}
                </div>
                <div class="table-responsive-xl">
                        <table class="table text-center table-sm table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th colspan="2">Club</th>
                                    <th class="alert-info">PTS</th>
                                    <th>PJ</th>
                                    <th>PG</th>
                                    <th>PE</th>
                                    <th>PP</th>
                                    @if ($disciplina->es_raquetaFronton($disciplina->id_disc)==1)
                                    <th>CF</th>
                                    <th>CC</th>
                                    <th class="alert-warning">DC</th> 
                                    @else
                                    <th>SF</th>
                                    <th>SC</th>
                                    <th class="alert-warning">DS</th>
                                    @endif 
                                    <th>PF</th>
                                    <th>PC</th>
                                    <th class="alert-danger">DP</th> 
                                    
                                    
                                </thead>
                                <tbody>
                                    @php ($i = 1) 
                                    @foreach ($grupo as $club) {{-- {{dd($club)}} --}}
                                        <tr>
                                            <td>{{ $i }} </td>
                                            <td class="text-center"><img class="rounded mx-auto d-block" src="/storage/logos/{{ $club->logo}}" alt="" height=" 30px"
                                                    width="30px">
                                            </td>
                                            <td class="text-left" style="max-width: 250px">{{ $club->nombre_club }}</td>
                                            <td class="alert-info">{{ $club->puntos }}</td>
                                            <td>{{ $club->pj }}</td>
                                            <td>{{ $club->pg }}</td>
                                            <td>{{ $club->pe }}</td>
                                            <td>{{ $club->pp }}</td>
                                            <td>{{ $club->sf }}</td>
                                            <td>{{ $club->sc }}</td>
                                            <td class="alert-warning">{{ $club->ds }}</td>
                                            <td>{{ $club->pf }}</td>
                                            <td>{{ $club->pc }}</td>
                                            <td class="alert-danger">{{ $club->dp }}</td>
                                        </tr>
                                        @php ($i = $i+1) 
                                    @endforeach
                                </tbody>
                            </table>
                </div>
                
                @endforeach
                <div class="form-row col-md-4">
                    <table class="table table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td><b>PJ:</b></td>
                                <td>Partidos Jugados</td>
                            </tr>
                            <tr>
                                <td><b>PG:</b></td>
                                <td>Partidos Ganados</td>
                            </tr>
                            <tr>
                                <td><b>PE:</b></td>
                                <td>Partidos empatados</td>
                            </tr>
                            <tr>
                                <td><b>PP:</b></td>
                                <td>Partidos Perdidos</td>
                            </tr>
                            <tr>
                                    <td><b>SF:</b></td>
                                    <td>Sets a favor</td>
                                </tr>
                                <tr>
                                    <td><b>SC:</b></td>
                                    <td>Sets en contra</td>
                                </tr>
                                <tr>
                                    <td><b>DS:</b></td>
                                    <td>Diferencia de Sets</td>
                                </tr>
                            <tr>
                                <td><b>PF:</b></td>
                                <td>Puntos a favor</td>
                            </tr>
                            <tr>
                                <td><b>PC:</b></td>
                                <td>Puntos en contra</td>
                            </tr>
                            <tr>
                                <td><b>DP:</b></td>
                                <td>Diferencia de puntos</td>
                            </tr> 
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection