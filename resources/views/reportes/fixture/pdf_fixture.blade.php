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
                <?php  foreach ($fix_fases as $fases){ ?>
                    
                    @if (count($fases) > 1)
                         <div class="fase">
                                <?php print ($fases->first()->nombre_fase); ?>
                            </div>
                      
                            <?php
                               if ($fases->first()->id_tipo == 1){
                            ?>
                                <?php 
                                    foreach ($fases->groupBy('id_grupo') as $grupo){
                                ?>
                                <table class="table table-sm -table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="grupo" colspan="6">
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
                                                <th class="fecha" colspan="6">
                                                    <?php
                                                    print( $fecha->first()->nombre_fecha)
                                                    ?>
                                                </th>
                                            </tr>
                                            <?php 
                                                foreach ($fecha->groupBy('id_encuentro') as $encuentro){
                                            ?>
                                                <tr>
                                                    <td>
                                                        {{$encuentro->first()->nombre_club }}
                                                    </td>
                                                    {{-- <td>
                                                         <img src="{{ public_path("storage/logos/".$encuentro->first()->logo) }}" alt="logo" height="30" width="30" style="padding-inline-end: 5px">
                                                    </td> --}}
                                                    <td width="30">
                                                        {{ "VS"}}
                                                    </td>
                                                    {{-- <td>
                                                             <img src="{{ public_path("storage/logos/".$encuentro->last()->logo) }}" alt="logo" height="30" width="30" style="padding-inline-end: 5px">
                                                    </td> --}}
                                                    <td>
                                                        {{$encuentro->last()->nombre_club }}
                                                    </td>
                                                    <td>
                                                        {{$encuentro->first()->fecha}}
                                                    </td>
                                                    <td>
                                                        {{$encuentro->first()->hora}}
                                                    </td>
                                                    <td>
                                                        {{$encuentro->first()->nombre_centro}}
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            {{-- {{dd($encuentro)}} --}}
                                            <?php } ?>
                                    </tbody>
                                </table>
                                    
                                <?php } ?>
                                <?php }else{ ?>{{-- eliminacion --}}
                                <?php 
                                    foreach ($grupo->groupBy('id_fecha') as $fecha){
                                ?>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="fecha" colspan="6">
                                                {{ $fecha->first()->nombre_fecha}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                                foreach ($fecha->groupBy('id_encuentro') as $encuentro){
                                            ?>
                                                <tr>
                                                    <td>
                                                        {{$encuentro->first()->nombre_club }}
                                                    </td>
                                                   {{--  <td>
                                                         <img src="{{ public_path("storage/logos/".$encuentro->first()->logo) }}" alt="logo" height="30" width="30" style="padding-inline-end: 5px">
                                                    </td> --}}
                                                    <td>
                                                        {{ "VS"}}
                                                    </td>
                                                   {{--  <td>
                                                             <img src="{{ public_path("storage/logos/".$encuentro->last()->logo) }}" alt="logo" height="30" width="30" style="padding-inline-end: 5px">
                                                    </td> --}}
                                                    <td>
                                                        {{$encuentro->last()->nombre_club }}
                                                    </td>
                                                    <td>
                                                        {{$encuentro->first()->fecha}}
                                                    </td>
                                                    <td>
                                                        {{$encuentro->first()->hora}}
                                                    </td>
                                                    <td>
                                                        {{$encuentro->first()->nombre_centro}}
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            <?php } ?>
                    @endif
                    
                           
                <?php  }  ?>     
    </div>
</body>