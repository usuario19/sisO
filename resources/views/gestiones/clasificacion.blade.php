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
        <th>Categoria</th>
        <th>Descripcion</th>

      </thead>
      <tbody>

        @foreach($disciplinas as $disciplina)
        
          <tr>
             <tr id="fila.{{ $disciplina->id_disc }}" onMouseOver="ResaltarFila('fila.{{ $disciplina->id_disc }}');" onMouseOut="RestablecerFila('fila.{{ $disciplina->id_disc}}')" onClick="CrearEnlace('{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}');">
            
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
            <td>{{ $disciplina->descripcion_disc}}</td>
           
            
          </tr>
        @endforeach
      </tbody>
  </table>
@endsection
@section('scripts')
  {!! Html::script('/js/filas.js') !!}
@endsection

