@extends('plantillas.main')
@section('title')
	SisO: Login
@endsection
@section('content')
@section('content')
<div class="container" style="background: #F9F9F9">
        <br>
        <div class="form-row"  style="margin-bottom: 20px">
            <img class="rounded-circle" src="/storage/logos/user.png" alt="" height="80" width="80" style="margin: auto;">
        </div>
        <div class="mx-auto col-md-4">
            <div class="card">
                {{--  <div class="card-header">{{ __('Reset Password') }}</div>  --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="">{{ __('Correo Electrónico') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="example@example.om" name="email" value="{{ $email ?? old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row">
                            <label for="password" class="">{{ __('Contraseña') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="">{{ __('Confirmar contraseña') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block boton-focus" style="background: #2CBC4D ; border: 1px solid #25743B; font-weight: bolder">
                                    {{ __('Reestablecer contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><br>
</div>
@endsection
