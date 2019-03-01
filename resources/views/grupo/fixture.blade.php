<!DOCTYPE html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mis_estilos.css">
</head>
<body>

<div class="container">
    <h4 class="text-center display-4" style="font-size: 16px; font-weight: bolder">FIXTURE DE PARTIDOS</h4><br>
    <h3 class="text-center display-4" style="font-size: 16px; font-weight: bolder">{{ $fecha->nombre_fecha }}</h3><br>
      
      <table id="fixture_equipo" class="table table-bordered">
          @php($i=1)
          <thead>
            <th width="30px">Nro</th>
            <th colspan="2">Equipos</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ubicacion</th>
            <th width="150px">Detalle</th>
          </thead>
          <tbody>
            <tr></tr>
            @foreach($fecha->encuentros as $encuentro)
              <tr>
                <td>{{ $i }}</td> 
                @php($j=0)
                  @foreach ($encuentro->encuentro_club_participaciones as $equipo)
                    @if ($j==0)
                    <td>{{ $equipo->club_participacion->club->nombre_club}}</td>
                    @else
                    <td>{{ $equipo->club_participacion->club->nombre_club}}
                    @endif
                    @php($j++)
                  @endforeach
                <td>{{ $encuentro->fecha}}</td>
                <td>{{ $encuentro->hora}}</td>
                <td>{{ $encuentro->centro->nombre_centro}}</td>
                <td>{{ $encuentro->detalle}}</td>
              </tr>
              @php($i++)
              @endforeach            
          </tbody>
      </table>

