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
        <div class="content">
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb alert-info" style="margin: 0%">
                  <li class="breadcrumb-item"><a href="{{ route('gestion.listar_clubs',$gestion->id_gestion) }}">Clubs</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $club->nombre_club }}</li>
                </ol>
              </nav>
          </div>
      <div class="card-header">
          
          <table class="table table-sm table-bordered" style="margin: 0%">
            <thead>
             
              <th>
                  <img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 70px" width="70px">
              
                {{$club->nombre_club}}
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
            
        
          <div class="table-responsive-xl">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="20px">ID</th>
                    <th width="100px">Foto</th>
                    <th width="50px">CI</th>
                    <th>Nombre</th>
        
                    <th>Genero</th>
                    <th>Correo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Descripcion</th>
                    <th colspan="3">Acciones</th>
                  </tr>
                  
                </thead>
            
                <tbody id="datos">
                  @php
                      $i = 1;
                  @endphp
                  @foreach($jugadores as $jugador)
                    <tr>
                      <td>
                          {{$i}}
                      </td>
                      {{-- <td>{{ $jugador->id_jugador}}</td> --}}
                      <td><img class="rounded-circle mx-auto d-block" src="/storage/fotos/{{ $jugador->foto_jugador }}" alt="" height=" 70px" width="70px"></td>
                      <td>{{ $jugador->ci_jugador}}</td>
                      <td>{{ $jugador->nombre_jugador." ".$jugador->apellidos_jugador}}</td>
                     
                      <td>@if($jugador->genero_jugador == "2")
                               {{ "Masculino" }}
                          @else
                                {{ "Femenino" }}
                          @endif
                      </td>
                      <td>{{ $jugador->email_jugador}}</td>
                      <td>{{ $jugador->fecha_nac_jugador}}</td>
                      <td>{{ $jugador->descripcion_jugador}}</td>
                      <td class="text-center" style="width: 70px"><a href="{{ route('jugador.edit',$jugador->id_jugador) }}" class="text-center">
                          <i title="Editar" class="material-icons delete_button text-center">edit</i>
                      </a>
                      </td>
                      <td style="width: 70px">
                        <a href="{{ route('coordinador.eliminar',[$jugador->id_jugador,$jugador->id_club]) }}"  class="text-center" data-toggle="modal" data-target="#Eliminar{{ $jugador->id_jugador}}" >
                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="Eliminar{{ $jugador->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">SisO:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
            
                              <div class="modal-body">
                                Esta seguro de querer eliminar al usuario?
                              </div>
            
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            
                                <a href={{ route('coordinador.eliminar',[$jugador->id_jugador,$jugador->id_club]) }} class="btn btn-primary">Eliminar</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <!--td>
                        <a href={{ route('seleccion.ver_seleccion',[$jugador->id_jugador,$jugador->id_club]) }} class="btn btn-info">Ver Participacion</a>
                      </td-->
                    </tr>
                    @php
                        $i++;
                    @endphp
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
   
    
    {{ $jugadores->links() }}
</div>



@endsection
@section('scripts')
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection
