@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
          <table class="table table-sm table-bordered" style="margin: 0%">
              <thead>
                  <th>
                      <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                          <h4 class="" style="font-size: 18px">DISCIPLINAS HABILITADAS</h4></td>
                      </div>
                  </th>
                  </thead>
              <tbody>
              <tr> 
                    @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                    <td>
                        <div style="float: left;" class="form-group col-md-10">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                         </div>
                         <div style="float: left;" class="form-group col-md-2">
                               
                            @include('admin.modal_registrar_disciplinas')
                         </div>
                    </td>
                    @else
                    <td>
                        <div style="float: left;" class="form-group col-md-12">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                        </div>
                    </td>
                    @endif
              </tr>
            </tbody>
          </table>
      </div>
        <div class="card-body">
          <div class="table-responsive-xl">
              <table class="table table-condensed">
                  <thead>
                    <th width="50px">#</th>
                    <th width="100px">Logo</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Reglamento</th>
                    <th width="150px">Descripcion</th>
                    <th>Accion</th>
                  </thead>
                  <tbody id="datos">
                    @php($i=1)
                    @foreach($disciplinas as $disciplina)
                      <tr>
                        <td>{{ $i}}</td>
                        <td><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 40px" width="40px"></td>
                        <td>{{ $disciplina->nombre_disc}}</td>
                         @switch($disciplina->categoria)
                            @case(0)
                                <td>{{ 'Mixto' }}</td>
                                @break
                        
                           @case(1)
                                <td>{{ 'Damas' }}</td>
                                @break
                                @case(2)
                                <td>{{ 'Varones' }}</td>
                                @break
                        @endswitch
                        <td><a href="storage/archivos/{{ $disciplina->reglamento_disc }}">
                          <div class="button-div" style="">
                              <i title="Descargar" class="material-icons delete_button">vertical_align_bottom</i>
                          </div>
                        </td>
                        <td> {{ $disciplina->descripcion_disc}}</td>
                        <td><a  href="" data-toggle="modal" data-target="#modalEliminar{{ $disciplina->id_disc }}">
                          <i title="Eliminar" class="material-icons delete_button">delete</i>
                        </a></td>
                        {{--  modal eliminar  --}}
      <div class="modal fade" id="modalEliminar{{ $disciplina->id_disc}}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarLabel">Advertencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Esta seguro de eliminar?
              </div>
              <div class="modal-footer">
                <div class="row col-md-12">
                  <div class="form-group col-md-6">
                 <a href="{{ route('gestion.eliminar_disciplina',[$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn_aceptar btn-block"> Aceptar </a>

                  </div>
                  <div class="form-group col-md-6">
                      <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">cancelar</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        {{--  fin de modal eliminar  --}}
                      </tr>
                      @php($i++)
                    @endforeach
                  </tbody>
              </table>
          </div>
            
        </div>
      </div>
</div>

@endsection
@section('scripts')
{!! Html::script('/js/filtrar_por_nombre.js') !!}

@endsection