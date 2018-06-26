
@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Clubs:</h1>
    <a href="club/create/" class="btn btn-primary" data-toggle="modal" data-target="#modal">Agregar Club</a>
  </div>
</div>
  <table class="table table-condensed">
      <thead>
        <th width="50px">ID</th>
        <th width="100px">Logo</th>
        <th>Nombre</th>
        <th>Coordinador</th>
        <th>Ciudad</th>
        <th>Descripcion</th>
        <th>Acciones</th>
      </thead>

      <tbody>
        @foreach($clubs as $club)
          <tr>
            <td>{{ $club->id_club}}</td>            
            <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $club->nombre_club}}</td>
            <td>{{ $club->nombre." ".$club->apellidos}}</td>
            <td>{{ $club->ciudad}}</td>
            <td>{{ $club->descripcion_club}}</td>
            <td><a href="{{ route('club.edit',$club->id_club) }}" class="btn btn-info">Editar</a></td>
            <td><a href="{{ route('club.destroy',$club->id_club) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>     
  				</tr>
  			@endforeach
  		</tbody>
	</table>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

@endsection