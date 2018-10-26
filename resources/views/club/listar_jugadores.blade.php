@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection
@section('submenu')

@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<h1>Lista de Jugadores:</h1>
<table class="table table-sm table-bordered">
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

  <div class="table-responsive-xl">
    <table class="table table-sm table-bordered">
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
          @foreach($jugadores as $jugador)
            <tr>
              <td>{{ $jugador->id_jugador}}</td>
              <td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $jugador->foto_jugador }}" alt="" height=" 80px" width="80px"></td>
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
              <td><a href="{{ route('jugador.edit',$jugador->id_jugador) }}" class="btn btn-warning">Editar</a></td>
              <td>
                <a href="{{ route('coordinador.eliminar',[$jugador->id_jugador,$jugador->id_club]) }}"  class="btn btn-danger" data-toggle="modal" data-target="#Eliminar{{ $jugador->id_jugador}}" >Eliminar</a>
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
          @endforeach
        </tbody>
      </table>
  </div>

 {{ $jugadores->links() }}
@endsection
@section('scripts')
  {!! Html::script('/js/script.js') !!}
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection
