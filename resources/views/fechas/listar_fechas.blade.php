@extends('plantillas.main')

@section('title')
    SisO - Lista de Fechas
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Fase:</h1>
    @include('fechas.modal_registrar_fecha')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFecha">Agregar</button>
</div>


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