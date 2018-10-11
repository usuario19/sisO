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
                @foreach ($tabla_posiciones as $club)
                <tr>
                    <td>{{ 1 }}</td>
                    <td>{{ $club->club->nombre_club }}</td>
                    <td><img class="img-thumbnail" src="/storage/logos/{{ $club->club->logo}}" alt="" height=" 30px" width="30px"></td>
                    <td>{{ $club->pj }}</td>
                    <td>{{ $club->pg }}</td>
                    <td>{{ $club->pe }}</td>
                    <td>{{ $club->pp }}</td>
                    <td>{{ $club->puntos }}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {{ $tabla_posiciones->links() }}
@endsection