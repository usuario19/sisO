@extends('plantillas.main')

@section('title')
    SisO - Lista de Fases
@endsection

@section('submenu')
@endsection

@section('content')
    @include('fases.modal_reg_fase')
<div class="form-row">
@include('plantillas.menus.menu_gestion')

<div class="margin_top col-md-9">
    <div class="">
      <div class="card-">
        <div class="content">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb alert-info" style="margin:0%">
              <li class="breadcrumb-item"><a href="{{ route('gestion.clasificacion',[$gestion->id_gestion]) }}">Disciplinas</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
            </ol>
          </nav>
        </div>
        <div class="card-body container col-md-12">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered" style="margin: 0%">
                        <thead>
                            <th>
                                <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                                    <h4 class="lista" style="font-size: 18px">LISTA DE FASES</h4></td>
                                </div>
                            </th>
                        </thead>
                        <tbody>
                        <tr> 
                          <td>
                          <div class="contenido_lista form-row">
                <div class="form-group col-xl-9">
                          {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                      </div>
            <div class="form-group col-xl-3">
            <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalFase">
                              <div class="button-div" style="width: 100px">
                                  <i class="material-icons float-left" style="font-size: 22px">add</i>
                                  <span class="letter-size">Agregar</span>
                              </div>
                          </button>
            </div>
                </div>
                              
                          </td>
                          
                        </tr>
                    </tbody>
                  </table>
                </div>
                  
            <div class="table-responsive">
              <br>
              <table class="text-center table-hover table table-bordered">
                  <thead>
                    <th {{--  colspan="2"  --}} width="50px" class="text-center">NO</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Grupos</th>
                    <th colspan="2">Acciones</th>
                  </thead>
                  <tbody id="datos">
                    @php($i=1)
                    @foreach($fases as $fase)
                      <tr>
                        <td>{{ $i}}</td>

                        <td>{{ $fase->nombre_fase }}</td>
                        <td>{{ $fase->nombre_tipo}}</td>
                        @if ($fase->nombre_tipo == 'series')
                          <td style="width: "><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">
                            <i title="Grupos" class="material-icons delete_button">
                              group
                              </i></a></td>
                        @else
                          @if ($fase->nombre_tipo == 'eliminacion' && $disciplina->tipo == 0)
                              <td style="width: "><a href="{{ route('fase.encuentros_eliminacion_equipo',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">
                              <i title="Grupo" class="material-icons delete_button">
                                person
                                </i></a></td>
                          @else
                            <td style="width: "><a href="{{ route('fase.encuentros_eliminacion_competicion',[$fase->id_fase,$disciplina->id_disc,$gestion->id_gestion]) }}">
                              <i title="Grupo" class="material-icons delete_button">
                                person
                                </i></a></td>
                          @endif
                        @endif
                      
                            <td style="width: 70px"><a href="{{ route('fase.destroy',$fase->id_fase) }}">
                              <i title="Eliminar" class="material-icons delete_button">delete</i>
                            </td>
                              <td style="width: 70px"><a href="{{ route('fase.destroy',$fase->id_fase) }}"><i title="Editar" class="material-icons delete_button">edit</i></td>
                        
                      </tr>
                    @php($i++)

                    @endforeach
                    
                  </tbody>
              </table>
            </div>
            
             
        </div>
      </div>
   
</div>
</div>
</div>

@endsection
@section('scripts')
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  {!! Html::script('/js/reset_inputs.js') !!}
  {!! Html::script('/js/validacion_reg_fase.js') !!}
@endsection