@extends('plantillas.main')

@section('title')
    SisO - Lista de gestiones
@endsection

@section('content')
<div class="container-fluid" style="background: #E74C3C">
    <div class="div-title-principal container text-center">
        <h1 class="title-principal">GESTIONES</h1>
    </div>
</div>

<script language="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = 'rgb(229, 235, 235)';
    }
     
    // RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
    function RestablecerFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#FFFFFF';
    }
     
    // CONVERTIR LAS FILAS EN LINKS
    function CrearEnlace(url) {
        location.href=url;
    }
</script>
<div class="container">
    <div class="table-responsive-xl">
        <table class="table table-condensed">
            @php
                $now=Date::now()->format('Y');
            @endphp
            <thead>
                    <tr>
                        <th colspan="2" class="text-center">
                            <h2  style="margin-top: 20px">
                                {{$now}}
                            </h2>
                        </th>
                    </tr>
            @foreach($gestiones->sortByDesc('fecha_ini') as $gestion)
                @php
                    $date = new Date($gestion->fecha_ini);
                @endphp
                
                @if ( $date->format('Y') != $now)
                    @php
                        $now=$date->format('Y');
                    @endphp
                    <tr>
                            <th colspan="2" class="text-center">
                                <h2  style="margin-top: 20px">
                                    {{$now}}
                                </h2>
                            </th>
                        </tr>
                @endif
            </thead>
              <tbody>
                 
            
                      <tr id="fila.{{ $gestion->id_gestion }}" onMouseOver="ResaltarFila('fila.{{ $gestion->id_gestion }}');" onMouseOut="RestablecerFila('fila.{{ $gestion->id_gestion}}')" onClick="CrearEnlace('{{ route('principal.gestion_info',$gestion->id_gestion) }}');" style="cursor:pointer">
                          {{--  <td>{{ $gestion->id_gestion}}</td>  --}}
                          <td class="text-right" style="width: 50%"><strong>{{ strtoupper ($gestion->nombre_gestion)}}</strong></td>
                          <td class="" style="width: 50%">
                            @php
                                $date_ini = new Date($gestion->fecha_ini);
                                $date_fin = new Date($gestion->fecha_fin);
                            @endphp
                            <strong>De {{ ($date_ini->format('j F Y')." a ".$date_fin->format('j F Y'))}}</strong>
                            {{-- <strong>Fecha de Inicio : </strong>{{''.$gestion->fecha_ini}}</td>
                <td><strong>Fecha de Inicio : </strong>{{''.$gestion->fecha_fin}} --}}
                            </td>
                          
               
                
                      </tr>
                 
              </tbody>
              @endforeach
        </table>
    </div>
</div>


    @include('sweetalert::cdn') 
 @include('vendor.sweetalert.view') 
@endsection
  

