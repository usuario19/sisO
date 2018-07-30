@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    
      <h1>Lista de Clubs:</h1>

      {!! Form::open(['route'=>'grupo.store_club','method' => 'POST']) !!}
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#v">
                        Inscribir clubs
                      </button>
    
                      <!-- Modal -->
                      <div class="modal fade" id="v" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Agregar clubs</h5>
    
    
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
    
                              <h6>Seleccione los clubs que desea agregar:</h6><br>
    
                              
                              @foreach($clubsDisponibles as $club)

                                  {!! Form::checkbox('id_club',$club->id_club, false, ['class'=>'check_us']) !!}


                                  <img src="/storage/logos/{{ $club->logo }}" alt="" width="50px" height="50px">{{ $club->nombre_club }} <br>
                                  
                            

    
                              @endforeach
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              {!! Form::submit('Inscribirse', ['class'=>'btn btn-primary']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
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
  					<td>{{ $club->id_club}}</td>
            <td>{{ $club->nombre_club }}</td>
            <td><a href="" class="btn btn-success">Encuentros</a></td>
            <td><a href="" class="btn btn-danger">Eliminar</a></td>
           
  				</tr>
  			@endforeach
        
  		</tbody>
	</table>
@endsection