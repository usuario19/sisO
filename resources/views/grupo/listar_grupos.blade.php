@extends('plantillas.main')

@section('title')
    SisO - Lista de Grupos
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container">
<div class="card">
 @include('grupo.modal_agregar_grupos')
  <div class="content">
            <nav aria-label="breadcrumb" style="margin: 0%">
               <ol class="breadcrumb alert-info" style="margin:0%">
                  <li class="breadcrumb-item"><a href="{{ route('gestion.clasificacion',[$gestion->id_gestion]) }}">Disciplinas</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
                  <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
                 <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
               </ol>
            </nav>
        </div>
        <div class="card-body container col-md-10">
          <div class="table-responsive-xl">
              <table class="table table-sm table-bordered" style="margin: 0%; padding: 0%">
                    <thead>
                      <th>
                          <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                              <h4 class="" style="font-size: 18px">LISTA DE GRUPOS</h4>
                          </div>
                      </th>
                    </thead>
                  <tbody>
                  <tr> 
                        <td>
                            <div style="float: left;" class="form-group col-md-10">
                                {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                             </div>
                             <div style="float: left;" class="form-group col-md-2">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalGrupo">
                                            Agregar
                                    </button>
                            </div>
                        </td>
                  </tr>
                </tbody>
              </table>
          </div><br>
            <div class="table-responsive-xl">
                <table class="table table-condensed">
                    <thead>
                      <th colspan="1" width="50px" class="text-center">NO</th>
                      <th>Nombre</th>
                      <th>Encuentros</th>
                      <th colspan="2">Acciones</th>
                    </thead>
                    <tbody id="datos">
                        @php($i=1)
              
                      @foreach($grupos as $grupo)
                        <tr>
                          <td>{{ $i}}</td>
                          <td>{{ $grupo->nombre_grupo }}</td>
                          @if ($disciplina->tipo == 1)
                          <td><a href="{{ route('grupo.encuentros_grupo_competicion',[$grupo->id_grupo,$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}" 
                            ><i title="Competiciones" class="material-icons delete_button">
                              directions_run
                              </i></a></td>
                              
                          @else
                          <td><a href="{{ route('grupo.encuentros_grupo_equipo',[$grupo->id_grupo,$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}" 
                            ><i title="Encuentros" class="material-icons delete_button">
                                transfer_within_a_station
                                </i></a></td>
                          
                          @endif
                          <td style="width: 70px"><a href="" class="">
                              <i title="Editar" class="material-icons delete_button">edit</i>
                          </a></td>
                          <td style="width: 70px"><a href="{{ route('grupo.destroy',$grupo->id_grupo) }}" class="">
                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                          </a></td>
                        </tr>
                        @php($i++)

                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
  {{ $grupos->links() }}
@endsection
@section('scripts')
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection