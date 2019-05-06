@extends('club.plantillas.plantilla_informacion_club')

@section('content_info')

<div class="container">
    <div class="card">
        <div class="card-header" style="padding: 0%">
           
                <nav class="navbar navbar-expand-md menu">
                  <ul class="navbar-nav btn-block">
                    
                    <li class="nav-item link col-md-4" style="padding: 0%">
                      <a class="nav-link link active col-md-12" href="{{ route('club.show', $club->id_club) }}">Jugadores</a>
                    </li>
                    <li class="nav-item link col-md-4" style="padding: 0%">
                      <a class="nav-link link col-md-12" href="{{ route('club.informacion_club_gestiones', $club->id_club) }}">Gestiones</a>
                    </li>
                    <li class="nav-item link col-md-4" style="padding: 0%">
                      <a class="nav-link link col-md-12" href={{ route('club.informacion_club_logros',$club->id_club) }}>Logros <span class="sr-only">(current)</span></a>
                    </li>
                  </ul>
              
                </nav>
            
        </div>
            <div class="card-body" style="padding: 0%">
                         <div class="contenido_lista form-row">
                           <div class="form-group col-xl-9">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                           </div>
                          
                           <div class="form-group col-xl-3">
                             <div class="btn-group btn-block">
                                <button type="button" class="btn btn-warning btn-block" data-toggle="dropdown">
                                    <div class="button-div" style="width: 150px">
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
                                @include('coordinador.plantilla.form_reg_jugador_modal')
                                @include('coordinador.plantilla.form_import_jugador_modal')
                              </div>
                           </div>
                         </div>
                        
                </div>
              </div>
              <br>
                <div class="table-responsive-xl">
                    <div class="col-md-12" style="padding: 0%">
                      <table class="mi_tabla table table-bordered table-hover">
                        <thead class="table-sm">
                          <tr>
                            <th width="50px" scope="col">#</th>
                            <th width="100px" scope="col">FOTO</th>
                            <th scope="col" >CI</th>
                            <th scope="col">NOMBRE COMPLETO</th>
                            <!--th>Apellidos</th-->
                            <th scope="col">GENERO</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">FECHA DE <br> NACIMIENTO</th>
                            <th>Descripcion</th>
                            <th width="70px" scope="col" colspan=""></th>
                          </tr>
                        </thead>
                        <tbody id="datos">
                          @php
                          $i =  1
                          @endphp
                          @foreach($mis_jugadores as $usuario)
                            <tr  class="link_pointer" style="cursor:pointer" data-href="{{ route('jugador.informacion_jug_club',[$usuario->id_jugador,$club->id_club]) }}">
                              {{--  <td>{{ $usuario->jugador->id_jugador}}</td>  --}}
                              <th>{{$i}}</th>
                              <td data-href="{{ route('jugador.informacion_jug_club',[$usuario->id_jugador,$club->id_club]) }}">
                                <img class="rounded-circle mx-auto d-block img_foto" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="">
                              </td>
                              <td>{{ $usuario->jugador->ci_jugador}}</td>
                              <td>{{ $usuario->jugador->nombre_jugador." ".$usuario->jugador->apellidos_jugador}}</td>
                              <!--td>{{ $usuario->jugador->apellidos_jugador}}</td-->
                              <td>@if($usuario->jugador->genero_jugador == "2")
                                       {{ "Masculino" }}
                                  @else
                                        {{ "Femenino" }}
                                  @endif
                              </td>
                              <td>{{ $usuario->jugador->email_jugador}}</td>
                              <td>{{ $usuario->jugador->fecha_nac_jugador}}</td>
                              <td>{{ $usuario->jugador->descripcion_jugador}}</td>
                              {{--  <td><a href="#confirm?" class="btn btn-warning">Editar</a></td>  --}}
                    
                              <td>
                                <a href="#confirm?"  class="button_delete button_redirect" data-toggle="modal" data-target="#Eliminar{{ $usuario->id_jugador}}" >
                                  <i title="Eliminar" class="material-icons button_redirect delete_button">
                                    delete
                                 </i>
                                </a>
                                
                              </td>
                              {{--  <td>
                                <a href={{ route('seleccion.ver_seleccion',[$usuario->id_jugador,$usuario->id_club]) }} class="btn btn-info">Ver Participacion</a>
                              </td>  --}}
                            </tr>
                            <!-- Modal -->
                                <div class="modal fade" id="Eliminar{{ $usuario->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header modal_advertencia">
                                        <h5 class="modal-title" id="exampleModalLabel">Advertencia:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                    
                                      <div class="modal-body modal_advertencia">
                                        ¿Esta seguro de querer eliminar al usuario?
                                      </div>
                    
                                      <div class="modal-footer">
                                        <div class="col-md-6">
                                            <a href={{ route('coordinador.eliminar',[$usuario->id_jugador,$usuario->id_club]) }} class="btn btn-block btn-danger">Eliminar</a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            @php
                             $i++
                            @endphp
                            
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        
    
      {!! Form::close() !!}
    </div>


        


@endsection
@section('scripts')
    {!! Html::script('/js/vista_previa.js') !!} 
    {!! Html::script('/js/validaciones.js') !!}
    {!! Html::script('/js/filtrar_por_nombre.js') !!}
    {!! Html::script('/js/validacion_ajax_request_jugador.js') !!}
    {!! Html::script('/js/input_file.js') !!}
    {!! Html::script('/Jcrop/js/jquery.Jcrop.min.js') !!}
    {!! Html::script('/js/jcrop_imagen.js') !!}
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
@endsection