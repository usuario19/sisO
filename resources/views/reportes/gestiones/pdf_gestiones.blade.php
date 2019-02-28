<!DOCTYPE html>
{{--  <html lang="es">  --}}
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="css/mis_estilos.css">
        <link href="css/bootstrap.min.css " rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="reporte_title">
        
        <table class="">
            <tbody>
                <tr>
                    <td width="50">
                        <img src="{{ public_path("/storage/logos/umss.jpg") }}" alt="" height="50">
                    </td>
                    <td>
                        <span class="title-principal">Sindicato de Trabajadores de la Universidad Mayor de San Simon</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <h4 class="text-center title-principal" style="font-size: 20px; font-weight: bolder; color:#1D3B6D ">{{ $gestion->nombre_gestion }}</h4>
    <div class="col-md-12">
        <div class="reporte_sub_title">
                <span class="title-principal">Informacion</span>
        </div>
    </div>
    <div class="row">
        <div class="reporte_info">
            <table class="table table-borderless">
                <tbody>
                    @php
                        $date_ini = new Date($gestion->fecha_inicio);
                        $date_fin = new Date($gestion->fecha_fin);
                    @endphp
                    <tr>
                        <td scope="row">Sede:</td>
                        <td>{{ $gestion->sede }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Fecha:</td>
                        <td>{{ $date_ini->format('l, j F Y')." - " }}
                            {{ $date_fin->format('l, j F Y') }}
                        </td>
                    </tr>
                    {{--  <tr>
                        <th scope="row">Fecha conclusion</th>
                        <td></td>
                    </tr>  --}}
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
        <div class="reporte_sub_title">
            <span class="title-principal">Disciplinas habilitadas</span>
        </div>
    </div><br>
    <div class="col-md-12">
        <div class="reporte_info">
            <table class="table table-sm table-striped table_report">
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
                            <td scope="row">{{ $i }}</td>
    
                        <td width="30">
                            <img class="rounded-circle" src="{{ public_path("storage/foto_disc/".$item->foto_disc) }}" alt="" height=" 30px" width="30px">
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
        </div>
    </div>
    @endif
    
    @if ($inscripciones)
    <div class="col-md-12">
        <div class="reporte_sub_title">
            <span class="title-principal">Clubs participantes</span>
        </div>
    </div><br>
    <div class="col-md-12">
        <div class="reporte_info">
            <table class="table table-sm table-striped table_report">
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
                            <td scope="row">{{ $i }}</td>
    
                        <td width="30">
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
        </div>
    </div>
    @endif
    
</div>
</body>