@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')

@include('gestiones.modal_registrar_ganadores')
<div class="container">
    <div class="card">
      <div class="card-header">
          <table class="table table-sm table-bordered" style="margin: 0%">
              <thead>
                  <th>
                      <div class=" container col-md-12 text-center" style="padding: 10px 0px">
                          <h4 class="" style="font-size: 18px">DISCIPLINAS PARTICIPANTES</h4></td>
                      </div>
                  </th>
                  </thead>
              <tbody>
              <tr> 
                
                    @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                    <td>
                        <div style="float: left;" class="form-group col-md-12">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
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
                    <th>Ganadores</th>
                  </thead>
                  <tbody id="datos">
            
                    @foreach($disciplinas as $disciplina)
                    
                      <tr>
                        <td>{{ $disciplina->disciplina->id_disc}}</td>
            
                        <td><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->disciplina->foto_disc }}" alt="" height=" 40px" width="40px"></td>
                        <td>{{ $disciplina->disciplina->nombre_disc}}</td>
                         @switch($disciplina->disciplina->categoria)
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
                        <td>
                            @if ($disciplina->disciplina->tiene_ganadores($disciplina->id_disc,$gestion->id_gestion) == 0)
                                {{--  <a href="{{ route('gestion.definir_ganadores',[$gestion->id_gestion,$disciplina->id_disc]) }}">
                                    <i title="Registrar ganadores" class="material-icons delete_button">star_border</i>
                                </a>  --}}
                                <a href=" " onclick="RegistrarGanadores({{$disciplina->disciplina->id_disc}});"  class="button_delete" data-toggle="modal" data-target="#modalGanadores">
                                        <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                                                star_border
                                        </i>
                                </a>
                            @else
                                <a href="{{ route('gestion.mostrar_ganadores',[$gestion->id_gestion,$disciplina->disciplina->id_disc]) }}">
                                    <i title="Ganadores" class="material-icons delete_button">star</i>
                                </a>
                            @endif
                            
                        
                        </td>
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