@extends('plantillas.main')
@section('title')
    SisO - Lista de Disciplinas
@endsection
@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
@include('gestiones.modal_reg_resultado_fase')   
<div class="container">
    <div class="card">
        <div class="row container">
            <div class="form-group col-md-10"><h4>Tabla de Posiciones:</h4></div>
            <div class="form-group col-md-2">
                {{--  <a href=" " onclick="RegistrarResultadoCompeticion({{ $encuentro->id_encuentro }});"  class="button_delete" data-toggle="modal" data-target="#modalResultado">
                            <i title="Registrar resultados" class="material-icons delete_button button_redirect">
                              collections_bookmark
                            </i>
                </a>  --}}
                <button onclick="RegistrarResultadoCompeticionFase({{ $fase->id_fase }});" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalResultadoFase">
                    Resultados
                 </button>
            </div>
        </div>
    
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Foto</th>
            <th>Jugador</th>
            <th>Club</th>
            <th>Participaciones</th>
            <th>Posicion</th>
           </th>
        </thead>
        <tbody>
                @php ($i = 0)
                @foreach ($tabla_posiciones as $seleccion)
                  @php ($i++)
                <tr>
                    <td>{{ $i }} </td>
                    
                    <td><img class="rounded mx-auto d-block float-left"
                         src="/storage/fotos/{{ $seleccion->foto_jugador}}"
                          alt="" height=" 30px" width="30px"></td>
                          <td>{{ $seleccion->nombre_jugador." ". $seleccion->apellidos_jugador}}</td>
                    <td>{{ $seleccion->nombre_club }}</td>
                    <td>{{ $seleccion->cantidad_encuentros }}</td>
                    <td>{{ $seleccion->posicion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tabla_posiciones->links() }}
</div>
</div>
@endsection