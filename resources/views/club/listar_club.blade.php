@extends('plantillas.main')
@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')
@include('club.modal_reg_club')
<div class="container">
    <div class="form-row">
        <div class="form-group col-md-12">
          <table class="table table-sm table-bordered">
              <thead>
                  <th>
                      <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                          <h4 class="">LISTA DE CLUBS</h4></td>
                      </div>
                  </th>
                  </thead>
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
            <table class="table">
              <thead>
                <th width="50px">ID</th>
                <th width="100px">Logo</th>
                
                <th scope="col">Nombre</th>
                <th scope="col">Coordinador</th>
                <th scope="col">Ciudad</th>
                <th width="50px" scope="col">Descripcion</th>
                <th scope="col" colspan="2" >Acciones</th>  
              </thead>
      
              <tbody id="datos">
                @foreach($clubs as $club)
                  <tr>
                    <td scope="row">{{ $club->id_club}}</td>            
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
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
       {{ $clubs->links() }}
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

@section('scripts')
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/vista_previa.js') !!}

@endsection

