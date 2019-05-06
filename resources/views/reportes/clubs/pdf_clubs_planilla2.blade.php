<!DOCTYPE html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="css/estilos_pdf.css">
</head>
<body>
<div class="">
                <table class="title">
                    <thead>
                        <tr>
                            <td colspan="2" class="text-center">
                                {{ $gestion->nombre_gestion}}
                            </td>
                        </tr>
                        <tr>
                            <th style= "vertical-align: middle; width: 50px">
                                <img src="{{ public_path("storage/logos/".$club->logo) }}" alt="/storage/app/public/logos/{{ $club->logo }}" height="50" width="50" style="padding-inline-end: 5px">
                            </th>
                            <td class="fase">
                                {{$club->nombre_club}}
                            </td>
                        </tr>
                    </thead>
                </table>
                <table class="">
                    <thead>
                        <tr>
                            <th class="fecha" colspan="9">
                                JUGADORES HABILITADOS
                            </th>
                        </tr>
                        <tr>
                            <th width='30'>#</th>
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>ci</th>
                            <th>Genero</th>
                            <th>Fecha de nacimiento</th>
                            <th>email</th>
                            <th>descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($planilla as $jugador)
                        <tr>
                                <td class="text-center">
                                    {{$i}}
                                </td>
                                <td class="text-center" style= "vertical-align: middle; width: 50px">
                                    <img class="img_report" src="{{ public_path("storage/fotos/".$jugador->foto_jugador) }}" alt="">
                                </td>
                                <td>
                                    {{$jugador->nombre_jugador}}
                                </td>
                                <td>
                                    {{$jugador->apellidos_jugador}}
                                </td>
                                <td>
                                    {{$jugador->ci_jugador}}
                                </td>
                                <td>
                                    {{($jugador->genero_jugador == 1)? "Femenino":"Masculino"}}
                                </td>
                                <td>
                                    {{$jugador->fecha_nac_jugador}}
                                </td>
                                <td>
                                    {{$jugador->email_jugador}}
                                </td>
                                <td>
                                    {{$jugador->descripcion_jugador}}
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
    </div>
</body>