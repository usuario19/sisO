@extends('plantillas.main')
@section('title')
    SisO - Lista de Disciplinas
@endsection
@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')

{!! Form::open(['route'=>'gestion.mostrar_resultados','method' => 'POST'] ) !!}
    <div style="display: none">
        
        {!! Form::text('id_gestion', $gestion->id_gestion) !!}
        
    </div>
    <div class="container col-md-4">
        <div class="form-row col-md-12">
            {!! Form::label('disciplina','Disciplina:', []) !!}
            {!! Form::select('id_disciplina', $disciplinas, null, ['onchange'=>'cargarFases()','placeholder' => 'Seleccione...','id'=>'disciplinas2','class'=>'form-control']) !!}
        </div> 
        <div class="form-row col-md-12">
            {!! Form::label('fases','Fases:', []) !!}
            {!! Form::select('id_fase', ['placeholder'=>'seleccione fase'],null, ['id'=>'fases2','class'=>'form-control']) !!}
        </div><br>
        <div class="form-row col-md-12">
            {!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
            <button class="btn btn-secondary">Cancelar</button>
        </div>   
    </div>

{!! Form::close() !!}

@endsection

@section('scripts')
    {!! Html::script('/js/select_dinamico.js') !!}
@endsection