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
    @include('admin.modal_registrar_disciplinas')
      <thead>
        <th width="50px">ID</th>
        <th width="100px">Logo</th>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Reglamento</th>
        <th>Descripcion</th>
        <th>Accion</th>
      </thead>
      <tbody>

        @foreach($disciplinas as $disciplina)
        
          <tr>
            <td>{{ $disciplina->id_disc}}</td>

            <td><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $disciplina->nombre_disc}}</td>
             @switch($disciplina->categoria)
                @case(0)
                    <td>{{ 'Mixto' }}</td>
                    @break
            
               @case(1)
                    <td>{{ 'Damas' }}</td>
                    @break
                    @case(2)
                    <td>{{ 'Varones' }}</td>
                    @break
            @endswitch
            <td><a href="storage/archivos/{{ $disciplina->reglamento_disc }}">Ver</td>
            <td>{{ $disciplina->descripcion_disc}}</td>
            <td><a href="{{ route('gestion.eliminar_disciplina',[$gestion->id_gestion,$disciplina->id_disc]) }}"><i title="Eliminar" class="material-icons">delete</i></a></td>
            
          </tr>
        @endforeach
      </tbody>
  </table>
@endsection