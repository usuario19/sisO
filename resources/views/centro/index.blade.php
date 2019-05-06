@extends('plantillas.main')
@section('title')
	SisO: Centros
@endsection
@section('content')
<div class="container">
<div class="table-responsive-xl">
    <div class="form-group col-md-12">
        <table class="table table-sm table-bordered">
            <thead>
                <th>
                    <div class=" container col-md-12 text-center" style="padding: 0px 0px;">
                            <h4 class="lista" style="color:darkslategray">centros</h4></td>
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
                                
                                @include('centro.modal_agregar_centro')
                        </div>
                        {{--  <button type="button" class="btn   btn-primary" data-toggle="modal" data-target="#modal">Agregar</button></div>  --}}
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
            
    <div class="container table-responsive-xl">
        <table class="mi_tabla table table_hover table-bordered">
            <thead class="table-borderless">
            <th width="50px">#</th>
            
            <th>Centro</th>
            <th>Ubicacion</th>
            <th>Descripcion</th>
            <th colspan="2">Acciones</th>
                
            </thead>
            <tbody id="datos" class="table-sm">
            @php
                $i=1;
            @endphp

            @foreach($datos as $dato)
            
                <tr>
                <td class="text-center">{{$i}}</td>

                <td>{{ $dato->nombre_centro}}</td>
                <td><a href="{{ $dato->ubicacion_centro}}" style="color: #EA4335" target="_blank">
                        <i class="material-icons float-left">location_on</i>
                        <span class="letter-size">{{$dato->nombre_centro}}</span>
                    </a>
                </td>
                <td>{{$dato->descripcion_centro}}</td>
                
                <td class="text-center" style="width: 70px">
                    <a href="#?" onclick="MostrarCentro({{ $dato->id_centro }});" class="button_delete" data-toggle="modal" data-target="#editar{{-- {{ $dato->id_centro }} --}}">
                        <i title="Editar" class="material-icons delete_button button_redirect">
                            edit
                        </i>
                    </a>
                    @include('centro.modal_editar_centro')

                    <!-- Modal edit -->
                {{-- {!! Form::model($dato, ['route'=>['centro.update',$dato->id_centro],'method'=>'PUT','class'=>'form_update_centro','id'=>'update_centro'.$dato->id_centro ]) !!}

                <div class="modal fade" id="editar{{ $dato->id_centro}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar centro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="container col-md-11">
                        <div class="modal-body">
                            <div class="form-row noVista">
                                <div class="form-group col-md-12">
                                    {!! Form::label('id_centro', 'ID', []) !!}
                                    {!!Form::text('id_centro',$dato->id_centro,[])!!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('nombre_centro', 'Centro', []) !!}
                                    {!! Form::text('nombre_centro', null, ['class'=>'form-control']) !!}
                                    <div class="form-group"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('ubicacion_centro', 'Ublicacion', []) !!}
                                    {!! Form::text('ubicacion_centro', null, ['class'=>'form-control']) !!}
                                    <div class="form-group"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-12">
                                            {!! Form::label('descripcion_centro', 'Descripcion', []) !!}
                                            {!! Form::textArea('descripcion_centro', null, ['class'=>'form-control' ,'rows'=>4]) !!}
                                            <div class="form-group"></div>
                                        </div> 
                            </div>
                            
                        </div>
                        </div>
                        <div class="modal-footer">
                                <div class="col-md-6">
                                    {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar btn-primary btn_aceptar']) !!}
                                    </div>
                                    <div class="col-md-6">
                                    {!! Form::reset('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
                                    </div>
                        </div>
                    </div>
                    </div>
                </div>
                {!! Form::close() !!} --}}
                </td>

                <td class="text-center" style="width: 70px">
                    <a href="#?"  class="button_delete" data-toggle="modal" data-target="#eliminar{{ $dato->id_centro }}">
                        <i title="Eliminar" class="material-icons delete_button button_redirect">
                            delete
                        </i>
                    </a>
                </td>
                
                </tr>
                @php
                $i++;
                @endphp

                <!-- Modal -->
                <div class="modal fade" id="eliminar{{ $dato->id_centro}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelElimnar" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal_advertencia">
                        <h5 class="modal-title" id="exampleModalLabel">Advertencia:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Esta seguro de querer eliminar el centro?
                        </div>
                        <div class="modal-footer">
                                <div class="col-6">
                                <a href="{{ route('centro.delete',$dato->id_centro) }}" class="btn btn-danger btn-block btn_eliminar"> Eliminar </a>
                                </div>
                                <div class="col-6">
                                <a class="btn btn-outline-secondary btn-block" data-dismiss="modal">No</a>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
                
            @endforeach
            
            </tbody>
        </table>
    </div>
               
</div>
</div>
@endsection
@section('scripts')
<script> 
        var MostrarCentro = function(id){
        $(".loading").show();

        $.each($('#form_update').find(':input'),function(){
            $("#form_update").find(':input[name='+ $(this).attr('name')+']').removeClass('is-invalid');
            $("#form_update").find(':input[name='+ $(this).attr('name')+']').removeClass('is-valid');
            });
            $("#edit_nombre_centro").val("");
            $("#edit_descripcion_centro").val("");
            $('#edit_ubicacion_centro').val("");
          var route = "{{ url('centro') }}/"+id+"/edit";
          $.get(route, function(data){
              $('#edit_id_centro').val(data.id_centro);
            $("#edit_nombre_centro").val(data.nombre_centro);
            $("#edit_descripcion_centro").val(data.descripcion_centro);
            $("#edit_ubicacion_centro").val(data.ubicacion_centro);
            $(".loading").hide();
          });
        }
    </script>
    {!! Html::script('/js/filtrar_por_nombre.js') !!}
    {!! Html::script('/js/validaciones.js') !!}
    {!! Html::script('/js/validacion_ajax_request_centro.js') !!}
    {!! Html::script('/js/validacion_ajax_request_centro_update.js') !!}
    {!! Html::script('/js/reset_inputs.js') !!}
@endsection