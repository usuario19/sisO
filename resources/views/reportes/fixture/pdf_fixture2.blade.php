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
            {{-- {{dd($fix_fases)}} --}}
                <?php 
                    foreach ($fix_fases as $fases){
                ?>
                {{-- {{dd($fases)}} --}}
                    @if (count($fases) > 1)
                        
                            <?php
                               if ($fases->first()->id_tipo == 1){
                                   
                            ?>
                             <div class="fase">
                                    <?php print ($fases->first()->nombre_fase); ?>
                                </div>
                                <?php 
                                    foreach ($fases->groupBy('id_grupo') as $grupo){
                                ?>
                                <table class="table table-sm -table-bordered">
                                        <caption></caption>

                                    <thead>
                                        <tr>
                                            <th class="grupo" colspan="3">
                                                    <?php
                                                    print ($grupo->first()->nombre_grupo);
                                                    ?>
                                            </th>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($grupo->groupBy('id_fecha') as $fecha){
                                        ?>
                                            <tr>
                                                <th class="fecha" colspan="3">
                                                    <?php
                                                    print( $fecha->first()->nombre_fecha)
                                                    ?>
                                                </th>
                                            </tr>
                                            <?php 
                                                foreach ($fecha->groupBy('id_encuentro') as $encuentro){
                                            ?>
                                                <tr>
                                                    <td colspan="3">
                                                        <span class="info">Fecha :{{$encuentro->first()->fecha}}</span>
                                                        <span class="info2">Hora :{{$encuentro->first()->hora}}</span>
                                                        <span class="info3">Lugar :{{$encuentro->first()->nombre_centro}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cabecera">
                                                    <td>#</td>
                                                    <td>Club</td>
                                                    <td>Nombre</td>
                                                </tr>
                                                @php
                                                    $i=1
                                                @endphp
                                                <?php foreach ($encuentro as $jugador){ ?>
                                                    <tr>
                                                        <td width="30">
                                                            {{$i}}
                                                        </td>
                                                        
                                                        <td style="text-align: left;">
                                                            {{$jugador->nombre_club}}
                                                        </td>
                                                        <td style="text-align: left;">
                                                            {{$jugador->nombre_jugador." ".$jugador->apellidos_jugador}}
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $i++
                                                    @endphp
                                                <?php } ?>
                                                <?php } ?>
                                            {{-- {{dd($encuentro)}} --}}
                                            <?php } ?>
                                    </tbody>
                                </table>
                                    
                                <?php } ?>
                                <?php }else{ ?>{{-- eliminacion --}}
                                <div class="fase">
                                        <?php print ($fases->first()->nombre_fase); ?>
                                    </div>
                                <?php 
                                    foreach ($fases->groupBy('id_fecha') as $fecha){
                                ?>
                                <table class="table table-sm table-bordered">
                                        <caption></caption>

                                    <thead>
                                        <tr>
                                            <th class="fecha" colspan="3">
                                                {{ $fecha->first()->nombre_fecha}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                           
                                            <?php 
                                                foreach ($fecha->groupBy('id_encuentro') as $encuentro){
                                            ?>
                                                <tr>
                                                    <td colspan="3">
                                                        <span class="info">Fecha :{{$encuentro->first()->fecha}}</span>
                                                        <span class="info2">Hora :{{$encuentro->first()->hora}}</span>
                                                        <span class="info3">Lugar :{{$encuentro->first()->nombre_centro}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cabecera">
                                                    <td>#</td>
                                                    <td>Club</td>
                                                    <td>Nombre</td>
                                                </tr>
                                                @php
                                                    $i=1
                                                @endphp
                                                <?php foreach ($encuentro as $jugador){ ?>
                                                    <tr>
                                                        <td width="30">
                                                            {{$i}}
                                                        </td>
                                                        
                                                        <td style="text-align: left;">
                                                            {{$jugador->nombre_club}}
                                                        </td>
                                                        <td style="text-align: left;">
                                                            {{$jugador->nombre_jugador." ".$jugador->apellidos_jugador}}
                                                        </td>
                                                    </tr>
                                                    @php
                                                    $i++
                                                    @endphp
                                                <?php } ?>
                                                <?php } ?>
                                            {{-- {{dd($encuentro)}} --}}
                                    </tbody>
                                </table>
                                <?php } ?>
                            <?php } ?>
                    @endif
                <?php 
                   }
                ?>{{-- @endforeach  --}}       
    </div>
</body>