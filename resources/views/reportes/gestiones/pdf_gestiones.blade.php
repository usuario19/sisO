<!DOCTYPE html>
{{--  <html lang="es">  --}}
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="css/estilos_pdf.css">
</head>
<body>

<div class="container">
    
    <h4 class="title">{{ $gestion->nombre_gestion }}</h4>
    <div class="fase">
                Informacion
    </div>
    <div class="col-md-12">
        <div class="reporte_info">
            <table class="table mi_tabla table-borderless table-sm">
                <tbody>
                    @php
                        $date_ini = new Date($gestion->fecha_ini);
                        $date_fin = new Date($gestion->fecha_fin);
                    @endphp
                    <tr>
                        <td width="60" scope="row">Sede:</td>
                        <td>{{ $gestion->sede }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Fecha:</td>
                        
                        <td>{{ $date_ini->format('l, j F Y')." - " }}
                            {{ $date_fin->format('l, j F Y') }}
                        </td>
                    </tr>
                    <tr class="text-justify">
                        <td scope="row">Descripcion:</td>
                        <td>{{ $gestion->desc_gest }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if ($participaciones)
    <div class="col-md-12">
        <div class="fase">
            Disciplinas habilitadas
        </div>
    </div><br>
            <table class="">
                <thead>
                    <tr>
                        <th width="30">#</th>
                        <th colspan="2">Disciplinas</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($participaciones as $item)
                        <tr>
                            <td class="text-center" scope="row">{{ $i }}</td>
    
                        <td style= "vertical-align: middle; width: 30px">
                            <img src="{{ public_path("storage/foto_disc/".$item->foto_disc) }}" alt="" height=" 30px" width="30px">
                        </td>
                            <td>{{ $item->nombre_disc }}
                                @if($item->categoria == 1)
                                    {{ 'Damas'}}
                                @elseif($item->categoria == 2)
                                    {{ 'Varones' }}
                                @else
                                    {{ 'Mixto' }}
                                @endif
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
    @endif
    
    @if ($inscripciones)
        <div class="fase">
            Clubs participantes</span>
        </div>
            <table class="">
                <thead>
                    <tr>
                        <th width="30">#</th>
                        <th colspan="2">Clubs</th>
                        <th>Ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($inscripciones as $item)
                        <tr>
                            <td class="text-center" scope="row">{{ $i }}</td>
    
                        <td style= "vertical-align: middle; width: 30px">
                            <img class="rounded-circle" src="{{ public_path("storage/logos/".$item->logo) }}" alt="" height=" 30px" width="30px">
                        </td>
                            <td>{{ $item->nombre_club}}</td>
                            <td>{{ $item->ciudad}}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
    @endif
    
</div>
</body>