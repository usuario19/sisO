@extends('plantillas.main')
@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')

<div class="container">
    @include('club.modal_reg_club')
    @include('club.modal_edit_club')
 
          <table class="table table-sm table-bordered">
              <thead>
                  <th>
                      <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                          <h4 class="lista">LISTA DE CLUBS</h4>
                      </div>
                  </th>
              </thead>
              <tbody>
                <tr> 
                  <td>
                    <div class="contenido_lista form-row">
                      <div class="form-group col-xl-9">
                          {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                      </div>
                      <div class="form-group col-xl-3">
                          <button type="button_add" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal">
                              <div class="button-div" style="width: 100px">
                                  <i class="material-icons float-left" style="font-size: 22px">add</i>
                                  <span class="letter-size">Agregar</span>
                              </div>
                          </button>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
          </table>
    
          <div class="table-responsive-xl">
            <table class="mi_tabla table table-hover">
              @php($i=1)
              <thead>
                <th width="50px">NO</th>
                <th width="100px">Logo</th>
                <th>Nombre</th>
                <th>Alias</th>
                <th>Coordinador</th>
                <th>Ciudad</th>
                <th width="150px">Descripcion</th>
                <th colspan="2" >Acciones</th>  
              </thead>
      
              <tbody id="datos">
                @foreach($clubs as $club)
                  <tr class="link_pointer" style="cursor:pointer" data-href="{{ route('club.show', $club->id_club) }}">
                    <td scope="row">{{ $i }}</td>            
                    <td data-href="{{ route('coordinador.show', $club->id_club) }}">
                      <img class="rounded mx-auto d-block float-left img_foto" src="/storage/logos/{{ $club->logo}}" alt="">
                    </td>
                    <td>{{ $club->nombre_club}}</td>
                    <td>{{ $club->alias_club}}</td>
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
                    
                        <a href="{{ route('club.destroy',$club->id_club) }}" class="button_delete" data-toggle="modal" data-target="#exampleModal{{ $club->id_club }}">
                            <i title="Eliminar" class="material-icons delete_button button_redirect">
                                delete
                             </i>
                        </a>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{ $club->id_club}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header modal_advertencia">
                          <h5 class="modal-title" id="exampleModalLabel">advertencia:</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body modal_advertencia">
                          ¿Esta seguro de querer eliminar el club?
                        </div>
                        <div class="modal-footer">
                           <div class="col-6">
                             <a href="{{ route('club.destroy',$club->id_club) }}" class="btn btn-danger btn-block btn_eliminar"> Eliminar </a>
                           </div>
                           <div class="col-6">
                             <a class="btn btn-outline-secondary btn-block" data-dismiss="modal">No</a>
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @php($i++)
                @endforeach
              </tbody>
            </table>
         
      {{ $clubs->links() }}
</div>
</div>
@endsection



@section('scripts')

<script> 
    var Mostrar = function(id){
      $(".spinner-grow").show();
      $.each($('#form_update').find(':input'),function(){
        $("#form_update").find(':input[name='+ $(this).attr('name')+']').removeClass('is-invalid');
        $("#form_update").find(':input[name='+ $(this).attr('name')+']').removeClass('is-valid');
      });
        $("#nombre_club").val("");
        $("#edit_alias").val("");
        $('#imgOrigen2').attr('src', "");
        $("#edit_descripcion").val("");
      var route = "{{ url('club') }}/"+id+"/edit";
      $.get(route, function(data){
        //console.log(data);
        $("#edit_id_club").val(data.id_club);
        //alert("/storage/logos/"+data.logo);
        $("#nombre_club").val(data.nombre_club);
        $("#edit_alias").val(data.alias_club);
        $("#edit_administrador").val(data.id_administrador);
        $("#edit_ciudad").val(data.ciudad);
        var url = '/storage/logos/'+data.logo
        var file = $.get(url);
            $('#imgOrigen2').attr('src', url);
        $("#edit_descripcion").val(data.descripcion_club);
        $(".spinner-grow").hide();
      });
    }
    </script>
    <script>
    (function(){
      window.addEventListener("load", inicializarEventos, false);
      function inicializarEventos(){
        tr = document.getElementsByClassName("link_pointer");
          for(var i =0; i<tr.length;i++)
            tr[i].addEventListener("click", redirect, false);
      }
      function redirect(e){
        elemento = e.target;
        if(elemento.className.indexOf('delete_button') == -1)
         {
            window.location = elemento.parentNode.getAttribute('data-href');
            {{--  console.log(e.target)
            console.log(elemento.parentNode.getAttribute('data-href'));  --}}
          }
       {{--   console.log(elemento);  --}}
      }
    }())
  </script>
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  {!! Html::script('/js/reset_inputs.js') !!}
  {!! Html::script('/js/validacion_ajax_request_club.js') !!}
  {!! Html::script('/js/validacion_ajax_request_club_update.js') !!}
@endsection

