@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')
<div class="container">
        <div class="container">
                <div class="col-md-12 text-center" style="padding: 10px 0px">
                  <h4 class="">GESTIONES</h4>
                </div> 
              </div>
    <div class="row">
        <div class="container input-group mb-3 col-md-10">
            <div class="input-group-prepend">
                <label class="input-group-text" for="id_club_inf" style="color: white; background:  #85c1e9;">Mis Clubs: </label>
            </div>
            {!! Form::select('id_club',$mis_clubs,0, ['class'=>'custom-select','id'=>'id_club_gestion']) !!}</td>
              
        </div>
        <div id="cargando" style="display: none; padding:0 0 10px 0" class="col-md-12 text-center">
            <img src="/storage/logos/loader.gif" alt="" height="30">
        </div>  
    </div>
    {{--  <h1 class="display-1" style="font-size: 16px; margin:0 0 15px 0; font-weight: bold">GESTIONES ACTIVAS</h1>  --}}
    
    
    <div id="contenido" class="table-responsive-xl">
     
    </div>
</div>

@endsection
@section('scripts')
 {!! Html::script('/js/cambiar_club_gestion.js') !!}
    
@endsection