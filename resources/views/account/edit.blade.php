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
                <form action="{{route('account.update', Auth::user())}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-primary table-striped text-center border">
                        <thead>
                        <tr>
                            <th>Fields</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>First name:</td>
                            <td><input type="text" name="name" value="{{$user->name}}"></td>
                        </tr>
                        <tr>
                            <td>Last name:</td>
                            <td><input type="text" name="surname" value="{{$user->surname}}"></td>
                        </tr>
                        <tr>
                            <td>Birthdate:</td>
                            <td><input type="date" name="birthdate" value="{{$user->birthdate}}"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input type="text" name="phone" value="{{$user->phone}}"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-sm btn-warning">Save change</button>
                    <a class="btn btn-sm btn-info" href="{{route('account.show', Auth::user())}}">Canceled</a>
                </form>
            </div>
        </div>
    @endauth
@endsection
