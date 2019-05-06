<!DOCTYPE html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style type="text/css">
            body {font-family: Arial,
                 Helvetica, sans-serif;}

            table {font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                font-size: 12px;
                margin: 45px;
                width: 100%;
                text-align: left;    
                border-collapse: collapse; }

            th {     
                font-size: 13px;     
                font-weight: normal;     
                padding: 8px;     
                background: #b9c9fe;
                border-top: 4px solid #aabcfe;    
                border-bottom: 1px solid #fff; color: #039; }

            td {    
                padding: 8px;     
                background: #e8edff;     
                border-bottom: 1px solid #fff;
                color: #669;    
                border-top: 1px solid transparent; }
          </style>
        {{-- <link rel="stylesheet" href="css/mis_estilos.css">
        <link href="css/bootstrap.min.css " rel="stylesheet">
 --}}
        {{-- <link rel="stylesheet" href="/css/mis_estilos.css">
        <link href="/css/bootstrap.min.css " rel="stylesheet"> --}}
</head>
<body>

    
    <div>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">
                                {{"Fixture"." ".$gestion->nombre_gestion}}
                            </th>
                        </tr>
                        <tr>
                            <th style= "vertical-align: middle; width: 50px">
                                    <img src="{{ public_path("storage/foto_disc/".$disciplina->foto_disc) }}" alt="/storage/app/public/foto_disc/{{ $disciplina->foto_discc }}" height="30" width="30" style="padding-inline-end: 5px">
                            </th>
                            <td>
                                {{$disciplina->nombre_disc." ".$disciplina->nombre_categoria($disciplina->categoria)}}
                            </td>
                        </tr>
                    </thead>
                </table>
                @foreach ($fix_fases as $fases)
                @if ($fases->first()->first()->id_tipo == 1 )
                    <table class="table table-light">
                        <thead>
                            <th>
                                {{$fases->first()->first()->nombre_fase}}
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($fases as $grupo)
                                <tr>
                                    <td>
                                       {{$grupo->first()->nombre_grupo}} 
                                    </td>
                                    <td>
                                        {{$grupo->first()->nombre_fecha}} 
                                    </td>
                                </tr>
                                @foreach ($grupo as $club)
                                <tr>
                                    <td>
                                        {{$club->nombre_club}}
                                    </td>
                                </tr>
                                @endforeach

                            @endforeach
                            
                        </tbody>
                    </table>
                @endif
                
                @endforeach
                    
    </div>
</body>