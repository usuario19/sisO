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
        <h4>RESULTADOS POR FASE</h4>
{!! Form::open(['route'=>'gestion.mostrar_resultados','method' => 'POST'] ) !!}
<div style="display: none">
    
    {!! Form::text('id_gestion', $gestion->id_gestion) !!}
    
</div>

<div class="container col-md-4">
    <div class="form-row col-md-12">
        {!! Form::label('disciplina','Disciplina:', []) !!}
        {!! Form::select('id_disciplina', $disciplinas, null, ['onchange'=>'cargarFases()','placeholder' => 'Seleccione','id'=>'disciplinas2','class'=>'form-control custom-select','required'=>'required']) !!}
        <div class="mensaje_error"></div>
    </div> 
    <div class="form-row col-md-12">
        {!! Form::label('fases','Fases:', []) !!}
        {!! Form::select('id_fase', ['placeholder'=>'seleccione'],null, ['id'=>'fases2','class'=>'form-control custom-select','required'=>'required']) !!}
        <div class="mensaje_error"></div>
        
    </div><br>
    <div class="form-row col-md-12">
        {!! Form::submit('Aceptar', ['class'=>'btn btn-primary btn-block']) !!}
       
    </div>   
</div>

{!! Form::close() !!}   
    </div>
</div>

@endsection

@section('scripts')
    {!! Html::script('/js/select_dinamico.js') !!}
@endsection