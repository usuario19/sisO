@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs habilitados
@endsection
@section('submenu')
@endsection

@section('content')
<div class="form-row">
@include('plantillas.menus.menu_gestion')

<div class="margin_top col-md-9">
    <div class="">
      <div class="card-">
          @include('gestiones.modal_inscribir_clubs')
          <table class="table table-sm table-bordered" style="margin: 0%">
              <thead>
                  <th>
                      <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                          <h4 class="lista_sub">INSCRIPCION DE CLUBS</h4>
                      </div>
                  </th>
                  </thead>
              <tbody>
              <tr> 
                    @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                    
                    <td>
                    <div class="contenido_lista form-row">
                <div class="form-group col-xl-9">
                          {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                      </div>
            <div class="form-group col-xl-3">
            <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalAgregarclub">
                              <div class="button-div" style="width: 100px">
                                  <i class="material-icons float-left" style="font-size: 22px">add</i>
                                  <span class="letter-size">Agregar</span>
                              </div>
                          </button>
            </div>
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
        <div class="card-">
           <div class="table-responsive-xl">
              <table class="table mi_tabla table-sm table-bordered table-hover">
                  <thead>
                    <th width="30">ID</th>
                    <th width="50">Logo</th>
                    <th>Nombre</th>
                    <th width="150px">Descripcion</th>
                    <th width="50">Acciones</th>        
                  </thead>
                  <tbody id="datos">
                    @foreach($clubs_inscritos as $club)
                      <tr>
                        <td class="text-center">{{ $club->id_club}}</td>
                        <td class="text-center"><img class="mx-md-auto" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>
                        <td>{{ $club->nombre_club}}</td>
                        <td>{{ $club->descripcion_club}}</td>
                        <td class="text-center">
                        <a href="{{ route('club.desinscribir',[$club->id_club,$gestion->id_gestion]) }}" data-toggle="modal" class="button_delete" data-target="#Eliminar{{ $club->id_club }}">
                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                        </a>
                        <!-- Modal -->
                                        <div class="modal fade" id="Eliminar{{ $club->id_club}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header modal_advertencia">
                                                <h5 class="modal-title" id="exampleModalLabel">ADVERTENCIA:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
        
                                              <div class="modal-body">
                                                ¿Esta seguro de querer deshabilitar al club de esta Gestión?
                                              </div>
        
                                              <div class="modal-footer">
                                                <div class="form-group col-md-6">
                                                  <a href="{{ route('club.desinscribir',[$club->id_club,$gestion->id_gestion]) }}" class="btn btn-block btn-danger">Eliminar</a>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                </div>
        
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                        </td>
                      </tr>
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
{!! Html::script('/js/validacion_ajax_disc_reg.js') !!} 
{!! Html::script('/js/checkbox.js') !!}
@endsection