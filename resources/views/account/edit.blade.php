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
                            <th>{{ __('Fields') }}</th>
                            <th>{{ __('Data') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ __('First name:') }}</td>
                            <td><input type="text" name="name" value="{{$user->name}}"
                                       class="@error('name') is-invalid alert-danger @enderror">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Last name:') }}</td>
                            <td><input type="text" name="surname" value="{{$user->surname}}"
                                       class="@error('surname') is-invalid alert-danger @enderror">
                                @error('surname')
                                {{ $message }}
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Role:') }}</td>
                            <td>{{$user->role->name}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Birthdate:') }}</td>
                            <td><input type="date" name="birthdate" value="{{$user->birthdate}}"
                                       class="@error('birthdate') is-invalid alert-danger @enderror">
                                @error('birthdate')
                                {{ $message }}
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Email:') }}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Phone:') }}</td>
                            <td><input type="text" name="phone" value="{{$user->phone}}"
                                       class="@error('phone') is-invalid alert-danger @enderror">
                                @error('phone')
                                {{ $message }}
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>{{ __('Balance:') }}</td>
                            <td>{{$user->balance}}</td>
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
