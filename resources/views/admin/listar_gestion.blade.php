@extends('plantillas.main')

@section('title')
    SisO - Lista de Campeonatos
@endsection

@section('content')
<script language="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#C0C0C0';
    }
     
    // RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
    function RestablecerFila(id_fila) {
        document.getElementById(id_fila).style.backgroundColor = '#FFFFFF';
    }
     
    // CONVERTIR LAS FILAS EN LINKS
    function CrearEnlace(url) {
        location.href=url;
    }
</script>

@include('gestiones.modal_registrar_gestion')
<h1>Lista de Campeonatos:</h1>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGestion">Agregar</button>
	<table class="table table-condensed">
  		<thead>
  			<th>ID</th>
        <th>Nombre</th>
        <th>Fecha de Inicio</th>
  			<th>Fecha de Fin</th>
        <th>Descripcion</th>
  			<th>Acciones</th>
        <th>Permisos</th>
        <th>Clubs</th>
        <th>Disciplinas</th>
        
  		</thead>
  		<tbody>
  			@foreach($gestiones as $gestion)
        
  				<tr id="fila.{{ $gestion->id_gestion }}" onMouseOver="ResaltarFila('fila.{{ $gestion->id_gestion }}');" onMouseOut="RestablecerFila('fila.{{ $gestion->id_gestion}}')" onClick="CrearEnlace('{{ route('gestion.show',$gestion->id_gestion) }}');">
  					<td>{{ $gestion->id_gestion}}</td>
  					<td>{{ $gestion->nombre_gestion}}</td>
  					<td>{{ $gestion->fecha_ini}}</td>
            <td>{{ $gestion->fecha_fin}}</td>
  					<td>{{ $gestion->desc_gest}}</td>
            <td><a href="{{ route('gestion.edit',$gestion->id_gestion) }}" class="btn btn-info">Editar</a></td>
            <td><a href="{{ route('gestion.destroy',$gestion->id_gestion) }}" class="btn btn-danger">Eliminar</a></td>
            <td><a href="{{ route('gestion.clubs',$gestion->id_gestion) }}" class="btn btn-success">Ver</a></td>
            <td><a href="{{ route('gestion.disciplinas',$gestion->id_gestion) }}" class="btn btn-success">Disciplinas</a></td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
@endsection