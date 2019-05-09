@extends('plantillas.main') 
@section('title') SisO - Lista de Disciplinas
@endsection
 
@section('submenu')
@endsection
 
@section('content')
<div class="form-row">
  @include('plantillas.menus.menu_gestion')

  <div class="margin_top col-md-9">
    <div class="">
      <div class="card-">
        <table class="table table-sm table-bordered" style="margin: 0%">
          <thead>
            <th>
              <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                <h4 class="lista_sub">DISCIPLINAS HABILITADAS</h4>
                </td>
              </div>
            </th>
          </thead>
          <tbody>
            <tr>
              @if(Auth::check() && Auth::user()->tipo == 'Administrador')
              <td>
                <div class="contenido_lista form-row">
                  <div class="form-group col-xl-9">
                    {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                  </div>
                  <div class="form-group col-xl-3">
                      @include('admin.modal_registrar_disciplinas')
                  </div>
                </div>
                @else
                <td>
                  <div style="float: left;" class="form-group col-md-12">
                    {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                  </div>
                </td>
                @endif
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-">
        <div class="table-responsive-xl">
          <table class="table mi_tabla table-bordered table-hover">
            <thead>
              <th width="30">ID</th>
              <th width="100">Logo</th>
              <th style="width:100px">Nombre</th>
              <th style="width:100px">Categoria</th>
              <th style="width:100px">SubCategoria</th>
              <th width="200">Reglamento</th>
              <th>Descripcion</th>
              <th width="50"></th>
            </thead>
            <tbody id="datos">
              @foreach($disciplinas as $disciplina)
              <tr class="link_pointer" style="cursor:pointer" data-href="{{ route('gestion.inscripcion_club_disc',[$gestion->id_gestion, $disciplina->id_disc]) }}">
                <td class="text-center">{{ $disciplina->id_disc}}</td>
                <td class="text-center"><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 40px" width="40px"></td>
                <td>{{ $disciplina->nombre_disc}}</td>
                @switch($disciplina->categoria) @case(0)
                <td>{{ 'Mixto' }}</td>
                @break @case(1)
                <td>{{ 'Damas' }}</td>
                @break @case(2)
                <td>{{ 'Varones' }}</td>
                @break @endswitch
                @switch($disciplina->sub_categoria)
                @case(null)
                  <td></td>
                  @break 
                @case(0)
                  <td>{{ 'Senior' }}</td>
                  @break 
                @case(1)
                  <td>{{ 'Libre' }}</td>
                  @break 
                @case(2)
                  <td>{{ 'Senior - Libre' }}</td>
                  @break
                @case(3)
                  <td>{{ 'Senior y/o Libre' }}</td>
                  @break
                
                @endswitch
                <td>
                  @if($disciplina->reglamento_disc)
                  <a class="button_redirect" href="storage/archivos/{{ $disciplina->reglamento_disc }}">
                    <div class="button-div" style="">
                      <i title="Descargar" class="material-icons delete_button button_redirect">vertical_align_bottom</i>
                    </div>
                    @endif
                </td>
                <td> {{ $disciplina->descripcion_disc}}</td>
                <td><a class="button_redirect" href="{{ route('gestion.eliminar_disciplina',[$gestion->id_gestion,$disciplina->id_disc]) }}" data-toggle="modal"
                    class="button_delete" data-target="#Eliminar{{$disciplina->id_disc }}">
                          <i title="Eliminar" class="material-icons delete_button button_redirect">delete</i>
                        </a>
                  
                </td>
                {{-- <td>
                  <a href="#?" data-toggle="modal" class="button_delete" data-target="#inscribir{{$disciplina->id_disc }}">
                          <i title="Añadir Clubs a esta disciplina" class="material-icons delete_button">group_add</i>
                        </a>
                  <!-- Modal -->
                    {!! Form::open(['route'=>'gestion.inscripcion_club_disciplina','method' => 'POST'/* ,'id'=>'formreg_disc','class'=>'form_disc_reg' */]) !!}
                    <div class="modal fade" id="inscribir{{ $disciplina->id_disc}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Seleccione los clubs que participaran en la disciplina {{ $disciplina->nombre_disc." ".($disciplina->categoria == 1 ?'Damas':($disciplina->categoria == 2 ? 'Varones':'Mixto'))." :"}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div style="display:none">
                                {!! Form::text('id_gest', $gestion->id_gestion, []) !!}
                                {!! Form::text('id_disc', $disciplina->id_disc, []) !!}
                            </div>
                            <ul class="list-group">
                              
                              <li class="list-group-item">
                                  <div class="form-row">
                                      <div class="col-1">
                                        {!! Form::checkbox('todo','todo', false, ['class'=>'check_all','id'=>"check_us".$disciplina->id_disc]) !!}
                                      </div>
                                      <div class="col-11">
                                      {!! Form::label('check_us'.$disciplina->id_disc,  'Seleccione:', []) !!}
                                      </div>
                                    </div>
                                  </li>
                              </li>
                              @foreach ($inscritos as $item)
                              
                              <li class="list-group-item">
                                  <div class="form-row">
                                    <div class="col-1">
                                        {!! Form::checkbox('id_clubs[]',$item->admin_club->club->id_club, false, ['class'=>"check_us".$disciplina->id_disc,'id'=>"check".$item->admin_club->club->id_club]) !!}
                                    </div>
                                    <div class="col-11">
                                        {!! Form::label("check".$item->admin_club->club->id_club, $item->admin_club->club->nombre_club , []) !!}
                                    </div>
                                  </div>
                                </li>
                              @endforeach
                            </ul>
                          </div>
                          <div class="modal-footer">
                            <div class="row col-md-12">
                              <div class="form-group col-md-6">
                                <button class="button_spiner btn btn-block btn-success" type="button" disabled style="display:none">
                                      <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                      Cargando...
                                      </button> {!! Form::submit('aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
                              </div>
                              <div class="form-group col-md-6">
                                {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
<<<<<<< HEAD
                    </div>
                  {!! Form::close() !!}
                </td> --}}

                <!-- Modal -->
                  <div class="modal fade" id="Eliminar{{ $disciplina->id_disc}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header modal_advertencia">
                          <h5 class="modal-title" id="exampleModalLabel">ADVERTENCIA:</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
=======
                  </th>
                  </thead>
              <tbody>
              <tr> 
                    @if(Auth::check() && Auth::user()->tipo == 'Administrador')
                    <td>
                        <div style="float: left;" class="form-group col-md-10">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                         </div>
                         <div style="float: left;" class="form-group col-md-2">
                               
                            @include('admin.modal_registrar_disciplinas')
                         </div>
                    </td>
                    @else
                    <td>
                        <div style="float: left;" class="form-group col-md-12">
                            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
>>>>>>> refs/remotes/origin/master
                        </div>

                        <div class="modal-body">
                          ¿Esta seguro de querer eliminar la esta disciplina?
                        </div>

                        <div class="modal-footer">
                          <div class="form-group col-md-6">
                            <a href="{{ route('gestion.eliminar_disciplina',[$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn-block btn-danger">Eliminar</a>
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
            </tbody>
          </table>
<<<<<<< HEAD
=======
      </div>
        <div class="card-body">
          <div class="table-responsive-xl">
              <table class="table table-condensed">
                  <thead>
                    <th width="50px">#</th>
                    <th width="100px">Logo</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Reglamento</th>
                    <th width="150px">Descripcion</th>
                    <th>Accion</th>
                  </thead>
                  <tbody id="datos">
                    @php($i=1)
                    @foreach($disciplinas as $disciplina)
                      <tr>
                        <td>{{ $i}}</td>
                        <td><img class="img-thumbnail" src="/storage/foto_disc/{{ $disciplina->foto_disc }}" alt="" height=" 40px" width="40px"></td>
                        <td>{{ $disciplina->nombre_disc}}</td>
                         @switch($disciplina->categoria)
                            @case(0)
                                <td>{{ 'Mixto' }}</td>
                                @break
                        
                           @case(1)
                                <td>{{ 'Damas' }}</td>
                                @break
                                @case(2)
                                <td>{{ 'Varones' }}</td>
                                @break
                        @endswitch
                        <td><a href="storage/archivos/{{ $disciplina->reglamento_disc }}">
                          <div class="button-div" style="">
                              <i title="Descargar" class="material-icons delete_button">vertical_align_bottom</i>
                          </div>
                        </td>
                        <td> {{ $disciplina->descripcion_disc}}</td>
                        <td><a  href="" data-toggle="modal" data-target="#modalEliminar{{ $disciplina->id_disc }}">
                          <i title="Eliminar" class="material-icons delete_button">delete</i>
                        </a></td>
                        {{--  modal eliminar  --}}
      <div class="modal fade" id="modalEliminar{{ $disciplina->id_disc}}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarLabel">Advertencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Esta seguro de eliminar?
              </div>
              <div class="modal-footer">
                <div class="row col-md-12">
                  <div class="form-group col-md-6">
                 <a href="{{ route('gestion.eliminar_disciplina',[$gestion->id_gestion,$disciplina->id_disc]) }}" class="btn btn_aceptar btn-block"> Aceptar </a>

                  </div>
                  <div class="form-group col-md-6">
                      <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">cancelar</button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        {{--  fin de modal eliminar  --}}
                      </tr>
                      @php($i++)
                    @endforeach
                  </tbody>
              </table>
          </div>
            
>>>>>>> refs/remotes/origin/master
        </div>

      </div>
    </div>
  </div>
</div>
</div>
@endsection
 
@section('scripts')
<<<<<<< HEAD
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
      if(elemento.className.indexOf('button_redirect') == -1)//si no lo encuentra
        {
          window.location = elemento.parentNode.getAttribute('data-href');
          console.log(e.target)
          console.log(elemento.parentNode.getAttribute('data-href'));
        }
      console.log(elemento);
    }
  }())
</script>
{!! Html::script('/js/filtrar_por_nombre.js') !!} 
{!! Html::script('/js/validacion_ajax_disc_reg.js')!!} 
{!! Html::script('/js/checkbox.js') !!}
=======
{!! Html::script('/js/filtrar_por_nombre.js') !!}

>>>>>>> refs/remotes/origin/master
@endsection