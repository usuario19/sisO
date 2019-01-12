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
                            
                            @include('avisos.modal_agregar_aviso')
                    </div>
                        {{--  <button type="button" class="btn   btn-primary" data-toggle="modal" data-target="#modal">Agregar</button></div>  --}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="card container">
            
            <div class="card-body" style="padding: 10px">
                           
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
                       <th colspan="2">Acciones</th>
                         
                       </thead>
                       <tbody id="datos">
                       @php
                           $i=1;
                       @endphp
           
                       @foreach($datos as $dato)
                       
                           <tr>
                           <td>{{$i}}{{-- {{ $disciplina->id_disc}} --}}</td>
           
                           <td>{{ $dato->nombre_centro}}</td>
                            <td><a href="{{ $dato->ubicacion_centro}}">
                                    <i class="material-icons float-left">location_on</i>
                                    <span class="letter-size">{{$dato->nombre_centro}}</span>
                                </a>
                            </td>
                                <td></td>
                            
                            <td style="width: 70px"><a{{--   onclick="MostrarDisc({{ $disciplina->id_disc }});"  --}}  class="" data-toggle="modal" data-target="#modalEditDisc">
                                <i title="Editar" class="material-icons delete_button button_redirect">
                                    edit
                                 </i></a></td>
        
                            <td style="width: 70px">
                                <a href="{{ route('centro.delete',$dato->id_centro) }}" class="">
                                    <i title="Eliminar" class="material-icons delete_button button_redirect">
                                            delete
                                         </i></td>
                           
                           </tr>
                           @php
                           $i++;
                           @endphp
                       @endforeach
                       
                       </tbody>
                   </table>
               </div>
               
           </div>
          
       </div>
</div>
@endsection
@section('scripts')
	
@endsection