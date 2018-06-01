@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')
<h1>Mis Clubs</h1>
	<div class="container">
    <div class="col-md-12 table-responsive-xl">
      @foreach($mis_clubs as $club)
        <table class="table table-sm">
          
              <thead>
                <tr class="table-primary">
                  <th width="50px">ID</th>
                  <th width="200px">Logo</th>
                  <th width="200px">Informacion</th>
                  <th width="300px"></th>
                  <th colspan="2"></th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td rowspan="4">{{ $club->id_club}}</td>
                    <td rowspan="4"><img class="rounded mx-auto d-block" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 200px" width="200px"></td>
                  </tr>
                  <tr>
                      <td><h6 class="display-6">Nombre del club:</h6></td>
                      <td>{{ $club->club->nombre_club}}</td>
                      <td rowspan="4"><a href="{{ route('club.edit', $club->id_club) }}" class="btn btn-warning">Editar datos</a></td>
                      <td rowspan="4"><a href="{{ route('coordinador.show', $club->id_club) }}" class="btn btn-success">Ver jugadores</a></td>
                  </tr>
        
                  <tr>
                      <td><h6>Ciudad:</h6></td>
                      <td>{{ $club->club->ciudad}}</td>
                      

                  </tr>
                  <tr>
                      <td><h6>Descripcion:</h6></td>
                      <td>{{ $club->club->descripcion_club}}</td>
                  </tr>
                
              </tbody>
        </table>
        @endforeach
      </div>
  </div>
@endsection