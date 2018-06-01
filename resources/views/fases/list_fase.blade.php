@extends('plantillas.main')

@section('title')
    SisO - Lista de Fases
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Fase:</h1>
    <a href="{{ route('fase.create',[$id_disc,$id_gestion]) }}" class="btn btn-primary">Agregar Fase</a>
  </div> 
</div>
	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Grupos</th>
  		</thead>
  		<tbody>

  			@foreach($fases as $fase)
  				<tr>
  					<td>{{ $fase->id_fase}}</td>
            <td>{{ $fase->nombre_fase }}</td>
            <td>{{ $fase->nombre_tipo}}</td>
            <td><a href="{{ route('fase.listar_grupos',$fase->id_fase) }}" class="btn btn-success">ver grupos</a></td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection