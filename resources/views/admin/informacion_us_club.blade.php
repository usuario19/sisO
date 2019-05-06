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
      @include('admin.modal_reg_club')

            <div class="table-responsive-xl">
                        <div class="col-md-12">
                            <div class="title-table">
                                Clubs que administra actualmente:
                              </div>
                            <table class="table table-borderless tabla_info_club col-md-12" style="margin: 0%">
                                  <td>
                                      <div class="form-group col-xl-3 float-right">
                                          <a style="float: right" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal">
                                            <i class="material-icons" style="top: 5px">
                                                add
                                            </i>
                                          Agregar
                                        </a>
                                        </div>

                                   {{--  <a style="float: right" class="btn btn-success" data-toggle="modal" data-target="#modal">
                                      <i class="material-icons" style="top: 5px">
                                          add
                                      </i>
                                    Agregar
                                  </a> --}}</td>
                            </table>
                        </div>
                      <div class="col-md-12 mx-auto">
                          <div class="form-row">
                              @foreach($usuario->admin_clubs as $club)
                                    <div class="col-md-4 mx-auto bg-white" style="position:relative; border: solid rgb(227, 228, 230) 1px; margin-bottom: 20px;">

                                        <a class="title-span" href="{{ route('coordinador.show', $club->id_club) }}">
                                            <div class="text-center" style="margin: 10px 0px">
                                                <img class="img_info_club mx-auto rounded-circle img-thumbnail d-block" src="/storage/logos/{{ $club->club->logo}}" alt="">
                                                <br>
                                                <div style="padding:10px">
                                                  <span style="color: black">
                                                    {{ $club->club->nombre_club}}<br>
                                                    {{ $club->club->ciudad}}
                                                  </span>
                                                </div>
                                                
                                            </div>
                                        </a>
                                        <a href="{{ route('club.destroy',$club->id_club) }}" class="eliminar_card" data-toggle="modal" data-target="#exampleModal{{ $club->id_club }}">
                                          <i title="Eliminar" class="material-icons">
                                              clear
                                          </i>
                                        </a>
                                        <div class="modal fade" id="exampleModal{{ $club->id_club}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header modal_advertencia">
                                                <h5 class="modal-title" id="exampleModalLabel">advertencia:</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body modal_advertencia">
                                                ¿Esta seguro de querer eliminar eliminar el club?
                                              </div>
                                              <div class="modal-footer">
                                                 <div class="col-6">
                                                   <a href="{{ route('club.destroy',$club->id_club) }}" class="btn btn-danger btn-block btn_eliminar"> Eliminar </a>
                                                 </div>
                                                 <div class="col-6">
                                                   <a class="btn btn-outline-secondary btn-block" data-dismiss="modal">No</a>
                                                 </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                    </div>
                              
                              @endforeach
                          </div>
                      </div>

        </div>

      {{-- </div>
    </div> --}}



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
  {!! Html::script('/js/validacion_ajax_request_club.js') !!}
  {!! Html::script('/Jcrop/js/jquery.Jcrop.min.js') !!}
  {!! Html::script('/js/jcrop_imagen.js') !!}
  {!! Html::script('/js/reset_inputs.js') !!}
  

@endsection