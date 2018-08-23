@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('content')
@include('disciplina.modal_agregar_disc')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h4>Lista de Disciplinas:</h4>
    
   
  </div> 
</div>

	<table class="table table-condensed">
  		<thead>
  			<th width="50px">ID</th>
        <th width="100px">Logo</th>
        <th>Nombre</th>
  			<th>Categoria</th>
  			<th>Reglamento</th>
        <th>Descripcion</th>
        <th>Acciones</th>
  		</thead>
  		<tbody>

  			@foreach($disciplinas as $disciplina)
        
  				<tr>
  					<td>{{ $disciplina->id_disc}}</td>

            <td><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 100px" width="100px"></td>
            <td>{{ $disciplina->nombre_disc}}</td>
            @switch($disciplina->categoria)
                @case(0)
                    <td>{{ 'Mixto' }}</td>
                    @break
            
               @case(1)
                    <td>{{ 'Damas' }}</td>
                    @break
                    @case(2)
                    <td>{{ 'Varones' }}</td>
                    @break
            @endswitch
            
            <td><a href="storage/archivos/{{ $disciplina->reglamento_disc }}">Ver</td>
            <td>{{ $disciplina->descripcion_disc}}</td>

            <td><a onclick="MostrarDisc({{ $disciplina->id_disc }});"  class="btn btn-primary" data-toggle="modal" data-target="#modalEditDisc">Editar</a></td>

            <td><a href="{{ route('disciplina.destroy',$disciplina->id_disc) }}" onclick = "return Alert::info('Esta seguro de eliminar la disciplina,'jej')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a></td>
            
            

  				</tr>
  			@endforeach
  		</tbody>
	</table>
@include('disciplina.modal_editar_disc')

<script> 
var MostrarDisc = function(id){
  var route = "{{ url('disciplina') }}/"+id+"/edit";
  $.get(route, function(data){
    $("#edit_id_disc").val(data.id_disc);
    $("#edit_nombre_disc").val(data.nombre_disc);
    //$("#edit_administrador").val(data.id_administrador);
    $("#edit_categoria").val(data.categoria);
    var url = '/storage/foto_disc/'+data.foto_disc
    var file = $.get(url);
        $('#imgOrigenEditDisc').attr('src', url);

    //var urlReglamento = '/storage/archivos/'+data.reglamento_disc
    //var reglamento = $.get(urlReglamento);
    //    $('#edit_reglamento_disc').attr('src', urlReglamento);
    $("#edit_descripcion_disc").val(data.descripcion_disc);
  });
}
</script>
@endsection