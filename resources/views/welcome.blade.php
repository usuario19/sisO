@extends('plantillas.main')

@section('title')
    SisO - Bienvenido
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->nombre." ". Auth::user()->apellidos."." }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>


@include('sweet::alert')
    
@endsection
@section('scripts')
    <script>

    (function(){
        window.addEventListener('load', active_link, false);
        function active_link(){
            document.getElementById('home').className += " active";
        }
    }());
    </script>
@endsection