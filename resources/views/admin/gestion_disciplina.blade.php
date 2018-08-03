@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection
@section('submenu')

@include('plantillas.menus.menu_gestion')
@endsection
@section('content')
<h4>Diciplinas participantes</h4>
	 <table class="table table-condensed">
      <thead>
        <th width="50px">ID</th>
        <th width="100px">Logo</th>
        <th>Nombre</th>
        <th>Reglamento</th>
        <th>Descripcion</th>
        <th>Fases</th>
      </thead>
      <tbody>

        @foreach($disciplinas as $disciplina)
        
          <tr>
            <td>{{ $disciplina->id_disc}}</td>

            <td><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $disciplina->nombre_disc}}</td>

            <td><a href="storage/archivos/{{ $disciplina->reglamento_disc }}">Ver</td>
            <td>{{ $disciplina->descripcion_disc}}</td>
            <td><a href="{{ route('disciplina.fases',[$disciplina->id_disc,$gestion->id_gestion]) }}" class="btn btn-info">fases</a></td>
            
          </tr>
        @endforeach
      </tbody>
  </table>
@endsection