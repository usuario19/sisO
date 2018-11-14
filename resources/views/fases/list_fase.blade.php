@extends('plantillas.main')

@section('title')
    SisO - Lista de Fases
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
@include('fases.modal_reg_fase')
<div class="content">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('gestion.clasificacion',[$gestion->id_gestion]) }}">Disciplinas</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
    </ol>
  </nav>
</div>
<div class="content">
    <div class="form-group col-md-12 form-inline">
        <h4>Lista de fases:</h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFase">Agregar</button>
     </div>
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Grupos</th>
        <th colspan="2">Acciones</th>
  		</thead>
  		<tbody>

  			@foreach($fases as $fase)
  				<tr>
  					<td>{{ $fase->id_fase}}</td>
            <td>{{ $fase->nombre_fase }}</td>
            <td>{{ $fase->nombre_tipo}}</td>
            @if ($fase->nombre_tipo == 'series')
              <td><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}"><i title="Grupos" class="material-icons">
                  group
                  </i></a></td>
            @else
            <td><a href="{{ route('fase.eliminacion_encuentro',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}"><i title="Grupo" class="material-icons">
                group
                </i></a></td>
            @endif
          
                <td><a href="{{ route('fase.destroy',$fase->id_fase) }}"><i title="Eliminar" class="material-icons">delete</i></td>
                  <td><a href="{{ route('fase.destroy',$fase->id_fase) }}"><i title="Editar" class="material-icons">edit</i></td>
            
  				</tr>
        @endforeach
        
  		</tbody>
	</table>
@endsection
