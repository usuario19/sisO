@extends('coordinador.plantilla.plantilla_informacion_club')

@section('content_info')
   
<div class="container col-md-10">
    <div class="card">
        <div class="card-header" style="padding: 0%">
            <div class="card-header" style="padding: 0%">
                <nav class="navbar navbar-expand-md table-bordered menu">
                    <ul class="navbar-nav btn-block">
                      <li class="nav-item link col-md-4" style="padding: 0%">
                        <a class="nav-link link active col-md-12" href={{ route('coordinador.informacion_club',$club->id_club) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item link col-md-4" style="padding: 0%">
                        <a class="nav-link link  col-md-12 " href="{{ route('coordinador.show', $club->id_club) }}">JUGADORES</a>
                      </li>
                      <li class="nav-item link col-md-4" style="padding: 0%">
                          <a class="nav-link link col-md-12 " href="{{ route('coordinador.informacion_club_gestiones', $club->id_club) }}">GESTIONES</a>
                        </li>
                      {{--  <li class="nav-item link col-md-3">
                        <a class="nav-link link col-md-12" href="{{ route('administrador.informacion_club_resultados',$club->id_club) }}">ESTADISTICAS</a>
                      </li>  --}}
                    </ul>
              
                </nav>
            </div>
        </div>
            
            <div class="card-body">
    
              
            
              
             {{--   <div class="row title-table col-md-11">
                  <h3 class="display-6" style="float: left;">INFORMACION</h3>
    
                </div>
            <br>  --}}
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



        


    @endsection