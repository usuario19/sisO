@extends('plantillas.main')

@section('title')
    SisO - Lista de gestiones
@endsection
@section('content')

    <div class="container-fluid" style="background: #F39C12">
        <div class="div-title-principal container text-center" {{--  style="padding-left: 100px"  --}}>
            <h4 class="title-principal">avisos</h4>
        </div>
    </div><br>
    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    ADMINISTRADOR
                                </th>
                            </tr>
                            <tr>
                                <th style=50%>Campeonato</th>
                                <th>disciplina</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-body"></div>
                <div class="card-footer"></div>
                <div class=""></div>
            </div>
        </div>

    </div>
    {{--  <div class="container-fluid" style="background: #ED1941">
        <div class="div-title-principal container text-center">
                <h1 class="title-principal">{{strtoupper($disciplina->nombre_disc)}}</h1>
        </div>
    </div>  --}}
    

    @include('sweetalert::cdn') 
 @include('vendor.sweetalert.view') 
@endsection
  

