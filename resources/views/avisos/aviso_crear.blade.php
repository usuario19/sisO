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
        <div class="form-group container col-md-12">
                <div class="container-fluid" style="background: #FFC107">
                    <div class="div-title-sub container text-left">
                        <div class="row">
                            <a class="" href="{{ route('aviso.index') }}" style="text-decoration:none">
                                <h5 style="margin:4px 0 0 0; padding-inline-start: 5px; color: #274B12; font-size: 16px" class="title-principal">Avisos
                                        <i class = "material-icons btn" style="padding: 0px"> 
                                                keyboard_arrow_right
                                        </i>
                                        
                                </h5>
                            </a>
                            <h5 style="margin: auto 0; font-size: 16px; color: #274B12" class="title-principal">Crear aviso</h5>
                        </div>
                    </div>
                </div>
            {{--  <table class="table table-sm table-borderless">
                <tbody>
                    <th>
                        <div class=" container col-md-10 text-center" style="padding: 5px 0px">
                            <h4 class=""> CREAR AVISO</h4></td>
                        </div>
                    </th>
                </tbody>
            </table>  --}}
        </div><br>
        <div class="card container col-md-11">
            
            {!! Form::open(['route'=>'aviso.store','method' => 'POST']) !!}
                <div class="form-row">
                    <div class="form-group" style="display: none">
                        {!! Form::label('id_administrador', 'Administrador', []) !!}
                        {!! Form::text('id_administrador',  Auth::user()->id_administrador, ['class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group col-md-12">
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
                            <textarea name="contenido" id="editor" class="form-control" rows="13"></textarea>
                        </div>
                </div>
    
                <div class="form-row col-md-12">
                    <div class="form-group col-md-4 text-right">
                      {!! Form::submit('Publicar aviso', ['class'=>'btn btn-secondary btn-block letter-size']) !!}
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
        
            
            
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                openerMethod: 'popup'
            },

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