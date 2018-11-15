@extends('plantillas.main')

@section('title')
    SisO - Disciplinas
@endsection

@section('content')   
<div class="container">
    <div class="table-responsive">
            @foreach($datos as $dato)
            <div class="container">
                    <h1  class="display-1" style="font-size: 14px; margin:0 0 15px 0"><a href="{{ route('coordinador.mis_gestiones')}}">Gestiones </a>{{" | ".$dato->nombre_gestion}}</h1>
            </div>
            <div class="container col-md-12">
                
                <div class="card">
                    <div class="card-header text-center" style="padding: 5px">
                        <th class="display-4" style="font-size:18px">{{ strtoupper($dato->nombre_gestion) }}</th>
                    </div>
                        <div class="card-body" style="padding: 0px">
                            <table class="table table-borderless" style="margin: 0%">
                                <tr>
                                    <th style="width:100px" class="text-center">
                                        <img src="/storage/logos/{{ $dato->logo }}" alt=""{{-- width="50px" --}} height="80px">
                                    </th>
                                    <th>
                                        <p  class="display-4" style="font-size:18px; font-weight: bold; padding: 20px 0px">{{ strtoupper($dato->nombre_club) }}</p>
                                    </th>
                                </tr>

                            </table>
                            
                        </div>
                </div>
               
            </div>
            @endforeach
            <div class="container col-md-12">
                @yield('content_info')
            </div>
    </div>
</div>

@endsection
@section('scripts')
  {!! Html::script('/js/checkbox.js') !!}
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection