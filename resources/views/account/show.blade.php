@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center">{{ __($user->name . ' ' . $user->surname) }}</h3>
        </div>
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <hr>
    @auth
        <div class="container bg-light d-flex align-items-center">
            <div class="col-md-12">
                <table class="table table-secondary table-striped text-center border">
                    <thead>
                    <tr>
                        <th>Fields</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ __('First name:') }}</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Last name:') }}</td>
                        <td>{{$user->surname}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Role:') }}</td>
                        <td>{{$user->role->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Birthdate:') }}</td>
                        <td>{{$user->birthdate}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Email:') }}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Phone:') }}</td>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Balance:') }}</td>
                        <td>{{ $user->balance }}</td>
                    </tr>
                    </tbody>
                </table>
                <a class="btn btn-sm btn-primary" href="{{route('account.edit', $user)}}">Edit profile</a>
            </div>
        </div>
    @endauth
@endsection
