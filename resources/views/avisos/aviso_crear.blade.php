@extends('plantillas.main')
@section('title')
	SisO: Avisos
@endsection
@section('cdn')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
@endsection
@section('content')

<div class="container table-responsive-xl">
    <div class="form-group col-md-12">
        <table class="table table-sm table-bordered">
            <tbody>
                <th>
                    <div class=" container col-md-10 text-center" style="padding: 10px 0px">
                        <h4 class=""> CREAR AVISO</h4></td>
                    </div>
                </th>
            </tbody>
        </table>
    </div>
    <div class="card container">
        
        {!! Form::open(['route'=>'aviso.store','method' => 'POST']) !!}
            <div class="form-row">
                <div class="form-group" style="display: none">
                    {!! Form::label('id_administrador', 'Administrador', []) !!}
                    {!! Form::text('id_administrador',  Auth::user()->id_administrador, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('administrador', 'Administrador', []) !!}
                    {!! Form::text('administrador',  Auth::user()->nombre." ".Auth::user()->apellidos, ['class'=>'form-control', 'disabled']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('titulo', 'Titulo *', []) !!}
                    {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    {!! Form::label('id_gestion', 'Gestion', []) !!}
                        <select class="form-control form-control-sm" name="id_gestion" id="id_gestion">
                            <option value=" ">{{ "Seleccione" }}</option>
                            @foreach ($gestiones as $gestion)
                                <option value="{{ $gestion->id_gestion}}">{{$gestion->nombre_gestion}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('id_disc', 'Disciplina', []) !!}
                    {!! Form::select('id_disc', [], null, ['id'=>'id_disc','class'=>'form-control form-control-sm','disabled']) !!}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    {!! Form::label('fecha_ini_aviso', 'Fecha de inicio *', []) !!}
                    {!! Form::date('fecha_ini_aviso', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('fecha_fin_aviso', 'Fecha de Fin', []) !!}
                    {!! Form::date('fecha_fin_aviso', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-12">
                        {!! Form::label('contenido', 'Contenido *', []) !!}
                        <textarea name="contenido" id="editor" class="form-control">
                        </textarea>
                    </div>
            </div>

            <div class="form-row col-md-12">
                <div class="form-group col-md-4 float-right">
                  {!! Form::submit('Guardar', ['class'=>'btn btn-primary btn-block']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('scripts')
    <script>
        
        ClassicEditor
        .create( document.querySelector( '#editor' ),{
            toolbar: [ 'heading', '|','bold', 'italic', 'link', 'bulletedList', 'numberedList','imageUpload', 'blockQuote','insertTable','undo','redo' ],
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
            },
        
            removePlugins: [ 'MediaEmbed'],
            
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                openerMethod: 'popup'
            },

            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],
    
                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',
    
                    // This represents an image aligned to the left.
                    'alignLeft',
    
                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            }
        } 
        )
        .then( editor => {
            console.log( 'editor' );
        } )
        .catch( error => {
            console.error( 'error' );
        } );
        
    </script>
    
    {!! Html::script('/js/cargar_participacion.js') !!}
@endsection