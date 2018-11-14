@extends('coordinador.plantilla.plantilla_informacion_club')

@section('content_info')
   
<div class="container col-md-10">
    <div class="card">
        <div class="card-header" style="padding: 0%">
            <div class="card-header" style="padding: 0%">
                <nav class="navbar navbar-expand-md table-bordered menu">
                  <ul class="navbar-nav btn-block">
                    <li class="nav-item link col-md-4" style="padding: 0%">
                      <a class="nav-link link col-md-12 badge-light" href={{ route('coordinador.informacion_club',$club->id_club) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item link col-md-4" style="padding: 0%">
                      <a class="nav-link link col-md-12 badge-light" href="{{ route('coordinador.show', $club->id_club) }}">JUGADORES</a>
                    </li>
                    <li class="nav-item link col-md-4" style="padding: 0%">
                        <a class="nav-link link active col-md-12 badge-light" href="{{ route('coordinador.informacion_club_gestiones', $club->id_club) }}">GESTIONES</a>
                      </li>
                    {{--  <li class="nav-item link col-md-3">
                      <a class="nav-link link col-md-12" href="{{ route('administrador.informacion_club_resultados',$club->id_club) }}">ESTADISTICAS</a>
                    </li>  --}}
                  </ul>
              
                </nav>
            </div>
        </div>
            
            <div class="card-body" style="padding: 0%">
                <br>
                <div class="table-responsive">
                <div class="container table-bordered col-md-9">
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="width: 50px" scope="col">#</th>
                          <th style="width: 200px" scope="col">GESTION</th>
                          <th colspan="4" style="width: 200px">DISCIPLINA</th>
                          
                          
                          
                          {{--  <th><button class="btn btn-light"> inscribirse Disciplina</button></th>  --}}
                        </tr>
                        
                      </thead>
                  
                      <tbody id="datos">
                        @php
                        $i =  1
                        @endphp
                        @foreach($inscripciones as $inscripcion)
                        @if ($inscripcion->gestion->estado_gestion == 1)
                        <tr>
                          <td  rowspan="{{count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))+1}}">{{$i}}</td>
                          
                          <td  rowspan="{{count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))+1}}">{{$inscripcion->gestion->nombre_gestion}}</td>
                          <td style="width: 70px" class="text-center" rowspan="{{count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))+1}}"> 
                          
                            <a href="#" data-toggle="modal" class=" delete_button" data-target="#V{{ $inscripcion->gestion->id_gestion.$club->id_club }}">
                                <i title="Editar" class="material-icons delete_button button_redirect">
                                    library_add
                                    </i>
                          </td>
                          <!--MODAL-->
    
                          {!! Form::open(['route'=>'disciplina.store_disc','method' => 'POST']) !!}
                          <div class="modal fade" id="V{{ $inscripcion->gestion->id_gestion.$club->id_club }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">{{ $inscripcion->gestion->nombre_gestion }} </h5>
                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
        
                                  <h6>Seleccione las disciplinas en las que participara:</h6><br>
        
                                  <div style="display: none;"> 
                                      {!! Form::text('id_club', $club->id_club, ['class'=>'form-control']) !!}
                                      {!! Form::text('id_gestion', $inscripcion->gestion->id_gestion, ['class'=>'form-control']) !!}
                                  </div>
                                  <!--$inscripcion->gestion->participaciones muestra todos los id de las disciplinas-->
    
                                  @foreach($inscripcion->gestion->participaciones as $participacion)
    
                                    @if(count($participacion->disciplina->club_participaciones->where('id_gestion',$inscripcion->gestion->id_gestion)->where('id_club',$club->id_club)) == 0)
    
                                      {!! Form::checkbox('id_disciplinas[]',$participacion->disciplina->id_disc, false, ['id'=>'disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,'class'=>'check_us']) !!}
    
                                      <img src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" width="50px" height="50px">
    
                                      @if($participacion->disciplina->categoria == 1)
        
                                      {!! Form::label('disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Mujeres)", []) !!}
                                      @elseif($participacion->disciplina->categoria == 2)
                                      {!! Form::label('disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Varones)", []) !!}
                                      @else
                                      {!! Form::label('disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Mixto)", []) !!}
                                      @endif
                                      <br>
                                    @else
                                     {{--   
                                      {!! Form::checkbox('check','0', true, ['class'=>'check_us','disabled']) !!}
    
                                        <img src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" width="50px" height="50px">
    
                                      @if($participacion->disciplina->categoria == 1)
          
                                        {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Mujeres)", []) !!}
                                      @elseif($participacion->disciplina->categoria == 2)
                                        {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Hombres)", []) !!}
                                      @else
                                        {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Mixto)", []) !!}
                                      @endif
                                        <br>  --}}
                                    @endif
        
                                  @endforeach
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  {!! Form::submit('Inscribirse', ['class'=>'btn btn-primary']) !!}
                                </div>
                              </div>
                            </div>
                          </div>
                          {!! Form::close() !!}
    
                        
                          {{--  <tr>
                          <td  rowspan="{{count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))+1}}">{{$inscripcion->gestion->nombre_gestion}}</td>
                        </tr>  --}}
                        @if (count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))>0)
                          @foreach ($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club) as $disc)
                              <tr>
                                  <td style="width: 50px">
                                    <img src="/storage/foto_disc/{{ $disc->disciplina->foto_disc }}" alt="" width="30px" height="30px">
                                  </td>
                                  <td>
                                    {{$disc->disciplina->nombre_disc}}
                                  {{$disc->disciplina->categoria == 1 ? 'Mujeres':($disc->disciplina->categoria == 2 ? 'Hombres':'Mixto')}}</td>
                                  <td style="width: 50px" class="text-center">
                                    <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}" data-toggle="modal" class="delete_button" data-target="#Eliminar{{ $disc->id_club_part}}" >
                                        <i title="Eliminar" class="material-icons delete_button button_redirect">
                                            delete
                                         </i>
                                  </td>
    
                                   
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
                                  
                                </tr>
                          @endforeach
                        @else
                        <td></td>
                        <td></td>
                        @endif
                          
                         
                        </tr>
                          @endif
                         
                            {{--  @foreach ($gestion->club_participaciones->where('id_club',$club->id_club) as $participacion)
                            <td>{{$i}}</td>
                            <td>{{$gestion->nombre_gestion}}</td>
                              <td>
                                {{$participacion->disciplinas->nombre_disc}}
                              </td>
                            @endforeach  --}}
                       
                        
                          
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
</div>







    @endsection
    @section('scripts_add')
   
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