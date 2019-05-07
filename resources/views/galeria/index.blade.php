@extends('plantillas.main')
@section('title')
	SisO: Galeria
@endsection
@section('content')
<div class="container table-responsive-xl">
    <div class="form-group col-md-12">
        <table class="table table-sm table-bordered">
            <thead>
                <th {{--  style="background: #E74C3C"  --}}>
                    <div class=" container col-md-12 text-center" style="padding: 0px 0px;">
                            <h4 class="lista" style="color:darkslategray">Galeria</h4></td>
                    </div>
                </th>
            </thead>
            <tbody>
            <tr> 
                <td>
                    <div class="contenido_lista form-row col-md-12">
                        <div style="float: left;" class="form-group col-xl-9">
                                {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
                            </div>
                            <div style="float: left;" class="form-group col-xl-3">
                                    
                                    @include('centro.modal_agregar_imagen')
                            </div>
                    </div>
                        {{--  <button type="button" class="btn   btn-primary" data-toggle="modal" data-target="#modal">Agregar</button></div>  --}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    {{--  <div class="card container">  --}}
            
            <div class="form-group col-md-12" style="padding: 10px">
                           
               <div class="container table-responsive-xl">
                   <table class="mi_tabla table table-hover table-sm table-bordered">
                       <thead class="table-borderless">
                       <th width="50px">#</th>
                       <th>Titulo</th>
                       <th>Gestion</th>
                       <th>Disciplina</th>
                       <th>Fecha de<br>publicacion</th>
                       <th></th>
                       </thead>
                       <tbody id="datos">
                       @php
                           $i=1;
                       @endphp
                       @foreach ($datos as $aviso)
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td>{{$aviso->titulo}}</td>
                            @if ($aviso->gestion)
                                <td>{{$aviso->gestion->nombre_gestion}}</td >
                            @else
                                <td>-</td>
                            @endif
                            @if ($aviso->disciplina)
                                <td>{{$aviso->disciplina->nombre_disc." ".$aviso->disciplina->nombre_categoria($aviso->disciplina->categoria)." ".$aviso->disciplina->nombre_subcateg($aviso->disciplina->sub_categoria)}}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td>{{$aviso->fecha_publicacion}}</td>
                            {{--  <td class="text-center" style="width: 70px">
                                <a href="{{ route('aviso.edit',$aviso->id_aviso)}}" class="button_delete">
                                    <i title="Editar" class="material-icons delete_button button_redirect">
                                        edit
                                    </i>
                                </a>
                            </td>  --}}
                            <td class="text-center" style="width: 70px">
                                <a  href="#confirm?"  class="button_delete" data-toggle="modal" data-target="#exampleModal{{ $aviso->id_galeria }}" >
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
                        <div class="modal fade" id="exampleModal{{ $aviso->id_galeria}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header modal_advertencia">
                                <h5 class="modal-title" id="exampleModalLabel">Advertencia:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    Esta seguro de querer eliminar la foto?
                                </div>
                                <div class="modal-footer">
                                        <div class="col-6">
                                                <a href="{{ route('centro.eliminar_imagen',[$aviso->id_galeria])}}" class="btn btn-danger btn-block btn_eliminar"> Eliminar </a>
                                                </div>
                                                <div class="col-6">
                                                <a class="btn btn-outline-secondary btn-block" data-dismiss="modal">No</a>
                                        </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Modal vista previa-->
                       
                       @endforeach
                       
                       
                       
                       </tbody>
                   </table>
               </div>
            </div>
</div>
@endsection
@section('scripts')
    {!! Html::script('/js/filtrar_por_nombre.js') !!}
    {!! Html::script('/js/cargar_participacion.js') !!}
@endsection