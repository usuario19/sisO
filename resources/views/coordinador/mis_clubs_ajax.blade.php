@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs Coordinador
@endsection

@section('content')


<div class="container">
        <div class="container col-md-12 table-responsive">
            <div class="container col-md-12" style="background: #F39C12 ;height: 40px; margin:10px 0%">
                <div class="form-row" >
                    <div class="container input-group mb-3 col-md-10">
                        <div class="input-group-prepend">
                            <label class="input-group-text title-principal" for="id_club_inf" style="color: white; background: no-repeat; border: none;font-size: 16px;font-weight: 100; padding: 0%">MIS CLUBS 
                                <i class = "material-icons btn" style="padding: 5px"> 
                                        keyboard_arrow_right
                                </i></label>
                            </label>
                            {!! Form::select('id_club',$mis_clubs,'', ['class'=>'custom-select btn select_jq','id'=>'id_club_inf']) !!}</td>
                        </div>
                    </div>
                    <div class=" input-group mb-3 col-md-12">
                        <div id="cargando" style="display: none; padding:0 0 10px 0" class="col-md-12">
                            <img src="/storage/logos/loader22.gif" alt="" height="30">
                        </div> 
                    </div>
                </div>
            </div>
            @if ($club)
            <div id="contenido">
                <table class="table table-condensed">
            
                    <thead>
                    <tr class="table table-bordered">
                        <td colspan="3" style="margin: 0%; padding: 0%">
                            <div class="container text-center cabecera">
                                <h5 class="title-principal" style="margin: AUTO; color: black; font-weight: 400; font-size: 20px">
                                {{ strtoupper($club->club->nombre_club)}}</h5>
                        </div> 
                        </td>
                        <td style="width: 70px;padding: 0%"  class="table table-bordered text-center">
                            <a href="{{ route('coordinador.informacion_club', $club->first()->id_club) }}" data-toggle="modal" data-target=".bd-example-modal-lg" class="" title="Editar" style="padding: 0%" > 
                                <span class="">
                                    <i id="btnCancelar" class="material-icons delete_button">settings</i>
                                </span>
                            </a>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                        @if (Auth::user()->tipo == 'Coordinador')
                            <tr>
                                <td style="padding: 10px 0%" colspan="3">
                                        <img class="rounded mx-auto d-block" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 200px" width="200px">
                                </td>
                                <td style="border-left-color: solid 2px antiquewhite"></td>
                            </tr>
                                
                        @else
                        <tr>
                                <td style="padding: 10px 0%" colspan="3">
                                        <img class="rounded mx-auto d-block" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 200px" width="200px">
                                </td>
                                <td style="border-left-color: solid 2px antiquewhite"></td>
                            </tr>
                        {{--  <tr>
                                <td style="width: 50px">
                                    <a href="{{ route('coordinador.informacion_club', $club->id_club) }}" title="Editar" class="" {{-- style="background-color: #63686e" --}}> 
                                    
                                        {{--  <span class="">
                                            <i id="btnCancelar" class="material-icons delete_button">settings</i>
                                            
                                        </span>
                                            
                                    </a>
                                    <td colspan="4" rowspan="4" style="padding: 10px 0%"><img class="rounded mx-auto d-block" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 200px" width="200px">
                                    </td>
                                    <tr>
                                        <td>
                                            <a href="{{ route('coordinador.show', $club->first()->id_club) }}" title="Ver jugadores" class="delete_button" {{-- style="background-color: #ff9f68" --}}>
                                                {{--  <span class="btn_hover ">
                                                        <i id="btnCancelar" class="material-icons delete_button" style="color:darkslategrey">group</i>
                                                        
                                                </span>
                                            </a>
                                        </td>  --}} 
                                        
                                   {{--   </tr>
                                    <tr>
                                        <td rowspan="10">
                                                <a href{{--  {{--  ="{{ route('coordinador.informacion_club_gestiones', $club->first()->id_club) }}" title="Ver Gestiones" class="delete_button" {{-- style="background-color: #ff9f68" --}}>
                                                        {{--  <span class="btn_hover ">
                                                                <i id="btnCancelar" class="material-icons delete_button" style="color:darkslategrey">flag</i>
                                                                
                                                        </span>
                                                    </a>
                                        </td>
                                        
                                    </tr>
                                </td> 
                            </tr>  --}} 
                            <tr></tr>  
                        @endif
                        
                        
                    
                        <tr class="table table-bordered">
                            <th style="width:200px"><div class="display-6">NOMBRE DEL CLUB:</div></th>
                            <td colspan="3">{{ $club->club->nombre_club}}</td>
                        </tr>
            
                        <tr class="table table-bordered">
                            <th><div>CIUDAD:</div></th>
                            <td colspan="3">{{ $club->club->ciudad}}</td>
                        </tr>
                        <tr class="table table-bordered">
                            <th><div>DESCRIPCION:</div></th>
                            <td class="text-justify" colspan="3">{{ $club->club->descripcion_club}}</td>
                        </tr>
                    {{--  MODAL EDITAR  --}}

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar informacion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                            
                                            <div class="form-row">
                                                <div class=" container col-xl-4">
                                                    <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}} class="text-center">
                                                                
                                                        <div class="text-center" {{--  style="position:relative"  --}}>
                                                                                            
                                                            <div id="contenedor_perfil">
                                                                <img id="imgOrigen" class="img-thumbnail rounded mx-auto d-block imginfo_perfil" src="/storage/logos/{{ $club->club->logo }}" alt="" height=" 150px" width="150px">
                                    
                                                                <div id="divtexto">
                                                                    <a id="btnCancelar" title="Cancelar" class="btn btn-outline-dark button noVista">
                                                                        <span class="btn_hover ">
                                                                            <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                                                                            
                                                                        </span>
                                                                    </a>
                                                                    <a id="texto" title="Editar" class="btn btn-dark button vista">
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
                                                </div>
                                                <div class="col-xl-7">


                                                    {!! Form::model($club->club, ['route'=>['coordinador.update_club',$club->id_club],'method'=>'PUT','enctype'=>'multipart/form-data','file'=>true]) !!}
                                                    <div class="container col-md-10">
                                                            <div id="div_file" style="display: none;">
                                                                {!! Form::text('id_club',$club->id_club, []) !!}
                                                                {!! Form::file('logo', ['class'=>'upload','id'=>'input']) !!}
                                                            </div> 
                                                        <div class="form-row">
                                                                 
                                                
                                                            <div class="form-group col-md-12">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        {!! Form::label('nombre_club', 'Nombre del Club', []) !!}
                                                                        {!! Form::text('nombre_club',$club->nombre_club,['class'=>'form-control'])!!}
                                                
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        {!! Form::label('ciudad', 'Ciudad', []) !!}
                                                                        {!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], $club->ciudad , ['class'=>'form-control']) !!}
                                                                    </div>
                                                                </div>
                                                
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        {!! Form::label('descripcion_club', 'Descripcion', []) !!}
                                                                        {!! Form::textarea('descripcion_club', $club->descripcion_club, ['class'=>'form-control','rows'=>4]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        {!! Form::submit('Aceptar', ['class'=>'btn btn-primary btn-block']) !!}
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <a href="" class="btn btn-block btn-secondary" data-dismiss="modal">Cancelar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
            </div>
            @endif
        </div>
</div>
@endsection
@section('scripts')
{!! Html::script('/js/vista_previa.js') !!} 

{{--  <script>
        (function(){
            window.addEventListener('load', active_link, false);
            function active_link(){
                document.getElementById('mis_clubs').className += " active";
            }
        }());
        </script>  --}}
 {!! Html::script('/js/cambiar_club_inf.js') !!}
    
@endsection