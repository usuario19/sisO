@extends('admin.plantilla_info_us')



@section('nav')
<nav class="navbar navbar-expand-lg menu">
    <ul class="navbar-nav btn-block">
        <li class="nav-item link col-md-4">
          <a class="nav-link link col-md-12" href={{ route('administrador.informacion',$usuario->id_administrador) }}>Configuración <span class="sr-only">(current)</span></a>
        </li>
      <li class="nav-item link col-md-4">
        <a class="nav-link link active col-md-12" href="{{ route('administrador.informacion_club',$usuario->id_administrador) }}">Clubs que administra</a>
      </li>
      <li class="nav-item link col-md-4">
        <a class="nav-link link col-md-12" href="{{ route('administrador.informacion_club_resultados',$usuario->id_administrador) }}">Participación</a>
      </li>
    </ul>
</nav>
@endsection
        


@section('contenido_nav')
        
          
            <div class="col-md-12 table-responsive-xl">
               
              <table class="mi_tabla table table-borderless">
                <thead>
                  <tr class="border-table">
                    {{--  <th scope="col">#</th>  --}}
                    
                    <th style="width: 200px" scope="col">Nombre</th>
                    <th style="width: 200px" scope="col">CIUDAD</th>
                    <th scope="col">LOGO</th>
                    <th><button type="button" style="float: right" class="btn btn-warning" data-toggle="modal" data-target="#modal">Agregar</button></th>
                    {{--  <th><button type="button" class="btn  btn-block btn-warning" data-toggle="modal" data-target="#modal">Agregar</button></th>  --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach($usuario->admin_clubs as $club)
                  
                  <tr class="border-table link_pointer" style="cursor:pointer" data-href="{{ route('coordinador.show', $club->id_club) }}">
                      {{--  <th scope="row">{{ $club->id_club}}</th>  --}}
                      
                      <td>{{ $club->club->nombre_club}}</td>
                      <td>{{ $club->club->ciudad}}</td>
                      <td data-href="{{ route('coordinador.show', $club->id_club) }}"><img class="rounded float-left" src="/storage/logos/{{$club->club->logo}}" alt="" height=" 50px" width="50px"></td>
                      <td><a style="float: right" href="{{ route('club.destroy',$club->id_club) }}" class="button_delete">
                          <i title="Eliminar" class="material-icons delete_button">
                              delete
                          </i>
                          </a>
                      </td>
                  </tr>
                
                  @endforeach
                </tbody>
              </table>
              
               
              @include('admin.modal_reg_club')

            </div>
        </div>

      </div>
    </div>



@endsection

@section('scripts')
    <script>
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
    </script>
  {!! Html::script('/js/vista_previa.js') !!}
  {!! Html::script('/js/validaciones.js') !!}
  

@endsection