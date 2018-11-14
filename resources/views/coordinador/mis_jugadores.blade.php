@extends('plantillas.main')

@section('title')
    SisO - Lista de jugadores
@endsection

@section('content')
<div class="container">
  
  <div class="container col-md-10 table-responsive-xl">
      <div class="container">
          <div class="col-md-12 text-center" style="padding: 10px 0px">
            <h4 class="">JUGADORES</h4>
          </div> 
        </div>
      @if($club)
        

      <div class="table-responsive">  
    
        <table class="table table-sm table-bordered" style="margin: 0%">
          <thead>
            <th colspan="5" class="title-table-club" colspan="4" style="padding: 0px">
              <div class="container text-center" style="padding: 10px 0px; margin: auto;">
                  <h5 {{-- class="display-4" --}} style="margin: AUTO; font-size: 15px">{{ strtoupper($club->nombre_club)}}</h5>
              </div>
          </th>
        {{--  <th class="table"><h3 class="display-4" style="font-size: 20px">Ficha de informacion</h3></th>  --}}
          </thead>
          <tbody>
            <tr>
                <td class="text-center">
                  <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}} class="text-center">

                    <div class="text-center" {{--  style="position:relative"  --}}>
                      
                            <div id="contenedor_club">
                              <img id="imgOrigen" class="rounded mx-auto d-block" src="/storage/logos/{{ $club->logo }}" alt="" height=" 150px" width="150px">

                              <div id="divtexto">
                                  <a id="btnCancelar" class="btn btn-outline-dark button noVista">
                                      <span class="btn_hover ">
                                          <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                                          
                                      </span>
                                  </a>
                                  <a id="btnUpdate" class="btn btn-outline-dark button noVista">
                                      <span class="btn_hover ">
                                          <i id="btnUpdate" class="material-icons float-left" style="color:white">loop</i>
                                      </span>
                                  </a>
                                  <a id="texto" class="btn btn-dark button vista">
                                  <span class="btn_hover ">
                                      <i id="texto" class="material-icons float-left" style="color:white">edit</i>
                                  </span>
                                </a>
                              </div>
                            </div>
                      </div> 
                    
                            <div class="form-row errorLogin">
                            
                                <h6 style="text-align: center" id="error_foto">{{ $errors->has('logo') ? $errors->first('logo'):'' }}</h6>
                            
                            </div>

                    
                  </div>
                </td>
               
              </tr>

              {!! Form::open(['route'=>['coordinador.updateFotoClub'],'method' => 'POST' ,'enctype' => 'multipart/form-data', 'files'=>true]) !!}

              <div class="form-row">
                <div class="{{ $errors->has('foto_admin') ? 'siError':'' }}">                            
                  <div id="div_file" style="display: none;">
                    {!! Form::text('id_club',$club->id_club, []) !!}
                    {!! Form::file('logo', ['class'=>'upload','id'=>'input']) !!}
                    <div style="display: none">
                      {!! Form::submit('Actualizar foto', ['class'=>'btn btn-primary btn-block', 'id'=>'buttonUpdate']) !!}
                    </div>
                  </div>                             
                </div>
              </div>
    
            {!! Form::close() !!}
            </tbody>
          </table>
            

        <div class="card">
            
                
                <div class="card-body bg-light" style="padding: 0%">
                    <table class="table table-sm">
                        <thead>

                        </thead>
                        
                        <tbody class="">
                          <tr class="">
                            
                            <td>
                              <div style="float: left;" class="form-group col-lg-9">
                                {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                              </div>
                              
                              <div style="float: left;" class="form-group col-lg-3">
                                  <div class="btn-group btn-block">
                                      <button id="button_add" type="button" class="btn btn-warning btn-block" data-toggle="dropdown">
                                          <div class="button-div" style="width: 150px">
                                              <i class="material-icons float-left">settings</i>
                                              <span class="letter-size">Registrar jugador</span>
                                          </div>
                                        
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-right">
                                       <button type="button" class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg">
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
                              @include('coordinador.plantilla.form_reg_jugador_modal')
                              @include('coordinador.plantilla.form_import_jugador_modal')
                            </td>
                            
                          </tr>
                        </tbody>
                    </table>
                  
                    <div class="table-responsive">
                        <table class="table table-hover bg-white">
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
                                <td data-href="{{ route('jugador.informacion',$usuario->id_jugador) }}"><img class="rounded-circle mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="" height=" 50px" width="50px"></td>
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
                                  <a href="#confirm?"  class="delete_button button_redirect" data-toggle="modal" data-target="#Eliminar{{ $usuario->id_jugador}}" >
                                    <i title="Eliminar" class="material-icons delete_button button_redirect">
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
        </div>
      </div>
  @endif
  </div>
    
</div>
@endsection
@section('scripts')

  {!! Html::script('/js/vista_previa.js') !!}
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection