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
    <h4>Ganadores:</h4>
    <table class="table table-bordered">
        <thead>
            <th>Posicion</th>
            <th>Logo</th>
            <th>Club</th>
        </thead>
        <tbody>
                @foreach ($ganadores as $ganador)
                <tr>
                    <td>{{ $ganador->posicion_ganador }} </td>
                    <td><img class="rounded mx-auto d-block float-left" src="/storage/logos/{{ $ganador->club->logo}}" alt="" height=" 30px" width="30px"></td>
                    <td>{{ $ganador->club->nombre_club }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection