@extends('plantillas.main')

@section('title')
    SisO - Lista de Fases
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Grupos:</h1>
    <a href="{{ route('grupo.create',$id_fase) }}" class="btn btn-primary">Agregar Grupo</a>
  </div> 
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
  		</thead>
  		<tbody>

  			@foreach($grupos as $grupo)
  				<tr>
  					<td>{{ $grupo->id_grupo}}</td>
            <td>{{ $grupo->nombre_grupo }}</td>
            <td><a href="" class="btn btn-success">ver grupos</a></td>
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>
@endsection