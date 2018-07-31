@extends('plantillas.main')

@section('title')
    SisO - Lista de Fechas
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Fase:</h1>
    
</div>


	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Encuentros</th>
        
  		</thead>
  		<tbody>

  			@foreach($fechas as $fecha)
  				<tr>
  					<td>{{ $fecha->id_fecha}}</td>
            <td>{{ $fecha->nombre_fecha}}</td>
            
            <td><a href="" class="btn btn-success">encuentros</a></td>
            <td><a href="" class="btn btn-success">eliminar</a></td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection