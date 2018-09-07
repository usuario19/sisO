@extends('plantillas.main')
@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')
@include('club.modal_reg_club')

<div class="form-row">
  <div class="form-group col-md-12">
    <h4>Lista de Clubs:</h4>
    <table class="table table-bordered">
        <tbody>
        <tr> 
          <td>
           <div style="float: left;" class="form-group col-md-10">
              {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
           </div>
           <div style="float: left;" class="form-group col-md-2"><button type="button" class="btn  btn-block btn-primary" data-toggle="modal" data-target="#modal">Agregar</button></div>
           </td>
        </tr>
      </tbody>
  </table>
    
  </div>

  <div class="table-responsive">
    <table class="table table-sm table-bordered">
      <thead>
        <th width="50px">ID</th>
        <th width="100px">Logo</th>
         
        <th scope="col">Nombre</th>
        <th scope="col">Coordinador</th>
        <th scope="col">Ciudad</th>
        <th width="50px" scope="col">Descripcion</th>
        <th scope="col" >Acciones</th>  
      </thead>

      <tbody id="datos">
        @foreach($clubs as $club)
          <tr>
            <td scope="row">{{ $club->id_club}}</td>            
            <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $club->nombre_club}}</td>
            <td>{{ $club->nombre." ".$club->apellidos}}</td>
            
            
            <td>{{ $club->ciudad}}</td>
            <td>{{ $club->descripcion_club}}</td>

            <td><a onclick="Mostrar({{ $club->id_club }});"  class="btn btn-primary" data-toggle="modal" data-target="#edit">Editar</a>
             
                <a href="{{ route('club.destroy',$club->id_club) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
            </td>
  				</tr>
  			@endforeach
  		</tbody>
	</table>
</div>
</div>
 {{ $clubs->links() }}
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

@section('scripts')

  {!! Html::script('/js/script.js') !!}
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/vista_previa.js') !!}

@endsection

