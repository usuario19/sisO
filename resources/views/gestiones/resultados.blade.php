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
    <div class="form-gruop col-md-8 form-inline">
        {!! Form::label('disciplina','Disciplina', []) !!}
        {!! Form::select('disciplina', $gestion, null, ['placeholder' => 'Seleccione...','class'=>'form-control']) !!}
    </div>

    	<select name="prueba" onchange="location=this.value"></center>

        <option value="www.google.com">Seleccione su curso</option> 
      <option value="www.youtube.com">Seleccione su curso2</option> 
      <option value="www.youtube.com">Seleccione su curso3</option> 

    </select>
      
  </div>
    
</div>

@endsection