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
                            <th colspan="3">
                                {{$gestion->nombre_gestion}}
                            </th>
                        </tr>
                        <tr>
                            <th style= "vertical-align: middle; width: 50px;padding:0%">
                                    <img src="{{ public_path("storage/foto_disc/".$disciplina->foto_disc) }}" alt="/storage/app/public/foto_disc/{{ $disciplina->foto_discc }}" height="50" width="50" style="padding-inline-end: 5px">
                            </th>
                            <th style="text-align: left;">
                                {{$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)}}
                            </th>
                            <th class="fecha">
                                TABLA DE POSICIONES
                            </th>
                        </tr>
                    </thead>
                </table>
                {{--  {{dd($dato)}}  --}}
               
                    
                 @if (count($dato) > 1)
                    
                    @if ($dato->first()->id_tipo == 1)
                        <div class="fase">
                            <?php print ($dato->first()->nombre_fase); ?>
                        </div>
                        {{--  {{dd($dato->groupBy('id_grupo'))}}  --}}
                        @foreach ($dato->groupBy('id_grupo') as $grupo)
                             <table class="table table-sm -table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="grupo" colspan="8">
                                                    <?php print ($grupo->first()->nombre_grupo); ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>#</td>
                                        
                                            <td colspan="2">Club</td>
                                        
                                            <td>PJ</td>
                                        
                                            <td>PG</td>
                                        
                                            <td>PP</td>
                                            <td>PE</td>
                                        
                                            <td>PUNTOS</td>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                         @php($i =1)
                                    @foreach ($grupo as $club)
                                        <tr>
                                            <td>{{$i}}</td>
                                            
                                            <td>
                                                    <img src="{{ public_path("storage/logos/".$club->logo) }}" alt="logo" height="30" width="30" style="padding-inline-end: 5px">
                                            </td>
                                            <td>
                                                {{$club->nombre_club }}
                                            </td>
                                            <td>
                                                {{$club->pj}}
                                            </td>
                                            <td>
                                                {{$club->pg}}
                                            </td>
                                            <td>
                                                {{$club->pp}}
                                            </td>
                                            <td>
                                                {{$club->pe}}
                                            </td>
                                            <td>
                                                {{$club->puntos}}
                                            </td>
                                         @php($i++)
                                        </tr>
                                    
                                    @endforeach
                                    </tbody>
                                </table>
                        @endforeach
                    @else
                        <div class="fase">
                            <?php print ($dato->first()->nombre_fase); ?>
                        </div>
                             <table class="table table-sm -table-bordered">
                                    <thead>
                                        
                                        <tr>
                                            <td>#</td>
                                        
                                            <td colspan="2">Club</td>
                                        
                                            <td>PJ</td>
                                        
                                            <td>PG</td>
                                        
                                            <td>PP</td>
                                            <td>PE</td>
                                        
                                            <td>PUNTOS</td>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                         @php($i =1)
                                    @foreach ($dato as $club)
                                        <tr>
                                            <td>{{$i}}</td>
                                            
                                            <td>
                                                    <img src="{{ public_path("storage/logos/".$club->logo) }}" alt="logo" height="30" width="30" style="padding-inline-end: 5px">
                                            </td>
                                            <td>
                                                {{$club->nombre_club }}
                                            </td>
                                            <td>
                                                {{$club->pj}}
                                            </td>
                                            <td>
                                                {{$club->pg}}
                                            </td>
                                            <td>
                                                {{$club->pp}}
                                            </td>
                                            <td>
                                                {{$club->pe}}
                                            </td>
                                            <td>
                                                {{$club->puntos}}
                                            </td>
                                         @php($i++)
                                        </tr>
                                    
                                    @endforeach
                                    </tbody>
                                </table>
                    @endif
                @endif
    </div>
</body>