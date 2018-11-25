@extends('plantillas.main')

@section('title')
    SisO - Lista de jugadores
@endsection

@section('content')
<div class="container">
    <div class="container">
        <div class="col-md-12 text-center" style="padding: 10px 0px">
          <h4 class="">JUGADORES</h4>
        </div> 
      </div>
    
      <div class="form-row">
          
              <div class="container input-group mb-3 col-md-10">
                  <div class="input-group-prepend">
                      <label class="input-group-text" for="id_club_inf" style="color: white; background:  #85c1e9;">Mis Clubs: </label>
                  </div>
                  {!! Form::select('id_club',$clubs,'', ['class'=>'custom-select','id'=>'id_club_jugadores']) !!}</td>
                    
              </div>
              <div id="cargando" style="display: none; padding:0 0 10px 0" class="col-md-12 text-center">
                  <img src="/storage/logos/loader.gif" alt="" height="30">
              </div>
      </div>
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
      <div id="cargando" style="display: none; padding:0 0 10px 0" class="col-md-12 text-center">
        <img src="/storage/logos/loader.gif" alt="" height="30">
      </div>

      {{--  AJAX  --}}
      <div id='contenido' class="container col-md-10 table-responsive-xl">
        
         
      </div>
  
</div>

@endsection
@section('scripts')
  {!! Html::script('/js/cambiar_club.js') !!}
 {{--   {!! Html::script('/js/vista_previa.js') !!}  --}}
 {{--   {!! Html::script('/js/validacion_ajax_request_update.js') !!}
  {!! Html::script('/js/validaciones.js') !!}  --}}
  {{--  {!! Html::script('/js/filtrar_por_nombre.js') !!}  --}}
  
@endsection