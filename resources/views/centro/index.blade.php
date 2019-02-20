@extends('plantillas.main')
@section('title')
	SisO: Centros
@endsection
@section('content')

<div class="container table-responsive-xl">
    <div class="form-group col-md-12">
        <table class="table table-sm table-bordered">
            <thead>
                <th>
                    <div class=" container col-md-12 text-center" style="padding: 0px 0px;">
                            <h4 class="title-principal" style="color:darkslategray">centros</h4></td>
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
                            
                            @include('centro.modal_agregar_centro')
                    </div>
                        {{--  <button type="button" class="btn   btn-primary" data-toggle="modal" data-target="#modal">Agregar</button></div>  --}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
            
    <div class="container table-responsive-xl">
        <table class="table table-bordered">
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
                <td>{{$i}}</td>

                <td>{{ $dato->nombre_centro}}</td>
                <td><a href="{{ $dato->ubicacion_centro}}" style="color: #EA4335">
                        <i class="material-icons float-left">location_on</i>
                        <span class="letter-size">{{$dato->nombre_centro}}</span>
                    </a>
                </td>
                <td>{{$dato->descripcion_centro}}</td>
                
                <td style="width: 70px">
                    <a href="#?"  class="button_delete" data-toggle="modal" data-target="#editar{{ $dato->id_centro }}">
                        <i title="Editar" class="material-icons delete_button button_redirect">
                            edit
                        </i>
                    </a>
                </td>

                <td style="width: 70px">
                    <a href="#?"  class="button_delete" data-toggle="modal" data-target="#{{ $dato->id_centro }}">
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
                <div class="modal fade" id="{{ $dato->id_centro}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SisO:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Esta seguro de querer eliminar el centro?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="{{ route('centro.delete',$dato->id_centro) }}" class="btn btn-primary"> Eliminar </a>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Modal edit -->
                <div class="modal fade" id="editar{{ $dato->id_centro}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SisO: Editar centro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        {!! Form::model($dato, ['route'=>['centro.update',$dato->id_centro],'method'=>'PUT']) !!}
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('nombre_centro', 'Centro', []) !!}
                                    {!! Form::text('nombre_centro', null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('ubicacion_centro', 'Ublicacion', []) !!}
                                    {!! Form::text('ubicacion_centro', null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('descripcion_centro', 'Descripcion', []) !!}
                                {!! Form::textArea('descripcion_centro', null, ['class'=>'form-control' ,'rows'=>4]) !!}
                            </div> 
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-secondary']) !!}
                            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    </div>
                </div>
            @endforeach
            
            </tbody>
        </table>
    </div>
               
</div>
@endsection
@section('scripts')
	
@endsection