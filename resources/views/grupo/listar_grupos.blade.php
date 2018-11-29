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
                              <h4 class="" style="font-size: 18px">LISTA DE GRUPOS</h4></td>
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
                                   
                                <a href="{{ route('grupo.create',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn-primary btn-block">Agregar</a>
                             </div>
                        </td>
                  </tr>
                </tbody>
              </table>
          </div><br>
            <div class="table-responsive-xl">
                <table class="table table-condensed">
                    <thead>
                      <th colspan="2" width="50px" class="text-center">#</th>
                      <th>Nombre</th>
                      <th>Encuentros</th>
                      <th colspan="2">Acciones</th>
                    </thead>
                    <tbody id="datos">
              
                      @foreach($grupos as $grupo)
                        <tr>
                          <td></td>
                          <td>{{ $grupo->id_grupo}}</td>
                          <td>{{ $grupo->nombre_grupo }}</td>
                          @if ($disciplina->tipo == 1)
                          <td><a href="{{ route('grupo.listar_clubs_competicion',[$grupo->id_grupo,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}" class="btn btn-success">Competicion</a></td>
                              
                          @else
                          <td><a href="{{ route('grupo.listar_clubs',[$grupo->id_grupo,$gestion->id_gestion,$disciplina->id_disc,$fase->id_fase]) }}" class="btn btn-success">Encuentros</a></td>
                          
                          @endif
                          <td style="width: 70px"><a href="" class="">
                              <i title="Editar" class="material-icons delete_button">edit</i>
                          </a></td>
                          <td style="width: 70px"><a href="{{ route('grupo.destroy',$grupo->id_grupo) }}" class="">
                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                          </a></td>
                        </tr>
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