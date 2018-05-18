
@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Clubs:</h1>
    <a href="club/create/" class="btn btn-primary">Agregar Club</a>
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
  					<td>{{ $club->admin_clubs}}</td>
  					<td>{{ $club->ciudad}}</td>
            <td>{{ $club->descripcion_club}}</td>

            <td><a href="{{ route('club.edit',$club->id_club) }}" class="btn btn-info">Editar</a></td>
            <td><a href="{{ route('club.destroy',$club->id_club) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>         
            <!-- <td><a href="">Inscribir</a></td> -->
            {!! Form::open(['route'=>'club.inscribir','method' => 'POST' ,'enctype' => 'multipart/form-data'] ) !!}
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gestion{{ $club->id_club }}" data-whatever="@fat">Campeonatos</button></td>
            
              <div class="modal fade" id="gestion{{ $club->id_club }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Campeonatos disponibles</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
  
                      
                      <div class="form-row" style = "display:none">
                        
                        {!! Form::text('id_club', $club->id_club, ['class'=>'form-control']) !!}
                      </div>
                        
                      @foreach ($gestiones as $gestion)
                    {!! Form::checkbox('id_gestion[]',$gestion->id_gestion, false, []) !!}
                        {!! Form::label('gestion',$gestion->nombre_gestion, []) !!}
                      @endforeach
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      {!! Form::submit('Inscribir', ['class'=>'btn btn-primary']) !!}
                      
                    </div>
                  </div>
                </div>
              </div>
                        
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>
@endsection