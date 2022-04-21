@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                {{ $message }}

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var timer = setTimeout(function() {
            window.location='{{route('home')}}'
        }, 3000);
    </script>
@endsection
