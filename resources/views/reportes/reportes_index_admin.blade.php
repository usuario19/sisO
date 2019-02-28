@extends('plantillas.main')

@section('title')
    SisO - Lista de Clubs
@endsection
@section('cdn')
    {!!  Html::style('/select2/dist/css/select2.min.css') !!}
@endsection
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="col-md-12" style="padding: 0%">
                            <a class="navbar-brand">
                                <i class="material-icons reporte_icon">
                                    list_alt
                                </i><span class="title-principal" style="padding: 0%">REPORTES</span>
                            </a>
                            <a class="btn float-right" type=" " data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="material-icons d-block d-md-none" style="padding-top: 7px; color: white">
                                        keyboard_arrow_down
                                    </i>
                            </a>
                            <div class="collapse navbar-collapse btn-block" id="navbarText">

                                <div class="reporte_menu col-12" style="padding: 0%">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-item nav-link active btn-block" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Gestiones</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link btn-block" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Clubs</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link btn-block" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Fixture</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link btn-block" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Resultado</a>
                                    </div>
                                </div>
                              <span class="navbar-text">
                                
                              </span>
                            </div>
                        </div>
                </nav>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="reporte col-md-12">
                            <span class="title-principal">Reporte de gestion</span>
                        </div>
                        <br>
                        {!! Form::open(['route'=>'reportes.gestiones','method' => 'POST']) !!}
                        
                        <div class="mx-auto col-md-10">
                                <small id="passwordHelpBlock" class="form-text text-justify text-muted">
                                    Seleccione una gestión para imprimir información. Si necesita mas informacion seleccione las demás opciones.
                                </small>
                            <div class="form-group">
                                {!! Form::label('id_gestion', 'Gestion', ['class'=>'label-control']) !!}
                                <select name="id_gestion" id="buscador" class="form-control form-control-sm">
                                    @foreach ($gestiones as $gestion)
                                        <option value="{{ $gestion->id_gestion }}">{{ $gestion->nombre_gestion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label('opciones', 'Información', ['class'=>'label-control']) !!}
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        {!! Form::checkbox('opciones[]','disciplinas', false, ['class'=>'form-check-input check_us','id'=>'op0']) !!}
                                                        {!! Form::label('op0', 'Disciplinas habilitadas', ['class'=>'form-check-label']) !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        {!! Form::checkbox('opciones[]','clubs', false, ['class'=>'form-check-input check_us','id'=>'op1']) !!}
                                                        {!! Form::label('op1', 'Clubs participantes', ['class'=>'form-check-label']) !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn float-right btn-success"type="submit" formtarget = "_ blank" >Generar Reporte</button>
                            </div>
                        </div>
                        
                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="reporte col-md-12">
                                <span class="title-principal">Reporte de club</span>
                            </div>
                            <br>
                            {!! Form::open(['route'=>'reportes.gestiones','method' => 'POST']) !!}
                                
                                <div class="mx-auto col-md-10">
                                        <small id="passwordHelpBlock" class="form-text text-justify text-muted">
                                            Seleccione un Club para imprimir información. Si necesita mas informacion seleccione las demás opciones.
                                        </small>
                                    <div class="form-group">
                                        {!! Form::label('i_club', 'Club', ['class'=>'label-control']) !!}
                                        <select name="id_club" id="buscador_club" class="form-control form-control-sm">
                                            @foreach ($clubs as $club)
                                                <option value="{{ $club->id_club }}">{{ $club->nombre_club }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('id_gestion_club', 'Gestion', ['class'=>'label-control']) !!}
                                        <select name="id_gestion_club" id="buscador_club_gestion" class="form-control form-control-sm">
                                            @foreach ($gestiones as $gestion)
                                                <option value="{{ $gestion->id_gestion }}">{{ $gestion->nombre_gestion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('id_disc_club', 'Disciplina', ['class'=>'label-control']) !!}
                                        <select name="id_disc_club" id="buscador_club_disc" class="form-control form-control-sm">
                                            @foreach ($gestiones as $gestion)
                                                <option value="{{ $gestion->id_gestion }}">{{ $gestion->nombre_gestion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('opciones', 'Generar reporte :', ['class'=>'label-control']) !!}
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                {!! Form::radio('opcion', 'planilla', true, ['class'=>'form-check-input check_us','id'=>'ra0']) !!}
                                                                {!! Form::label('ra0', 'Planilla de jugadores', ['class'=>'form-check-label']) !!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                {!! Form::radio('opcion', 'inscripcion', false, ['class'=>'form-check-input check_us','id'=>'ra1']) !!}
                                                                {!! Form::label('ra1', 'Inscripciones del club', ['class'=>'form-check-label']) !!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button class="btn float-right btn-success"type="submit" formtarget = "_ blank" >Generar Reporte</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}   
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="reporte col-md-12">
                            <span class="title-principal">Fixture</span>
                        </div>
                        <br>
                        {!! Form::open(['route'=>'reportes.gestiones','method' => 'POST']) !!}
                            
                            <div class="mx-auto col-md-10">
                                <small id="passwordHelpBlock" class="form-text text-justify text-muted">
                                    Seleccione un Club para imprimir información. Si necesita mas informacion seleccione las demás opciones.
                                </small>
                                <div class="form-group">
                                    {!! Form::label('id_gestion_fix', 'Gestion', ['class'=>'label-control']) !!}
                                    <select name="id_gestion_fix" id="buscador_fix_gest" class="form-control form-control-sm">
                                        @foreach ($gestiones as $gestion)
                                            <option value="{{ $gestion->id_gestion }}">{{ $gestion->nombre_gestion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('id_disc_fix', 'Disciplina', ['class'=>'label-control']) !!}
                                    <select name="id_disc_fix" id="buscador_fix_disc" class="form-control form-control-sm">
                                        @foreach ($gestiones as $gestion)
                                            <option value="{{ $gestion->id_gestion }}">{{ $gestion->nombre_gestion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('opciones', 'Generar reporte :', ['class'=>'label-control']) !!}
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            {!! Form::radio('opcion', 'fixture', true, ['class'=>'form-check-input check_us','id'=>'fix0']) !!}
                                                            {!! Form::label('fix0', 'Fixture ordenado por fechas', ['class'=>'form-check-label']) !!}
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            {!! Form::radio('opcion', 'fix_fases', false, ['class'=>'form-check-input check_us','id'=>'fix1']) !!}
                                                            {!! Form::label('fix1', 'Fixture ordenado por fases', ['class'=>'form-check-label']) !!}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button class="btn float-right btn-success"type="submit" formtarget = "_ blank" >Generar Reporte</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <div class="reporte col-md-12">
                                    <span class="title-principal">Resultados</span>
                                </div>
                                <br>
                                {!! Form::open(['route'=>'reportes.gestiones','method' => 'POST']) !!}
                                    
                                    <div class="mx-auto col-md-10">
                                        <small id="passwordHelpBlock" class="form-text text-justify text-muted">
                                            Seleccione un Club para imprimir información. Si necesita mas informacion seleccione las demás opciones.
                                        </small>
                                        <div class="form-group">
                                            {!! Form::label('id_gestion_res', 'Gestion', ['class'=>'label-control']) !!}
                                            <select name="id_gestion_res" id="buscador_res_gest" class="form-control form-control-sm">
                                                @foreach ($gestiones as $gestion)
                                                    <option value="{{ $gestion->id_gestion }}">{{ $gestion->nombre_gestion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('id_disc_res', 'Disciplina', ['class'=>'label-control']) !!}
                                            <select name="id_disc_res" id="buscador_res_disc" class="form-control form-control-sm">
                                                @foreach ($gestiones as $gestion)
                                                    <option value="{{ $gestion->id_gestion }}">{{ $gestion->nombre_gestion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('opciones', 'Generar reporte :', ['class'=>'label-control']) !!}
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    {!! Form::radio('opcion', '', true, ['class'=>'form-check-input check_us','id'=>'res0']) !!}
                                                                    {!! Form::label('res0', 'Fixture', ['class'=>'form-check-label']) !!}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    {!! Form::radio('opcion', 'resultado', false, ['class'=>'form-check-input check_us','id'=>'res1']) !!}
                                                                    {!! Form::label('res1', 'Resultados', ['class'=>'form-check-label']) !!}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button class="btn float-right btn-success"type="submit" formtarget = "_ blank" >Generar Reporte</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                    </div>
                </div> 
            
            </div>
        </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#buscador').select2({
            placeholder: 'Seleccione'
        });
        $('#buscador_club').select2({
            width: '100%' 
        });
        $('#buscador_club_gestion').select2({
            width: '100%'
        });
        $('#buscador_club_disc').select2({
            width: '100%'
        });
        $('#buscador_fix_gest').select2({
            width: '100%'
        });
        $('#buscador_fix_disc').select2({
            width: '100%'
        });
        $('#buscador_res_gest').select2({
            width: '100%'
        });
        $('#buscador_res_disc').select2({
            width: '100%'
        });
        
    });
</script>
    {!! Html::script('/select2/dist/js/select2.min.js') !!}
{{--  {!! Html::script('/js/filtrar_por_nombre.js') !!}
{!! Html::script('/js/checkbox.js') !!}  --}}
@endsection