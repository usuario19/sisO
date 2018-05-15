@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Disciplina:</h1>
    <a href="disciplina/create/" class="btn btn-primary">Agregar Disciplina</a>
  </div> 
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th width="100px">Logo</th>
  			<th>Nombre</th>
  			<th>Reglamento</th>
        <th>Descripcion</th>
        <th>Acciones</th>
  		</thead>
  		<tbody>

  			@foreach($disciplinas as $disciplina)
        
  				<tr>
  					<td>{{ $disciplina->id_disc}}</td>

            <td><img class="img-thumbnail" src="storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $disciplina->nombre_disc}}</td>

            <td><a href="storage/archivos/{{ $disciplina->reglamento_disc }}">Ver</td>
            <td>{{ $disciplina->descripcion_disc}}</td>

            <td><a href="{{ route('disciplina.edit',$disciplina->id_disc) }}" class="btn btn-info">Editar</a></td>
            <td><a href="{{ route('disciplina.destroy',$disciplina->id_disc) }}" onclick = "return Alert::info('Esta seguro de eliminar la disciplina,'jej')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection