@extends('plantillas.main')

@section('title')
    SisO - Lista de Administradores
@endsection

@section('content')
<div class="container">
    <div class="table-responsive-xl">
    
        <table class="table table-sm table-bordered">
          <thead>
            <th>
                <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                    <h4 class="">LISTA DE COORDINADORES</h4></td>
                </div>
            </th>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="form-row col-md-12">
                    <div{{--    style="float: left;"  --}} class="form-group col-xl-9">
                        {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                    </div>
    
                    <div{{--    style="float: left;"  --}} class="form-group col-xl-3">
                      
                      <div class="btn-group btn-block" style="margin: auto">
                            <button type="button_add" class="btn btn-warning btn-block" data-toggle="dropdown">
                                <div class="button-div" style="width: 200px">
                                    <i class="material-icons float-left" style="font-size: 18px">settings</i>
                                    <span class="letter-size">Registrar coordinador</span>
                                </div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalRegADmin">
                                
                                  <div class="button-item">
                                      <i class="material-icons float-left">
                                          person_add
                                       </i>
                                      <span class="letter-size">Crear nuevo coordinador</span>
                                  </div>
                                
                               </button>
                              <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalImportADmin">
                                  <div class="button-item">
                                      <i class="material-icons float-left">
                                          group_add
                                      </i>
                                      <span class="letter-size">Importar coordinadores de excel</span>
                                  </div>
                              </button>
                              
                            </div>
                      </div>
                    </div>
                </div>
                
                 @include('plantillas.forms.form_reg_admin_modal')
                 @include('plantillas.forms.form_import_admin_modal')
              </td>
            </tr>
          </tbody>
      </table>
    </div>
      <div class="table-responsive-xl">
        <table class="table table-sm table-hover">
              <thead>
                <th scope="col" width="50px">#</th>
                <th scope="col" width="100px">Foto</th>
                <th scope="col">CI</th>
                <th scope="col">Nombre</th>
                {{--  <th>Apellidos</th>  --}}
                <th scope="col">Genero</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha de<br> nacimiento</th>
                <th scope="col">Descripcion</th>
                {{--  <th>Acciones</th>  --}}
                <th scope="col">Permisos</th>
                
              </thead>
              <tbody id="datos">
                @foreach($usuarios as $usuario)
                  <tr class="link_pointer" style="cursor:pointer" data-href="{{ route('administrador.informacion',$usuario->id_administrador) }}">
                    <th scope="row">{{ $usuario->id_administrador}}</th>
                    <td data-href="{{ route('administrador.informacion',$usuario->id_administrador) }}"><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->foto_admin }}" alt="" height=" 70px" width="70px"></td>
                    <td>{{ $usuario->ci}}</td>
                    <td>{{ $usuario->nombre." ".$usuario->apellidos}}</td>
                    <td>@if($usuario->genero == "2")
                            {{ "Masculino" }}
                       @else
                             {{ "Femenino" }}
                       @endif
                    </td>
                    <td>{{ $usuario->email}}</td>
                    <td>{{ $usuario->fecha_nac}}</td>
                    <td>{{ $usuario->descripcion_admin}}</td>
                   {{--   <td><a href="{{ route('administrador.informacion',$usuario->id_administrador) }}" class="btn btn-warning">Editar</a></td>
                    <td><a href="{{ route('administrador.informacion',$usuario->id_administrador) }}" class="btn btn-success">Mas info</a></td>  --}}
                    <td class="text-center">
                      <a  href="#confirm?"  class="delete_button" data-toggle="modal" data-target="#exampleModal{{ $usuario->id_administrador }}" >
                          <i title="Eliminar" class="material-icons delete_button">
                              delete
                           </i>
                      </a>
                    </td>
                  </tr>
                  <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{ $usuario->id_administrador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                @endforeach
              </tbody>
        </table>
      </div>
</div>


@endsection
@section('scripts')
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
<script>
  
  $("#buttonClose , #close").click(function(event) {
    window.location.reload();
  });
</script>
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  {!! Html::script('/js/filtrar_por_nombre.js') !!}
  {!! Html::script('/js/validacion_ajax_request.js') !!}
  {!! Html::script('/js/validaciones.js') !!}

@endsection