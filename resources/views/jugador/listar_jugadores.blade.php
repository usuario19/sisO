@extends('plantillas.main') 
@section('title') SisO - Lista de jugadores
@endsection
 
@section('content')
<div class="container">
  <div class="table-responsive-xl">

    <table class="table table-sm table-bordered">
      <thead>
        <th>
          <div class=" container col-md-10 text-center" style="padding: 10px 0px">
            <h4 class="lista">LISTA DE JUGADORES</h4>
            </td>
          </div>
        </th>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="contenido_lista form-row">
              <div class="form-group col-md-9">
                {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
              </div>
              <div class="form-group col-md-3">
                <div class="btn-group btn-block" style="margin: auto">
                  <button type="button_add" class="btn btn-warning btn-block" data-toggle="dropdown">
                              <div class="button-div" style="width: 170px">
                                  <i class="material-icons float-left">settings</i>
                                  <span class="letter-size">Registrar jugador</span>
                              </div>
                          </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalRegJugador">
                              
                                <div class="button-item">
                                    <i class="material-icons float-left">
                                        person_add
                                     </i>
                                    <span class="letter-size">Crear nuevo jugador</span>
                                </div>
                              
                             </button>
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalImportJugador">
                                <div class="button-item">
                                    <i class="material-icons float-left">
                                        group_add
                                    </i>
                                    <span class="letter-size">Importar jugadores de excel</span>
                                </div>
                            </button>

                  </div>

                </div>
              </div>
            </div>
  @include('plantillas.forms.form_reg_jugador_modal')
  @include('plantillas.forms.form_import_jugador_modal')
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table-responsive-xl">

    <table class="mi_tabla table table-hover">
      <thead>
        <th scope="col" width="50px">#</th>
        <th scope="col" width="100px">Foto</th>
        <th scope="col">CI</th>
        <th scope="col">Nombre</th>
        {{--
        <th>Apellidos</th> --}}
        <th scope="col">Genero</th>
        <th scope="col">Correo</th>
        <th scope="col">Fecha de<br> nacimiento</th>
        <th scope="col">Descripcion</th>
        {{--
        <th>Acciones</th> --}}
        <th scope="col" colspan="3">Permisos</th>

      </thead>
      <tbody id="datos">
        @foreach($usuarios as $usuario)
        <tr class="link_pointer" style="cursor:pointer" data-href="{{ route('jugador.informacion',$usuario->id_jugador) }}">
          <th scope="row">{{ $usuario->id_jugador}}</th>
          <td data-href="{{ route('jugador.informacion',$usuario->id_jugador) }}"><img class="rounded-circle mx-auto d-block img_foto" src="/storage/fotos/{{ $usuario->foto_jugador }}" alt=""></td>
          <td>{{ $usuario->ci_jugador}}</td>
          <td>{{ $usuario->nombre_jugador." ".$usuario->apellidos_jugador }}</td>
          {{--
          <td>{{ $usuario->apellidos_jugador}}</td> --}}
          <td>@if($usuario->genero_jugador == "2") {{ "Masculino" }} @else {{ "Femenino" }} @endif
          </td>
          <td>{{ $usuario->email_jugador}}</td>
          <td>{{ $usuario->fecha_nac_jugador}}</td>
          <td>{{ $usuario->descripcion_jugador}}</td>
          {{--
          <td><a href="{{ route('jugador.edit',$usuario->id_jugador) }}" class="btn btn-warning">Editar</a></td> --}} @if(Auth::User()->tipo
          == 'Administrador')

          <td class="text-center" style="width: 100px">
            <a class="button_redirect button_delete" data-toggle="modal" data-target="#Inscribirse{{ $usuario->id_jugador}}">
                      <i title="Añadir a Club" class="material-icons delete_button button_redirect">
                        group_add
                      </i>
                    </a>
          </td>
          @endif

          <td class="text-center" style="width: 100px">
            <a href="" class="button_delete button_redirect" data-toggle="modal" data-target="#Eliminar{{ $usuario->id_jugador}}">
                      <i title="Eliminar" class="material-icons delete_button button_redirect">
                          delete
                       </i>
                  </a>
          </td>
        </tr>
        <!-- Modal Eliminar -->
        <div class="modal fade" id="Eliminar{{ $usuario->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-" role="document">
            <div class="modal-content">
              <div class="modal-header modal_advertencia">
                <h5 class="modal-title" id="exampleModalLabel">Advertencia:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>

              <div class="modal-body">
                ¿Esta seguro de querer eliminar al usuario?
              </div>

              <div class="modal-footer">
                <div class="col-6">
                  <a href="{{ route('jugador.destroy',$usuario->id_jugador) }}" class="btn btn-danger btn-block btn_eliminar"> Eliminar </a>
                </div>
                <div class="col-6">
                  <a class="btn btn-outline-secondary btn-block" data-dismiss="modal">Cancelar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal cambiar de club -->
        {!! Form::open(['route'=>'jugador_club.store','method' => 'POST','class'=>'form_reg_jugClub','id'=>'reg_jugClub'.$usuario->id_jugador])
        !!}
        <div class="modal fade" id="Inscribirse{{ $usuario->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title us_nombre" id="exampleModalLabel"> {{ "Registrar a "}}<span class='modal_us_nombre'>{{ $usuario->nombre_jugador." ".$usuario->apellidos_jugador }}</span>{{
                  " en el Club:" }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>

              <div class="modal-body">


                <div class="form-row noVista">
                  <div class="form-group col-md-12">
                    {!! Form::label('id_jug', 'Jugador', []) !!} {!! Form::text('id_jug',$usuario->id_jugador , ['class' =>'form-control']) !!}
                  </div>
                </div>
                <div class="form-group reg_jugClub{{ $usuario->id_jugador}}"></div>
                <ul class="list-group table-sm text-left">
                  @foreach($clubs as $club ) @if(count($club->jugador_clubs->where('id_jugador',$usuario->id_jugador))>0)
                  <li class="list-group-item">
                    <div class="form-row">
                      <div class="col-1">
                        <i class="material-icons" style="font-size: 20px; color:#218838;">
                                            check_circle
                                        </i>
                      </div>
                      <div class="col-11">
                        {{ $club->nombre_club}}
                      </div>
                    </div>
                  </li>
                  {{--
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for=""><img src="/storage/fotos/inscrito.png" alt="" height="20px" width="20px">{{" ".$club->nombre_club}}</label>
                    </div>
                  </div> --}} @else
                  <li class="list-group-item">
                    <div class="custom-control custom-radio custom-control-inline">
                      {!! Form::radio('club', $club->id_club , null ,['id'=> 'club'.$club->id_club.$usuario->id_jugador ,'class'=>'custom-control-input'])
                      !!} {!! Form::label('club'.$club->id_club.$usuario->id_jugador, $club->nombre_club, ['class'=>'custom-control-label'])
                      !!}
                    </div>
                  </li>

                  @endif @endforeach
                </ul>
              </div>
              <div class="modal-footer">
                <div class="col-md-6">
                  {!! Form::submit('Registrar', ['class'=>'btn btn-block btn_aceptar']) !!}
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-block btn-outline-secondary btn_cerrar" data-dismiss="modal">Cancelar</button>
                </div>
              </div>

            </div>
          </div>
        </div>
        {!! Form::close() !!} @endforeach
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
        console.log(elemento.className)
        if(elemento.className.indexOf('button_redirect') == -1)
         {
            window.location = elemento.parentNode.getAttribute('data-href');
            console.log(e.target)
            console.log(elemento.parentNode.getAttribute('data-href'));
          }
        console.log(elemento);
      }
    }())
</script>

{!! Html::script('/js/vista_previa.js') !!} {!! Html::script('/js/validaciones.js') !!} {!! Html::script('/js/filtrar_por_nombre.js')
!!} {!! Html::script('/js/validacion_ajax_request_jugador.js') !!} {!! Html::script('/js/input_file.js') !!} {!! Html::script('/js/validacion_ajax_jugClub_reg.js')
!!} {!! Html::script('/js/reset_inputs.js') !!}
@endsection