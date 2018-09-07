@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')

<div class="content col-md-6" style="align-content: center;">
  <div class="form-row">
    <div class="form-row col-md-8 form-inline">
        {!! Form::label('disciplina','Disciplina', []) !!}
        {!! Form::select('disciplina', $disciplinas, null, ['placeholder' => 'Seleccione...','id'=>'disciplinas','class'=>'form-control']) !!}
        {!! Form::label('fases','Fases', []) !!}
        {!! Form::select('fases', ['placeholder'=>'seleccioen'], null, ['id'=>'fases','class'=>'form-control']) !!}
      
    </div>
  </div>
</div>
<script>
        $("#disciplinas").change(event =>{
            $.get('fases/${event.target.value}',function(res,disc){
                $("#fases").empty();
                res.forEach(element =>{
                    $("#fases").append('<option value=${element.id_fase}>${element.name}</option>');
                });
            });
        });
    </script>
@endsection
