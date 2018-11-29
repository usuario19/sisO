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
                             {{--  <button type="button" class="btn   btn-primary" data-toggle="modal" data-target="#modal">Agregar</button></div>  --}}
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
                    <th width="50px">ID</th>
                    <th width="100px">Logo</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Reglamento</th>
                    <th>Descripcion</th>
                    <th>Accion</th>
                  </thead>
                  <tbody id="datos">
            
                    @foreach($disciplinas as $disciplina)
                    
                      <tr>
                        <td>{{ $disciplina->id_disc}}</td>
            
                        <td><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 40px" width="40px"></td>
                        <td>{{ $disciplina->nombre_disc}}</td>
                         @switch($disciplina->categoria)
                            @case(0)
                                <td>{{ 'Mixto' }}</td>
                                @break
                        
                           @case(1)
                                <td>{{ 'Mujeres' }}</td>
                                @break
                                @case(2)
                                <td>{{ 'Hombres' }}</td>
                                @break
                        @endswitch
                        <td><a href="storage/archivos/{{ $disciplina->reglamento_disc }}">
                          <div class="button-div" style="">
                              <i class="material-icons float-left">vertical_align_bottom</i>
                              <span class="letter-size">Descargar</span>
                          </div>
                        </td>
                        <td>{{ $disciplina->descripcion_disc}}</td>
                        <td><a href="{{ route('gestion.eliminar_disciplina',[$gestion->id_gestion,$disciplina->id_disc]) }}">
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

@endsection
@section('scripts')
{!! Html::script('/js/filtrar_por_nombre.js') !!}
{!! Html::script('/js/checkbox.js') !!}
@endsection