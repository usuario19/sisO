@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
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
                          <h4 class="" style="font-size: 18px">INSCRIPCION DE CLUBS</h4></td>
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
                               
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAgregarclub">Agregar</button>
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
          @include('gestiones.modal_inscribir_clubs')
      </div>
        <div class="card-body">
           <div class="container table-responsive-xl">
              <table class="table table-condensed">
                  <thead class="">
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>        
                  </thead>
                  <tbody id="datos">
                    @foreach($clubs_inscritos as $club)
                      <tr>
                        <td>{{ $club->id_club}}</td>
                        <td><img class="img-thumbnail mx-md-auto" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>
                        <td>{{ $club->nombre_club}}</td>
                        <td>{{ $club->descripcion_club}}</td>
                        <td class="text-center"><a href="{{ route('club.desinscribir',[$club->id_club,$gestion->id_gestion]) }}" class="">
                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                        </a></td>
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
{!! Html::script('/js/checkbox.js') !!}
@endsection