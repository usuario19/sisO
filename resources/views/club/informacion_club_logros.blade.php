@extends('club.plantillas.plantilla_informacion_club')

@section('content_info')
   
<div class="container">
    <div class="card">
        <div class="card-header" style="padding: 0%">
                <nav class="navbar navbar-expand-md menu">
                  <ul class="navbar-nav btn-block">
                    
                    <li class="nav-item link col-md-4" style="padding: 0%">
                      <a class="nav-link link col-md-12 badge-light" href={{ route('club.show', $club->id_club) }}>Jugadores</a>
                    </li>
                    <li class="nav-item link col-md-4" style="padding: 0%">
                      <a class="nav-link link col-md-12 badge-light" href="{{ route('club.informacion_club_gestiones', $club->id_club) }}">Gestiones</a>
                    </li>
                    <li class="nav-item link col-md-4" style="padding: 0%">
                      <a class="nav-link link active col-md-12 badge-light" href={{ route('club.informacion_club_logros',$club->id_club) }}>Logros</a>
                    </li>
                    {{--  <li class="nav-item link col-md-3">
                      <a class="nav-link link col-md-12" href="{{ route('administrador.informacion_club_resultados',$club->id_club) }}">ESTADISTICAS</a>
                    </li>  --}}
                  </ul>
              
                </nav>
        </div>
            
            <div class="card-body" style="padding: 0%">
                <div class="table-responsive-xl col-md-12">
                {{--  <div class="container table-bordered">  --}}
                  <div class="title-table">
                    Participaciones en Gestiones actualmente activas:
                  </div>
                  <table class="mi_tabla table table-bordered">
                    <thead class="thead-light">
                        <tr>
                          <th style="width: 50px" scope="col">#</th>
                          <th style="width: 200px" scope="col">GESTION</th>
                          <th colspan="4" style="width: 200px">DISCIPLINA</th>
                        </tr>
                      </thead>
                  
                      <tbody class="table-sm" id="datos">
                        @php
                        $i =  1
                        @endphp
                        @foreach($inscripciones as $inscripcion)
                        @if ($inscripcion->gestion->estado_gestion == 1)
                        <tr>
                          <td class="text-center"  rowspan="{{count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))+1}}">{{$i}}</td>
                          
                          <td  rowspan="{{count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))+1}}">{{$inscripcion->gestion->nombre_gestion}}</td>
                          <td style="width: 70px" class="text-center" rowspan="{{count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))+1}}"> 
                          
                            <a href="#" data-toggle="modal" class=" button_delete" data-target="#V{{ $inscripcion->gestion->id_gestion.$club->id_club }}">
                                <i title="Editar" class="material-icons delete_button button_redirect">
                                  settings
                                </i>
                          </td>
                          <!--MODAL-->
    
                            {!! Form::open(['route'=>'disciplina.store_disc','method' => 'POST','id'=>'Form'.$inscripcion->gestion->id_gestion.$club->id_club,'class'=>'form_disc_reg']) !!}
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
                                      <div class="form-group Form{{ $inscripcion->gestion->id_gestion."".$club->id_club }}"></div>
                                      <ul class="list-group">
                                          <li class="list-group-item ">
                                            <div class="form-row">
                                              <div class="col-1">
                                                {!! Form::checkbox('todo','todo' , false, ['id'=>'check'. $inscripcion->gestion->id_gestion.$club->id_club,'class'=>'check_all']) !!}
                                              </div>
                                              <div class="col-11">
                                                <span class="title_lista_check" >Seleccione las disciplinas en las que participara:</span>
                                              </div>
                                            </div>
                                          </li>
                                          <div style="display: none;"> 
                                              {!! Form::text('id_club', $club->id_club, ['class'=>'form-control']) !!}
                                              {!! Form::text('id_gestion', $inscripcion->gestion->id_gestion, ['class'=>'form-control']) !!}
                                          </div>

                                    @foreach($inscripcion->gestion->participaciones as $participacion)
      
                                      @if(count($participacion->disciplina->club_participaciones->where('id_gestion',$inscripcion->gestion->id_gestion)->where('id_club',$club->id_club)) == 0)
                                      <li class="list-group-item">
                                        <div class="form-row">
                                          <div class="col-1">
                                              {!! Form::checkbox('id_disciplinas[]',$participacion->disciplina->id_disc, false, ['id'=>'disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->id_participacion,'class'=>'check'.$inscripcion->gestion->id_gestion.$club->id_club]) !!}
                                          </div>
                                          <div class="col-11">
                                              {{--  <img class="rounded-circle img-thumbnail" src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" style="height: 50px; width: 50px; padding: 10px ">  --}}
                                              {!! Form::label('disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->id_participacion, $participacion->disciplina->nombre_disc." ".$participacion->disciplina->nombre_categoria($participacion->disciplina->categoria), []) !!}
                                              {{--  @if($participacion->disciplina->categoria == 1)
                                                {!! Form::label('disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Mujeres)", []) !!}
                                              @elseif($participacion->disciplina->categoria == 2)
                                                {!! Form::label('disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Varones)", []) !!}
                                              @else
                                                {!! Form::label('disc'.$club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Mixto)", []) !!}
                                              @endif  --}}
                                          </div>
                                        </div>
                                        </li>
                                      </ul>
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
                                    <div class="form-group col-md-6">
                                      {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                    	<button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
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
                                        <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}" data-toggle="modal" class="button_delete" data-target="#Eliminar{{ $disc->id_club_part}}" >
                                            <i title="Eliminar" class="material-icons delete_button button_redirect">
                                                delete
                                            </i>
                                      </td>
        
                                      
                                        <!-- Modal -->
                                        <div class="modal fade" id="Eliminar{{ $disc->id_club_part}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header modal_advertencia">
                                                <h5 class="modal-title" id="exampleModalLabel">ADVERTENCIA:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
        
                                              <div class="modal-body">
                                                ¿Esta seguro de querer eliminar la participacion en esta disciplina?
                                              </div>
        
                                              <div class="modal-footer">
                                                <div class="form-group col-md-6">
                                                  <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}" class="btn btn-block btn-danger">Eliminar</a>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                </div>
        
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
                          @php
                           $i++
                          @endphp
                          
                        @endforeach
                      </tbody>
                    </table>
                {{--  </div>  --}}
                </div>
            </div>
        
    
      {!! Form::close() !!}
    
    </div>
  </div>
</div>
@endsection

@section('scripts')
{!! Html::script('/js/vista_previa.js') !!} 
{!! Html::script('/js/checkbox.js') !!} 
{!! Html::script('/js/validacion_ajax_disc_reg.js') !!} 
{!! Html::script('/Jcrop/js/jquery.Jcrop.min.js') !!}
{!! Html::script('/js/jcrop_imagen.js') !!}
@endsection