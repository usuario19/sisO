@extends('coordinador.plantilla.plantilla_informacion_club')

@section('content_info')


<div class="card">
    <div class="card-header" style="padding: 0%">
        <div class="card-header" style="padding: 0%">
            <nav class="navbar navbar-expand-md table-bordered menu">
                <ul class="navbar-nav btn-block">
                  <li class="nav-item link col-md-4">
                    <a class="nav-link link col-md-12" href={{ route('coordinador.informacion_club',$club->id_club) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item link col-md-4">
                    <a class="nav-link link active col-md-12" href="{{ route('coordinador.show', $club->id_club) }}">JUGADORES</a>
                  </li>
                  <li class="nav-item link col-md-4">
                      <a class="nav-link link col-md-12" href="{{ route('coordinador.informacion_club_gestiones', $club->id_club) }}">GESTIONES</a>
                    </li>
                  {{--  <li class="nav-item link col-md-3">
                    <a class="nav-link link col-md-12" href="{{ route('administrador.informacion_club_resultados',$club->id_club) }}">ESTADISTICAS</a>
                  </li>  --}}
                </ul>
          
            </nav>
        </div>
    </div>
        
        <div class="card-body" style="padding: 0%"><br>
            <table class="table table-sm">
                <thead>
                 {{--   <tr>
                      <th colspan="2">
                        <div style="float:left; margin:10px;width="110px"">
                          <img src="/storage/logos/{{ $club->logo }}" alt="" width="100px" height="100px">
                        </div>
                      
                       <div style="float:left; padding: 20px 10px ">
                          <h3 class="display-4">{{ $club->nombre_club }}</h3>
                       </div>
                      </th>
                  </tr>  --}}
                  </thead>
                
                  <tbody>
                  <tr>
                     
                    <td>
                     <div style="float: left;" class="form-group col-lg-9">
                      {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                     </div>
                    
                     <div style="float: left;" class="form-group col-lg-3">
                       <div class="btn-group btn-block">
                          <button type="button" class="btn btn-warning dropdown-toggle btn-block" data-toggle="dropdown">
                            <span class="btn_hover_del ">

                              <i class="fas fa-user-plus"></i>
                              <span  class="letter_size"> Inscribir nuevo jugador</span>
                            </span>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                           <button type="button" class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg"><span  class="letter_size">Crear nuevo jugador</span></button>
                          <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalImportJugador"><span  class="letter_size" >Importar jugadores desde excel</span></button>
                          {{--  <a class="dropdown-item" href={{ route('jugador.VImportExcel',$club->id_club ) }}>Importar jugadores desde excel</a>  --}}
                          </div>
                        </div>
                     </div>
                      @include('coordinador.plantilla.form_reg_jugador_modal')
                      @include('coordinador.plantilla.form_import_jugador_modal')
                     </td>
                     
                  </tr>
                </tbody>
            </table>
          
            <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th width="20px" scope="col">#</th>
                      <th width="100px" scope="col">FOTO</th>
                      <th width="50px" scope="col" >CI</th>
                      <th scope="col">NOMBRE</th>
                      <!--th>Apellidos</th-->
                      <th scope="col">GENERO</th>
                      <th scope="col">EMAIL</th>
                      <th scope="col">FECHA DE NACIMIENTO</th>
                      <!--th>Descripcion</th-->
                      <th scope="col" colspan="3"></th>
                    </tr>
                    
                  </thead>
              
                  <tbody id="datos">
                    @php
                    $i =  1
                    @endphp
                    @foreach($mis_jugadores as $usuario)
                    
                    
                      <tr  class="link_pointer" style="cursor:pointer" data-href="{{ route('jugador.informacion',$usuario->id_jugador) }}">
                        {{--  <td>{{ $usuario->jugador->id_jugador}}</td>  --}}
                        <td>{{$i}}</td>
                        <td data-href="{{ route('jugador.informacion',$usuario->id_jugador) }}"><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="" height=" 50px" width="50px"></td>
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
                        <!--td>{{ $usuario->jugador->descripcion_jugador}}</td-->
                        {{--  <td><a href="#confirm?" class="btn btn-warning">Editar</a></td>  --}}
              
                        <td>
                          <a href="#confirm?"  class="btn btn-outline-secondary btn_hover_del button_redirect" data-toggle="modal" data-target="#Eliminar{{ $usuario->id_jugador}}" >
                            <span class=" button_redirect">
                              <i class="fas fa-user-minus button_redirect"></i>
                            </span>
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
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              
                                  <a href={{ route('coordinador.eliminar',[$usuario->id_jugador,$usuario->id_club]) }} class="btn btn-primary">Eliminar</a>
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
		

	{!! Form::close() !!}

            </div>
        </div>

      </div>
    </div>



    @endsection
    @section('scripts_add')
    {!! Html::script('/js/filtrar_por_nombre.js') !!}
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