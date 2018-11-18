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
                          <h4 class="" style="font-size: 18px">CLUBS INSCRITOS</h4></td>
                      </div>
                  </th>
                  </thead>
              <tbody>
              <tr> 
                
                   
                    <td>
                            <div style="float: left;" class="form-group col-md-12">
                                    {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                                </div>
                    </td>
                   
                 
              </tr>
            </tbody>
          </table>
         
      </div>
        <div class="card-body">
           <div class="container table-responsive-xl">
              <table class="table table-condensed">
                  <thead class="">
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>Descripcion</th>        
                  </thead>
                  <tbody id="datos">
                        @foreach($clubs_inscritos as $club)
                        <tr id="fila.{{ $club->id_club }}" onMouseOver="ResaltarFila('fila.{{ $club->id_club }}');" onMouseOut="RestablecerFila('fila.{{ $club->id_club}}')" onClick="CrearEnlace('{{ route('club.listar_jugadores',[$gestion->id_gestion,$club->id_club]) }}');" style="cursor: pointer">
                            
                            <td>{{ $club->id_club}}</td>
                            <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 70px" width="70px"></td>
                            <td>{{ $club->nombre_club}}</td>
                            <td>{{ $club->ciudad}}</td>
                            <td>{{ $club->descripcion_club}}</td>
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
{!! Html::script('/js/filas.js') !!}
@endsection