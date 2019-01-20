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
        .create( document.querySelector( '#editor' ),{
            toolbar: [ 'heading', '|', 'fontSize' , '|','bold', 'italic', 'link', 'bulletedList', 'numberedList','imageUpload', 'blockQuote','insertTable','undo','redo' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            }
        }
        )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection