@extends('plantillas.main')

@section('title')
    SisO - Club
@endsection

@section('content')
@if($club)
  <div class="container col-md-10">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('coordinador.index')}}">Clubs</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $club->nombre_club }}</li>
              </ol>
          </nav>
  </div>

  <div class="container col-md-10">
      <div class="card">
          <div class="card-header" style="padding: 0%">
              <div class="container text-center" style="padding: 15px 0px; margin: auto; min-height: 50px; background: white  ; color: ">
                  <h5 {{-- class="display-4" --}} style="margin: AUTO">{{ strtoupper($club->nombre_club)}}</h5>
          </div>
          </div>
              
          <div class="card-body">
            
            <div class="container">
                        
              <div class="form-row">
                <div class=" container col-md-3">
                  <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}} class="text-center">
                              
                  <div class="text-center" {{--  style="position:relative"  --}}>
                                                      
                    <div id="contenedor_perfil">
                                  <img id="imgOrigen" class="img-thumbnail rounded mx-auto d-block imginfo_perfil" src="/storage/logos/{{ $club->logo }}" alt="" height=" 150px" width="150px">
      
                                  <div id="divtexto">
                                      <a id="btnCancelar" title="Cancelar" class="btn btn-outline-dark button noVista">
                                          <span class="btn_hover ">
                                              <i id="btnCancelar" class="material-icons float-left" style="color:white">clear</i>
                                              
                                          </span>
                                      </a>
                                      <a id="btnUpdate" title="Actualizar" class="btn btn-outline-dark button noVista">
                                          <span class="btn_hover ">
                                              <i id="btnUpdate" class="material-icons float-left" style="color:white">loop</i>
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
              <div class="col-md-7">
                {!! Form::model($club, ['route'=>['coordinador.update_club',$club->id_club],'method'=>'PUT','enctype'=>'multipart/form-data','file'=>true]) !!}
              <div class="container col-md-10">
              <div class="form-row">
              {{--  <div class="form-group col-md-4">
              <div class="form-row">
              <div class="form-group col-md-12">
              <img id="imgOrigen" class="rounded mx-auto d-block float-left" src="/storage/logos/{{$club->logo}}" alt="" height="200px" width="200px" >
              <img id="imgParcial" height="200px" width="200px" class="noVista" src="" alt="">
              </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-5">
              
              <div id="div_file">
              <img id="texto" src="/storage/fotos/subir.png"  alt="">
              {!! Form::file('logo', ['class'=>'upload','id'=>'input']) !!}
              </div>
              </div>
              
              <div class="form-group col-md-5" id="content" style="">
              <div><img id="btnCancelar" class="noVista" src="/storage/fotos/cancelar.png"  alt=""></div>
              </div>
              </div>
              </div>  --}}
              <div class="form-group col-md-12">
              <div class="form-row">
              <div class="form-group col-md-6">
              {!! Form::label('nombre_club', 'Nombre del Club', []) !!}
              {!! Form::text('nombre_club',$club->nombre_club,['class'=>'form-control'])!!}
              
              </div>
              {{--  </div>  --}}
              
              {{--   <div class="form-row">
              <div class="form-group col-md-12">
              {!! Form::label('alias_club', 'Alias del Club', []) !!}
              {!! Form::text('alias_club', null, ['class'=>'form-control']) !!}
              </div>
              </div>
              
              <div class="form-row">
              <div class="form-group col-md-12">
              {!! Form::label('color_club', 'Color del Club', ['class'=>'']) !!}
              {!! Form::color('color_club', null , ['class'=>'']) !!}
              </div>
              </div>  --}}
              {{--   @if(Auth::User()->tipo == 'Administrador')
              <div class="form-row">
              <div class="form-group col-md-12">
              {!! Form::label('id_administrador', 'Coordinador', []) !!}
              {!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}
              
              </div>
              </div>
              @else
              <div class="form-row" style="display: none;">
              <div class="form-group col-md-12">
              {!! Form::label('id_administrador', 'Coordinador', []) !!}
              {!! Form::select('id_administrador', $administradores,null, ['class'=>'form-control']) !!}
              
              </div>
              </div>
              @endif  --}}
              
              {{--  <div class="form-row">  --}}
              <div class="form-group col-md-6">
              {!! Form::label('ciudad', 'Ciudad', []) !!}
              {!! Form::select('ciudad', ['Cochabamba'=> 'Cochabamba','La Paz'=>'La Paz', 'Santa Cruz'=>'Santa Cruz','Potosi'=>'Potosi','Oruro'=>'Oruro','Tarija'=>'Tarija','Chuquisaca'=>'Chuquisaca','Beni'=>'Beni','Pando'=>'Pando'], null , ['class'=>'form-control']) !!}
              </div>
              </div>
              
              <div class="form-row">
              <div class="form-group col-md-12">
              {!! Form::label('descripcion_club', 'Descripcion', []) !!}
              {!! Form::textarea('descripcion_club', $club->descripcion_club, ['class'=>'form-control','rows'=>4]) !!}
              </div>
              </div>
              <br>
              <div class="form-row">
              
              <div class="form-group col-md-3">
              {!! Form::submit('Aceptar', ['class'=>'btn btn-primary btn-block']) !!}
              </div>
              <div class="form-group col-md-3">
              <a href="" class="btn btn-block btn-secondary">Cancelar</a>
              </div>
              </div>
              </div>
              
              </div>
              </div>
              
              
              {!! Form::close() !!}
            </div>
      
      </div>
  </div>
@endif

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
        


    @endsection
    @section('scripts')
    script>

   (function(){
       window.addEventListener('load', active_link, false);
       function active_link(){
           document.getElementById('mis_clubs').className += " active";
       }
   }());
   </script>
    
   {!! Html::script('/js/vista_previa.js') !!} 
   {!! Html::script('/js/validacion_ajax_request_update.js') !!}
   {!! Html::script('/js/validaciones.js') !!} 
   

@endsection