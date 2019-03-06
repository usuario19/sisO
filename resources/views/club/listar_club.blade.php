@extends('plantillas.main')
@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')
@include('club.modal_reg_club')
      @include('club.modal_edit_club')
<div class="container">
    
  <div class="card">
      
    <div class="card-header">
          <table class="table table-sm table-bordered">
              <thead>
                  <th>
                      <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                          <h4 class="">LISTA DE CLUBS</h4>
                      </div>
                  </th>
                  </thead>
              <tbody>
              <tr> 
                <td>
                 <div style="float: left;" class="form-group col-md-10">
                    {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                 </div>
                 <div style="float: left;" class="form-group col-md-2"><button type="button" class="btn  btn-block btn-warning" data-toggle="modal" data-target="#modal">Agregar</button></div>
                 </td>
              </tr>
            </tbody>
          </table>
    </div>
    <div class="card-body">
          <div class="container table-responsive-xl">
            <table class="table table-bordered">
              @php($i=1)
              <thead>
                <th width="50px">NO</th>
                <th width="100px">Logo</th>
                <th>Nombre</th>
                <th>Coordinador</th>
                <th>Ciudad</th>
                <th width="150px">Descripcion</th>
                <th colspan="2" >Acciones</th>  
              </thead>
      
              <tbody id="datos">
                @foreach($clubs as $club)
                  <tr>
                    <td scope="row">{{ $i }}</td>            
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>
                    <td>{{ $club->nombre_club}}</td>
                    <td>{{ $club->nombre." ".$club->apellidos}}</td>
                    
                    
                    <td>{{ $club->ciudad}}</td>
                    <td>{{ $club->descripcion_club}}</td>
      
                    <td class="text-center" style="width: 100px">
                      <a href=" " onclick="Mostrar({{ $club->id_club }});"  class="button_delete" data-toggle="modal" data-target="#edit">
                        <i title="Editar" class="material-icons delete_button button_redirect">
                            edit
                         </i>
                      </a>
                    </td>
                    <td class="text-center" style="width: 100px">
                    
                        <a href="{{ route('club.destroy',$club->id_club) }}" class="button_delete">
                            <i title="Eliminar" class="material-icons delete_button button_redirect">
                                delete
                             </i>
                        </a>
                    </td>
                  </tr>
                  @php($i++)
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
      {{ $clubs->links() }}
    </div>
       
      </div>
@endsection
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


@section('scripts')
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/vista_previa.js') !!}

@endsection

