@extends('plantillas.main')
@section('title')
	SisO: Avisos
@endsection
@section('cdn')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
@endsection
@section('content')

<div class="container">
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb navegacion">
                      <li class="breadcrumb-item"><a href="{{ route('aviso.index') }}">Avisos</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Editar aviso</li>
                    </ol>
                  </nav>
    <div class="card">
        <div class="card-header modal-header modal-title">
                <h4 class="modal-title" id="modalLabel">Editar aviso</h4>
        </div>
        <div class="card-body">
        {!! Form::model($aviso, ['route'=>['aviso.update',$aviso->id_aviso],'method' => 'PUT','id'=>'form_update']) !!}
            <div class="form-row">
                <div class="form-group" style="display: none">
                    {!! Form::label('id_administrador', 'Administrador', []) !!}
                    {!! Form::text('id_administrador', null , ['class'=>'form-control']) !!}
                    <div class="form-group"></div>
                </div>
                
                <div class="form-group col-md-12">
                    {!! Form::label('titulo', 'Titulo *', []) !!}
                    {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
                    <div class="form-group"></div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    {!! Form::label('fecha_ini_aviso', 'Fecha de inicio *', []) !!}
                    {!! Form::date('fecha_ini_aviso', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                    <div class="form-group"></div>
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('fecha_fin_aviso', 'Fecha de Fin', []) !!}
                    {!! Form::date('fecha_fin_aviso', \Illuminate\Support\Carbon::now(), ['class'=>'form-control']) !!}
                    <div class="form-group"></div>
                </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-12">
                        {!! Form::label('contenido', 'Contenido *', []) !!}
                        <textarea name="contenido" id="editor" class="form-control" rows="13">
                           {{ $aviso->contenido }}
                        </textarea>
                    </div>
            </div>
        </div>
            <div class="card-footer">
                    <div class="form-group col-md-3  float-right">
                        <button class="btn btn-block btn-primary button_spiner" disabled style="display:none">
                            <span class="spinner-grow spinner-grow-sm button_spinner" role="status" aria-hidden="true"></span>
                            Cargando...
                        </button>
                        {!! Form::submit('Actualizar aviso', ['class'=>'btn btn-block btn_aceptar btn-primary btn_aceptar']) !!}
                    </div>
                    {{-- <div class="form-group col-md-6">
                            <button class="btn btn-block btn-outline-secondary btn_cerrar" type="reset">Cancelar</a>
                    </div> --}}
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
    
    {!! Html::script('/js/validacion_ajax_request_aviso_update.js') !!}
    {!! Html::script('/js/validaciones.js') !!}
@endsection