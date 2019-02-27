@extends('plantillas.main')

@section('title')
    SisO - Lista de clubs
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
@include('encuentro.modal_agregar_jugador')
@include('encuentro.modal_agregar_jugador2')
  <div class="container">
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">{{ $disciplina->nombre_disc.' '.$disciplina->nombre_categoria($disciplina->categoria) }}</li>
         <li class="breadcrumb-item"><a href="{{ route('disciplina.fases',[$gestion->id_gestion,$disciplina->id_disc]) }}">Fases</a></li>
         <li class="breadcrumb-item active" aria-current="page">{{ $fase->nombre_fase }}</li>
         <li class="breadcrumb-item"><a href="{{ route('fase.listar_grupos',[$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Grupos</a></li>         
         <li class="breadcrumb-item active" value="{{ $grupo->id_grupo }}"  aria-current="page">{{ $grupo->nombre_grupo }}</li>
         <li class="breadcrumb-item"><a href="{{ route('grupo.encuentros_grupo_equipo',[$grupo->id_grupo,$fase->id_fase,$gestion->id_gestion,$disciplina->id_disc]) }}">Encuentros</a></li>         
         <li class="breadcrumb-item active" value="{{ $encuentro->id_encuentro }}"  aria-current="page">{{ $encuentro->id_encuentro }}</li>
  </ol>
 </nav>
</div>
<div class="container">
  <div class="card">     
    <div class="row col-md-12">
      <div class="form-group col-md-10" style="text-align: center"><h4>Conformacion de equipos</h4></div>
    </div>
  <div class="row container col-md-12">
    
     <div class="form-group col-md-6">
        <div class="card"> 
      <div class="row col-md-12">
        <div class="form-group col-md-10">
            <div class="form-group col-md-10"><h4>{{ $club1->nombre_club }}</h4></div>
          </div>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarJugador1">
               <span>Agregar</span>
            </button>
        </div>
    </div>
      
      <table class="table table-condensed">
          <thead>
            <th width="50px">ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apelidos</th>
          <th>Eliminar</th>

          </thead>
          <tbody>
            @foreach($jug_hab1 as $jugadores)
              <tr>
                <td>{{ $jugadores->id_jugador }}</td> 
                <td><img class="img-thumbnail" src="/storage/fotos/{{ $jugadores->foto_jugador}}" alt="" height=" 50px" width="50px">{{ $jugadores->nombre_jugador}}</td>
                  
                <td>{{ $jugadores->nombre_jugador }}</td>
                <td>{{ $jugadores->apellidos_jugador}}</td>
                <td>
                    <a href="{{ route('encuentro.destroy',$encuentro->id_encuentro) }}"><i title="Eliminar" class="material-icons delete_button">
                        delete</i></a>
                </td>
              </tr>
            @endforeach            
          </tbody>
      </table>
  </div>
</div>
    <div class="form-group col-md-6">
      <div class="card"> 
          <div class="row col-md-12">
          <div class="form-group col-md-10">
              <div class="form-group col-md-10"><h4>{{ $club2->nombre_club }}</h4></div>
            </div>
          <div class="form-group col-md-2">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarJugador2">
             <span>Agregar</span>
          </button>
      </div>
    </div>
    <table class="table table-condensed">
        <thead>
          <th width="50px">ID</th>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Apelidos</th>
          <th>Eliminar</th>
        </thead>
        <tbody>
          @foreach($jug_hab2 as $jugadores)
            <tr>
              <td>{{ $jugadores->id_jugador }}</td> 
              <td><img class="img-thumbnail" src="/storage/fotos/{{ $jugadores->foto_jugador}}" alt="" height=" 50px" width="50px">{{ $jugadores->nombre_jugador}}</td>
                
              <td>{{ $jugadores->nombre_jugador }}</td>
              <td>{{ $jugadores->apellidos_jugador}}</td>
              <td>
                  <a href="{{ route('encuentro.eliminar_jugador_encuentro',[$encuentro->id_encuentro,$jugadores->id_jugador]) }}"><i title="Eliminar" class="material-icons delete_button">
                      delete</i></a>
              </td>
            </tr>
          @endforeach            
        </tbody>
    </table>
  </div>
</div>     
</div>     
</div>     
</div>     
@endsection
@section('scripts')
{!! Html::script('/js/filtrar_por_nombre.js') !!}
{!! Html::script('/js/checkbox.js') !!}
@endsection