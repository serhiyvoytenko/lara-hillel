@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header alert-danger">{{ __('You don\'t have permission!') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(!empty($error))
                                <div class="alert alert-success" role="alert">
                                    {{ $error->getMessage() }}
                                </div>
                            @endif
                        {{ __('You are logged in!') }}
                            {{ phpinfo() }}
                        <hr>
                        <a href="admin/product">Add product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
