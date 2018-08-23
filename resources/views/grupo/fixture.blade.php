

@foreach ($fechas as $fecha)
      <div>
         <h4 style="text-align: center; ">{{ $fecha->nombre_fecha }}</h4>
      </div>
      <table class="table table-bordered ">
          <thead>
            <th width="50px">ID</th>
            <th>Equipos</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Ubicacion</th>
            <th>Detalle</th>
            
            
          </thead>

          <tbody>
            <tr></tr>
            @foreach($fecha->encuentros as $encuentro)
              
              <tr>
                <td>{{ $encuentro->id_encuentro }}</td> 
                

                  @foreach ($encuentro->encuentro_club_participaciones as $equipo)
                  
                    <td>{{ $equipo->club_participacion->club->nombre_club}}</td>
                  @endforeach
                
                       
                <td>{{ $encuentro->fecha}}</td>
                <td>{{ $encuentro->hora}}</td>
                <td>{{ $encuentro->ubicacion}}</td>
                <td>{{ $encuentro->detalle}}</td>

                
              </tr>
            @endforeach            
          </tbody>
      </table>
   @endforeach
   </body>
