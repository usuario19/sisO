@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection
@section('submenu')

@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="form-row">
  <div class="col-md-12">
      <h4>Lista de jugadores:</h4>
    <table class="table table-condensed table-striped">
        <thead class="">
          <th>ID</th>
          <th>Foto</th>
          <th>CI</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Genero</th>        
          <th>Fecha Nacimiento</th>        
          <th>Correo</th>        
          <th>Descripcion</th>        
        </thead>
        <tbody>
          @foreach($jugadores as $jugador)
          <tr>
              <td>{{ $jugador->id_jugador}}</td>
              <td><img class="img-thumbnail" src="/storage/logos/{{ $jugador->foto}}" alt="" height=" 100px" width="100px"></td>
              <td>{{ $jugador->ci_jugador}}</td>
              <td>{{ $jugador->nombre_jugador}}</td>
              <td>{{ $jugador->apellido_jugador}}</td>
              <td>{{ $jugador->genero_jugador}}</td>
              <td>{{ $jugador->fecha_nac_jugador}}</td>
              <td>{{ $jugador->email_jugador}}</td>
              <td>{{ $jugador->descripcion_jugador}}</td>
          </tr>
          @endforeach
        </tbody>
  </table>
    
  </div>
</div>
  
@endsection