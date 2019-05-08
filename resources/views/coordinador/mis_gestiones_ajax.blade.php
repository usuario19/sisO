@extends('plantillas.main')

@section('title')
    SisO - Mis Gestiones
@endsection

@section('content')
<div class="container">
    <div class="container col-md-12" style="padding:  0% 15px">
        <div class="container" style="background: #947B3E;height: 40px; margin:20px 0% 0% 0%">
            <div class="form-row">
                <div class="container input-group col-md-10" style="margin-bottom: 5px">
                    <div class="input-group-prepend">
                        <label class="input-group-text title-principal" for="id_club_jugadores" style="font-weight: 100;color: white; background: no-repeat; border: none;font-size: 16px;padding: 0%">MIS CLUBS 
                            <i class = "material-icons btn" style="padding: 5px"> 
                                    keyboard_arrow_right
                            </i></label>
                        </label>
                        {!! Form::select('id_club',$id_clubs,'0', ['class'=>'custom-select btn select_jq','id'=>'id_club_gestion']) !!}</td>
                    </div>
                </div>
                <div class="input-group mb-3 col-md-12">
                    <div id="cargando" style="display:none; padding:0px ; z-index: 10" class="col-md-12">
                        <img src="/storage/logos/loader.gif" alt="" height="30">
                    </div> 
                </div>
            </div>
        </div>
        <div class="container col-md-12 text-center" style="padding: 10px 0px;background: #B6984F   ; margin-bottom: 10px">
    
            <h4 class="title-principal" style="color: white;font-weight: bolder; font-size: 20px; font-weight: 400; padding: 0%">GESTIONES</h4>
            
        </div>
        
    
    {{--  <h1 class="display-1" style="font-size: 16px; margin:0 0 15px 0; font-weight: bold">GESTIONES ACTIVAS</h1>  --}}
    
    
        <div id="contenido" class="table-responsive-xl" style="padding: 0%">
            @if ($mis_clubs)
                @foreach($mis_clubs as $club)
                    <table class="table">
                
                        <thead>
                        {{--  <tr>
                            <th colspan="5" class="title-table-club" colspan="4" style="padding: 0px">
                            <div class="container text-center" style="padding: 10px 0px; margin: auto;">
                                <h5 style="margin: AUTO; font-size: 15px; font-weight: bolder">{{ strtoupper($club->club->nombre_club)}}</h5>
                            </div>
                        </th>
                        </tr>  --}}
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
                            <tr class="" style="padding-top: 20px">
                                <th colspan="4" style="padding-top: 20px; ">
                                  <div class="title-principal" style="color: #333333; font-size: 16px; padding: 10px">{{ $inscripcion->gestion->nombre_gestion }}</div>
                                </th>

                                <td style="padding:0px; margin: 0px; padding-top: 20px; ">
                                    @if ($inscripcion->gestion->periodo_inscripcion == 1)
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="button-div" style="width: 150px">
                                                <i class="material-icons float-left">settings</i>
                                                <span class="letter-size">Configuracion</span>
                                            </div>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                            <a href="{{ route('disciplina.ver_disciplinas',[$club->club->id_club,$inscripcion->gestion->id_gestion]) }}" class="dropdown-item btn-light">
                                                <div class="button-div" style="width: 150px">
                                                    <i class="material-icons float-left">group_add</i>
                                                    <span class="letter-size">Crear Seleccion</span>
                                                </div>
                                            </a>
                                          <a href="" class="dropdown-item btn-light" data-toggle="modal" data-target="#V{{ $inscripcion->gestion->id_gestion.$club->club->id_club }}">
                                              <div class="button-div" style="width: 150px">
                                                  <i class="material-icons float-left">edit</i>
                                                  <span class="letter-size">Añadir Disciplinas</span>
                                              </div>
                                                
                                          </a>
                                        </div>
                                      </div> 
                                        @else
                                        <button type="button" title="El periodo de inscripcion termino." class="btn btn-secondary example-popover" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                            <div class="button-div" style="width: 150px">
                                                <i  class="material-icons float-left">check_circle_outline</i>
                                                <span class="letter-size">Cerrado</span>
                                            </div>
                                        </button>
                                        @endif
                                </td>
                            </tr>
                            <tr class="table-bordered">
                                <th style="width: 120px">Fecha Inicio</th>
                                <th style="width: 110px">Fecha Fin</th>
                                <th colspan="3">Descripcion</th>
                                
                            </tr>
                            <tr class="table-bordered">  
                                
                                <td>
                                    <div class="form-row">{{ $inscripcion->gestion->fecha_ini }}</div>
                                </td>
                                <td>
                                    <div class="form-row">{{ $inscripcion->gestion->fecha_fin }}</div>
                                </td>
                                <td colspan="3">
                                    <div class="form-row">{{ $inscripcion->gestion->desc_gest }}</div>
                                </td>
                                
                            </tr>
                            <tr>  
                                <th colspan="5" class="table-bordered">DISCIPLINAS
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
                                                <table class="table-bordered">
                                                    <thead>
                                                        <th>
                                                            {!! Form::checkbox('todo','todo', false, ['id'=>'todo']) !!}
                                                        </th>
                                                    <th>
                                                        Seleccione las disciplinas en las que participara:
                                                    </th>
                                                    
                                                <!--$inscripcion->gestion->participaciones muestra todos los id de las disciplinas-->
                                                
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
                                                        
                                                        
                                                @endif
                                                
                                                    {{--  {!! Form::checkbox('check','0', true, ['class'=>'check_us','disabled']) !!}
                
                                                    <img src="/storage/foto_disc/{{ $participacion->disciplina->foto_disc }}" alt="" width="50px" height="50px">
                
                                                    @if($participacion->disciplina->categoria == 1)
                    
                                                    {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Mujeres)", []) !!}
                                                    @elseif($participacion->disciplina->categoria == 2)
                                                    {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Varones)", []) !!}
                                                    @else
                                                    {!! Form::label('disc',$participacion->disciplina->nombre_disc. " "."(Mixto)", []) !!}
                                                    @endif
                                                    <br>
                                                @endif  --}}
                    
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
                                </th>
                                
                                    @if (count($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club))>0)
                                    @php
                                    $i =  1
                                    @endphp
                                        @foreach ($inscripcion->gestion->club_participaciones->where('id_club',$club->id_club) as $disc)
                                        <tr class="table-bordered">
                                                <td class="text-center" style="padding: 0%">
                                                <div style="padding: 5px">{{$i}}</div>
                                                </td>
                                                <td style="width: 110px; padding: 0%"  class="text-center">
                                                <div style="padding: 5px"><img src="/storage/foto_disc/{{ $disc->disciplina->foto_disc }}" alt="" width="30px" height="30px" ></div>
                                                </td>
                                                <td colspan="2" style="padding: 0%">
                                                <div  style="padding: 5px">
                                                    {{strtoupper($disc->disciplina->nombre_disc)}}
                                                    {{$disc->disciplina->categoria == 1 ? '( Mujeres )':($disc->disciplina->categoria == 2 ? '( Hombres )':'( Mixto )')}}
                                                    {{$disc->disciplina->nombre_subcateg($disc->disciplina->sub_categoria)}}
                                                </td>
                                                </div>
                                                    
                
                                                @if ($inscripcion->gestion->periodo_inscripcion == 1)
                                                <td style="width: 50px; padding: 0%" class="text-center">
                                                    <div class="row">
                                                        <div class="col-6 text-center">
                                                          <a href="{{ route('disciplina.eliminar',$disc->id_club_part) }}" data-toggle="modal" class="" data-target="#Eliminar{{ $disc->id_club_part}}" >
                                                              <i title="Eliminar" class="material-icons delete_button button_redirect">
                                                                  delete
                                                               </i>
                                                          </a>
                                                        </div>
                                                        <div class="col-6 text-center">
                                                          <a href="{{ route('disciplina.ver_seleccion_club',$disc->id_club_part) }}" class="" >
                                                              <i title="Ver seleccion" class="material-icons delete_button button_redirect">
                                                                  group
                                                               </i>
                                                          </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                @else
                                                <td style="width: 50px; padding: 0%" class="text-center">
                                                    <a href="{{ route('disciplina.ver_seleccion_club',$disc->id_club_part) }}"class="">
                                                        <i title="Ver seleccion" class="material-icons delete_button button_redirect">
                                                            group
                                                        </i>
                                                    </a>
                                                </td>
                                                @endif
                
                                                
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
                    <br>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
@section('scripts')
{{--  
<script>
        
        {{--  (function(){
            window.addEventListener('load', active_link, false);
            function active_link(){
                document.getElementById('gestiones').className += " active";
            }
        }());  --}}
        </script>  --}}
 {!! Html::script('/js/cambiar_club_gestion.js') !!}
 {!! Html::script('/js/checkbox.js') !!}
@endsection