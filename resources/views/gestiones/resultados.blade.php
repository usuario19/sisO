@extends('plantillas.main')

@section('title')
    SisO - Lista de Disciplinas
@endsection

@section('submenu')
@include('plantillas.menus.menu_gestion')
@endsection

@section('content')
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
<div class="content col-md-6" style="align-content: center;">
  <div class="form-row">
    <div class="form-gruop col-md-8 form-inline">
        {!! Form::label('disciplina','Disciplina', []) !!}
        {!! Form::select('disciplina', $disciplinas, null, ['placeholder' => 'Seleccione...','id'=>'disciplinas','class'=>'form-control']) !!}
        {!! Form::label('fases','Fases', []) !!}
        {!! Form::select('fases', ['placeholder'=>'seleccioen'], null, ['id'=>'fases','class'=>'form-control']) !!}
      
    </div>

    	<select name="prueba" onchange="location=this.value"></center>

        <option value="www.google.com">Seleccione su curso</option> 
      <option value="www.youtube.com">Seleccione su curso2</option> 
      <option value="www.youtube.com">Seleccione su curso3</option> 

    </select>
      
  </div>
</div>
@endsection