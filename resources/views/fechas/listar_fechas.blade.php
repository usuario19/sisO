@extends('plantillas.main')

@section('title')
    SisO - Lista de Fechas
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
     <a href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}">{{ $disciplina->nombre_disc }}/</a>
      <a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">{{ $fase->nombre_fase }}/</a>
</div>
@include('fechas.modal_registrar_fecha')
<h4>Lista de Fechas:</h4>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFecha">Agregar</button>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
        
  		</thead>
  		<tbody>

  			@foreach($fechas as $fecha)
  				<tr>
  					<td>{{ $fecha->id_fecha}}</td>
            <td>{{ $fecha->nombre_fecha}}</td>
            
           
            <td><a href="{{ route('fecha.destroy',$fecha->id_fecha) }}" class="btn btn-danger">eliminar</a></td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection