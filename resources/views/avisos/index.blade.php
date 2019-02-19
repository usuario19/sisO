@extends('plantillas.main')
@section('title')
	SisO: Avisos
@endsection
@section('content')

<div class="container table-responsive-xl">
    <div class="form-group col-md-12">
        <table class="table table-sm table-bordered">
            <thead>
                <th>
                    <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                        <h4 class="">AVISOS</h4></td>
                    </div>
                </th>
            </thead>
            <tbody>
            <tr> 
                <td>
                    <div style="float: left;" class="form-group col-md-10">
                        {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                    </div>
                    <div style="float: left;" class="form-group col-md-2">
                            
                           <a class="btn btn-warning btn-block" href="{{ route('aviso.create') }}"><span class="letter-size">Crear Aviso</span></a>
                    </div>
                        {{--  <button type="button" class="btn   btn-primary" data-toggle="modal" data-target="#modal">Agregar</button></div>  --}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    {{--  <div class="card container">
            
            <div class="card-body" style="padding: 10px">  --}}
                           
               <div class="container table-responsive-xl">
                   <table class="table table-condensed">
                       <thead>
                       <th width="50px">#</th>
                       <th>Administrador</th>
                       <th>Titulo</th>
                       <th>Gestion</th>
                       <th>Disciplina</th>
                       <th>Fecha inicio</th>
                       <th>Fecha fin</th>
                       <th>Contenido</th>
                       <th colspan="2"></th>
                         
                       </thead>
                       <tbody id="datos">
                       @php
                           $i=1;
                       @endphp
                       @foreach ($avisos as $aviso)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$aviso->administrador->nombre." ".$aviso->administrador->apellidos}}</td>
                            <td>{{$aviso->titulo}}</td>
                            @if ($aviso->gestion)
                                <td>{{$aviso->gestion->nombre_gestion}}</td >
                            @else
                                <td>-</td>
                            @endif
                            @if ($aviso->disciplina)
                                <td>{{$aviso->disciplina->nombre_disc." ".$aviso->disciplina->nombre_categoria($aviso->disciplina->categoria)}}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td>{{$aviso->fecha_ini_aviso}}</td>
                            <td>{{$aviso->fecha_fin_aviso}}</td>
                            <td>
                                <a  href="#vista_previa"  class="button_delete" data-toggle="modal" data-target="#{{ 'vista_previa'.$aviso->id_aviso }}" >
                                    <i title="Ver contenido" class="material-icons delete_button">
                                        description
                                    </i>
                                </a>
                            </td>
                            <td class="text-center" style="width: 100px">
                                <a href=" " class="button_delete" data-toggle="modal" data-target="#edit">
                                    <i title="Editar" class="material-icons delete_button button_redirect">
                                        edit
                                    </i>
                                </a>
                            </td>
                            <td class="text-center" style="width: 100px">
                                <a  href="#confirm?"  class="button_delete" data-toggle="modal" data-target="#exampleModal{{ $aviso->id_aviso }}" >
                                    <i title="Eliminar" class="material-icons delete_button">
                                        delete
                                    </i>
                                </a>
                            </td>
                            
                        </tr>
                        @php
                            $i++;
                        @endphp
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $aviso->id_aviso}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">SisO:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    Esta seguro de querer eliminar el aviso?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a href="" class="btn btn-primary"> Eliminar </a>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Modal vista previa-->
                        <div class="modal fade" id="{{ 'vista_previa'.$aviso->id_aviso}}" tabindex="-1" role="dialog" aria-labelledby="vista_previa" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">SisO: Vista previa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <?= $aviso->contenido?>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                            </div>
                        </div>
                       @endforeach
                       
                       
                       
                       </tbody>
                   </table>
               </div>
               
           {{--  </div>
          
       </div>  --}}
</div>
@endsection
@section('scripts')
	
@endsection