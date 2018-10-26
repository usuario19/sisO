@extends('plantillas.main')

@section('title')
    SisO - Lista de Fases
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
@include('fases.modal_reg_fase')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h5>{{ $disciplina->nombre_disc }}</h5> 
  </div> 
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFase">Agregar</button>
<h4>Lista de fases:</h4>
	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Grupos</th>
        <th>Fechas</th>
  		</thead>
  		<tbody>

  			@foreach($fases as $fase)
  				<tr>
  					<td>{{ $fase->id_fase}}</td>
            <td>{{ $fase->nombre_fase }}</td>
            <td>{{ $fase->nombre_tipo}}</td>
            <td><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn-success">ver</a></td>
            <td><a href="{{ route('fecha.listar_fechas',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn-success">ver</a></td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection
