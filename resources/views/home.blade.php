@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <hr>
                        <a href="admin/product">View products</a><br>
                        <a href="admin/product/create">Create product</a><br>
                        <a href="admin/category/">View categories</a><br>
                        <a href="admin/category/create">Create category</a><br>
{{--                        <a href="admin/product">View product</a><br>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
