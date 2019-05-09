@extends('plantillas.main') 
@section('title') SisO - Resustados por fase
@endsection
 
@section('content')
<<<<<<< HEAD
<div class="form-row">
    @include('plantillas.menus.menu_gestion')

    <div class="col-md-9">
        <div class="">
            <div class="card-">
                <div class="reporte container col-md-12">
                    <h4 class="lista_sub_rep">RESULTADOS POR FASE</h4>
                </div>
                {!! Form::open(['route'=>'gestion.mostrar_resultados','method' => 'POST'] ) !!}
                <div style="display: none">
=======
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
>>>>>>> refs/remotes/origin/master

                    {!! Form::text('id_gestion', $gestion->id_gestion) !!}

                </div>
                <div class="container col-md-8">
                    <div class="form-group col-md-12">
                        {!! Form::label('disciplina','Disciplina:', []) !!} 
                        {!! Form::select('id_disciplina', $disciplinas, null, ['onchange'=>'cargarFases()','placeholder'
                        => 'Seleccione...','id'=>'disciplinas2','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('fases','Fases:', []) !!} 
                        {!! Form::select('id_fase', ['placeholder'=>'seleccione fase'],null, ['id'=>'fases2','class'=>'form-control'])!!}
                    </div><br>
                    <div class="form-row col-md-12">
                        <div class="form-row col-md-8">
                            <div class="form-group col-md-6">
                                {!! Form::submit('Aceptar', ['class'=>'btn btn-block btn_aceptar']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::submit('Cancelar', ['data-dismiss'=>"modal" ,'class'=>'btn btn-block btn-secondary btn_cerrar']) !!}
                            </div>

                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('scripts') {!! Html::script('/js/select_dinamico.js') !!}
@endsection