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
                    <button href="" class="btn btn-link">
                        <i class="{{--  d-md-block float-left  --}} material-icons">
                            insert_chart_outlined
                        </i>
                        <span class="{{--  float-left d-md-block d-none  --}}">Tabla de posiciones</span>
                    </button>
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