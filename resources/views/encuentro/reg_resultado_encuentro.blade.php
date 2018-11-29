@extends('plantillas.main')
@section('title')
    SisO - Lista de clubs
@endsection
@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
<h4>Registrar resultado:</h4>
    {!! Form::open(['route'=>'encuentro.reg_resultado','method' => 'POST']) !!}
         <div class="container">  
            @foreach ($encuentro->encuentro_club_participaciones as $participacion)
            <div class="container col-md-6">
                <div class="card">
                    <div style="display: none">
                        {!! Form::text('id_encuentro', $encuentro->id_encuentro, []) !!}
                        {!! Form::text('id_encuentro_club_part'.$participacion->id_encuentro_club_part, $participacion->id_encuentro_club_part, []) !!}
                        {!! Form::text('id_club'.$participacion->id_encuentro_club_part, $participacion->id_encuentro_club_part, []) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('equipo'.$participacion->id_encuentro_club_part, 'Equipo', []) !!}
                        {!! Form::text('equipo'.$participacion->id_encuentro_club_part, $participacion->club_participacion->club->nombre_club, ['class'=>'form-control','readonly'=>'true']) !!} 
                    </div> 
                    <div class="col-md-12">
                        {!! Form::label('punto'.$participacion->id_encuentro_club_part, 'Puntos', []) !!}
                        {!! Form::text('punto'.$participacion->id_encuentro_club_part, $participacion->puntos, ['class'=>'form-control']) !!} 
                    </div> 
                    <div class="col-md-12">
                        {!! Form::label('observacion'.$participacion->id_encuentro_club_part, 'Observacion', []) !!}
                        {!! Form::textarea('observacion'.$participacion->id_encuentro_club_part, $participacion->observacion, ['class'=>'form-control','rows'=>'2']) !!} 
                    </div><br>  
                </div><br>
            </div>
            @endforeach
            <div class="container col-md-6">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
                </div>
          </div> 
                                    
          </div>      
             
 {!! Form::close() !!}
@endsection
