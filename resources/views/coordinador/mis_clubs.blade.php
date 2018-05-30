@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')
<h1>Mis Clubs</h1>
	<div class="container">
    <div class="col-md-12">
        <table class="table table-condensed">
              <thead>
                <th width="50px">ID</th>
                <th width="200px">Logo</th>
                <th colspan="2">Informacion</th>
                <th colspan="2">Acciones</th>
                
              </thead>
              <tbody>
                @foreach($mis_clubs as $club)
                  <tr>
                    <td rowspan="4">{{ $club->id_club}}</td>
                    <td rowspan="4"><img class="rounded mx-auto d-block" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 200px" width="200px"></td>
                  
                    <tr>
                      <td><h5>Nombre del club:</h5></td>
                      <td>{{ $club->club->nombre_club}}</td>
                      <td rowspan="4"><a href="{{ route('club.edit', $club->id_club) }}" class="btn btn-warning">Editar datos</a></td>
                      <td rowspan="4"><a href="{{ route('coordinador.show', $club->id_club) }}" class="btn btn-success">Ver jugadores</a></td>
                    </tr>
        
                    <tr>
                      <td><h5>Ciudad:</h5></td>
                      <td>{{ $club->club->ciudad}}</td>
                      

                    </tr>
                    <tr>
                      <td><h5>Descripcion:</h5></td>
                      <td>{{ $club->club->descripcion_club}}</td>
                    </tr>
                </tr>
                @endforeach
              </tbody>
        </table>
      </div>
  </div>
@endsection