<!DOCTYPE html>
{{--  <html lang="es">  --}}
<head>
        {{--  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  --}}
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        
        
        <link rel="stylesheet" href="css/mis_estilos.css">
        {{--  <link href="css/bootstrap.min.css " rel="stylesheet">  --}}
</head>
<body>

<div class="container">
    <h4 class="text-center display-4" style="font-size: 16px; font-weight: bolder"> LISTA DE JUGADORES REGISTRADOS</h4><br>
    <table class="table table-striped">
        <thead>
            <tr class=" mi_tabla table-bordered" style="border: solid 2px gray">
                <th colspan="9">
                    <img id="imgOrigen" class="" src="{{ public_path("storage/logos/".$club->logo) }}" alt="/storage/app/public/logos/{{ $club->logo }}" height=" 100px" width="100px" style="padding-inline-end: 5px">
                    <span class="float-left" style="margin: auto; padding-top: 20px;font-size: 30px">{{$club->nombre_club}}</span>
                </th>
            </tr>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>ci</th>
                <th>Genero</th>
                <th>Fecha de nacimiento</th>
                <th>email</th>
                <th>descripcion</th>

            </tr>
            
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
        @foreach ($planilla as $jugador)
            <tr style="border: solid 2px gray">
                <td>
                    {{$i}}
                </td>
                <td>
                    <img id="imgOrigen" class="rounded-circle mx-auto d-block float-left" src="{{ public_path("storage/fotos/".$jugador->foto_jugador) }}" alt="" height=" 50px" width="50px">
                </td>
                <td>
                    {{$jugador->nombre_jugador}}
                </td>
                <td>
                    {{$jugador->apellidos_jugador}}
                </td>
                <td>
                    {{$jugador->ci_jugador}}
                </td>
                <td>
                    {{($jugador->foto_jugador == 1)? "Femenino":"Masculino"}}
                </td>
                <td>
                    {{$jugador->fecha_nac_jugador}}
                </td>
                <td>
                    {{$jugador->email_jugador}}
                </td>
                <td>
                    {{$jugador->descripcion_jugador}}
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
            
        </tbody>
    </table>
</div>
</body>