@extends('plantillas.main')
@section('title')
    SisO - Lista de Disciplinas
@endsection
@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<h4>Tabla de Posiciones:</h4>
    <table class="table table-bordered">
        <thead>
            <th>Posicion</th>
            <th>Club</th>
            <th>Logo</th>
            <th>PJ</th>
            <th>PG</th>
            <th>PE</th>
            <th>PP</th>
            <th>Puntos</th>
        </thead>
        <tbody>
                
                <tr>
                    <td></td>
                    <td>{{ $clubs->fechas }}</td>
                    {{--  <td><img class="img-thumbnail" src="/storage/logos/{{ $club->logo}}" alt="" height=" 50px" width="50px"></td>-->
                    <td>{{ $club->pj($club->id_fase,$club->id_club) }}</td>  --}}
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $clubs->nombre_fase }}</td>

                </tr>
                
                
        </tbody>
    </table>
    {{ $posiciones_clubs->links() }}
@endsection