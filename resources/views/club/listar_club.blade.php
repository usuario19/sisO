@extends('plantillas.main')
@section('title')
    SisO - Lista de Clubs
@endsection
@include('club.modal_reg_club')
@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Clubs:</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">Agregar</button>
  </div>
  <table class="table table-condensed">
      <thead>
        <th width="50px">ID</th>
        <th width="100px">Logo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Coordinador</th>
        <th scope="col">Ciudad</th>
        <th width="50px" scope="col">Descripcion</th>
        <th scope="col" >Acciones</th>  
      </thead>

      <tbody>
        @foreach($clubs as $club)
          <tr>
            <td scope="row">{{ $club->id_club}}</td>            
            <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 100px" width="100px"></td>
            <td scope="row">{{ $club->nombre_club}}</td>
            <td scope="row">{{ $club->nombre." ".$club->apellidos}}</td>
            <td scope="row">{{ $club->ciudad}}</td>
            <td scope="row">{{ $club->descripcion_club}}</td>

            <td scope="row"><a href="{{ route('club.edit',$club->id_club) }}" class="btn btn-info">Editar</a>
              <a onclick="Mostrar({{ $club->id_club }});"  class="btn btn-primary" data-toggle="modal" data-target="#edit">Editar2</a>
             
                <a href="{{ route('club.destroy',$club->id_club) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
            </td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
</div>
@include('club.modal_edit_club')
<script> 
var Mostrar = function(id){
  var route = "{{ url('club') }}/"+id+"/edit";
  $.get(route, function(data){
    $("#edit_id_club").val(data.id_club);
    //alert("/storage/logos/"+data.logo);
    $("#nombre_club").val(data.nombre_club);
    $("#edit_administrador").val(data.id_administrador);
    $("#edit_ciudad").val(data.ciudad);
    var url = '/storage/logos/'+data.logo
    var file = $.get(url);
        $('#imgOrigen2').attr('src', url);
    $("#edit_descripcion").val(data.descripcion_club);
  });
}
</script>
@endsection
