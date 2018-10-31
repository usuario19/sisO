@extends('plantillas.main')

@section('title')
    SisO - Club
@endsection
  
@section('content')
{{--  <div class="container col-md-12">
  <div id="mensaje" class="alert alert-success alert-dismissible show" role="alert" style="display: none">
    La informacion se actualizo exitosamente!!!!
  </div>
</div>  --}}
<h1  class="display-1" style="font-size: 16px"><a href="{{ route('coordinador.index')}}">Clubs </a>|  {{ $club->nombre_club }}</h1>
<br>

<div class="table-responsive">
    
    <table class="table table-sm table-bordered">
      <thead>
          <th class="title-table-club" colspan="4">
              <h4 class="display-5">{{ strtoupper($club->nombre_club)}}</h4>
      </th>
         {{--  <th class="table"><h3 class="display-4" style="font-size: 20px">Ficha de informacion</h3></th>  --}}
      </thead>
      <tbody>
          <tr>
              <td class="text-center">
                <div id="contenedor_info"  {{--  class="form-group col-md-12"  --}} class="text-center">

                  <div class="text-center" {{--  style="position:relative"  --}}>
                    
                          <div id="contenedor_club">
                            <img id="imgOrigen" class="rounded mx-auto d-block" src="/storage/logos/{{ $club->logo }}" alt="" height=" 150px" width="150px">

                            <div id="divtexto">
                                <button id="btnCancelar" class="btn btn-outline-dark button noVista">
                                    <span class="btn_hover ">
                                        <i id="btnCancelar" class="material-icons float-left">clear</i>
                                        
                                    </span></button>
                                <button id="btnUpdate" class="btn btn-outline-dark button noVista">
                                    <span class="btn_hover ">
                                        <i id="btnUpdate" class="material-icons float-left">loop</i>
                                    </span></button>
                              <button id="texto" class="btn btn-dark button vista">
                                <span class="btn_hover ">
                                    <i id="texto" class="material-icons float-left">edit</i>
                                </span></button>
                            </div>
                          </div>
                    </div> 
                   
                          <div class="form-row errorLogin">
                           
                              <h6 style="text-align: center" id="error_foto">{{ $errors->has('logo') ? $errors->first('logo'):'' }}</h6>
                           
                          </div>

                  
                </div>
              </td>
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
          </tr>
     {{--   <tr>
        <td>
          </td>
        </tr>
       --}}
      </tbody>
    </table>
            {{--  <div class="card">
                <div class="card-header" style="padding: 0%">
                    <div class="card-header" style="padding: 0%">
                        <nav class="navbar navbar-expand-md table-bordered menu">
                            <ul class="navbar-nav btn-block">
                              <li class="nav-item link col-md-4">
                                <a class="nav-link link active col-md-12" href={{ route('coordinador.informacion_club',$club->id_club) }}>CONFIGURACION <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item link col-md-4">
                                <a class="nav-link link  col-md-12" href="{{ route('coordinador.show', $club->id_club) }}">JUGADORES</a>
                              </li>
                              <li class="nav-item link col-md-4">
                                <a class="nav-link link col-md-12" href="{{ route('administrador.informacion_club_resultados',$club->id_club) }}">ESTADISTICAS</a>
                              </li>
                            </ul>
                      
                        </nav>
                    </div>
                </div>  --}}
                @yield('content_info')
                @yield('scripts_add')
        

@endsection

@section('scripts')
    {{--  <script>
      (function(){
        window.addEventListener("load", inicializarEventos, false);
        function inicializarEventos(){
          document.getElementById("editar").addEventListener("change", ocultarDiv, false);
          document.getElementById("editar").checked = false;
        }
        

       function ocultarDiv(e){
        //console.log(e.target.id);
        if(e.target.checked)
          document.getElementById("editarDiv").style.display= 'block';
        else
           document.getElementById("editarDiv").style.display = 'none';
       }
      }())
    </script>  --}}
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validacion_ajax_request_update.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  

@endsection