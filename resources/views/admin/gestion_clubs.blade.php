@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection
@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarclub">Agregar</button>
@include('gestiones.modal_inscribir_clubs')
<div class="form-row">
  <div class="col-md-12">
      <h4>Clubs inscritos:</h4>
  </div>
</div>
    <table class="table table-condensed">
        <thead class="">
          <th>ID</th>
          <th>Logo</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Acciones</th>        
        </thead>
        <tbody>
          @foreach($clubs_inscritos as $club)
            <tr>
              <td>{{ $club->id_club}}</td>
              <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 100px" width="100px"></td>
              <td>{{ $club->nombre_club}}</td>
              <td>{{ $club->descripcion_club}}</td>
              <td><a href="{{ route('club.desinscribir',[$club->id_club,$gestion->id_gestion]) }}" class="btn btn-danger">Retirar</a></td>
            </tr>
          @endforeach
        </tbody>
  </table>
@endsection