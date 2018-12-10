@extends('plantillas.main')
@section('title')
	SisO: Login
@endsection
@section('content')
<div class="container" style="background: #F9F9F9">

        <br>
        <div class="form-row"  style="margin-bottom: 20px">
            <img class="rounded-circle" src="/storage/logos/user.png" alt="" height="80" width="80" style="margin: auto;">
        </div>
        <div class="mx-auto col-md-4">
            <div class="card">
               {{--   <div class="card-header">{{ __('Restablecer contraseña') }}</div>  --}}

                <div class="card-body" style="margin: 10px">
                        {{--  <div class="form-row"><strong>{{ __('Restablecer contraseña') }}</strong></div>  --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="form-group row col-md-12 mx-auto text-center" >
                            <strong><span class="">Para reestablecer la contraseña, ingrese el correo con el que se creo su cuenta.</span></strong>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                   
                                {{--  <label for="email" class="col-form-label">{{('Correo Electrónico') }}</label>  --}}
    
                                
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="example@example.com" name="email" value="{{ old('email') }}">
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-block btn-primary boton-focus" style="background: #2CBC4D ; border: 1px solid #25743B; font-weight: bolder">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <br>
</div>
@endsection
