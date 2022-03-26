@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('Categories') }}</h3>
            </div>
            <div class="col-md-12">
                @if (session('warn'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warn') }}
                    </div>
                @endif
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
                        <th scope="col">Image</th>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Modify</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-center" scope="col"><img src="{{ Storage::url($category->thumbnail) }}"
                                                                     width="75" height="100" alt=""></td>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td>{{$category->description}}</td>
                            <td><a class="btn btn-outline-warning" href="{{route('admin.category.edit', $category)}}"
                                   role="button">Edit</a></td>
                            <td>
                                <form method="POST" action="{{route('admin.category.destroy', $category)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{($categories)}}
            </div>
        </div>
    </div>

@endsection
