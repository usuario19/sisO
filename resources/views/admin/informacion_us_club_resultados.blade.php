@extends('admin.plantilla_info_us')



@section('nav')
<nav class="navbar navbar-expand-lg menu">
    <ul class="navbar-nav btn-block">
        <li class="nav-item link col-md-4">
          <a class="nav-link link  col-md-12" href={{ route('administrador.informacion',$usuario->id_administrador) }}>Configuración <span class="sr-only">(current)</span></a>
        </li>
      <li class="nav-item link col-md-4">
        <a class="nav-link link  col-md-12" href="{{ route('administrador.informacion_club',$usuario->id_administrador) }}">Clubs que administra</a>
      </li>
      <li class="nav-item link col-md-4">
        <a class="nav-link link active col-md-12" href="{{ route('administrador.informacion_club_resultados',$usuario->id_administrador) }}">Participación</a>
      </li>
    </ul>
</nav>
@endsection
@section('contenido_nav')
        
            <div class="col-md-12 table-responsive-xl">
              <table class="table mi_tabla table-borderless">
                <thead>
                  <tr class="border-table">
                    {{--  <th scope="col">#</th>  --}}
                    
                    <th style="width: 150px" scope="col">GESTION</th>
                    <th style="width: 100px" scope="col">CLUB</th>
                    <th style="min-width: 200px" scope="col">DISCIPLINA</th>
                    <th scope="col">RESULTADO</th>
                    {{--  <th><button type="button" class="btn  btn-block btn-warning" data-toggle="modal" data-target="#modal">Agregar</button></th>  --}}
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach($inscripciones as $inscripcion)
                  
                  <tr class=" border-table link_pointer" style="cursor:pointer" data-href="{{--  {{ route('coordinador.show', $club->id_club) }}  --}}">
                      <td>{{ $inscripcion->gestion->nombre_gestion}}</td>
                     
                      <td><img class="rounded float-left" src="/storage/logos/{{ $inscripcion->admin_club->club->logo}}" alt="" height=" 50px" width="50px"></td>
                      <td>
                       <ul class="list-unstyled">
                          @foreach ($inscripcion->gestion->club_participaciones->where('id_club',$inscripcion->admin_club->club->id_club) as $club_part)
                          <li>
                            <img class="rounded float-left" src="/storage/foto_disc/{{$club_part->disciplina->foto_disc}}" alt="" height=" 25px" width="25px">
                            {{$club_part->disciplina->nombre_disc}}
                            {{$club_part->disciplina->categoria == 1 ? 'Mujeres':($club_part->disciplina->categoria == 2 ? 'Hombres':'Mixto')}}
                          </li>
                          <br>
                          @endforeach
                       </ul>
                        
                      </td>
                      <td>
                        <ul>
                            @foreach ($inscripcion->gestion->club_participaciones->where('id_club',$inscripcion->admin_club->club->id_club) as $club_part)
                            <li>
                              eliminado
                            </li>
                            <br>
                            @endforeach
                        </ul>
                      </td>
                     
                      
                  </tr>
                
                  @endforeach
                </tbody>
              </table>
            </div>
        


@endsection

@section('scripts')
    {{--  <script>
      (function(){
        window.addEventListener("load", inicializarEventos, false);
        function inicializarEventos(){
          tr = document.getElementsByClassName("link_pointer");
          for(var i =0; i<tr.length;i++)
            tr[i].addEventListener("click", redirect, false);
        }
        function redirect(e){
          elemento = e.target;
          window.location = elemento.parentNode.getAttribute('data-href');
          console.log(elemento.parentNode.getAttribute('data-href'));

        }
      }())
    </script>  --}}
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  

@endsection