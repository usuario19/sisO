@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="content">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb alert-info">
                 <li class="breadcrumb-item"><a href="{{ route('gestion.clasificacion',[$gestion->id_gestion]) }}">Disciplinas</a></li>
                 <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
                 <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
                 <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         
                 <li class="breadcrumb-item active" id="id_grupo" value="{{$grupo->id_grupo}}"  aria-current="page">{{ $grupo->nombre_grupo }}</li>
               </ol>
            </nav>
        </div>
      <div class="card-body">
          
          <div class="content"> 
            <ul id="tabsJustified" class="nav nav-tabs">
                <li class="nav-item">
                  <a href="" data-target="#clubs1" data-toggle="tab" class="nav-link active">Clubs</a></li>
                <li class="nav-item">
                  <a href="" data-target="#fechas1" data-toggle="tab" class="nav-link">Fechas</a></li>
                <li class="nav-item">
                    <a href="" data-target="#encuentros1" data-toggle="tab" class="nav-link">Encuentros</a></li>
              
            </ul>
            <br>
            <div id="tabsJustifiedContent" class="tab-content">
              <div id="clubs1" class="tab-pane fade active show">

                  <div class="table-responsive-xl  container col-md-10">
                      <table class="table table-sm table-bordered" style="margin: 0%; padding: 0%">
                          <tbody>
                          <tr> 
                                <td>
                                    <div style="float: left;" class="form-group col-md-10">
                                        {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar2','placeholder'=>'Buscar.....']) !!}
                                     </div>
                                     <div style="float: left;" class="form-group col-md-2">
                                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#v">Agregar</button>
                                     </div>
                                </td>
                          </tr>
                        </tbody>
                      </table>
                  </div><br>

                
                  @include('grupo.modal_agregar_equipos') 
                  <div class="table-responsive-xl container col-md-10">
                    <table class="table table-condensed">
                      <thead>
                        <th width="50px">ID</th>
                        <th>Logo</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                      </thead>
                      <tbody id="datos2">
                
                        @foreach($clubs as $club)
                          <tr>
                            <td>{{ $club->id_club }}</td>
                            <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>
                            <td>{{ $club->nombre_club }}</td>
                            <td><a href="{{ route('grupo.eliminar_club',[$club->id_grupo,$club->id_club_part]) }}" class="">
                            <i title="Eliminar" class="material-icons delete_button">delete</i>
                            </a></td>
                          </tr>
                        @endforeach
                        
                      </tbody>
                  </table>
                  </div>
                  
                </div> 
             
           <div id="fechas1" class="tab-pane fade"> 

              <div class="table-responsive-xl  container col-md-10">
                  <table class="table table-sm table-bordered" style="margin: 0%; padding: 0%">
                      <tbody>
                      <tr> 
                            <td>
                                <div style="float: left;" class="form-group col-md-10">
                                    {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                                 </div>
                                 <div style="float: left;" class="form-group col-md-2">
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalFecha">Agregar</button>
                                 </div>
                            </td>
                      </tr>
                    </tbody>
                  </table>
              </div><br>
              
            
            @include('fechas.modal_registrar_fecha')
            <div class="table-responsive-xl container col-md-10">
                <table class="table table-sm">
                    <thead>
                      <th width="" class="text-center">ID</th>
                      <th>Nombre</th>
                      <th colspan="2" style="text-align: center">Acciones</th>
                    </thead>
                    <tbody id="datos">
                       @foreach ($fechas as $fecha)
                        <tr>    
                          <td class="text-center">{{ $fecha->id_fecha}}</td>
                          <td>{{ $fecha->nombre_fecha}}</td>
                          <td style="width: 70px"><a href="" class="">
                              <i title="Editar" class="material-icons delete_button">
                                  edit</i>
                          </a></td>
                          <td style="width: 70px">
                            <a href="">
                              <i title="Eliminar" class="material-icons delete_button">
                             delete</i>
                            </a></td>
                        </tr>
                      @endforeach            
                    </tbody>
                </table>
            </div>
               
           </div>


              <div id="encuentros1" class="tab-pane fade">
                  <div class="table-responsive-xl  container col-md-12">
                      <table class="table table-sm table-bordered" style="margin: 0%; padding: 0%">
                          <tbody>
                          <tr> 
                            <th style="padding: 0%">
                                {{-- <div class="float-left col-md-6" style="margin: auto; padding-top:8px">
                                  Lista de Encuentros
                                </div> --}}
                                <div style="float: left;" class="form-group col-md-6" style="padding: 0%">
                                    <a href="{{ route('encuentro.fixture') }}" class="btn-link btn btn-block"  style="padding: 0%">
                                      <i title="Fixture" class="material-icons btn">
                                        event_note</i> 
                                        <span>Generar fixture</span>
                                      </a>
                                  </div>
                                  <div style="float: left;" class="form-group col-md-6" style="padding: 0%">
                                    @include('encuentro.modal_agregar_encuentro')
                                  </div>
                            </th>
                          </tr>
                        </tbody>
                      </table>
                  </div><br>

                
                    
           
              @foreach ($fechas as $fecha)
                 
                 <table class="table table-condensed">
                     <thead>
                       <tr class="badge-light">
                         <th colspan="9">
                            <div class="text-center">
                                <span style=" ">{{ $fecha->nombre_fecha }}</span>
                             </div>
                         </th>
                       </tr>
                       <th width="50px">ID</th>
                       <th colspan="2" style="text-align: center;">Equipos</th>
                       <th>Fecha</th>
                       <th>Hora</th>
                       <th>Ubicacion</th>
                       <th>Detalle</th>
                       <th colspan="2">Acciones</th>
                     </thead>
                     <tbody>
                       @foreach($fecha->encuentros as $encuentro)
                         <tr>
                           <td>{{ $encuentro->id_encuentro }}</td> 
                             @foreach ($encuentro->encuentro_club_participaciones as $equipo)
                               <td  style="width: 200px" class="text-center"><img class="img-thumbnail" src="/storage/logos/{{ $equipo->club_participacion->club->logo}}" alt="{{ $equipo->club_participacion->club->nombre_club}}" height=" 50px" width="50px">
                                <br><span>{{ $equipo->club_participacion->club->nombre_club}}</span>
                              </td>
                             @endforeach
                           <td>{{ $encuentro->fecha}}</td>
                           <td>{{ $encuentro->hora}}</td>
                           <td>{{ $encuentro->ubicacion}}</td>
                           <td>{{ $encuentro->detalle}}</td>                 
                           <td><a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}" data-toggle="modal" data-target="#modalEliminar"><i title="Eliminar" class="material-icons delete_button">
                              delete</i></a></td>
                           
                           <td><a href="{{ route('encuentro.mostrar_resultado',$encuentro->id_encuentro) }}"><i title="Resultados" class="material-icons delete_button">
                              description</i></a></td>
                         </tr>
                       @endforeach            
                     </tbody>
                 </table>
              @endforeach
              </div>
            </div>
          </div>
          
          <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Esta seguro de eliminar?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Aceptar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('/js/filtrar_por_nombre.js') !!}
{!! Html::script('/js/checkbox.js') !!}
@endsection
