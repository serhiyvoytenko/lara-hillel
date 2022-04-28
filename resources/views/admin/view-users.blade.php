@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('Products') }}</h3>
            </div>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Telegram ID</th>
                        <th scope="col">Role</th>
                        <th scope="col">Balance, $</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Quantity of orders</th>
                        <th scope="col">Sum of orders</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="text-center">
                                                                <img
                                                                    src="{{$user->image??Storage::url('default/anonymous-small.png')}}"
                                                                    width="75" height="100" alt="">
                            </td>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user->telegram_id}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->balance}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{\App\Models\Order::where('user_id', $user->id)->count()}}</td>
                            <td>{{\App\Models\Order::where('user_id', $user->id)->sum('total')}}</td>
                            <td><a class="btn btn-sm btn-warning"
                                   href="{{route('admin.users.edit', $user)}}"
                                   role="button">Edit</a></td>
                            <td>
                                <form method="POST" action="{{route('admin.users.destroy', $user)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{($users)}}
            </div>
        </div>
    </div>

@endsection
