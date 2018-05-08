@extends('plantillas.main')

@section('title')
    SisO - Lista de Usuarios
@endsection

@section('content')
<h1>Lista de Administradores:</h1>
	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th width="100px">Foto</th>
        <th>CI</th>
  			<th>Nombre</th>
  			<th>Apellidos</th>
        <th>Genero</th>
        <th>Correo</th>
        <th>Fecha <br> nacimiento</th>
        <th>Descripcion</th>
  			<th>Acciones</th>
        <th>Permisos</th>
        
  		</thead>
  		<tbody>
  			@foreach($usuarios as $usuario)
  				<tr>
  					<td>{{ $usuario->id_administrador}}</td>
            <td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $usuario->ci}}</td>
  					<td>{{ $usuario->nombre}}</td>
  					<td>{{ $usuario->apellidos}}</td>
            <td>@if($usuario->genero == "0")
                     {{ "Masculino" }}
                @else
                      {{ "Femenino" }}
                @endif
            </td>
            <td>{{ $usuario->email}}</td>
            <td>{{ $usuario->fecha_nac}}</td>
  					<td>{{ $usuario->descripcion_admin}}</td>
            <td><a href="{{ route('administrador.edit',$usuario->id_administrador) }}" class="btn btn-warning">Editar</a></td>
            <td>
              <a href="#confirm?"  class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >Eliminar</a>
             

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SisO:</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Esta seguro de querer eliminar al usuario?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                       <a href="{{ route('administrador.destroy',$usuario->id_administrador) }}" class="btn btn-primary"> Eliminar </a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection