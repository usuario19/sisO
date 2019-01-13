@extends('plantillas.main')
@section('title')
	SisO: Avisos
@endsection
@section('cdn')
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
@endsection
@section('content')

<div class="container table-responsive-xl">
    <div class="form-group col-md-12">
        <table class="table table-sm table-bordered">
            <thead>
                <th>
                    <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                        <h4 class=""> CREAR AVISO</h4></td>
                    </div>
                </th>
            </thead>
        </table>
    </div>
    <div class="card container">
        
        {!! Form::open() !!}
            <div class="form-row">
                
                <div class="form-group col-md-6">
                    {!! Form::label('administrador', 'Administrador', []) !!}
                    {!! Form::text('administrador',  Auth::user()->nombre." ".Auth::user()->apellidos, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('titulo', 'Titulo', []) !!}
                    {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    {!! Form::label('gestion', 'Gestion', []) !!}
                    {!! Form::select('gestion', ['0'=>'Equipo', '1'=>'Competicion'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('disc', 'Disciplina', []) !!}
                    {!! Form::select('disc', ['0'=>'Equipo', '1'=>'Competicion'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    {!! Form::label('fechaIni', 'Fecha de inicio', []) !!}
                    {!! Form::date('fechaIni', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('fechaFin', 'Fecha de Fin', []) !!}
                    {!! Form::date('fechaFin', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-12">
                        {!! Form::label('content', 'Contenido', []) !!}
                        <textarea name="content" id="editor" rows="8">
                            &lt;p&gt;Here goes the initial content of the editor.&lt;/p&gt;
                        </textarea>
                    </div>
            </div>
            {{--  <div class="form-row">
                <div class="form-group col-md-12">
                {!! Form::label('tipo', 'Tipo', []) !!}
                {!! Form::select('tipo', ['0'=>'Equipo', '1'=>'Competicion'], null, ['placeholder'=>'Seleccione','class'=>'form-control']) !!}
                </div>
            </div>  --}}
                {{-- {!! Form::label('descripcion_centro', 'Descripcion', []) !!}
                {!! Form::textArea('descripcion_centro', null, ['class'=>'form-control' ,'rows'=>4]) !!} --}}
        {!! Form::close() !!}
        
               
    </div>
</div>
@endsection
@section('scripts')
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection