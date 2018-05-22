@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')
<h1>Gestriones en la que participo</h1>
	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th width="200px">CLUB</th>
        <th>Gestiones</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Acciones</th>
        
  		</thead>
  		<tbody>
  			@foreach($mis_clubs as $club)
  				<tr>
  					<td rowspan="{{ count($club->club->inscripciones)+1 }}">{{ $club->id_club}}</td>
            <td rowspan="{{ count($club->club->inscripciones)+1 }}">
                <div class="form-row">{{ $club->club->nombre_club}}</div>
                <div class="form-row">
                  <img class="rounded mx-auto d-block" src="/storage/logos/{{ $club->club->logo }}" alt="" height=" 100px" width="100px">
                </div>
            </td>
            
            @foreach($club->club->inscripciones as $inscripcion)

            <tr>
              <td>
                {{ $inscripcion->gestiones->id_gestion }}
                <div class="form-row">{{ $inscripcion->gestiones->nombre_gestion }}</div>
              </td>
              <td>
                <div class="form-row">{{ $inscripcion->gestiones->fecha_ini }}</div>
              </td>
              <td>
                <div class="form-row">{{ $inscripcion->gestiones->fecha_fin }}</div>
              </td>
              <td>
                <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#V">
                    Seleccionar disciplinas
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="V" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {{ $inscripcion->gestiones }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </td>
            </tr>
            @endforeach
				  </tr>
  			@endforeach
  		</tbody>
	</table>
@endsection