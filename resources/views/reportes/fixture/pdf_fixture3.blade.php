<!DOCTYPE html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        
        <link rel="stylesheet" href="css/estilos_pdf.css">
</head>
<body>

    <div>
                <table class="title">
                    <thead>
                        <tr>
                            <th colspan="2">
                                {{"Fixture"." ".$gestion->nombre_gestion}}
                            </th>
                        </tr>
                        <tr>
                            <th style= "vertical-align: middle; width: 50px;padding:0%">
                                    <img src="{{ public_path("storage/foto_disc/".$disciplina->foto_disc) }}" alt="/storage/app/public/foto_disc/{{ $disciplina->foto_discc }}" height="50" width="50" style="padding-inline-end: 5px">
                            </th>
                            <th style="text-align: left;">
                                {{$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)}}
                            </th>
                        </tr>
                    </thead>
                </table>
            
            @foreach ($fix_fechas as $fase)
            {{--  {{ dd($fase) }}  --}}
            
            @if (count($fase)> 1)
                 @if ($fase->first()->id_tipo ==1)
                <div class="fase">              
                {{  $fase->first()->nombre_fase  }}
                </div>
                <table class="table table-light">
                    <caption></caption>
                    <thead class="thead-light">
                        <tr>
                        @php
                            $date = new Date($fase->first()->fecha);
                        @endphp
                        
                                <th class="grupo" colspan="6">Partidos:{{ $date->format('l, j F Y')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($fase->groupBy('id_encuentro') as $encuentro)
                        <tr>
                            <td>{{$encuentro->first()->nombre_grupo}}</td>

                            <td>{{$encuentro->first()->nombre_club}}</td>
                        
                            <td>Vs</td>
                        
                            <td>{{$encuentro->last()->nombre_club}}</td>
                        
                            <td>{{$encuentro->first()->hora}}</td>
                        
                            <td>{{$encuentro->first()->nombre_centro}}</td>
                        </tr>
                        {{--   {{ dd($encuentro) }}  --}}
                    @endforeach
                    
                        
                    </tbody>
                </table>
              
            @else
                <div class="fase">
                {{  $fase->first()->nombre_fase }}
                </div>
                <table class="table table-light">
                    <caption></caption>
                    <thead class="thead-light">
                        <tr>
                        @php
                            $date = new Date($fase->first()->fecha);
                        @endphp
                        
                                <th class="grupo" colspan="5">Partidos:{{ $date->format('l, j F Y')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($fase->groupBy('id_encuentro') as $encuentro)
                        <tr>

                            <td>{{$encuentro->first()->nombre_club}}</td>
                        
                            <td>Vs</td>
                        
                            <td>{{$encuentro->last()->nombre_club}}</td>
                        
                            <td>{{$encuentro->first()->hora}}</td>
                        
                            <td>{{$encuentro->first()->nombre_centro}}</td>
                        </tr>
                        {{--   {{ dd($encuentro) }}  --}}
                    @endforeach
                    
                        
                    </tbody>
                </table>
            @endif
            @endif
            
           
            @endforeach
                 
    </div>
</body>