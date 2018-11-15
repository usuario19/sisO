@extends('plantillas.main')

@section('title')
    SisO - Mis Clubs
@endsection

@section('content')


<div class="container">
    <div class="container">
        <div class=" container col-md-10 text-center" style="padding: 10px 0px">
            {{--  <div class="row">
                <div class="col-md-12">
                    <h4 class="" style="font-size: 18px">MIS CLUBS</h4>
                </div>
                <div class="col-md-6">
                    {!! Form::select('id_club',$mis_clubs,0, ['class'=>'custom-select','id'=>'id_club_inf']) !!}
                </div>
                <div id="cargando" style="display: none; padding:0 0 10px 0" class="text-center float-left">
                        <img src="/storage/logos/loader.gif" alt="" height="30">
                    </div> 
            </div>  --}}
            <h4 class="">CLUBS</h4></td>
        </div> 
    </div>

    <div class="col-md-12 table-responsive-xl">
        <div class="row">
            <div class="container input-group mb-3 col-md-10">
                <div class="input-group-prepend">
                        <label class="input-group-text" for="id_club_inf" style="color: white; background:  #85c1e9;">Mis Clubs: </label>
                </div>
                {!! Form::select('id_club',$mis_clubs,0, ['class'=>'custom-select','id'=>'id_club_inf']) !!}</td>
                  
            </div>
             
        </div>
        
      {{--  @foreach($mis_clubs as $club)  --}}
      <div class="container col-md-10 table-responsive">
     @if ($club)
     <div id="contenido">
        <table class="table table-bordered">
      
            <thead>
              <tr>
                  <td colspan="3" style="margin: 0%; padding: 0%">
                    <div class="container text-center" style="padding: 15px 0px; min-height: 50px; background:  OrangeRed  ; color: white">
                        <h5 {{-- class="display-4" --}} style="margin: AUTO">{{ strtoupper($club->club->nombre_club)}}</h5>
                </div> 
                  </td>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="{{ route('coordinador.informacion_club', $club->id_club) }}" title="Configuracion" class="delete_button" {{-- style="background-color: #63686e" --}}> 
                        
                            <span class="btn_hover ">
                                <i id="btnCancelar" class="material-icons delete_button" style="color:darkslategrey">settings</i>
                                
                            </span>
                                
                        </a>
                        <td colspan="4" rowspan="4" style="padding: 10px 0%"><img class="rounded mx-auto d-block" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 200px" width="200px">
                        </td>
                        <tr>
                            <td>
                                <a href="{{ route('coordinador.show', $club->first()->id_club) }}" title="Ver jugadores" class="delete_button" {{-- style="background-color: #ff9f68" --}}>
                                    <span class="btn_hover ">
                                            <i id="btnCancelar" class="material-icons delete_button" style="color:darkslategrey">group</i>
                                            
                                    </span>
                                </a>
                            </td>
                            
                        </tr>
                        <tr>
                            <td rowspan="10">
                                    <a href="{{ route('coordinador.informacion_club_gestiones', $club->first()->id_club) }}" title="Ver Gestiones" class="delete_button" {{-- style="background-color: #ff9f68" --}}>
                                            <span class="btn_hover ">
                                                    <i id="btnCancelar" class="material-icons delete_button" style="color:darkslategrey">flag</i>
                                                    
                                            </span>
                                        </a>
                            </td>
                            
                        </tr>
                    </td>
                </tr>
                <tr></tr>
               
                <tr class="table table-bordered">
                    <th style="width:200px"><div class="display-6">NOMBRE DEL CLUB:</div></th>
                    <td colspan="2">{{ $club->club->nombre_club}}</td>
                </tr>
      
                <tr class="table table-bordered">
                    <th><div>CIUDAD:</div></th>
                    <td colspan="2">{{ $club->club->ciudad}}</td>
                </tr>
                <tr class="table table-bordered">
                    <th><div>DESCRIPCION:</div></th>
                    <td class="text-justify" colspan="2">{{ $club->club->descripcion_club}}</td>
                </tr>
              
            </tbody>
      </table>
    </div>
     @endif
        
        
      </div>
        {{--  @endforeach  --}}
      
      </div>
  </div>
@endsection
@section('scripts')
 {!! Html::script('/js/cambiar_club_inf.js') !!}
    
@endsection