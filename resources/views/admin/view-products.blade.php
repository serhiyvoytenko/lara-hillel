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
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Title</th>
                        <th scope="col">Short Description</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Count</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center">
                                <img src="{{!Storage::exists($product->thumbnail) ? $product->thumbnail : Storage::url($product->thumbnail)}}"
                                                                     width="75" height="100" alt=""></td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->short_description}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->category()->first()->title}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount}}</td>
                            <td>{{$product->count}}</td>
                            <td><a class="btn btn-outline-warning" href="{{route('admin.product.edit', $product)}}"
                                   role="button">Edit</a></td>
                            <td>
                                <form method="POST" action="{{route('admin.product.destroy', $product)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{($products)}}
            </div>
        </div>
    </div>

@endsection
