<div class="calendario form-row col-md-12 padd_none margin_none">
        @if ($disciplinas->where('nombre_disc',$disc)->first()->tipo == 0) 
        {{-- EQUIPO --}} 


        @foreach ($encuentros as $e)
        <table class="calendario table table-borderless">
          <thead>
            <tr>
              <th colspan="3" class="padd_none">
                <h5 class="title_gestion_home" style="color: black">
                  {{ $e->first()->nombre_gestion }}
                </h5>
              </th>
            </tr>
            <tr>
            </tr>
            <tr>
              <th colspan="3">
                    @php 
                      $date_hoy = new Date();
                      $d_h = strtotime($date_hoy->format('Y-m-d'));

                      $date_bd = new Date($e->first()->fecha); 
                      $date_bd->format('Y-m-d');
                      $d_bd = strtotime($date_bd->format('Y-m-d'));


                      $date_m = strtotime($date_hoy."+ 1 days");
                      $m = new Date($date_m);
                      $m->format('Y-m-d');
                      $d_m = strtotime($m->format('Y-m-d'));


                      $date_a = strtotime($date_hoy."- 1 days");
                      $a = new Date($date_a);
                      $a->format('Y-m-d');
                      $d_a = strtotime($a->format('Y-m-d'));


                    @endphp
                  <h5 class="title_gestion" style="color:black">
                      {{"- PARTIDOS "}}{{($d_bd == $d_h ? 'HOY -':($d_bd == $d_m ? 'MAÑANA -':($d_bd == $d_a ? 'AYER -':$date_bd->format('l, j F Y'))) ) }}
                  </h5>
              </th>
              </tr>
          </thead>
          <tbody>
            @foreach ($e->groupBy('id_disc')->sortBy('id_dis') as $disc)
            @php $d = App\Models\Disciplina::find($disc->first()->id_disc) @endphp
              @foreach ($disc->groupBy('id_fase') as $fase)
              <tr>
                  <th colspan="3">
                    <div class="div_gestion row">
                      <div class="col-md-6">
                        <h5 class="title_gestion">
                          {{ $d->nombre_disc." ".$d->nombre_categoria($d->categoria)." ".$d->nombre_subcateg($d->sub_categoria) }}
                        </h5>
                      </div>
                      <div class="col-md-6">
                        <h5 class="title_gestion">
                          {{ $fase->first()->nombre_fase }}
                        </h5>
                      </div>
                    </div>
                  </th>
                </tr>{{--  ENCUENTROS  --}}
                @php $f = App\Models\Fase::find($fase->first()->id_fase) @endphp
                @foreach ($fase->groupBy('id_fecha') as $fecha)
                  @if ($f->fase_tipos->first()->id_tipo == 2){{--  eliminacion  --}}
                <tr>
                  <th colspan="3" >
                      <div class="div_gestion_fase row">
                        <div class="col-md-12">
                          <h5 class="title_gestion">
                            {{ $fecha->first()->nombre_fecha }}
                          </h5>
                        </div>
                      </div>
                    </th>
                  </tr>
                  @endif
                  @foreach ($fecha->groupBy('id_encuentro')->sortBy('hora') as $item)
            <tr class="table table-bordered">
              <td class="align-top" style="max-width: 180px; min-width: 80px">
                <div class="form-row">
                  <div class="col-md-7 d-md-block d-none text-md-right text-center" style="padding:10px">
                    <span class="">{{ $item->first()->nombre_club }}</span>
                  </div>
                  <div class="col-md-5 d-md-block d-none">
                    <img class="calendario img-fluid mx-auto d-block rounded-circle" src="/storage/logos/{{ $item->first()->logo }}" alt="">
                  </div>
                  <div class="col-12 d-block d-md-none">
                    <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/logos/{{ $item->first()->logo }}" alt="" width="50" height="50">
                  </div>
                  <div class="col-12 d-md-none d-block text-center" style="padding: 10px; width:70px">
                    <span class="calendario_club">{{ $item->first()->nombre_club }}</span>
                  </div>
                </div>
              </td>
              @if ($d->es_futbol($item->first()->id_disc)==1){{--  FUTBOL y FUTBOL SALON  --}}

              {{--  PUNTAJE  --}}

              <td class="td_res">
                  @if ($item->first()->goles !== null)
                  <div class=" mx-auto text-center">
                      <h1 class="img-fluid d-md-block d-none">{{ ($item->first()->goles+$item->first()->puntos_extras)." - ".($item->last()->goles+$item->last()->puntos_extras)}}</h1>
                      <h3 class="img-fluid d-block d-md-none">{{ $item->first()->goles." - ".$item->last()->goles}}</h3>

                    @if ($item->first()->puntos_extras != NULL)
                    <h4>
                        {{ $item->first()->puntos_extras." - ".$item->last()->puntos_extras}}<br>
                    </h4>
                    <small id="passwordHelpBlock" class="form-text text-center text-muted alert-info">
                        Tiempo extra.
                    </small>
                    @endif
                    @if($item->first()->penales != NULL)
                    <h4>
                        {{ $item->first()->penales." - ".$item->last()->penales}}<br>
                    </h4>
                      <small id="passwordHelpBlock" class="form-text text-center text-muted alert-success">
                          Penales.
                      </small>
                    @endif
                  </div>
                  @else
                  <div class="row">
                      <div class="col-12 text-center">
                        @php $date = new Date($item->last()->hora); $hora = $date->format('H:i'); @endphp
                        <h4 class="icon_calendario">
                              <i class="material-icons icon_calendario">
                                  access_time
                              </i>
                              {{ $hora }}</h4>
                      </div>
                      <div class="aling-middle col-12 text-center margin:10px 0px">
                          <h6 style="font-weight:bolder;margin:0px">{{'- Vs -'}}</h6>
                      </div>
                      <div class="col-12 text-center">
                        <a href="{{ $item->last()->ubicacion_centro }}" target="_blank" title="Ver en Google Maps">
                                <span class="icon_calendario_lugar">
                                  <i class="material-icons icon_calendario">
                                      place
                                  </i>{{ $item->last()->nombre_centro }}
                                </span></a>
                      </div>
                    </div>
                  @endif
                  
                </td>
                     
              @elseif ($d->es_basket($item->first()->id_disc)==1){{--  BASKET  --}}
              {{--  PUNTAJE EQUIPO 1  --}}
              <td class="td_res">
                  @if ($item->first()->puntos_b !== null)

                    <div class=" mx-auto text-center">
                        <h1 class="img-fluid d-md-block d-none">{{ ($item->first()->puntos_b + $item->first()->puntos_extras)." - ".($item->last()->puntos_b + $item->last()->puntos_extras)}}</h1>
                        <h4 class="img-fluid d-block d-md-none">{{ ($item->first()->puntos_b + $item->first()->puntos_extras)." - ".($item->last()->puntos_b + $item->last()->puntos_extras)}}</h4>
                        @if ($item->first()->puntos_extras != NULL)
                          <h4>
                              {{ $item->first()->puntos_extras." - ".$item->last()->puntos_extras}}<br>
                          </h4>
                          <small id="passwordHelpBlock" class="form-text text-center text-muted alert-warning">
                              Tiempo extra.
                          </small>
                        {{--   @else
                          {{ $item->first()->puntos_b." - ".$item->last()->puntos_b}}<br>  --}}
                          @endif
                    </div>
                  @else
                  <div class="row">
                      <div class="col-12 text-center">
                        @php $date = new Date($item->last()->hora); $hora = $date->format('H:i'); @endphp
                        <h4 class="icon_calendario">
                              <i class="material-icons icon_calendario">
                                  access_time
                              </i>
                              {{ $hora }}</h4>
                      </div>
                      <div class="aling-middle col-12 text-center margin:10px 0px">
                          <h6 style="font-weight:bolder;margin:0px">{{'- Vs -'}}</h6>
                      </div>
                      <div class="col-12 text-center">
                        <a href="{{ $item->last()->ubicacion_centro }}" target="_blank" title="Ver en Google Maps">
                                <span class="icon_calendario_lugar">
                                  <i class="material-icons icon_calendario">
                                      place
                                  </i>{{ $item->last()->nombre_centro }}
                                </span></a>
                      </div>
                    </div>
                  @endif
                  
                </td>
              @elseif($d->es_set($item->first()->id_disc)==1){{--  VOLEIBOL WALLY  --}}
                {{--  PUNTAJE EQUIPO 1  --}}
              <td class="td_res" style="vertical-align: middle">
                  @if ($item->first()->set_ganados !== null)
                  <div class="form-row col-md-12 text-center">
                      <h1 class="img-fluid col-4 d-md-block d-none">{{ $item->first()->set_ganados }}</h1>
                      <h4 class="img-fluid col-4 d-block d-md-none">{{ $item->first()->set_ganados }}</h4>
                      <h4 class="img-fluid col-4 ">{{ " - " }}</h4>
                      <h1 class="img-fluid col-4 d-md-block d-none">{{ $item->last()->set_ganados }}</h1>
                      <h4 class="img-fluid col-4 d-block d-md-none">{{ $item->last()->set_ganados }}</h4>
                    </div>
                  <div class="div_set_home form-row">
                      <div class="col-2"></div>
                      <div class="col-2">S1</div>
                      <div class="col-2">S2</div>
                      <div class="col-2">S3</div>
                      <div class="col-2">S4</div>
                      <div class="col-2">S5</div>
                    </div>
                    <div class="div_set_home form-row">
                      <div class="col-2 punto_set border">{{ $item->first()->set_ganados}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set1 > $item->last()->puntos_set1 ? 'pintar':''}}">{{ $item->first()->puntos_set1}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set2 > $item->last()->puntos_set2 ? 'pintar':''}}">{{ $item->first()->puntos_set2}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set3 > $item->last()->puntos_set3 ? 'pintar':''}}">{{ $item->first()->puntos_set3}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set4 > $item->last()->puntos_set4 ? 'pintar':''}}">{{ $item->first()->puntos_set4}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set5 > $item->last()->puntos_set5 ? 'pintar':''}}">{{ $item->first()->puntos_set5}}</div>
                    </div>
                    <div class="div_set_home form-row">
                      <div class="col-2 punto_set border">{{ $item->last()->set_ganados}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set1 < $item->last()->puntos_set1 ? 'pintar':''}}">{{ $item->last()->puntos_set1}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set2 < $item->last()->puntos_set2 ? 'pintar':''}}">{{ $item->last()->puntos_set2}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set3 < $item->last()->puntos_set3 ? 'pintar':''}}">{{ $item->last()->puntos_set3}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set4 < $item->last()->puntos_set4 ? 'pintar':''}}">{{ $item->last()->puntos_set4}}</div>
                      <div class="col-2  border {{$item->first()->puntos_set5 < $item->last()->puntos_set5 ? 'pintar':''}}">{{ $item->last()->puntos_set5}}</div>
                    </div>
                </td>
                @else
                <div class="row">
                    <div class="col-12 text-center">
                      @php $date = new Date($item->last()->hora); $hora = $date->format('H:i'); @endphp
                      <h4 class="icon_calendario">
                            <i class="material-icons icon_calendario">
                                access_time
                            </i>
                            {{ $hora }}</h4>
                    </div>
                    <div class="aling-middle col-12 text-center margin:10px 0px">
                        <h6 style="font-weight:bolder;margin:0px">{{'- Vs -'}}</h6>
                    </div>
                    <div class="col-12 text-center">
                      <a href="{{ $item->last()->ubicacion_centro }}" target="_blank" title="Ver en Google Maps">
                              <span class="icon_calendario_lugar">
                                <i class="material-icons icon_calendario">
                                    place
                                </i>{{ $item->last()->nombre_centro }}
                              </span></a>
                    </div>
                  </div>
                @endif
                     {{--    --}}
                @elseif($d->es_raquetaFronton($item->first()->id_disc) == 1)
                <td class="td_res" style="vertical-align: middle">

                @if ($item->first()->set_ganados !== null)
                    <div class="form-row col-md-12 text-center">
                        <h1 class="img-fluid col-4 d-md-block d-none">{{ $item->first()->set_ganados }}</h1>
                        <h4 class="img-fluid col-4 d-block d-md-none">{{ $item->first()->set_ganados }}</h4>
                        <h4 class="img-fluid col-4 ">{{ " - " }}</h4>
                        <h1 class="img-fluid col-4 d-md-block d-none">{{ $item->last()->set_ganados }}</h1>
                        <h4 class="img-fluid col-4 d-block d-md-none">{{ $item->last()->set_ganados }}</h4>
                      </div>
                  <div class="div_set_tr form-row">
                    <div class="col-3"></div>
                    <div class="col-3">C1</div>
                    <div class="col-3">C2</div>
                    <div class="col-3">C3</div>
                    
                  </div>
                  <div class="div_set_tr form-row">
                    <div class="col-3 punto_set border">{{ $item->first()->set_ganados}}</div>
                    <div class="s21 col-3  border {{$item->first()->puntos_set1 > $item->last()->puntos_set1 ? 'pintar':''}}">{{ $item->first()->puntos_set1}}</div>
                    <div class="s31 col-3  border {{$item->first()->puntos_set2 > $item->last()->puntos_set2 ? 'pintar':''}}">{{ $item->first()->puntos_set2}}</div>
                    <div class="s41 col-3  border {{$item->first()->puntos_set3 > $item->last()->puntos_set3 ? 'pintar':''}}">{{ $item->first()->puntos_set3}}</div>
                  </div>
                  <div class="div_set_tr form-row">
                    <div class="col-3 punto_set border">{{ $item->last()->set_ganados}}</div>
                    <div class="s12 col-3  border {{$item->first()->puntos_set1 < $item->last()->puntos_set1 ? 'pintar':''}}">{{ $item->last()->puntos_set1}}</div>
                    <div class="s22 col-3  border {{$item->first()->puntos_set2 < $item->last()->puntos_set2 ? 'pintar':''}}">{{ $item->last()->puntos_set2}}</div>
                    <div class="s32 col-3  border {{$item->first()->puntos_set3 < $item->last()->puntos_set3 ? 'pintar':''}}">{{ $item->last()->puntos_set3}}</div>
                  </div>
                </td>
                @else
                <div class="row">
                    <div class="col-12 text-center">
                      @php $date = new Date($item->last()->hora); $hora = $date->format('H:i'); @endphp
                      <h4 class="icon_calendario">
                            <i class="material-icons icon_calendario">
                                access_time
                            </i>
                            {{ $hora }}</h4>
                    </div>
                    <div class="aling-middle col-12 text-center margin:10px 0px">
                        <h6 style="font-weight:bolder;margin:0px">{{'- Vs -'}}</h6>
                    </div>
                    <div class="col-12 text-center">
                      <a href="{{ $item->last()->ubicacion_centro }}" target="_blank" title="Ver en Google Maps">
                              <span class="icon_calendario_lugar">
                                <i class="material-icons icon_calendario">
                                    place
                                </i>{{ $item->last()->nombre_centro }}
                              </span></a>
                    </div>
                  </div>
                @endif
                </td>
              @endif
              <td class="align-baseline" style="max-width: 180px; min-width: 80px">
                <div class="form-row">
                  <div class="col-md-5 d-md-block d-none">
                    <img class="calendario img-fluid mx-auto d-block rounded-circle" src="/storage/logos/{{ $item->last()->logo }}" alt="">
                  </div>
                  <div class="col-12 d-block d-md-none">
                      <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/logos/{{ $item->last()->logo }}" alt="" width="50" height="50">
                  </div>
                  <div class="col-12 text-center d-md-none d-block" style="padding: 10px; width:70px">
                    <span class="calendario_club">{{ $item->last()->nombre_club }}</span>
                  </div>
                  <div class="col-md-7 d-md-block d-none" style="padding: 10px">
                    <span class="calendario_club">{{ $item->last()->nombre_club }}</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="table-bordered">
              <td class="text-center" colspan="3">
                <a class="stretched-link text-center text-success" href="{{ route('principal.mostrar_posiciones',[$item->first()->id_gestion,$item->first()->id_fase,$item->first()->id_disc]) }}">
                  Ver las posiciones
                </a>
              </td>
            </tr>
            {{--  <tr class="table">
              <th colspan="3" style="padding: 0%">
                <div class="row">
                  <div class="form-group col-6 text-center">
                    @php $date = new Date($item->last()->hora); $hora = $date->format('h:i A'); @endphp
                    <span class="icon_calendario">
                          <i class="material-icons icon_calendario">
                              access_time
                          </i>
                          {{ $hora }}</span>
                  </div>
                  <div class="form-group col-6 text-center">
                    <a href="{{ $item->last()->ubicacion_centro }}" target="_blank" title="Ver en Google Maps">
                            <span class="icon_calendario_lugar">
                              <i class="material-icons icon_calendario">
                                  place
                              </i>{{ $item->last()->nombre_centro }}
                            </span></a>
                  </div>
                </div>
              </th>
            </tr>  --}}
            <tr>
              <td></td>
            </tr>
            @endforeach 
                @endforeach                  
              @endforeach                  
            
            
            @endforeach
          </tbody>

        </table>
        @endforeach 
        @else
        {{--  COMPETICION-----------------------------------------------------------------------------------------------------------------  --}}
         @foreach ($encuentros as $enc)
        <table class="calendario table table-borderless">
          <thead>
            <tr>
              <th colspan="3">
                <h5 class="title_gestion_home" style="color:black">
                  {{ $enc->first()->nombre_gestion }}
                </h5>
              </th>
            </tr>
            <tr>
                <th colspan="3">
                    @php 
                      $date_hoy = new Date();
                      $date_hoy->format('Y-m-d');
                      $d_h = strtotime($date_hoy->format('Y-m-d'));

                      $date_bd = new Date($enc->first()->fecha); 
                      $date_bd->format('Y-m-d');
                      $d_bd = strtotime($date_bd->format('Y-m-d'));


                      $date_m = strtotime($date_bd."+ 1 days");
                      $m = new Date($date_m);
                      $m->format('Y-m-d');
                      $d_m = strtotime($m->format('Y-m-d'));


                      $date_a = strtotime($date_bd."- 1 days");
                      $a = new Date($date_a);
                      $a->format('Y-m-d');
                      $d_a = strtotime($a->format('Y-m-d'));


                    @endphp
                  <h5 class="title_gestion" style="color:black">
                      {{"- PARTIDOS "}}{{($d_bd == $d_h ? 'HOY -':($d_bd == $d_m ? 'MAÑANA -':($d_bd == $d_a ? 'AYER -':'noooooo')) ) }}
                  </h5>
                </th>
              </tr>
          </thead>
          <tbody>
            @foreach ($enc->groupBy('id_disc')->sortBy('id_dis') as $disc_comp)
              @php $d_com = App\Models\Disciplina::find($disc_comp->first()->id_disc) @endphp
              @foreach ($disc_comp->groupBy('id_fase') as $fase)
              <tr>
                  <th colspan="3">
                    <div class="div_gestion row">
                      <div class="col-md-6">
                        <h5 class="title_gestion">
                          {{ $d_com->nombre_disc." ".$d_com->nombre_categoria($d_com->categoria)." ".$d_com->nombre_subcateg($d_com->sub_categoria) }}
                        </h5>
                      </div>
                      <div class="col-md-6">
                        <h5 class="title_gestion">
                          {{ $fase->first()->nombre_fase }}
                        </h5>
                      </div>
                    </div>
                  </th>
                </tr>
               @php $f_com = App\Models\Fase::find($fase->first()->id_fase) @endphp

                @foreach ($fase->groupBy('id_fecha') as $fecha)
                  @if ($f_com->fase_tipos->first()->id_tipo == 2){{--  eliminacion  --}}
                <tr>
                  <th colspan="3" >
                      <div class="div_gestion_fase row">
                        <div class="col-md-12">
                          <h5 class="title_gestion">
                            {{ $fecha->first()->nombre_fecha }}
                          </h5>
                        </div>
                      </div>
                    </th>
                  </tr>

                  @endif
                    
                  @foreach ($fecha->groupBy('id_encuentro')->sortBy('hora') as $item)
                    {{--  si es tenis o raquet  --}}
              
                    @if ($d_com->es_raquetaFronton($disc_comp->first()->id_disc) == 2)
                      <tr class="table-bordered">
                        <td class="td_equipo align-top">
                          <div class="form-row">
                            <div class="col-md-7 d-md-block d-none text-md-right text-center" style="padding:10px">
                              <span class="">{{ $item->first()->nombre_jugador." ".$item->first()->apellidos_jugador }}</span><br>
                              <span class="nombre_club">{{ $item->first()->alias_club }}</span>
                            </div>
                            <div class="col-md-5 d-md-block d-none">
                              <img class="calendario img-fluid mx-auto d-block rounded-circle" src="/storage/fotos/{{ $item->first()->foto_jugador }}" alt="">
                            </div>
                            <div class="col-12 d-block d-md-none">
                              <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/fotos/{{ $item->first()->foto_jugador }}" alt="" width="50" height="50">
                            </div>
                            <div class="col-12 d-md-none d-block text-center" style="padding: 10px; width:70px">
                                <span class="">{{ $item->first()->nombre_jugador." ".$item->first()->apellidos_jugador }}</span><br>
                                <span class="nombre_club">{{ $item->first()->alias_club }}</span>
                            </div>
                          </div>
                        </td>
                        <td class="td_res">
                          @if ($item->first()->set_ganados !== null)
                          <div class="div_set_tr form-row">
                              <div class="col-5">
                                <h4>{{$item->first()->set_ganados}}</h4>
                              </div>
                              <div class="col-2">
                                {{" - "}}
                              </div>
                              <div class="col-5">
                                <h4> {{$item->last()->set_ganados}}</h4>
                              </div>
                            </div>
                          <div class="div_set_tr form-row">
                            <div class="col-3"></div>
                            <div class="col-3">J1</div>
                            <div class="col-3">J2</div>
                            <div class="col-3">J3</div>
                          </div>
                          <div class="div_set_tr form-row">
                            <div class="col-3 punto_set border">{{ $item->first()->set_ganados}}</div>
                            <div class="s21 col-3  border {{$item->first()->puntos_set1 > $item->last()->puntos_set1 ? 'pintar':''}}">{{ $item->first()->puntos_set1}}</div>
                            <div class="s31 col-3  border {{$item->first()->puntos_set2 > $item->last()->puntos_set2 ? 'pintar':''}}">{{ $item->first()->puntos_set2}}</div>
                            <div class="s41 col-3  border {{$item->first()->puntos_set3 > $item->last()->puntos_set3 ? 'pintar':''}}">{{ $item->first()->puntos_set3}}</div>
                          </div>
                          <div class="div_set_tr form-row">
                            <div class="col-3 punto_set border">{{ $item->last()->set_ganados}}</div>
                            <div class="s12 col-3  border {{$item->first()->puntos_set1 < $item->last()->puntos_set1 ? 'pintar':''}}">{{ $item->last()->puntos_set1}}</div>
                            <div class="s22 col-3  border {{$item->first()->puntos_set2 < $item->last()->puntos_set2 ? 'pintar':''}}">{{ $item->last()->puntos_set2}}</div>
                            <div class="s32 col-3  border {{$item->first()->puntos_set3 < $item->last()->puntos_set3 ? 'pintar':''}}">{{ $item->last()->puntos_set3}}</div>
                          </div>
                              
                          @else
                          <div class="row">
                              
                              <div class="col-12 text-center">
                                @php $date = new Date($item->last()->hora); $hora = $date->format('H:i'); @endphp
                                <h4 class="icon_calendario">
                                      <i class="material-icons icon_calendario">
                                          access_time
                                      </i>
                                      {{ $hora }}</h4>
                              </div>
                              <div class="aling-middle col-12 text-center margin:10px 0px">
                                <h6 style="font-weight:bolder;margin:0px">{{'- Vs -'}}</h6>
                              </div>
                              <div class="col-12 text-center">
                                <a href="{{ $item->last()->ubicacion_centro }}" target="_blank" title="Ver en Google Maps">
                                        <span class="icon_calendario_lugar">
                                          <i class="material-icons icon_calendario">
                                              place
                                          </i>{{ $item->last()->nombre_centro }}
                                        </span>
                                      </a>
                              </div>
                            </div>
                          @endif

                        </td>
                        <td class="td_equipo align-baseline">
                          <div class="form-row">
                            <div class="col-md-5 d-md-block d-none">
                              <img class="calendario img-fluid mx-auto d-block rounded-circle" src="/storage/fotos/{{ $item->last()->foto_jugador }}" alt="">
                            </div>
                            <div class="col-12 d-block d-md-none">
                                <img class="img-fluid mx-auto d-block rounded-circle" src="/storage/fotos/{{ $item->last()->foto_jugador }}" alt="" width="50" height="50">
                            </div>
                            <div class="col-12 text-center d-md-none d-block" style="padding: 10px; width:70px">
                                <span class="">{{ $item->last()->nombre_jugador." ".$item->last()->apellidos_jugador }}</span><br>
                                <span class="nombre_club">{{ $item->last()->alias_club }}</span>
                            </div>
                            <div class="col-md-7 d-md-block d-none" style="padding: 10px">
                                <span class="">{{ $item->last()->nombre_jugador." ".$item->last()->apellidos_jugador }}</span><br>
                                <span class="nombre_club">{{ $item->last()->alias_club }}</span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @if ($item->first()->set_ganados !== null)
                      <tr class="table-bordered">
                        <td class="text-center td_posicion" colspan="3">
                          <a class="stretched-link text-center text-success" href="{{ route('principal.mostrar_posiciones',[$item->first()->id_gestion,$item->first()->id_fase,$item->first()->id_disc]) }}">
                            Ver las posiciones
                          </a>
                        </td>
                      </tr>
                      
                      @endif
                      <tr>
                          <td colspan="3"></td>
                        </tr>
                    @else{{--  varios  --}}
                      <tr class="table-bordered">
                        <th colspan="3" style="padding: 0%">
                          <div class="row">
                            <div class="form-group col-6 text-center">
                              @php $date = new Date($item->first()->hora); $hora = $date->format('H:i'); @endphp
                              <h4 class="icon_calendario my-auto">
                                <i class="material-icons icon_calendario">
                                    access_time
                                </i>
                                {{ $hora }}</h4>
                            </div>
                            <div class="form-group col-6 text-center">
                              <a href="{{ $item->last()->ubicacion_centro }}" target="_blank" title="Ver en Google Maps">
                                <span class="icon_calendario_lugar">
                                  <i class="material-icons icon_calendario">
                                      place
                                  </i>{{ $item->first()->nombre_centro }}
                                </span></a>
                            </div>
                          </div>
                        </th>
                      </tr>
                      @if ($item->first()->posicion !== null)
                      @if ($d_com->es_ajedrez($disc_comp->first()->id_disc) == 1)
                      <tr class="table-bordered">
                           <td>#</td>
                           {{--  <td class="text-center">POS</td>  --}}
                           <td {{--   width="70"   --}}class="text-center">PARTICIPANTE</td>
                           <td {{--  width="40"  --}} class="text-center">PUNTOS</td>
                         </tr>
                         @php($i=1) 
                         @foreach($item as $jugador)
                         
                         <tr class="table-bordered">
                             <td>
                                 {{$i}}
                             </td>
                           <td>
                             <div class="form-row">
                               <div class="col-2  d-md-block d-none">
                                 <img class="" src="/storage/logos/{{$jugador->logo}}" alt="logo" height="40">
                               </div>
                                 <div class="col-3 d-md-block d-none">
                                     {{$jugador->alias_club}}
                                   </div>
                               {{--  <div class="col-3  d-md-block d-none">
                                   <img class="rounded-circle" src="/storage/fotos/{{$jugador->foto_jugador}}" alt="logo" height="50" width="50">
                               </div>  --}}
                               <div class="col-3">
                                   <img class="rounded-circle" src="/storage/fotos/{{$jugador->foto_jugador}}" alt="logo" height="40" width="40">
                               </div>  
                               <div class="col-4 d-md-block d-none">
                                 {{$jugador->nombre_jugador." ".$jugador->apellidos_jugador }}
                               </div>
                               <div class="col-9 d-md-none d-block">
                                   {{$jugador->nombre_jugador." ".$jugador->apellidos_jugador }}<br>
                                   {{$jugador->alias_club }}
                                 </div>
                             </div>
                           </td>
                           <td class="text-center">
                             {{$jugador->posicion}}
                           </td>
                           
                         </tr> 
                         
                         @php($i++) 

                         
                         @endforeach 
                         @if ($item->first()->posicion !== null)
                         <tr class="table-bordered">
                           <td class="text-center td_posicion" colspan="3">
                             <a class="stretched-link text-center text-success" href="{{ route('principal.mostrar_posiciones',[$item->first()->id_gestion,$item->first()->id_fase,$item->first()->id_disc]) }}">
                               Ver las posiciones
                             </a>
                           </td>
                         </tr>
                         
                         @endif
                      @else
                      <tr class="table-bordered">
                          {{--   <td>#</td>  --}}
                           <td class="text-center">POS</td>
                           <td {{--   width="70"   --}}class="text-center">PARTICIPANTE</td>
                           <td {{--  width="40"  --}} class="text-center">TIEMPO</td>
                         </tr>
                         @php($i=1) 
                         @foreach($item->sortBy('posicion') as $jugador)
                         
                         <tr class="table-bordered">
                             <td>
                                 {{$jugador->posicion}}
                             </td>
                           <td>
                             <div class="form-row">
                               <div class="col-2  d-md-block d-none">
                                 <img class="" src="/storage/logos/{{$jugador->logo}}" alt="logo" height="40">
                               </div>
                                 <div class="col-3 d-md-block d-none">
                                     {{$jugador->alias_club}}
                                   </div>
                               {{--  <div class="col-3  d-md-block d-none">
                                   <img class="rounded-circle" src="/storage/fotos/{{$jugador->foto_jugador}}" alt="logo" height="50" width="50">
                               </div>  --}}
                               <div class="col-3">
                                   <img class="rounded-circle" src="/storage/fotos/{{$jugador->foto_jugador}}" alt="logo" height="40" width="40">
                               </div>  
                               <div class="col-4 d-md-block d-none">
                                 {{$jugador->nombre_jugador." ".$jugador->apellidos_jugador }}
                               </div>
                               <div class="col-9 d-md-none d-block">
                                   {{$jugador->nombre_jugador." ".$jugador->apellidos_jugador }}<br>
                                   {{$jugador->alias_club }}
                                 </div>
                             </div>
                           </td>
                           <td class="text-center">
                             {{$jugador->tiempo}}
                           </td>
                           
                         </tr> 
                         
                         @php($i++) 

                         
                         @endforeach 
                         @if ($item->first()->posicion !== null)
                         <tr class="table-bordered">
                           <td class="text-center td_posicion" colspan="3">
                             <a class="stretched-link text-center text-success" href="{{ route('principal.mostrar_posiciones',[$item->first()->id_gestion,$item->first()->id_fase,$item->first()->id_disc]) }}">
                               Ver las posiciones
                             </a>
                           </td>
                         </tr>
                         
                         @endif
                      @endif
                      
                      @else
                      <tr class="table-bordered">
                          <td>#</td>
                          <td class="text-center">CLUB</td>
                          <td class="text-center">PARTICIPANTE</td>
                          {{--  <td  width="80">TIEMPO</td>
                          <td  width="60">POS</td>  --}}
                        </tr>
                        @php($i=1) 
                        @foreach($item as $jugador)
                        
                        <tr class="table-bordered">
                          <td width="30">{{$i}}</td>
                          <td{{--   width="50"  --}}>
                            <div class="row">
                              <div class="col-3">
                                <img class="" src="/storage/logos/{{$jugador->logo}}" alt="logo" height="40">
                              </div>
                             {{--   <div class="col-auto d-block d-md-none d-block">
                                  <img class="" src="/storage/logos/{{$jugador->logo}}" alt="logo" height="40">
                                </div>  --}}
                              <div class="col-8 ">
                                {{$jugador->nombre_club}}
                              </div>
                            </div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-3">
                                    <img class="rounded-circle" src="/storage/fotos/{{$jugador->foto_jugador}}" alt="logo" height="40" width="40">
                                  </div>
                                <div class="col-8 d-block">
                                  {{$jugador->nombre_jugador." ".$jugador->apellidos_jugador }}
                                </div>
                            </div>
                          </td>
                        </tr> 
                        
                        @php($i++) 

                        
                        @endforeach 
                      @endif 
                      
                      <tr><td></td></tr>
                    @endif

                  @endforeach
                @endforeach
              @endforeach
            @endforeach
          </tbody>
        </table>
        @endforeach 
      @endif
  </div>