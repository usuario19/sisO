@extends('plantillas.main')
@section('title')
    SisO - Lista de Clubs
@endsection

@section('content')
<div class="form-row">
  <div class="form-group col-md-12 form-inline">
    <h1>Lista de Clubs:</h1>
    <a href="club/create/" class="btn btn-primary">Agregar Club</a>
  </div>
  
</div>
{!! Form::open(['route'=>'club.inscribir','method' => 'POST' ] ) !!}
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gestion{{$id_club}}" data-whatever="@fat">Campeonatos</button>

              <div class="modal fade" id="gestion{{$id_club}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Campeonatos disponibles</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                      
                      <div class="form-row" style = "display:none">
                        {!! Form::label('id_club', 'Club', ['class'=>'form-control']) !!}
                        {!! Form::text('id_club', $id_club , ['class'=>'form-control']) !!}
                      </div>
                        
                      @foreach ($gestiones as $gestion)
                      <div class="form-row">
                        <div class="card col-lg-12">
                          {!! Form::checkbox('id_gestion[]',$gestion->id_gestion, false, []) !!}
                          {!! Form::label('gestion',$gestion->nombre_gestion, []) !!}
                        </div>
                      </div>
                        <br>
                      @endforeach

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      {!! Form::submit('Inscribir', ['class'=>'btn btn-primary']) !!}
                      
                    </div>
                  </div>
                </div>
              </div>
{!! Form::close() !!}
@endsection