@extends('plantillas.main')

@section('title')
    SisO - Lista de gestiones
@endsection
@section('content')

    <div class="container-fluid" style="background: #C40F31">
        <div class="div-title-sub container text-left">
            <a class="" href="{{ route('principal.listar_disciplinas') }}" style="text-decoration:none"><h6 class="title-principal">disciplinas / {{$disciplina->nombre_tipo($disciplina->tipo)}}</h6></a>
        </div>
    </div>
    <div class="container-fluid" style="background: #ED1941">
        <div class="div-title-principal container text-center">
                <h1 class="title-principal">{{strtoupper($disciplina->nombre_disc)}}</h1>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="table-responsive-xl">
            <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                <table class="table table-borderless" style="margin: 0%">
                    <thead>
                        <th class="sub-title">informacion</th>
                    </thead>
                </table>
            </div><br> 
            <div class="row col-md-12 mx-auto">
                <div class="col-md-4">
                   
                            <div class="text-center" style="margin: 0 20px 20px 20px">
                                <img class="rounded mx-auto d-block" src="/storage/foto_disc/{{$disciplina->foto_disc}}" alt="" width="200px" height="200px">
                            </div>
                        
                </div>
                <div class="col-md-8">
                        <div class="card">
                                <div class="card-body">
                                    
                                    <table class="table table-borderless">
                                        <tbody>
                                            {{-- <tr>
                                                <th style="width: 200px">
                                                    nombre
                                                </th>
                                                <td>
                                                    <strong>{{strtoupper ($disciplina->nombre_disc)}}</strong>
                                                </td>
                                            </tr> --}}
                                            <tr>
                                                <th style="width: 100px">
                                                    categoria
                                                </th>
                                                <td>
                                                    <strong>{{strtoupper ($disciplina->nombre_categoria($disciplina->categoria))}}</strong> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    tipo
                                                </th>
                                                <td>
                                                    <strong>{{strtoupper($disciplina->nombre_tipo($disciplina->tipo))}}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    descripcion
                                                </th>
                                                <td>
                                                    <p class="text-justify">
                                                        <strong>{{$disciplina->descripcion_disc}}</strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    reglamento
                                                </th>
                                                <td>
                                                        <strong><a href="/storage/archivos/{{ $disciplina->reglamento_disc }}">
                                        
                                                            <div class="button-div" style="">
                                                                <i class="material-icons float-left">vertical_align_bottom</i>
                                                                <span class="">Reglamento descargar</span>
                                                            </div></a></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-xl">
            <div class="col-md-12" style="border-block-end: solid 2px #D0D3D4">
                <table class="table table-borderless" style="margin: 0%">
                    <thead>
                        <th class="sub-title"></th>
                    </thead>
                </table>
            </div>
            <br>
            {{--  <div class="card">
                <div class="card-body">

                </div>
            </div>  --}}
            
        </div>
    </div>

    @include('sweetalert::cdn') 
 @include('vendor.sweetalert.view') 
@endsection
  

