@extends('plantillas.main') 
@section('title') SisO - Lista de clubs
@endsection
 
@section('content')
<div class="form-row">
    @include('plantillas.menus.menu_gestion')

    <div class="margin_top col-md-9">
        <div class="">
            <div class="row">
                <div class="form-group col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>

                        </ol>
                    </nav>
                </div>
                <div class="form-group col-md-12">
                        <nav class="navbar navbar-expand-lg menu">
                                <ul class="navbar-nav btn-block">
                                  <li class="nav-item link eliminacion col-md-4">
                                    <a class="nav-link link  active col-md-12" href="{{ route('fase.clubs_eliminacion_competicion',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">1. Selecccionar Participantes <span class="sr-only">(current)</span></a>
                                  </li>
                                  <li class="nav-item link eliminacion col-md-4">
                                    <a class="nav-link link  col-md-12" href="{{ route('fase.fechas_eliminacion_competicion',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">2. Crear fechas</a>
                                  </li>
                                  <li class="nav-item link eliminacion col-md-4">
                                    <a class="nav-link link    col-md-12" href="{{ route('fase.encuentros_eliminacion_competicion',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">3. Registrar encuentros</a>
                                  </li>
                                </ul>
                        </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card-">
                <div class="form-row container">
                    <div class="form-group col-md-9">
                        <h4 class="lista_sub">Lista de Clubs:</h4>
                    </div>
                    <div class="form-group col-md-3">
                        <button type="button_add" class="btn btn-primary btn-block" data-toggle="modal" data-target="#v">
                                <div class="button-div" style="width: 100px">
                                    <i class="material-icons float-left" style="font-size: 22px">add</i>
                                    <span class="letter-size">Agregar</span>
                                </div>
                            </button>
                        {{--  <button class="btn btn-primary " data-toggle="modal" data-target="#v">
                            Agregar
                        </button>  --}}
                    </div>
                </div>
                {{--  @include('encuentro.modal_agregar_resultado_competicion')  --}}

                @include('fases.modal_agregar_equipos_eliminacion')
                <div class="table-responsive-xl">
                        <table class="table table-sm table-bordered">
                                <thead>
                                    <th width="50">ID</th>
                                    <th colspan="2">Club</th>
                                    <th colspan="2">Jugador</th>
                                    <th width="50">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($jugadores as $jugador)
                                    <tr>
                                        <td>{{ $jugador->id_jugador }}</td>
                                        <td><img class="img-thumbnail" src="/storage/fotos/{{ $jugador->foto_jugador}}" alt="" height=" 50px" width="50px"></td>
                                        <td>{{ $jugador->nombre_jugador }}</td>
                                        <td><a {{--  href="{{ route('fase.eliminar_club_eliminacion',[$fase->id_fase,$jugador->id_club_part]) }}"  --}}><i title="Eliminar" class="material-icons delete_button">delete</i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
                
            </div>
        </div>
@endsection
@section('scripts') 
{!! Html::script('/js/filtrar_por_nombre.js') !!} 
{!! Html::script('/js/validacion_ajax_disc_reg.js')
!!} {!! Html::script('/js/checkbox.js') !!}
@endsection