@extends('plantillas.main')

@section('title')
    SisO - Lista de jugadores
@endsection

@section('content')
<h1>Lista de Jugadores:</h1>
	<table class="table table-sm table-bordered">
  		<thead>
        <tr>
            <th colspan="2">
              <div style="float:left; margin:10px;width="110px"">
                <img src="/storage/logos/{{ $mi_club->logo }}" alt="" width="100px" height="100px">
              </div>
            
             <div style="float:left; padding: 20px 10px ">
                <h3 class="display-4">{{ $mi_club->nombre_club }}</h3>
             </div>
            </th>
        </tr>
        </thead>
      
        <tbody>
        <tr>
           
          <td>
           <div style="float: left;" class="form-group col-md-9">
            {!! Form::text('Buscador',null, ['class'=>'form-control','id'=>'buscar','placeholder'=>'Buscar.....']) !!}
           </div>
          
           <div style="float: left;" class="form-group col-md-3">
             <div class="btn-group btn-block">
                <button type="button" class="btn btn-secondary dropdown-toggle btn-block" data-toggle="dropdown">
                Inscribir nuevo jugador
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                 <button type="button" class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-lg">Crear nuevo jugador</button>
                  <a class="dropdown-item" href={{ route('jugador.VImportExcel',$mi_club->id_club ) }}>Importar jugadores desde excel</a>
                </div>
              </div>
           </div>
            @include('plantillas.forms.form_reg_jugador_modal')
           </td>
           
        </tr>
      </tbody>
  </table>

  <div class="table-responsive-xl">
    <table class="table table-sm table-bordered">
        <thead>
          <tr>
            <th width="20px">ID</th>
            <th width="100px">Foto</th>
            <th width="50px">CI</th>
            <th>Nombre</th>
            <!--th>Apellidos</th-->
            <th>Genero</th>
            <th>Correo</th>
            <th>Fecha de nacimiento</th>
            <!--th>Descripcion</th-->
            <th colspan="3">Acciones</th>
          </tr>
          
        </thead>
    
        <tbody id="datos">
          @foreach($mis_jugadores as $usuario)
          
            <tr>
              <td>{{ $usuario->jugador->id_jugador}}</td>
              <td><img class="rounded mx-auto d-block" src="/storage/fotos/{{ $usuario->jugador->foto_jugador }}" alt="" height=" 80px" width="80px"></td>
              <td>{{ $usuario->jugador->ci_jugador}}</td>
              <td>{{ $usuario->jugador->nombre_jugador." ".$usuario->jugador->apellidos_jugador}}</td>
              <!--td>{{ $usuario->jugador->apellidos_jugador}}</td-->
              <td>@if($usuario->jugador->genero_jugador == "2")
                       {{ "Masculino" }}
                  @else
                        {{ "Femenino" }}
                  @endif
              </td>
              <td>{{ $usuario->jugador->email_jugador}}</td>
              <td>{{ $usuario->jugador->fecha_nac_jugador}}</td>
              <!--td>{{ $usuario->jugador->descripcion_jugador}}</td-->
              <td><a href="#confirm?" class="btn btn-warning">Editar</a></td>
    
              <td>
                <a href="{{ route('coordinador.eliminar',[$usuario->id_jugador,$usuario->id_club]) }}"  class="btn btn-danger" data-toggle="modal" data-target="#Eliminar{{ $usuario->id_jugador}}" >Eliminar</a>
                <!-- Modal -->
                <div class="modal fade" id="Eliminar{{ $usuario->id_jugador}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SisO:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
    
                      <div class="modal-body">
                        Esta seguro de querer eliminar al usuario?
                      </div>
    
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    
                        <a href={{ route('coordinador.eliminar',[$usuario->id_jugador,$usuario->id_club]) }} class="btn btn-primary">Eliminar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <!--td>
                <a href={{ route('seleccion.ver_seleccion',[$usuario->id_jugador,$usuario->id_club]) }} class="btn btn-info">Ver Participacion</a>
              </td-->
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection
@section('scripts')
  {!! Html::script('/js/script.js') !!}
   {!! Html::script('/js/filtrar_por_nombre.js') !!}
@endsection