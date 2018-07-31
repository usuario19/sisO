@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    
      <h1>Lista de Clubs:</h1>
@include('grupo.modal_agregar_equipos')
      
                          
  </div> 
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th>Nombre</th>
        <th>Encuentros</th>
  		</thead>
  		<tbody>

  			@foreach($clubs as $club)
  				<tr>
  					<td>{{ $club->id_club }}</td>
            <td>{{ $club->nombre_club }}</td>
            <td><a href="{{ route('grupo.eliminar_club',[$club->id_grupo,$club->id_club_part]) }}" class="btn btn-danger">Eliminar</a></td>
           
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>
   <h1>Lista de Fechas:</h1>
  <table class="table table-condensed">
      <thead>
        <th width="50px">ID</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Ubicacion</th>
        <th>Observacion</th>
        <th>Resultado</th>
      </thead>
      <tbody>

        @foreach($clubs as $club)
          <tr>
            <td>{{ $club->id_club }}</td>
            <td>{{ $club->nombre_club }}</td>
            <td><a href="{{ route('grupo.eliminar_club',[$club->id_grupo,$club->id_club_part]) }}" class="btn btn-danger">Eliminar</a></td>
           
          </tr>
        @endforeach
        
      </tbody>
  </table>
@endsection