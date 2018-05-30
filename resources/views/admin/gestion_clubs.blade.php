@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')

  <h1 class="table-ligth" style="text-align: center;">{{ $gestion->nombre_gestion}}</h1>
<div class="form-row">
  <div class="col-md-6">

      <h4>Lista de clubs inscritos:</h4>
    <table class="table table-condensed table-striped">
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
          @endforeach
        </tbody>
  </table>
    
  </div>
  <div class="col-lg-6">
    <h4>Lista total de clubs:</h4>
      <table class="table table-condensed table-striped">
        <thead class="">
          <th>ID</th>
          <th>Logo</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Acciones</th>        
        </thead>
        <tbody>
          @foreach($clubs as $club)
            <tr>
              <td>{{ $club->id_club}}</td>
              <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 100px" width="100px"></td>
              <td>{{ $club->nombre_club}}</td>
              <td>{{ $club->descripcion_club}}</td>
              <td><a href="{{ route('club.inscribir',[$club->id_club,$gestion->id_gestion]) }}" class="btn btn-info">Agregar</a></td>
            </tr>
          @endforeach
        </tbody>
  </table>
  </div>
</div>
  
@endsection