@extends('coordinador.plantilla.plantilla_gestiones')

@section('content_info')
    <div class="card">
        <div class="card-header" style="padding: 0%">
            
                <nav class="navbar navbar-expand-md table-bordered menu">
                  <ul class="navbar-nav btn-block">
                    <li class="nav-item link col-md-3" style="padding: 0%">
                      <a class="nav-link link active col-md-12" href={{ route('disciplina.ver_disciplinas',[$datos->first()->id_club,$datos->first()->id_gestion]) }}>HABILITAR JUGADORES <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item link col-md-3" style="padding: 0%">
                      <a class="nav-link link col-md-12" href={{ route('disciplina.ver_disciplinas_inscritas',[$datos->first()->id_club,$datos->first()->id_gestion]) }}>SELECCIONES</a>
                    </li>
                    
                  </ul>
              
                </nav>
        </div>
        <div class="card-body">
            {{-- <div class="table-responsive"> --}}
              <div class="row">
                <div class="col-xl-6 bg-light">
                  <div class="table-responsive-md">
                      <div style="padding: 10px 0px;" class="form-group col-lg-12">
                          {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                        </div>
                      <table class="table table-striped table-bordered">
                          <thead>
                            <tr class="bg-warning text-center">
                              <th colspan="6" style="color: darkblue">Todos los jugadores registrados</th>
                            </tr>
                            <tr>
                              <th width="20px" scope="col">#</th>
                              <th width="100px" scope="col">FOTO</th>
                              <th width="50px" scope="col" >CI</th>
                              <th scope="col">NOMBRE</th>
                              <!--th>Apellidos</th-->
                              <th scope="col">GENERO</th>
                              
                              <th>{!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}</th>
                              
                            </tr>
                            
                          </thead>
                          {!! Form::open(['route'=>'jugador_inscripcion.store','method'=>'POST']) !!}
                          <div style="display: none;">{!! Form::text('id_inscripcion', $datos->first()->id_inscripcion, []) !!}</div>
                          <tbody id="datos">
                            @php
                            $i =  1
                            @endphp
  
                            @foreach($club_jugadores as $usuario)
                            {{-- Si no esta aun habilitado para la la gestion  --}}
                           
                              @if (count($usuario->jugador->jugador_inscripciones->where('id_inscripcion',$datos->first()->id_inscripcion))==0)
                              <tr  class="link_pointer" data-href="{{ route('jugador.informacion',$usuario->id_jugador) }}">
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
                                <td>
                                    {!! Form::checkbox('id_jugadores[]',$usuario->id_jugador, false, ['class'=>'check_us']) !!}
                                </td>
                                
                              </tr>
                              @php
                               $i++
                              @endphp
                              @endif
                            @endforeach
                            
                          </tbody>

                          
                      </table>
                      <div>
                          <div class="text-center">{!! Form::submit('Habilitar', ['class'=>'btn btn-warning']) !!}</div>
                      </div>
                      {!! Form::close() !!}
                  </div>
                    
                </div>
            {{-- JUGADORES HABILITADOS --}}
                <div class="col-xl-6 bg-light">
                  <div class="table-responsive-md">
                      <div style="padding: 10px 0px;" class="form-group col-lg-12">
                          {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar2','placeholder'=>'Buscar.....']) !!}
                        </div>
                      <table class="table table-striped table-bordered">
                          <thead>
                            <tr class="badge-success text-center" >
                              <th colspan="6" style="color: white">JUGADORES HABILITADOS PARA LA GESTION ACTUAL</th>
                            </tr>
                            <tr>
                              <th width="20px" scope="col">#</th>
                              <th width="100px" scope="col">FOTO</th>
                              <th width="50px" scope="col" >CI</th>
                              <th scope="col">NOMBRE</th>
                              <!--th>Apellidos</th-->
                              <th scope="col">GENERO</th>
                              
                              <th>{!! Form::checkbox('todo','todo', false, ['id'=>'todo_hab']) !!}</th>
                             
                            </tr>
                            
                          </thead>
                          {!! Form::open(['route'=>'jugador_inscripcion.deshabilitar','method'=>'POST']) !!}
                          {{--  <div style="display: none;">{!! Form::text('id_inscripcion', $datos->first()->id_inscripcion, []) !!}</div>  --}}
                          <tbody id="datos2">
                            @php
                            $i =  1
                            @endphp
                            @foreach($club_jugadores as $usuario)
                            {{-- Si no esta aun habilitado para la la gestion  --}}
                           
                              @if (count($usuario->jugador->jugador_inscripciones->where('id_inscripcion',$datos->first()->id_inscripcion))==1)
                              <tr  class="link_pointer" data-href="{{ route('jugador.informacion',$usuario->id_jugador) }}">
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
                                <td>
                                    {!! Form::checkbox('id_jugadores_ins[]',$usuario->jugador->jugador_inscripciones->where('id_inscripcion',$datos->first()->id_inscripcion)->first()->id_insc_jug, false, ['class'=>'check_hab']) !!}
                                </td>
                                
                              </tr>
                              @php
                               $i++
                              @endphp
                              @endif
                            
                              
                              
                              
                              
                              
                            @endforeach
                           
                          </tbody>

                         
                      </table>
                      <div>
                          <div class="text-center noRow">{!! Form::submit('Deshabilitar', ['class'=>'btn btn-success']) !!}</div>
                        </div>
                      {!! Form::close() !!}
                  </div>
                    
                </div>
              </div>
                
            {{-- </div> --}}

            {{-- <table class="table table-condensed">
        
              </thead>
              <tbody>
                @foreach($disciplinas as $disc)
                  <tr>
                    <td>{{ $disc->id_club_part}}</td>
                    <td><img class="rounded mx-auto d-block" src="/storage/foto_disc/{{ $disc->disciplina->foto_disc }}" alt="" height=" 100px" width="100px"></td>
                    <td>{{ $disc->disciplina->nombre_disc}}</td>
                    <td>@if($disc->disciplina->categoria == 1)
                          {{ 'Mujeres'}}
                        @elseif($disc->disciplina->categoria == 2)
                          {{ 'Varones' }}
                        @else
                          {{ 'Mixto' }}
                        @endif
                    </td>
                    
                    <td>
                      <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}"  class="btn btn-danger" data-toggle="modal" data-target="#Eliminar{{ $disc->id_club_part}}" >Eliminar</a>
                      <!-- Modal -->
                      <div class="modal fade" id="Eliminar{{ $disc->id_club_part}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">SisO:</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
        
                            <div class="modal-body">
                              Esta seguro de querer eliminar la participacion en esta disciplina?
                            </div>
        
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        
                              <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}" class="btn btn-primary">Eliminar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
        
                    <td><a href="{{ route('seleccion.create', $disc->id_club_part) }}" class="btn btn-success">Crear Seleccion</a></td>
                  </tr>
                @endforeach
               
              </tbody>
        </table> --}}
        </div>

    
</div>

@endsection
