@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')
<br>
<h1 style="font-size: 30px" class="display-3">Mis Clubs:</h1>
<br>
	<div class="container col-md-10">
    <div class="col-md-12 table-responsive-xl">
      @foreach($mis_clubs as $club)
      <div class="title-table">
        <h3 class="display-4">{{ $club->club->nombre_club}}</h3>
      </div>

        <table class="table table-sm table-bordered">
          
              <thead>
                <!--tr class="">
                  <!--th width="50px">ID</th>
                  <th width="200px">Logo</th>
                  <th width="200px">Informacion</th>
                  <th width="300px"></th>
                  <th class="bg-info" colspan="3"><h3 align="center" style="font-size: 40px;" class="display-4">{{ $club->club->nombre_club}}</h3></th>
                </tr-->
              </thead>
              <tbody>
                  <tr>
                    <!--td rowspan="4">{{ $club->id_club}}</td-->
                    <td colspan="3"><img class="rounded mx-auto d-block" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 200px" width="200px">
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div align="right">
                        <a href="{{ route('club.edit', $club->id_club) }}" class="btn btn-outline-warning">Informacion</a>
                      </div>
                    </td>
                    <td>
                      <div>
                        <a href="{{ route('coordinador.show', $club->id_club) }}" class="btn btn-outline-success">Ver Jugadores</a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                      <td><h6 align="right" class="display-6">Club:</h6></td>
                      <td colspan="2">{{ $club->club->nombre_club}}</td>
                  </tr>
        
                  <tr>
                      <td><h6 align="right">Ciudad:</h6></td>
                      <td colspan="2">{{ $club->club->ciudad}}</td>
                  </tr>
                  <tr>
                      <td><h6 align="right">Descripcion:</h6></td>
                      <td colspan="2">{{ $club->club->descripcion_club}}</td>
                  </tr>
                
              </tbody>
        </table>
        <br><br><br>
        @endforeach

      </div>
  </div>
@endsection