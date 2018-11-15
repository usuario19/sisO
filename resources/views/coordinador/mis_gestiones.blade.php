@extends('plantillas.main')

@section('title')
    SisO - Mis Gestiones
@endsection

@section('content')
<div class="container">
    <div class="container">
        <div class="col-md-12 text-center" style="padding: 10px 0px">
          <h4 class="">GESTIONES</h4>
        </div> 
      </div>
    {{--  <div class="row">
        <div class="container input-group mb-3 col-md-10">
            <div class="input-group-prepend">
                <label class="input-group-text" for="id_club_inf" style="color:; background:;-moz-user-focus: ignore; focus:none; ">Gestiones del Club: </label>
            </div>
            {!! Form::select('id_club',$mis_clubs,0, ['class'=>'custom-select','id'=>'id_club_gestion']) !!}</td>
              
        </div>
        <div id="cargando" style="display: none; padding:0 0 10px 0" class="col-md-12 text-center">
            <img src="/storage/logos/loader.gif" alt="" height="30">
        </div>  
    </div>  --}}
    {{--  <h1 class="display-1" style="font-size: 16px; margin:0 0 15px 0; font-weight: bold">GESTIONES ACTIVAS</h1>  --}}
    
    
    <div class="table-responsive-xl">
      @foreach($mis_clubs as $club)
      <div class="container col-md-10">
          <table class="table table-bordered">
        
              <thead>
                <tr>
                    <th colspan="5" class="title-table-club" colspan="4" style="padding: 0px">
                        <div class="container text-center" style="padding: 10px 0px; margin: auto;">
                            <h5 {{-- class="display-4" --}} style="margin: AUTO; font-size: 15px">{{ strtoupper($club->club->nombre_club)}}</h5>
                        </div>
                    </th>
                </tr>
                  <tr>
                      <td colspan="5" class="text-center" style="padding: 0%">
                        <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}} class="text-center">
    
                          <div class="text-center" {{--  style="position:relative"  --}}>
                            
                                  <div id="contenedor_club">
                                    <img id="imgOrigen" class="rounded mx-auto d-block" src="/storage/logos/{{ $club->club->logo }}" alt="" height=" 150px" width="150px">
    
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
              </thead>
              <tbody>

                @foreach($club->club->inscripciones->sortByDesc('id_inscripcion') as $inscripcion)
                  @if ($inscripcion->gestion->estado_gestion == 1)
                    <tr class="badge-secondary">
                      <th colspan="4" style="padding: 0%">
                        <div style="color: ; margin: auto; padding: 10px;  color: white">{{ $inscripcion->gestion->nombre_gestion }}</div>
                      </th>
                      <td style="padding: 5px; margin: 0px">
                          <a href="{{ route('disciplina.ver_disciplinas',[$club->club->id_club,$inscripcion->gestion->id_gestion]) }}" class="btn badge-secondary ">
                              <div class="button-div" style="width: 150px">
                                  <i class="material-icons float-left">settings</i>
                                  <span class="letter-size">Crear Seleccion</span>
                              </div>
                          </a>
                        </td>
                    </tr>
                    <tr class="bg-light">
                      <th style="width: 120px">Fecha Inicio</th>
                      <th style="width: 100px">Fecha Fin</th>
                      <th colspan="4">Descripcion</th>
                      
                    </tr>
                    <tr>  
                        
                        <td>
                          <div class="form-row ">{{ $inscripcion->gestion->fecha_ini }}</div>
                        </td>
                        <td>
                          <div class="form-row text-center">{{ $inscripcion->gestion->fecha_fin }}</div>
                        </td>
                        <td colspan="4">
                            <div class="form-row text-justify">{{ $inscripcion->gestion->descripcion_gestion }}</div>
                        </td>
                        
                    </tr>
                     <tr>  
                        <th colspan="4" class="bg-light"  style="padding: 10px">DISCIPLINAS</th>
                       <td class="text-center bg-light" style="padding: 5px;width: 50px">   
                          <!-- Button trigger modal -->
                            <a href="" class="btn btn-light" data-toggle="modal" data-target="#V{{ $inscripcion->gestion->id_gestion.$club->club->id_club }}">

                                <div class="button-div" style="width: 150px">
                                    <i class="material-icons float-left">border_color</i>
                                    <span class="letter-size">Disciplinas</span>
                                </div>
                               {{--   <i title="Inscribirse" class="material-icons delete_button button_redirect">
                                    border_color
                                 </i>
                                  <span class="letter-size">Crear Seleccion</span>  --}}
                            </a>
          
                            <!-- Modal -->
                            {!! Form::open(['route'=>'disciplina.store_disc','method' => 'POST']) !!}
                            <div class="modal fade" id="V{{ $inscripcion->gestion->id_gestion.$club->club->id_club }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ $inscripcion->gestion->nombre_gestion }} </h5>
          
          
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body container col-md-10">
          
                                    {{--  <h6>Seleccione las disciplinas en las que participara:</h6><br>  --}}
          
                                    <div style="display: none;"> 
                                        {!! Form::text('id_club', $club->club->id_club, ['class'=>'form-control']) !!}
                                        {!! Form::text('id_gestion', $inscripcion->gestion->id_gestion, ['class'=>'form-control']) !!}
                                    </div>
                                    <table class="table-borderless">
                                        <thead>
                                          <th>
                                              Seleccione las disciplinas en las que participara:
                                          </th>
                                        </thead>
                                      </table>
                                    <!--$inscripcion->gestion->participaciones muestra todos los id de las disciplinas-->
                                    <table class="table table-bordered">
                                        <tbody>
                                    @foreach($inscripcion->gestion->participaciones as $participacion)
                                    {{--  {{ $participacion->disciplina}}  --}}
      
                                      @if(count($participacion->disciplina->club_participaciones->where('id_gestion',$inscripcion->gestion->id_gestion)->where('id_club',$club->club->id_club)) == 0)
      
                                      <tr>
                                          <td style="width: 30px">
                                              {!! Form::checkbox('id_disciplinas[]',$participacion->disciplina->id_disc, false, ['id'=>'disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,'class'=>'check_us']) !!}
                                          </td>
                                          <td >
                                              <img src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" width="30px" height="30px">
                                            
                                              @if($participacion->disciplina->categoria == 1)
                                            
                                              {!! Form::label('disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Mujeres)", []) !!}
                                              @elseif($participacion->disciplina->categoria == 2)
                                              {!! Form::label('disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Varones)", []) !!}
                                              @else
                                              {!! Form::label('disc'.$club->club->id_club.$inscripcion->gestion->id_gestion.$participacion->disciplina->id_disc,$participacion->disciplina->nombre_disc. " "."(Mixto)", []) !!}
                                              @endif
                            
                                          </td>
                                      </tr>
                                        {{--  @else
                                        
                                        {!! Form::checkbox('check','0', true, ['class'=>'check_us','disabled']) !!}
      
                                          <img src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" width="50px" height="50px">
      
                                        @if($participacion->disciplina->categoria == 1)
          
                                        {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Mujeres)", []) !!}
                                        @elseif($participacion->disciplina->categoria == 2)
                                        {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Varones)", []) !!}
                                        @else
                                        {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Mixto)", []) !!}
                                        @endif
                                        <br>  --}}
                                      @endif
          
                                    @endforeach
                                  </tbody>
                                </table>
                                    </div>
                                    <div class="modal-footer">
                                      {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                            {!! Form::close() !!}
                        </td>
                            @if (count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))>0)
                            @php
                            $i =  1
                            @endphp
                              @foreach ($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club) as $disc)
                                  <tr>
                                      <td class="text-center">
                                        {{$i}}
                                      </td>
                                      <td style="width: 110px" class="text-center">
                                        <img src="/storage/foto_disc/{{ $disc->disciplina->foto_disc }}" alt="" width="30px" height="30px">
                                      </td>
                                      <td colspan="2">
                                        {{strtoupper($disc->disciplina->nombre_disc)}}
                                      {{$disc->disciplina->categoria == 1 ? '( Mujeres )':($disc->disciplina->categoria == 2 ? '( Hombres )':'( Mixto )')}}</td>
    
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
                                    @php
                                    $i++
                                    @endphp
                              @endforeach
                            @endif
                        
    
                        
          
                        
                      </tr>
                    @endif
                    @endforeach
                  
                
              </tbody>
          </table>
      </div>
      
      <br>
      @endforeach
    </div>
</div>

@endsection
@section('scripts')
 {!! Html::script('/js/vista_previa.js') !!}
    
@endsection