@extends('plantillas.main')
@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')

<div class="container-fluid" style="background: #00447B">
    <div class="div-title-principal container text-center">
        <h1 class="title-principal">CLUBS</h1>
    </div>
</div>
<br>
<div class="container">
        <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                <table class="table table-borderless" style="margin: 0%">
                    <thead>
                        <th id="ordenar_nombre" class="link-change text-right" style="width: 50%"><span>Ordenar por nombre</span></th>
                        <th id="ordenar_ciudad" class="link-change" style="width: 50%">
                            <span>Ordenar por ciudad</span>
                        </th>
                    </thead>
                </table>
            </div>
            <br>
</div>
  <div class="container">
    <div id="nombre" class="table-responsive-xl">
      <div class="col-md-12 mx-auto">
          <div class="form-row">
              @foreach($clubs->sortBy('nombre_club') as $club)
              <div class="col-md-2">
                      <a class="title-span" href="{{ route('principal.club_info',$club->id_club) }}">
                          <div class="text-center" style="margin: 20px">
                              <img class="rounded-circle mx-auto d-block" src="/storage/logos/{{ $club->logo}}" alt="" width="100px" height="100px">
                              <br><span>{{ $club->nombre_club}}</span><br>
                              <span>{{ $club->ciudad}}</span>
                          </div>
                      </a>
                </div>
              @endforeach
          </div>
      </div>
  </div>
  <div id="ciudad" class="table-responsive-xl" style="display: none">
        <div class="col-md-12 mx-auto">
            <div class="form-row">
                @foreach($clubs->sortBy('ciudad') as $club)
                <div class="col-md-3">
                        <a class="title-span" href="{{ route('principal.club_info',$club->id_club) }}">
                            <div class="text-center" style="margin: 20px">
                                <img class="rounded-circle mx-auto d-block" src="/storage/logos/{{ $club->logo}}" alt="" width="100px" height="100px">
                                <br><span>{{ $club->nombre_club}}</span><br>
                                <span>{{ $club->ciudad}}</span>
                                
                            </div>
                        </a>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

  {{-- {!! Html::script('/js/script.js') !!} --}}
  {{--  {!! Html::script('/js/filtrar_por_nombre.js') !!} --}}
  {!! Html::script('/js/ordenar.js') !!}

@endsection

