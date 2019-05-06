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
                            <td colspan="4" class="text-center">
                                {{ $gestion->nombre_gestion}}
                            </td>
                        </tr>
                        <tr>
                            <th style= "vertical-align: middle; width: 50px">
                                <img src="{{ public_path("storage/logos/".$club->logo) }}" alt="/storage/app/public/logos/{{ $club->logo }}" height="50" width="50" style="padding-inline-end: 5px">
                            </th>
                            <td class="fase" colspan="3">
                                {{$club->nombre_club}}
                            </td>
                        </tr>
                    </thead>
                    <tbody class="table-sm">
                        <tr>
                            <td>Ciudad:</td>
                            <td>{{ $club->ciudad }}</td>
                       {{--  </tr>
                        <tr> --}}
                            <td width="60">Coordinador:</td>
                            <td>
                                {{ $club->admin_clubs->first()->administrador->nombre }}
                                {{ $club->admin_clubs->first()->administrador->apellidos }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="">
                    <thead>
                        <tr>
                            <th class="fecha" colspan="3">
                                DISCIPLINAS EN LOS QUE PARTICIPA EL CLUB
                            </th>
                        </tr>
                        <tr>
                            <th width='30'>#</th>
                            <th>Foto</th>
                            <th>Disciplina</th>
                            {{-- <th></th>
                            <th>Genero</th>
                            <th>Fecha de nacimiento</th> --}}
                            {{-- <th>T. amarillas</th>
                            <th>T. Roja</th> --}}
                            
            
                        </tr>
                        
                    </thead>
                    <tbody>
                            @php
                                $i=1;
                            @endphp
                        @foreach ($inscripcion as $disc)
                        <tr>
                                <td class="text-center">
                                    {{$i}}
                                </td>
                                <td class="text-center" style= "vertical-align: middle; width: 50px">
                                    <img class="img_report" src="{{ public_path("storage/foto_disc/".$disc->foto_disc) }}" alt="">
                                </td>
                                <td>
                                    {{$disc->nombre_disc}}
                                    {{($disc->categoria == 1) ? "Damas":($disc->categoria == 2 ) ? "Varones":"Mixto" }}
                                </td>
                                {{-- <td>
                                    {{$disc->ci_disc}}
                                </td>
                                <td>
                                    {{($disc->genero_disc == 1)? "Femenino":"Masculino"}}
                                </td>
                                <td>
                                    {{$disc->fecha_nac_disc}}
                                </td> --}}
                                {{-- <td>
                                    {{$disc->email_disc}}
                                </td>
                                <td>
                                    {{$disc->descripcion_disc}}
                                </td> --}}
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
                </body>