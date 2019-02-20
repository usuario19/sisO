
@extends('plantillas.main')

@section('title')
    SisO - Home
@endsection
@section('cdn')
  {!! Html::style('/jquery-ui/jquery-ui.css') !!}
@endsection

@section('content')
<div class="container-fluid" style="padding: 0%">
  <div class="mx-auto col-md-12">
    <div class="row">
      {{--  CALENDARIO  --}}
      <div class="col-md-9" style="padding: 0%">
        <div class="container-fluid" style="background: #00447B; margin-block-end: 10px">
            <div class="div-title-sub container text-left">
                <a class="" href="#" style="text-decoration:none">
                  <h6 class="title-principal">calendario</h6>
                </a>
            </div>
        </div>
        <div class="container-fluid form-row" style="padding:0%; border-block-end: 1px solid #9090AD; margin-bottom: 20px">
          {{--  DEPORTES  --}}
          <div class="col-md-6 bg-white" style="padding: 0%">
            <div class="pos-f-t">
              <nav class="navbar navbar-light bg-white" style="padding: 0% 20px">
              <div>
                  <a class="navbar-brand" href="#" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                      <h6 class="title-principal" style="color: #00447B; padding-inline-start: 12px;padding-bottom: 5px">
                          <i class="material-icons">
                            directions_run
                          </i>
                        {{ $disciplinas->where('id_disc',$disc)->first()->nombre_disc." ".$disciplinas->where('id_disc',$disc)->first()->nombre_categoria($disciplinas->where('id_disc',$disc)->first()->categoria) }}
                      </h6>
                  </a>
                  <a class="btn float-right" type="" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="material-icons d-md-block d-none" style="padding-top: 7px; color: #619DDB">
                          keyboard_arrow_down
                      </i>
                  </a>
                  <div class="collapse navbar-collapse btn-block position-absolute" id="navbarTogglerDemo01"  style="left: 0%; z-index: 100; background: white">
                    <ul class="navbar-nav btn-block flex-column">
                      @foreach ($disciplinas as $item)
                      <div class="dropdown-divider"></div>
                        <li class="nav-item" style="border-block-end: 0px solid #9090AD">
                          <a class="disc-nlink nav-link" href="#"><span style="padding-left: 40px">{{ $item->nombre_disc." ".$item->nombre_categoria($item->categoria) }}</span><span class="sr-only">(current)</span></a>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
          </div>
          {{--  PARTIDOS  --}}
          <div class="col-md-6">
            <div class="form-row" style="padding: 0px">
              @php
                $date = new Date($fecha);
                $fecha = $date->format('l, j F Y');
              @endphp
              <div class="form-group">
                <a href="#" class="button_change float-left">
                  <i class="material-icons">
                    chevron_left
                    </i>
                </a>
                <h5 style="padding-top: 5px; min-width: 200px; width: 230px; max-width: 250px" class="letter-size text-capitalize text-center float-left">{{ $fecha }}</h5>
                <a href="#" class="button_change float-left">
                  <i class="material-icons">
                    chevron_right
                    </i>
                </a>
              </div>
              <div class="form-group">
                <div class="content_home">
                  <i class="icon_fecha float-left material-icons">
                    date_range
                  </i>
                  {{--  <i class="icon_fecha float-right material-icons" style="margin-top: 10px;font-size: 24px;color: #619DDB">
                      keyboard_arrow_right
                  </i>  --}}
                  <input type="text" name="" id="fecha">
                </div>
              </div>
            </div>
            
            
          </div>
          
        </div>
        <div class="table-responsive-xl">
          <div class="calendario form-row col-md-12">
            @if ($disciplinas->where('id_disc',$disc)->first()->tipo == 0)
            {{--  EQUIPO  --}}
              @foreach ($encuentros as $e)
                <table class="calendario table table-borderless">
                  <thead>
                    <th colspan="5">
                      <div class="row">
                        <div class="col-md-6 col-8">
                          <h5 class="title-principal" style="color: crimson">
                            {{ $e->first()->nombre_gestion }}
                          </h5>
                        </div>
                        <div class="col-md-6 col-4">
                          <a href="" class="">
                            <i class="material-icons">
                                insert_chart_outlined
                            </i>
                            <span class="float-right d-md-block d-none">Tabla de posiciones</span>
                          </a>
                        </div>
                      </div>
                    </th>
                  </thead>
                  @foreach ($e->groupBy('id_encuentro')->sortBy('hora') as $item)
                  <tbody>
                    <tr class="table table-bordered">
                      <td style="max-width: 250px;">
                        <div class="form-row">
                          <div class="col-md-7 d-md-block d-none text-md-right text-center" style="padding: 10px">
                            <span class="">{{ $item->first()->nombre_club }}</span>
                          </div>
                          <div class="col-md-5 d-block">
                            <img class="calendario img-fluid mx-auto d-block rounded-circle" src="/storage/logos/{{ $item->first()->logo }}" alt="">
                          </div>
                          <div class="col-md-7 d-md-none d-block text-md-right text-center" style="padding: 10px">
                              <span class="calendario_club">{{ $item->first()->nombre_club }}</span>
                          </div>
                        </div>
                      </td>
                      <td class="puntos">
                        <span class="puntos">{{ 1 }}</span>
                      </td>
                      <td class="puntos">
                            <span class="vs">{{ " vs " }}</span>
                      </td>
                      <td class="puntos">
                        <span class="puntos">{{ 2 }}</span>
                      </td>
                      <td style="max-width: 250px">
                        <div class="form-row">
                          <div class="col-md-5">
                            <img class="calendario img-fluid mx-auto d-block rounded-circle" src="/storage/logos/{{ $item->last()->logo }}" alt="">
                          </div>
                        {{-- </td style="width: 150px">
                            <td> --}}
                          <div class="col-md-7 text-md-left text-center" style="padding: 10px">
                            <span class="calendario_club">{{ $item->last()->nombre_club }}</span>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="table">
                      <th colspan="5" style="padding: 0%">
                        <div class="row">
                          <div class="form-group col-6 text-center">
                            @php
                              $date = new Date($item->last()->hora);
                              $hora = $date->format('h:i A');
                            @endphp
                            <span class="letter-size" style="color: grey">
                              <i class="material-icons">
                                  access_time
                              </i>
                              {{ $hora }}</span>
                          </div>
                          <div class="form-group col-6 text-center">
                            <a href="{{ $item->last()->ubicacion_centro }}" target="_blank" title="Ver en Google Maps">
                                <span class="letter-size">
                                  <i class="material-icons">
                                      place
                                  </i>{{ $item->last()->nombre_centro }}
                                </span></a>
                          </div>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              @endforeach
            @else
            {{--  COMPETICION  --}}
                
            @endif  
              
          </div>
        </div>
      </div>
      {{--  OTRO  --}}
      <div class="col-md-3">
        <div class="container-fluid" style="background: #C40F31; margin-block-end: 10px">
            <div class="div-title-sub container text-left">
                <a class="" href="#" style="text-decoration:none">
                  <h6 class="title-principal">avisos</h6>
                </a>
            </div>
        </div>
        <div style="{{--  max-height: 1000px ; overflow-y: auto  --}}">
          @foreach ($avisos as $item)
          <div class="card" style="margin-block-end: 10px">
            <div class="card-header" style="padding: 2px 20px">
              <table class="col-12">
                <thead>
                  @if ($item->id_gestion)
                    <tr>
                      <th class="">
                        <span class="letter-size"><i class="material-icons">
                            attach_file
                            </i>{{$item->gestion->nombre_gestion}}</span>
                      </th>
                    </tr>
                  @endif
                  {{--  @if ($item->id_disc)
                    <tr>
                      <th>
                        {{$item->disciplina->nombre_disc}}
                      </th>
                    </tr>
                  @endif  --}}
                  <tr>
                    <th class="text-center">
                     <span class="letter-size" style="color: #375B5B">{{ $item->titulo }}</span>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
            <div class="card-body text-justify" >
              <?= $item->contenido ?>
            </div>
            <div class="card-footer bg-white fecha" style="padding: 2px 20px ; color: #375B5B">
              {{ $item->fecha_hora_publicacion($item->fecha_ini_aviso , $item->hora_publicacion) }}
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
    {!! Html::script('/jquery-ui/external/jquery/jquery.js') !!}
    {!! Html::script('/jquery-ui/jquery-ui.js') !!}
    {!! Html::script('/js/resultados_home.js') !!}
@endsection