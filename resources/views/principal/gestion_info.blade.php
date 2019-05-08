@extends('plantillas.main')

@section('title')
    SisO - Lista de gestiones
@endsection

@section('content')

    <div class="container" style="background: #E74C3C">
        <div class="div-title-sub container text-left">
            <a class="" href="{{ route('gestion.mostrar_principal') }}" style="text-decoration:none"><h6 class="title-principal">GESTIONES</h6></a>
        </div>
    </div>
    <div class="container" style="background: #CB4335">
        <div class="div-title-principal container text-center">
                <h1 class="title-principal">{{strtoupper($gestion->nombre_gestion)}}</h1>
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

<div class="container" style="margin-top: 20px">
    <div class="table-responsive-xl">
            <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                <table class="table table-borderless" style="margin: 0%">
                    <thead>
                        <th class="lista_sub">informacion</th>
                    </thead>
                </table>
            </div>
            <br>
        <div class="col-md-6 mx-auto">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>
                            sede
                        </th>
                        <td>
                            <strong>{{strtoupper ($gestion->sede)}}</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            fecha
                        </th>
                        <td>
                                @php
                                $date_ini = new Date($gestion->fecha_ini);
                                $date_fin = new Date($gestion->fecha_fin);
                                @endphp
                                    <strong>{{strtoupper ($date_ini->format('j F Y')." - ".$date_fin->format('j F Y'))}}</strong> 
                        </td>
                    </tr>
                    <tr>
                            <th>
                                descripcion
                            </th>
                            <td>
                                <p class="text-justify">
                                    <strong>{{$gestion->desc_gest}}</strong>
                                </p>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="table-responsive-xl">
            <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                <table class="table table-borderless" style="margin: 0%">
                    <thead>
                        <th class="lista_sub">disciplinas</th>
                    </thead>
                </table>
            </div>
        <div class="col-md-12 mx-auto">
            <div class="form-row">
                @foreach ($gestion->participaciones as $participacion)
                    @foreach ($participacion->disciplina as $item)
                        
                    @endforeach
                <div class="col-md-3">
                        <a class="title-span" title="Ver resultados" href="">
                            <div class="text-center" style="margin: 20px">
                                <img class="rounded mx-auto d-block" src="/storage/foto_disc/{{$participacion->disciplina->foto_disc}}" alt="" width="100px" height="100px">
                                <br><span>{{$participacion->disciplina->nombre_disc}}</span>
                                <span>{{$participacion->disciplina->nombre_categoria($participacion->disciplina->categoria)}}</span><br>
                                <span>{{$participacion->disciplina->nombre_subcateg($participacion->disciplina->sub_categoria)}}</span>
                                
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="table-responsive-xl">
            <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                <table class="table table-borderless" style="margin: 0%">
                    <thead>
                        <th class="sub-title">clubs</th>
                    </thead>
                </table>
            </div>
        <div class="col-md-12 mx-auto">
            <div class="form-row">
                @foreach ($gestion->inscripciones as $inscripcion)
                <div class="col-md-3">
                        <a class="title-span" href="">
                            <div class="text-center" style="margin: 20px">
                                <img class="rounded-circle mx-auto d-block" src="/storage/logos/{{$inscripcion->admin_club->club->logo}}" alt="" width="100px" height="100px">
                                <br><span>{{$inscripcion->admin_club->club->nombre_club}}</span><br>
                                <span>{{$inscripcion->admin_club->club->ciudad}}</span>
                                
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--  <div class="table-responsive-xl">
        <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
            <table class="table table-borderless" style="margin: 0%">
                <thead>
                    <th class="sub-title">
                        GALERIA
                    </th>
                </thead>
            </table>
        </div>
    </div>  --}}
</div>

    @include('sweetalert::cdn') 
 @include('vendor.sweetalert.view') 
@endsection
  

