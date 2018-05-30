@extends('plantillas.main')

@section('title')
    SisO - Lista de Fases
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Fase:</h1>
    <a href="{{ route('fase.create') }}" class="btn btn-primary">Agregar Fase</a>
  </div> 
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
  			<th>Grupos</th>
  		</thead>
  		<tbody>

  			@foreach($fases as $fase)
  				<tr>
  					<td>{{ $fase->id_fase}}</td>
            <td>{{ $fase->nombre_fase }}</td>
            <td><a href="{{ route('grupo.index') }}" class="btn btn-primary">ver grupos</a></td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection