@extends('plantillas.main')
@section('title')
    SisO - Lista de Disciplinas
@endsection
@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<div class="container">
        <div class="card">
    <h4>Tabla de Posiciones:</h4>
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Club</th>
            <th>Logo</th>
            <th>PJ</th>
            <th>PG</th>
            <th>PE</th>
            <th>PP</th>
            <th>Puntos</th>
        </thead>
        <tbody>
                @php ($i = 0)
                @foreach ($tabla_posiciones as $club)
                  @php ($i = $i+1)
                <tr>
                    <td>{{ $i }} </td>
                    <td>{{ $club->club_participacion->club->nombre_club }}</td>
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $club->club_participacion->club->logo}}" alt="" height=" 30px" width="30px"></td>
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
</div>
</div>
@endsection